<?php
/**
 * The model file of file module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     file
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php
class fileModel extends model
{
    public $savePath = '';
    public $webPath  = '';
    public $now      = 0;

    /**
     * The construct function, set the save path and web path.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->now = time();
        $this->setSavePath();
        $this->setWebPath();
    }

    /**
     * Print files.
     * 
     * @param  object $files 
     * @access public
     * @return void
     * @todo fix style.
     */
    public function printFiles($files)
    {
        if(empty($files)) return false;

        $imagesHtml = '';
        $filesHtml  = '';
        foreach($files as $file)
        {
            if($file->editor) continue;
            $file->title = $file->title . ".$file->extension";
            if($file->isImage)
            {
                if($file->objectType == 'product') continue;
                $imagesHtml .= "<li class='file-image file-{$file->extension}'>" . html::a(helper::createLink('file', 'download', "fileID=$file->id&mouse=left"), html::image($file->smallURL), "target='_blank' data-toggle='lightbox' data-img-width='{$file->width}' data-img-height='{$file->height}' title='{$file->title}'") . '</li>';
            }
            else
            {
                $filesHtml .= "<li class='file file-{$file->extension}'>" . html::a(helper::createLink('file', 'download', "fileID=$file->id&mouse=left"), $file->title, "target='_blank' title='{$file->title}'") . '</li>';
            }
        }
        echo "<ul class='files-list clearfix'>" . $imagesHtml . $filesHtml . '</ul>';
    }

    /**
     * Get files of an object list.
     * 
     * @param   string  $objectType 
     * @param   mixed   $objectID 
     * @param   bool    $isImage 
     * @access public
     * @return array
     */
    public function getByObject($objectType, $objectID, $isImage = null)
    {
        /* Get files group by objectID. */
        $files = $this->dao->select('*')
            ->from(TABLE_FILE)
            ->where('objectType')->eq($objectType)
            ->andWhere('objectID')->in($objectID)
            ->beginIf(isset($isImage) and $isImage)->andWhere('extension')->in($this->config->file->imageExtensions)->fi() 
            ->beginIf(isset($isImage) and !$isImage)->andWhere('extension')->notin($this->config->file->imageExtensions)->fi()
            ->orderBy('`primary`, editor_desc') 
            ->fetchGroup('objectID');

        /* Process these files. */
        foreach($files as $objectFiles) $this->batchProcessFile($objectFiles);

        /* If object is only an objectID, return it's files, else return all. */
        if(is_numeric($objectID) and !empty($files[$objectID])) return $files[$objectID];
        return $files;
    }

    /**
     * processFile just is image and add smallURL and middleURL if necessary.
     *
     * @param  object $file
     * @return object
     */    
    public function processFile($file)
    {
        $file->fullURL   = $this->webPath . $file->pathname;
        $file->middleURL = '';
        $file->smallURL  = '';
        $file->isImage   = false;

        if(in_array(strtolower($file->extension), $this->config->file->imageExtensions) !== false)
        {
            $file->middleURL = $this->webPath . str_replace('f_', 'm_', $file->pathname);
            $file->smallURL  = $this->webPath . str_replace('f_', 's_', $file->pathname);
            $file->largeURL  = $this->webPath . str_replace('f_', 'l_', $file->pathname);

            if(!file_exists(str_replace($this->webPath, $this->savePath, $file->middleURL))) $file->middleURL = $file->fullURL;
            if(!file_exists(str_replace($this->webPath, $this->savePath, $file->smallURL)))  $file->smallURL  = $file->fullURL;
            if(!file_exists(str_replace($this->webPath, $this->savePath, $file->largeURL)))  $file->largeURL  = $file->fullURL;

            $file->isImage = true;
        }

        return $file;
    }
    
    /**
     * batch run processFile function.
     * 
     * @param array $files
     * @return array
     */
    public function batchProcessFile($files)
    {
        foreach($files as &$file) $file = $this->processFile($file);
        return $files;
    }

    /**
     * Get info of a file.
     * 
     * @param string $fileID 
     * @access public
     * @return void
     */
    public function getByID($fileID)
    {
        $file = $this->dao->findById($fileID)->from(TABLE_FILE)->fetch();
        $file->realPath = $this->savePath . $file->pathname;
        $file->webPath  = $this->webPath . $file->pathname;
        return $this->processFile($file);
    }

    /**
     * Save the files uploaded.
     * 
     * @param string $objectType 
     * @param string $objectID 
     * @param string $extra 
     * @access public
     * @return void
     */
    public function saveUpload($objectType = '', $objectID = '', $extra = '')
    {
        $fileTitles = array();
        $now        = helper::now();
        $files      = $this->getUpload();

        $this->app->loadClass('pclzip', true);
        $imageSize = array('width' => 0, 'height' => 0);

        foreach($files as $id => $file)
        {   
            if(!move_uploaded_file($file['tmpname'], $this->savePath . $file['pathname'])) return false;

            if(strpos($this->config->file->allowed, ',' . $file['extension'] . ',') === false) $file = $this->saveZip($file);

            if(in_array(strtolower($file['extension']), $this->config->file->imageExtensions))
            {
                $this->compressImage($this->savePath . $file['pathname']);
                $imageSize = $this->getImageSize($this->savePath . $file['pathname']);
            }

            $file['objectType'] = $objectType;
            $file['objectID']   = $objectID;
            $file['addedBy']    = $this->app->user->account;
            $file['addedDate']  = $now;
            $file['extra']      = $extra;
            $file['width']      = $imageSize['width'];
            $file['height']     = $imageSize['height'];
            unset($file['tmpname']);
            $this->dao->insert(TABLE_FILE)->data($file)->exec();
            $fileTitles[$this->dao->lastInsertId()] =  $file['title'];
        }
        $this->loadModel('setting')->setItems('system.common.site', array('lastUpload' => time()));
        return $fileTitles;
    }

    /**
     * Save dangerous files to zip . 
     * 
     * @param  array    $file 
     * @access public
     * @return array
     */
    public function saveZip($file)
    {
        $pathInfo = pathinfo($file['pathname']);

        $uploadedFile = $this->savePath . $file['pathname'];
        $gbkName  = function_exists('iconv') ? iconv('utf8', 'gbk', $file['title']) : $file['title'];
        $tmpFile  = str_replace($pathInfo['filename'], md5(uniqid()) . DS . $gbkName, $uploadedFile);

        mkdir(dirname($tmpFile));
        copy($uploadedFile, $tmpFile);

        $archive = new PclZip($this->savePath . $file['pathname'] . '.zip');
        $list    = $archive->create($tmpFile, PCLZIP_OPT_REMOVE_ALL_PATH);
        if($list != 0)
        {
            unlink($this->savePath . $file['pathname']);
            unlink($tmpFile);
            rmdir(dirname($tmpFile));
            $file['pathname']  = $file['pathname'] . '.zip';
            $file['extension'] = 'zip';
        }

        return $file;
    }

    /**
     * Get the count of uploaded files.
     * 
     * @access public
     * @return void
     */
    public function getCount()
    {
        return count($this->getUpload());
    }

    /**
     * Check can upload front. 
     * 
     * @access public
     * @return void
     */
    public function canUpload()
    {
       if(RUN_MODE == 'admin') return true;
       if($this->config->site->allowUpload == 1) return true;
       if(isset($this->app->user->admin) and $this->app->user->admin == 'super') return true;
       return false;
    }

    /**
     * get uploaded files.
     * 
     * @param string $htmlTagName 
     * @access public
     * @return void
     */
    public function getUpload($htmlTagName = 'files')
    {
        $files = array();
        if(!isset($_FILES[$htmlTagName])) return $files;
        if(!$this->canUpload()) return $files;
        
        $this->app->loadClass('filter', true);

        $this->app->loadClass('purifier', true);
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        /* The tag if an array. */
        if(is_array($_FILES[$htmlTagName]['name']))
        {
            extract($_FILES[$htmlTagName]);
            foreach($name as $id => $filename)
            {
                if(empty($filename)) continue;
                if(!validater::checkFileName($filename)) continue;
                $file['extension'] = $this->getExtension($filename);
                $file['pathname']  = $this->setPathName($id, $file['extension']);
                $file['title']     = !empty($_POST['labels'][$id]) ? htmlspecialchars($_POST['labels'][$id]) : str_replace('.' . $file['extension'], '', $filename);
                $file['title']     = $purifier->purify($file['title']);
                $file['size']      = $size[$id];
                $file['tmpname']   = $tmp_name[$id];
                $files[] = $file;
            }
        }
        else
        {
            if(empty($_FILES[$htmlTagName]['name'])) return array();
            extract($_FILES[$htmlTagName]);
            if(!validater::checkFileName($name)) return array();;
            $file['extension'] = $this->getExtension($name);
            $file['pathname']  = $this->setPathName(0, $file['extension']);
            $file['title']     = !empty($_POST['labels'][0]) ? htmlspecialchars($_POST['labels'][0]) : substr($name, 0, strpos($name, $file['extension']) - 1);
            $file['title']     = $purifier->purify($file['title']);
            $file['size']      = $size;
            $file['tmpname']   = $tmp_name;
            return array($file);
        }
        return $files;
    }

    /**
     * Get extension name of a file.
     * 
     * @param string $filename 
     * @access public
     * @return void
     */
    public function getExtension($filename)
    {
        $extension = strtolower(trim(pathinfo($filename, PATHINFO_EXTENSION)));
        if(empty($extension)) return 'txt';
        return $extension;
    }

    /**
     * Get image width and height.
     * 
     * @param  string    $imagePath 
     * @access public
     * @return array
     */
    public function getImageSize($imagePath)
    {
        if(!file_exists($imagePath)) return array('width' => 0, 'height' => 0);

        list($width, $height) = getimagesize($imagePath);
        return array('width' => (int)$width, 'height' => (int)$height);
    }

    /**
     * Set the path name.
     * 
     * @param string $fileID 
     * @param string $extension 
     * @access public
     * @return void
     */
    public function setPathName($fileID, $extension)
    {
        $sessionID  = session_id();
        $randString = substr($sessionID, mt_rand(0, strlen($sessionID) - 5), 3);
        $pathName   = date('Ym/dHis', $this->now) . $fileID . mt_rand(0, 10000) . $randString;

        /* rand file name more */
        list($path, $file) = explode('/', $pathName);
        $file = md5(mt_rand(0, 10000) . str_shuffle(md5($file)) . mt_rand(0, 10000));
        return $path . '/f_' . $file . '.' . $extension;
    }

    /**
     * Set the save path.
     * 
     * @access public
     * @return void
     */
    public function setSavePath()
    {
        $savePath = $this->app->getDataRoot() . "upload/" . date('Ym/', $this->now);
        if(!file_exists($savePath)) 
        {
            @mkdir($savePath, 0777, true);
            if(is_writable($savePath) && !file_exists($savePath . DS . 'index.php'))
            {
                $fd = @fopen($savePath . DS . 'index.php', "a+");
                fclose($fd);
                chmod($savePath . DS . 'index.php' , 0755);
            }
        }
        $this->savePath = dirname($savePath) . '/';
    }
    
    /**
     * Set the web path.
     * 
     * @access public
     * @return void
     */
    public function setWebPath()
    {
        $this->webPath = $this->app->getWebRoot() . "data/upload/";
    }

    /**
     * Edit file.
     * 
     * @param  int    $fileID 
     * @access public
     * @return void
     */
    public function edit($fileID)
    {
        $this->replaceFile($fileID);
        
        $fileInfo = fixer::input('post')->remove('upFile')->get();
        $this->dao->update(TABLE_FILE)->data($fileInfo)->autoCheck()->batchCheck($this->config->file->require->edit, 'notempty')->where('id')->eq($fileID)->exec();
    }
    
    /**
     * Replace a file.
     * 
     * @access public
     * @return bool 
     */
    public function replaceFile($fileID, $postName = 'upFile')
    {
        if($files = $this->getUpload($postName))
        {
            $file      = $files[0];
            $fileInfo  = $this->dao->select('pathname, extension')->from(TABLE_FILE)->where('id')->eq($fileID)->fetch();
            $extension = strtolower($file['extension']);

            if($extension != $fileInfo->extension)
            {
                /* Remove old file. */
                if(file_exists($this->savePath . $fileInfo->pathname)) unlink($this->savePath . $fileInfo->pathname);
                foreach($this->config->file->thumbs as $size => $configure)
                {
                    $thumbPath = $this->savePath . str_replace('f_', $size . '_', $fileInfo->pathname);
                    if(file_exists($thumbPath)) unlink($thumbPath);
                }

                $fileInfo->pathname  = str_replace(".{$fileInfo->extension}", ".$extension", $fileInfo->pathname);
                $fileInfo->extension = $extension;
            }

            $realPathName = $this->savePath . $fileInfo->pathname;
            $imageSize    = array('width' => 0, 'height' => 0);
            move_uploaded_file($file['tmpname'], $realPathName);
            if(in_array(strtolower($file['extension']), $this->config->file->imageExtensions))
            {
                $this->compressImage($realPathName);
                $imageSize = $this->getImageSize($realPathName);
            }

            $fileInfo->addedBy   = $this->app->user->account;
            $fileInfo->addedDate = helper::now();
            $fileInfo->size      = $file['size'];
            $fileInfo->width     = $imageSize['width'];
            $fileInfo->height    = $imageSize['height'];
            $this->dao->update(TABLE_FILE)->data($fileInfo)->where('id')->eq($fileID)->exec();
            $this->loadModel('setting')->setItems('system.common.site', array('lastUpload' => time()));
            return true;
        }
        else
        {
            return false;
        }
    }
 
    /**
     * Save file download log.
     *
     * @param int $file
     * @return bool
     */
    public function log($file)
    {
        $log = new stdClass();
        $log->file    = $file;
        $log->account = $this->app->user->account;
        $log->ip      = $this->server->remote_addr;
        $log->referer = $this->server->http_referer;
        $log->time    = helper::now();

        $this->dao->insert(TABLE_DOWN)->data($log)->exec();
        $this->dao->update(TABLE_FILE)->set('downloads = downloads + 1')->where('id')->eq($file)->exec();

        return !dao::isError();
    }

    /**
     * Delete the record and the file
     * 
     * @param  int    $fileID 
     * @access public
     * @return void
     */
    public function delete($fileID, $null = null)
    {
        $file = $this->getByID($fileID);
        if(file_exists($file->realPath)) unlink($file->realPath);
        if(in_array($file->extension, $this->config->file->imageExtensions))
        {
            foreach($this->config->file->thumbs as $size => $configure)
            {
                $thumbPath = $this->savePath . str_replace('f_', $size . '_', $file->pathname);
                if(file_exists($thumbPath)) unlink($thumbPath);
            }
        }
        $this->dao->delete()->from(TABLE_FILE)->where('id')->eq($file->id)->exec();
        return !dao::isError();
    }

    /**
     * Paste image in kindeditor at firefox and chrome. 
     * 
     * @param  string    $data 
     * @param  string    $uid 
     * @access public
     * @return string
     */
    public function pasteImage($data, $uid)
    {
        $data = str_replace('\"', '"', $data);

        if(!$this->checkSavePath()) return false;

        ini_set('pcre.backtrack_limit', strlen($data));
        preg_match_all('/<img src="(data:image\/(\S+);base64,(\S+))" .+ \/>/U', $data, $out);
        foreach($out[3] as $key => $base64Image)
        {
            $imageData = base64_decode($base64Image);
            $imageSize = array('width' => 0, 'height' => 0);

            $file['extension'] = $out[2][$key];
            $file['pathname']  = $this->setPathName($key, $file['extension']);
            $file['size']      = strlen($imageData);
            $file['addedBy']   = $this->app->user->account;
            $file['addedDate'] = helper::today();
            $file['title']     = basename($file['pathname']);
            $file['editor']    = 1;

            file_put_contents($this->savePath . $file['pathname'], $imageData);
            $this->compressImage($this->savePath . $file['pathname']);

            $imageSize      = $this->getImageSize($this->savePath . $file['pathname']);
            $file['width']  = $imageSize['width'];
            $file['height'] = $imageSize['height'];

            $this->dao->insert(TABLE_FILE)->data($file)->exec();
            $_SESSION['album'][$uid][] = $this->dao->lastInsertID();

            $data = str_replace($out[1][$key], $this->webPath . $file['pathname'], $data);
        }

        return $data;
    }

    /**
     * Compress image to config configured size.
     * 
     * @param  string    $imagePath 
     * @access public
     * @return void
     */
    public function compressImage($imagePath)
    {
        $this->app->loadClass('phpthumb', true);
        $imageInfo = pathinfo($imagePath);
        if(!is_writable($imageInfo['dirname'])) return false;

        foreach($this->config->file->thumbs as $size => $configure)
        {
            $thumbPath = str_replace('f_', $size . '_', $imagePath);
            if(extension_loaded('gd'))
            {
                $thumb = phpThumbFactory::create($imagePath);
                $thumb->resize($configure['width'], $configure['height']);
                $thumb->save($thumbPath);
            }
            else
            {
                copy($imagePath, $thumbPath);   
            }
        }
    }

    /**
     * Check save path is writeable.
     * 
     * @access public
     * @return void
     */
    public function checkSavePath()
    {
        return is_writable($this->savePath);
    }

    /**
     * Update objectType and objectID for file.
     * 
     * @param  string $uid 
     * @param  int    $objectID 
     * @param  string $bojectType 
     * @access public
     * @return void
     */
    public function updateObjectID($uid, $objectID, $objectType)
    {
        $data = new stdclass();
        $data->objectID   = $objectID;
        $data->objectType = $objectType;
        if(isset($_SESSION['album'][$uid]) and $_SESSION['album'][$uid])
        {
            $this->dao->update(TABLE_FILE)->data($data)->where('id')->in($_SESSION['album'][$uid])->exec();
            if(dao::isError()) return false;
            return !dao::isError(); 
        }
    }

    /**
     * Copy file in content from file space.
     * 
     * @param  string $content 
     * @param  int    $objectID 
     * @param  string $bojectType 
     * @access public
     * @return bool
     */
    public function copyFromContent($content, $objectID, $objectType)
    {
        preg_match_all('/<img src="(\/data\/upload\/(\S+)\?fromSpace=y)" .+ \/>/U', $content, $images);

        if(empty($images)) return false;
        foreach($images[2] as $key => $pathname)
        {
            $pathname = str_replace($this->webPath, '', $pathname);
            $pathname = str_replace('\?fromSpace=y', '', $pathname);

            $data = $this->dao->select('*')->from(TABLE_FILE)->where('pathname')->eq($pathname)->fetch();
            if(!$data) $data = new stdclass();

            $data->pathname   = $pathname;
            $data->extension  = $this->getExtension($pathname);
            $data->objectID   = $objectID;
            $data->objectType = $objectType;
            $data->addedBy    = $this->app->user->account;
            $data->addedDate  = helper::now();
            $data->editor     = 1;

            $fileExists = $this->dao->select('count(*) as count')->from(TABLE_FILE)
                ->where('objectType')->eq($objectType)
                ->andWhere('objectID')->eq($objectID)
                ->andWhere('pathname')->eq($pathname)
                ->fetch('count');

            if($fileExists == 0) $this->dao->insert(TABLE_FILE)->data($data, $skip = 'id')->exec();
        }

        return !dao::isError(); 
    }
}
