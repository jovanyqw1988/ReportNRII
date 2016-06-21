<?php
/**
 * Created by PhpStorm.
 * User: haivk
 * Date: 2016/6/21
 * Time: 14:40
 */

namespace common\models;


class Dayi
{
    public $redirect_url='http://220.180.203.199:90/';
    public $author_state="STATE";
    public $client_id = "15992e8c-01a1-469b-bd5e-df4f11d94e24";
    public $client_secret = "7gq1VZeQyqN7cgc0no";
    public $instru_authorize_url = "http://218.249.73.245/instru_war/oauth2/authorize.ins";
    public $access_token_url =  "https://218.249.73.245/instru_war/oauth2/access_token.ins";
    public $oauth2_resourse_unserinfo = "https://218.249.73.245/instru_war/oauth2/resource/userinfo.ins";
    /*
     * $description  获取当前大仪平台的code
     */
    public  function getCode(){
        $url = $this->instru_authorize_url . "?" . "client_id=".$this->client_id."&response_type=code&redirect_uri=" . urlencode($this->redirect_url."frontend/web/index.php?r=dayi/autho") . "&scope=read&state=".$this->author_state;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $return = curl_exec($ch);
        curl_close($ch);
    }
    /*
     * $description 获取用户信息
     *
     */
    public function getPlatformuserinfo($authorize_code,$state){
            if($state ==  $this->author_state){
                $data = [
                    'client_id' => $this->client_id,
                    'client_secret' => $this->client_secret,
                    'grant_type' => 'authorization_code',
                    'code' => $authorize_code,
                    'redirect_uri' =>$this->redirect_url
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->access_token_url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                $return = curl_exec($ch);
                curl_close($ch);
                $autho_arr = json_decode($return, true);
                if ($autho_arr['access_token']) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($ch, CURLOPT_URL, $this->oauth2_resourse_unserinfo . "?" . http_build_query(array('access_token' => $autho_arr['access_token'])));
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $resourse_data = curl_exec($ch);
                    curl_close($ch);
                    $platform_userinfo = json_decode($resourse_data, true); var_dump($platform_userinfo); exit;
                    if ($platform_userinfo) {
                        $platformUser = new \common\models\PlatformUser();
                        $platformUser->isPlatformUser($platform_userinfo["username"], $platform_userinfo["email"]);
                    }
                }
            }

    }

}