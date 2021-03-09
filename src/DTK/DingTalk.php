<?php
namespace DTK;

use yii;
include('TopSdk.php');

class DingTalk
{
    protected $login_appid = '';
    protected $login_appsecret = '';
    protected $appkey = '';
    protected $appsecret = '';
    protected $deptId = 1; //部门ID，默认根目录1
    protected $agentid = ''; //微应用ID

    /**
     * 获取配置参数
     * @Author   xmwzg
     * @DateTime 2021-03-08
     * @param    {system} 指定系统参数 case 案例库 crm 海豚系统
     * @return   config 
     */
    public function getConfig($system='case')
    {
        $params = \Yii::$app->params[$system];
        $this->login_appid = $params['login_appid'];
        $this->login_appsecret = $params['login_appsecret'];
        $this->appkey = $params['appkey'];
        $this->appsecret = $params['appsecret'];
    }

    /**
     * 钉钉扫码登陆
     * @Author   xmwzg
     * @DateTime 2021-03-08
     * @param    {code} 临时code
     * @return   [type]
     */
    public function dingLogin($system,$code){
        $this->getConfig($system);
        $c_post = new \DingTalkClient(\DingTalkConstant::$CALL_TYPE_OAPI, \DingTalkConstant::$METHOD_POST , \DingTalkConstant::$FORMAT_JSON);
        $req = new \OapiSnsGetuserinfoBycodeRequest;
        $req->setTmpAuthCode($code);
        $user=$c_post->executeWithAccessKey($req, "https://oapi.dingtalk.com/sns/getuserinfo_bycode",$this->login_appid,$this->login_appsecret);
        if($user->errcode !== 0){
          return $user;
        }

        //token
        $c_get = new \DingTalkClient(\DingTalkConstant::$CALL_TYPE_OAPI, \DingTalkConstant::$METHOD_GET , \DingTalkConstant::$FORMAT_JSON);
        $req = new \OapiGettokenRequest;
        $req->setAppkey($this->appkey);
        $req->setAppsecret($this->appsecret);
        $token = $c_get->execute($req, '', "https://oapi.dingtalk.com/gettoken");
        if($token->errcode !== 0){
          return $token;
        }

        //获取userID
        $req = new \OapiUserGetbyunionidRequest;
        $req->setUnionid($user->user_info->unionid);
        $userid = $c_post->execute($req, $token->access_token, "https://oapi.dingtalk.com/topapi/user/getbyunionid");
        //判断是否为公司内部员工
        if($userid->errcode !== 0 || $userid->result->contact_type !== 0){
            $userid->errmsg = '不是公司内部员工';
            $userid->errcode = 1;
            return $userid;
        }

        //获取用户信息
        $req = new \OapiV2UserGetRequest;
        $req->setUserid($userid->result->userid);
        $userinfo = $c_post->execute($req, $token->access_token, "https://oapi.dingtalk.com/topapi/v2/user/get");
        if($userinfo->result->email === ''){
            $userinfo->errmsg = '钉钉没有绑定公司邮箱';
            $userinfo->errcode = 1;
            return $userinfo;
        }
        return $userinfo;
    }
    /**
     * 获取员工花名册信息
     * @Author   xmwzg
     * @DateTime 2021-03-09
     * @param    {string}
     * @return   [type]
     */
    public function hmcInfo($userid){

    }

}
?>