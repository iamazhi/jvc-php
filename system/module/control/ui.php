<?php
/**
 * The control file of ui module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     ui
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class ui extends control
{
    public function __construct()
    {
        parent::__construct();
        $this->config->ui = new stdclass();
        $this->config->ui->groups = array('basic', 'navbar', 'block', 'button', 'footer');

        $this->config->ui->selectorOptions = array();

        $this->config->ui->selectorOptions['basic']['colorset'] = array();
        $this->config->ui->selectorOptions['basic']['colorset']['primary'] = array('type' => 'color', 'default' => '#3280FC', 'name' => 'color-primary');

        $this->config->ui->selectorOptions['basic']['border'] = array();
        $this->config->ui->selectorOptions['basic']['border']['radius'] = array('type' => 'size', 'default' => '3px', 'name' => 'border-radius');

        $this->config->ui->selectorOptions['basic']['pageBackground'] = array();
        $this->config->ui->selectorOptions['basic']['pageBackground']['backcolor']       = array('type' => 'color', 'default' => 'transparent', 'name' => 'background-color');
        $this->config->ui->selectorOptions['basic']['pageBackground']['backgroundImage'] = array('type' => 'image', 'default' => 'none', 'name' => 'background-image');
        $this->config->ui->selectorOptions['basic']['pageBackground']['repeat']          = array('type' => 'repeat', 'default' => 'repeat', 'name' => 'background-image-repeat');
        $this->config->ui->selectorOptions['basic']['pageBackground']['position']        = array('type' => 'position', 'default' => '0 0', 'name' => 'background-image-position');

        $this->config->ui->selectorOptions['basic']['pageText'] = array();
        $this->config->ui->selectorOptions['basic']['pageText']['color']      = array('type' => 'color', 'default' => '#333', 'name' => 'text-color');
        $this->config->ui->selectorOptions['basic']['pageText']['fontSize']   = array('type' => 'fontSize', 'default' => '13px', 'name' => 'font-size');
        $this->config->ui->selectorOptions['basic']['pageText']['fontFamily'] = array('type' => 'fontFamily', 'default' => '"Helvetica Neue", Helvetica, Tahoma, Arial, sans-serif', 'name' => 'font-family');
        $this->config->ui->selectorOptions['basic']['pageText']['fontWeight'] = array('type' => 'fontWeight', 'default' => 'normal', 'name' => 'font-weight');

        $this->config->ui->selectorOptions['basic']['aLink'] = array();
        $this->config->ui->selectorOptions['basic']['aLink']['color']     = array('type' => 'color', 'default' => '#0D3D88', 'name' => 'link-color');
        $this->config->ui->selectorOptions['basic']['aLink']['underline'] = array('type' => 'underline', 'default' => 'none', 'name' => 'link-decoration');

        $this->config->ui->selectorOptions['basic']['aVisited'] = array();
        $this->config->ui->selectorOptions['basic']['aVisited']['color'] = array('type' => 'color', 'default' => '#0D3D88', 'name' => 'link-visited-color');

        $this->config->ui->selectorOptions['basic']['aHover'] = array();
        $this->config->ui->selectorOptions['basic']['aHover']['color']     = array('type' => 'color', 'default' => '#347AEB', 'name' => 'link-hover-color');
        $this->config->ui->selectorOptions['basic']['aHover']['underline'] = array('type' => 'underline', 'default' => 'none', 'name' => 'link-decoration');

        $this->config->ui->selectorOptions['basic']['column'] = array();
        $this->config->ui->selectorOptions['basic']['column']['sidebarLayout'] = array('type' => 'sidebarLayout', 'default' => 'false', 'name' => 'sidebar-pull-left');
        $this->config->ui->selectorOptions['basic']['column']['sidebarWidth']  = array('type' => 'sidebarWidth', 'default' => '25%', 'name' => 'sidebar-width');

        $this->config->ui->selectorOptions['navbar']['layout'] = array();
        $this->config->ui->selectorOptions['navbar']['layout']['layout'] = array('type' => 'navLayout', 'default' => 'true', 'name' => 'navbar-table-layout');

        $this->config->ui->selectorOptions['navbar']['navbar'] = array();
        $this->config->ui->selectorOptions['navbar']['navbar']['backcolor']       = array('type' => 'color', 'default' => '#f1f1f1', 'name' => 'navbar-backcolor');
        $this->config->ui->selectorOptions['navbar']['navbar']['backgroundImage'] = array('type' => 'image', 'default' => 'none', 'name' => 'navbar-background-image');
        $this->config->ui->selectorOptions['navbar']['navbar']['repeat']          = array('type' => 'repeat', 'default' => 'repeat', 'name' => 'navbar-background-image-repeat');
        $this->config->ui->selectorOptions['navbar']['navbar']['position']        = array('type' => 'position', 'default' => '0 0', 'name' => 'navbar-background-image-position');
        $this->config->ui->selectorOptions['navbar']['navbar']['border']          = array('type' => 'border', 'default' => 'solid', 'name' => 'navbar-border-style');
        $this->config->ui->selectorOptions['navbar']['navbar']['borderColor']     = array('type' => 'color', 'default' => '#D5D5D5', 'name' => 'navbar-border-color');
        $this->config->ui->selectorOptions['navbar']['navbar']['borderWidth']     = array('type' => 'size', 'default' => '1px', 'name' => 'navbar-border-width');
        $this->config->ui->selectorOptions['navbar']['navbar']['radius']          = array('type' => 'size',  'default' => '4px', 'name' => 'navbar-border-radius');

        $this->config->ui->selectorOptions['navbar']['panel'] = array();
        $this->config->ui->selectorOptions['navbar']['panel']['backcolor']   = array('type' => 'color', 'default' => '#FFF', 'name' => 'navbar-panel-backcolor');
        $this->config->ui->selectorOptions['navbar']['panel']['border']      = array('type' => 'border', 'default' => 'solid', 'name' => 'navbar-panel-border-style');
        $this->config->ui->selectorOptions['navbar']['panel']['borderColor'] = array('type' => 'color', 'default' => '#DDD', 'name' => 'navbar-panel-border-color');
        $this->config->ui->selectorOptions['navbar']['panel']['borderWidth'] = array('type' => 'size', 'default' => '1px', 'name' => 'navbar-panel-border-width');
        $this->config->ui->selectorOptions['navbar']['panel']['radius']      = array('type' => 'size',  'default' => '3px', 'name' => 'navbar-paenl-border-radius');

        $this->config->ui->selectorOptions['navbar']['menuNormal'] = array();
        $this->config->ui->selectorOptions['navbar']['menuNormal']['color']      = array('type' => 'color',  'default' => '#555', 'name' => 'navbar-menu-color');
        $this->config->ui->selectorOptions['navbar']['menuNormal']['fontSize']   = array('type' => 'fontSize',  'default' => '14px', 'name' => 'navbar-menu-font-size');
        $this->config->ui->selectorOptions['navbar']['menuNormal']['fontFamily'] = array('type' => 'fontFamily',  'default' => 'inherit', 'name' => 'navbar-menu-font-family');
        $this->config->ui->selectorOptions['navbar']['menuNormal']['fontWeight'] = array('type' => 'fontWeight',  'default' => 'bold', 'name' => 'navbar-menu-font-weight');

        $this->config->ui->selectorOptions['navbar']['menuHover'] = array();
        $this->config->ui->selectorOptions['navbar']['menuHover']['color']     = array('type' => 'color',  'default' => '#000', 'name' => 'navbar-menu-color-hover');
        $this->config->ui->selectorOptions['navbar']['menuHover']['backcolor'] = array('type' => 'color',  'default' => '#FEFEFE', 'name' => 'navbar-menu-backcolor-hover');

        $this->config->ui->selectorOptions['navbar']['menuActive'] = array();
        $this->config->ui->selectorOptions['navbar']['menuActive']['color']     = array('type' => 'color',  'default' => '#151515', 'name' => 'navbar-menu-color-active');
        $this->config->ui->selectorOptions['navbar']['menuActive']['backcolor'] = array('type' => 'color',  'default' => '#FFF', 'name' => 'navbar-menu-backcolor-active');

        $this->config->ui->selectorOptions['navbar']['submenuNormal'] = array();
        $this->config->ui->selectorOptions['navbar']['submenuNormal']['color']      = array('type' => 'color',  'default' => '#333', 'name' => 'navbar-submenu-color');

        $this->config->ui->selectorOptions['navbar']['submenuHover'] = array();
        $this->config->ui->selectorOptions['navbar']['submenuHover']['color']     = array('type' => 'color',  'default' => '#151515', 'name' => 'navbar-submenu-color-hover');
        $this->config->ui->selectorOptions['navbar']['submenuHover']['backcolor'] = array('type' => 'color',  'default' => '#E5E5E5', 'name' => 'navbar-submenu-backcolor-hover');

        $this->config->ui->selectorOptions['navbar']['submenuActive'] = array();
        $this->config->ui->selectorOptions['navbar']['submenuActive']['color']     = array('type' => 'color',  'default' => '#151515', 'name' => 'navbar-submenu-color-active');
        $this->config->ui->selectorOptions['navbar']['submenuActive']['backcolor'] = array('type' => 'color',  'default' => '#E5E5E5', 'name' => 'navbar-submenu-backcolor-active');

        $this->config->ui->selectorOptions['block']['border'] = array();
        $this->config->ui->selectorOptions['block']['border']['border']  = array('type' => 'border', 'default' => 'solid', 'name' => 'block-border-style');
        $this->config->ui->selectorOptions['block']['border']['color']  = array('type' => 'color', 'default' => '#DDD', 'name' => 'block-border-color');
        $this->config->ui->selectorOptions['block']['border']['width']  = array('type' => 'size', 'default' => '1px', 'name' => 'block-border-width');
        $this->config->ui->selectorOptions['block']['border']['radius'] = array('type' => 'size',  'default' => '3px', 'name' => 'block-border-radius');

        $this->config->ui->selectorOptions['block']['heading'] = array();
        $this->config->ui->selectorOptions['block']['heading']['backcolor']  = array('type' => 'color', 'default' => '#F5F5F5', 'name' => 'block-heading-backcolor');
        $this->config->ui->selectorOptions['block']['heading']['color']      = array('type' => 'color', 'default' => '#333', 'name' => 'block-heading-color');
        $this->config->ui->selectorOptions['block']['heading']['fontSize']   = array('type' => 'fontSize', 'default' => 'inherit', 'name' => 'block-heading-font-size');
        $this->config->ui->selectorOptions['block']['heading']['fontWeight'] = array('type' => 'fontWeight', 'default' => 'inherit', 'name' => 'block-heading-font-weight');

        $this->config->ui->selectorOptions['block']['body'] = array();
        $this->config->ui->selectorOptions['block']['body']['backcolor'] = array('type' => 'color', 'default' => 'transparent', 'name' => 'block-body-backcolor');
        $this->config->ui->selectorOptions['block']['body']['color']     = array('type' => 'color', 'default' => '#333', 'name' => 'block-body-color');
        $this->config->ui->selectorOptions['block']['body']['linkColor'] = array('type' => 'color', 'default' => '#0D3D88', 'name' => 'block-body-link-color');

        $this->config->ui->selectorOptions['button']['colorset'] = array();
        $this->config->ui->selectorOptions['button']['colorset']['default'] = array('type' => 'color', 'default' => '#F2F2F2', 'name' => 'button-color-default');
        $this->config->ui->selectorOptions['button']['colorset']['primary'] = array('type' => 'color', 'default' => '#3280FC', 'name' => 'button-color-primary');
        $this->config->ui->selectorOptions['button']['colorset']['info']    = array('type' => 'color', 'default' => '#39B3D7', 'name' => 'button-color-info');
        $this->config->ui->selectorOptions['button']['colorset']['success'] = array('type' => 'color', 'default' => '#229F24', 'name' => 'button-color-success');
        $this->config->ui->selectorOptions['button']['colorset']['warning'] = array('type' => 'color', 'default' => '#E48600', 'name' => 'button-color-warning');
        $this->config->ui->selectorOptions['button']['colorset']['danger']  = array('type' => 'color', 'default' => '#D2322D', 'name' => 'button-color-danger');

        $this->config->ui->selectorOptions['button']['border'] = array();
        $this->config->ui->selectorOptions['button']['border']['border'] = array('type' => 'border', 'default' => 'solid', 'name' => 'button-border-style');
        $this->config->ui->selectorOptions['button']['border']['width']  = array('type' => 'size', 'default' => '1px', 'name' => 'button-border-width');
        $this->config->ui->selectorOptions['button']['border']['radius'] = array('type' => 'size',  'default' => '3px', 'name' => 'button-border-radius');

        $this->config->ui->selectorOptions['button']['text'] = array();
        $this->config->ui->selectorOptions['button']['text']['fontWeight']  = array('type' => 'fontWeight', 'default' => 'normal', 'name' => 'button-font-weight');

        $this->config->ui->selectorOptions['footer']['border'] = array();
        $this->config->ui->selectorOptions['footer']['border']['border'] = array('type' => 'border', 'default' => 'solid', 'name' => 'footer-border-style');
        $this->config->ui->selectorOptions['footer']['border']['color']  = array('type' => 'color', 'default' => '#ddd', 'name' => 'footer-border-color');

        $this->config->ui->selectorOptions['footer']['background'] = array();
        $this->config->ui->selectorOptions['footer']['background']['backcolor'] = array('type' => 'color', 'default' => '#f7f7f7', 'name' => 'footer-backcolor');

        /* Default theme setting */
        $this->config->ui->themes['default'] = $this->config->ui->selectorOptions;
        unset($this->config->ui->themes['default']['basic']['border']);
        unset($this->config->ui->themes['default']['basic']['colorset']);

        /* Blue theme setting */
        $this->config->ui->themes['blue']    = $this->config->ui->selectorOptions;
        unset($this->config->ui->themes['blue']['basic']['border']);
        unset($this->config->ui->themes['blue']['basic']['colorset']);
        unset($this->config->ui->themes['blue']['navbar']);
        $this->config->ui->themes['blue']['block']['heading']['backcolor']['default'] = '#145BCC';
        $this->config->ui->themes['blue']['block']['heading']['color']['default'] = '#FFF';

        /* Brightdark theme setting */
        $this->config->ui->themes['brightdark']    = $this->config->ui->selectorOptions;
        unset($this->config->ui->themes['brightdark']['basic']['border']);
        unset($this->config->ui->themes['brightdark']['basic']['colorset']);
        unset($this->config->ui->themes['brightdark']['navbar']);
        unset($this->config->ui->themes['brightdark']['button']);
        unset($this->config->ui->themes['brightdark']['block']);
        $this->config->ui->themes['brightdark']['basic']['pageBackground']['backcolor']['default'] = '#2E353F';
        $this->config->ui->themes['brightdark']['basic']['pageText']['color']['default'] = '#2E353F';
        $this->config->ui->themes['brightdark']['basic']['aLink']['color']['default'] = '#3D4DBE';
        $this->config->ui->themes['brightdark']['basic']['aVisited']['color']['default'] = '#3e4856';
        $this->config->ui->themes['brightdark']['basic']['aHover']['color']['default'] = '#3D4DBE';
        $this->config->ui->themes['brightdark']['footer']['border']['border']['default'] = 'none';
        $this->config->ui->themes['brightdark']['footer']['background']['backcolor']['default'] = '#ECF0F5';

        /* Flat theme setting */
        $this->config->ui->themes['flat']    = $this->config->ui->selectorOptions;
        unset($this->config->ui->themes['flat']['basic']['border']);
        unset($this->config->ui->themes['flat']['basic']['colorset']);
        unset($this->config->ui->themes['flat']['navbar']);
        unset($this->config->ui->themes['flat']['button']);
        unset($this->config->ui->themes['flat']['block']);
        $this->config->ui->themes['flat']['basic']['pageText']['color']['default'] = '#34495E';
        $this->config->ui->themes['flat']['basic']['aLink']['color']['default'] = '#16A085';
        $this->config->ui->themes['flat']['basic']['aVisited']['color']['default'] = '#16A085';
        $this->config->ui->themes['flat']['basic']['aHover']['color']['default'] = '#1ABC9C';
        $this->config->ui->themes['flat']['footer']['border']['border']['default'] = 'none';
        $this->config->ui->themes['flat']['footer']['background']['backcolor']['default'] = '#EDEFF1';

        /* Tartan theme setting */
        $this->config->ui->themes['tartan']    = $this->config->ui->selectorOptions;
        unset($this->config->ui->themes['tartan']['basic']['border']);
        unset($this->config->ui->themes['tartan']['basic']['colorset']);
        unset($this->config->ui->themes['tartan']['navbar']);
        unset($this->config->ui->themes['tartan']['button']);
        unset($this->config->ui->themes['tartan']['block']);
        $this->config->ui->themes['tartan']['basic']['pageBackground']['backgroundImage']['default'] = 'inherit';
        $this->config->ui->themes['tartan']['basic']['pageBackground']['backcolor']['default'] = '#5F7A64';
        $this->config->ui->themes['tartan']['basic']['pageText']['color']['default'] = '#6F6658';
        $this->config->ui->themes['tartan']['basic']['aLink']['color']['default'] = '#254952';
        $this->config->ui->themes['tartan']['basic']['aVisited']['color']['default'] = '#254952';
        $this->config->ui->themes['tartan']['basic']['aHover']['color']['default'] = '#35636E';
        $this->config->ui->themes['tartan']['footer']['border']['border']['default'] = 'none';
        $this->config->ui->themes['tartan']['footer']['background']['backcolor']['default'] = '#F5F0CC';

        /* Tree theme setting */
        $this->config->ui->themes['tree']    = $this->config->ui->selectorOptions;
        unset($this->config->ui->themes['tree']['basic']['border']);
        unset($this->config->ui->themes['tree']['basic']['colorset']);
        unset($this->config->ui->themes['tree']['navbar']);
        unset($this->config->ui->themes['tree']['button']);
        unset($this->config->ui->themes['tree']['block']);
        $this->config->ui->themes['tree']['basic']['pageText']['color']['default'] = '#5F7A64';
        $this->config->ui->themes['tree']['basic']['aLink']['color']['default'] = '#6E2E16';
        $this->config->ui->themes['tree']['basic']['aVisited']['color']['default'] = '#6E2E16';
        $this->config->ui->themes['tree']['basic']['aHover']['color']['default'] = '#6E2E16';
        $this->config->ui->themes['tree']['footer']['border']['border']['default'] = 'none';
        $this->config->ui->themes['tree']['footer']['background']['backcolor']['default'] = '#F5F0CC';

        /* Wide theme setting */
        $this->config->ui->themes['wide']    = $this->config->ui->selectorOptions;
        unset($this->config->ui->themes['wide']['basic']['pageBackground']);
        unset($this->config->ui->themes['wide']['basic']['border']);
        unset($this->config->ui->themes['wide']['basic']['aLink']);
        unset($this->config->ui->themes['wide']['basic']['aVisited']);
        unset($this->config->ui->themes['wide']['basic']['aHover']);
        unset($this->config->ui->themes['wide']['navbar']);
        unset($this->config->ui->themes['wide']['button']);
        unset($this->config->ui->themes['wide']['block']);
        unset($this->config->ui->themes['wide']['footer']);
        $this->config->ui->themes['wide']['basic']['colorset']['primary']['default'] = '#E91B23';

        /* Colorful theme setting */
        $this->config->ui->themes['colorful']    = $this->config->ui->selectorOptions;
        unset($this->config->ui->themes['colorful']['basic']['pageBackground']['repeat']);
        unset($this->config->ui->themes['colorful']['basic']['pageBackground']['position']);
        unset($this->config->ui->themes['colorful']['basic']['aLink']);
        unset($this->config->ui->themes['colorful']['basic']['aVisited']);
        unset($this->config->ui->themes['colorful']['basic']['aHover']);
        unset($this->config->ui->themes['colorful']['navbar']);
        unset($this->config->ui->themes['colorful']['button']);
        unset($this->config->ui->themes['colorful']['block']);
        $this->config->ui->themes['colorful']['basic']['colorset']['primary']['default'] = '#D1270A';
    }

    /**
     * Set template.
     *
     * @param  string   $template 
     * @param  string   $theme 
     * @param  bool     $custom 
     * @access public
     * @return void
     */
    public function setTemplate($template = '', $theme = '', $custom = false)
    {
        $templates = $this->ui->getTemplates();
        if($template and isset($templates[$template]))
        {  
            $settings = array();
            $setting['name']   = $template;
            $setting['theme']  = $theme;
            $setting['parser'] = isset($templates[$template]['parser']) ? $templates[$template]['parser'] : 'default';
            $setting['customTheme'] =  $custom ? $theme : '';

            $result = $this->loadModel('setting')->setItems('system.common.template', $setting);
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess));
            $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
        }

        $this->view->title     = $this->lang->ui->setTemplate;
        $this->view->templates = $templates;
        $this->display();
    }

    /**
     * Custom theme.
     * 
     * @param  string $theme 
     * @param  string $template 
     * @access public
     * @return void
     */
    public function customTheme($theme = '', $template = '')
    {
        if(empty($template)) $template = $this->config->template->name;
        $templates = $this->ui->getTemplates();

        $cssFile  = sprintf($this->config->site->ui->customCssFile, $template, $theme);
        $savePath = dirname($cssFile);
        if(!file_exists($savePath)) mkdir($savePath, 0777, true);

        if($_POST)
        {
            $params = $_POST;

            if(isset($templates[$template]) && isset($templates[$template]['themes'][$theme]))
            {
                $this->ui->createCustomerCss($template, $theme, $params);
                $setting       = isset($this->config->template->custom) ? json_decode($this->config->template->custom, true): array();
                $postedSetting = fixer::input('post')->remove('template,theme,css')->get();

                $setting[$template][$theme] = $postedSetting;

                $result = $this->loadModel('setting')->setItems('system.common.template', array('custom' => helper::jsonEncode($setting)) );
                $this->loadModel('setting')->setItems('system.common.template', array('customVersion' => time()));
                $this->send(array('result' => 'success', 'message' => $this->lang->ui->themeSaved));
            }
        }

        $setting = isset($this->config->template->custom) ? json_decode($this->config->template->custom, true) : array();

        $this->view->setting = !empty($setting[$template][$theme]) ? $setting[$template][$theme] : array();

        $this->view->title      = "<i class='icon-cog'></i> " . $this->lang->ui->customtheme;
        $this->view->modalWidth = 1000;
        $this->view->theme      = $theme;
        $this->view->template   = $template;
        $this->view->hasPriv    = true;

        if(!is_writable($savePath))
        {
            $this->view->hasPriv = false;
            $this->view->errors  = sprintf($this->lang->ui->unWritable, str_replace(dirname($this->app->getWwwRoot()), '', $savePath));
        }

        $this->display();
    }

    /**
     * set logo.
     * 
     * @access public
     * @return void
     */
    public function setLogo()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $return = $this->ui->setOptionWithFile($section = 'logo', $htmlTagName = 'logo');

            if($return['result']) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate'=>inlink('setLogo')));
            if(!$return['result']) $this->send(array('result' => 'fail', 'message' => $return['message']));
        }

        $this->view->title = $this->lang->ui->setLogo;
        $this->view->logo  = isset($this->config->site->logo) ? json_decode($this->config->site->logo) : false;

        $this->display();
    }

    /**
     * Set base style.
     * 
     * @access public
     * @return void
     */
    public function setBaseStyle()
    {
        if($_POST)
        {
            $style  = fixer::input('post')->stripTags('content', $this->config->allowedTags->admin, false)->get();
            $return = $this->loadModel('setting')->setItems('system.common.site', array('basestyle' => $style->content));

            if($return) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate'=>inlink('setBaseStyle')));
            if(!$return) $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
        }

        $this->view->title   = $this->lang->ui->setBaseStyle;
        $this->view->content = isset($this->config->site->basestyle) ? $this->config->site->basestyle : '';

        $this->display();
    }

    /**
     * Upload favicon.
     * 
     * @access public
     * @return void
     */
    public function setFavicon()
    {   
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {   
            $return = $this->ui->setOptionWithFile($section = 'favicon', $htmlTagName = 'favicon', $allowedFileType = 'ico');

            if($return['result']) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate'=>inlink('setFavicon')));
            if(!$return['result']) $this->send(array('result' => 'fail', 'message' => $return['message']));
        }

        $this->view->title   = $this->lang->ui->setFavicon;
        $this->view->favicon = isset($this->config->site->favicon) ? json_decode($this->config->site->favicon) : false;

        $this->display();
    }

    /**
     * Delete favicon 
     * 
     * @access public          
     * @return void            
     */ 
    public function deleteFavicon() 
    {
        $favicon = isset($this->config->site->favicon) ? json_decode($this->config->site->favicon) : false;

        $this->loadModel('setting')->deleteItems("owner=system&module=common&section=site&key=favicon");
        if($favicon) $this->loadModel('file')->delete($favicon->fileID);

        $this->locate(inlink('setFavicon'));
    }

    /**
     * Delete logo. 
     * 
     * @access public          
     * @return void            
     */ 
    public function deleteLogo() 
    {
        $logo = isset($this->config->site->logo) ? json_decode($this->config->site->logo) : false;

        $this->loadModel('setting')->deleteItems("owner=system&module=common&section=site&key=logo");
        if($logo) $this->loadModel('file')->delete($logo->fileID);

        $this->locate(inlink('setLogo'));
    }
}
