<?php
class api extends control
{
    //private $host = "http://192.168.2.29:8080/v1/";
    //private $host = "http://local.jvc.com/";
    private $host = "http://192.168.1.16:8080/v1/";
    public function simulator()
    {
        return print json_encode(array('result'=>'success', 'message'=> '登录成功'));
        //return print json_encode(array('result'=>'fail', 'message' => $this->lang->user->loginFailed));
    }

    public function rest($resources, $type = 'GET')
    {
        //$locate = $this->post->referer ? $this->post->referer : $this->createLink($default->module, $default->method);
        $resources = str_replace('*', '/', $resources);
        if($resources == 'company/login' || $resources == 'employee/login') $result = $this->login($resources, $type);

        if($type == 'POST') $result = $this->post($this->host . $resources);

        if(empty($result)) $result = array('result' => 'fail', 'message' => '与服务端通信失败');
        $this->send($result);
    }

    public function post($url)
    {
        $result = $this->curl($url, 'POST', $_POST);
        $result = @json_decode($result, true);
        return $result;
    }

    private function login($resources, $type)
    {
        $account  = $_POST['account'];
        $password = md5($_POST['password'] . 'flll');

        $option = array('account' => $account, 'password' => $password);
        $url = $this->host . $resources;

//        $result = "{ \"data\": { \"account\": \"ashome\", \"address\": \"福建省厦门市思明区民族路47号海峡电子商务创业园3号电梯5楼\", \"business_no\": \"350203100007729\", \"contacts\": \"emma\", \"contacts_phone\": \"15634542347\", \"id\": \"2\", \"id_str\": \"ttcaca\", \"is_valid\": \"1\", \"name\": \"厦门市提提喀喀电子商务有限公司\", \"name_short\": \"提提擦擦\", \"name_word\": \"名称单字\", \"password\": \"54ab485339279f709fd37d0da36259b0\", \"principal\": \"王卿\", \"principal_phone\": \"15634234567\", \"remark\": \"备注\" }, \"message\": \"查询数据成功!\", \"result\": \"success\" }";
        $result = $this->curl($url, $type, $option);
        $result = @json_decode($result, true);

        if(empty($result)) return array();
        if($result['result'] == 'fail') return $result;

        $user = (object)$result['data'];
        if(RUN_MODE == 'front') $user->rights = $this->loadModel('user')->authorize($user);
        if($resources == 'company/login')  $user->role = 'company';
        if($resources == 'employee/login') $user->role = 'employee';
        $this->session->set('user', $user);
        $this->app->user = $this->session->user;

        $result['locate'] = $this->createLink("flll{$user->role}", 'control');
        return $result;
    }

    private function curl($url, $type = 'POST', $option = array(), $header = 0)
    {
        if($type == 'GET')
        {
            $query = '?';
            foreach($option as $k => $v) $query .= "$k=$v&";
            $query = substr($query, 0, -1);
            $url .= $query;
        }

        $curl = curl_init (); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)'); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // 设置HTTP头
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $type);

        if($type != 'GET' && !empty($option)) curl_setopt ($curl, CURLOPT_POSTFIELDS, $option);

        $result = curl_exec($curl); // 执行操作
        return $result;
        curl_close ($curl); // 关闭CURL会话
    }
}
