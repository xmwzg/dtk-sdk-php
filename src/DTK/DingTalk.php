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
     * @return   config 
     */
    public function getConfig()
    {
        $params = \Yii::$app->params['dingtalk'];

        $this->login_appid = $params['login_appid'];
        $this->login_appsecret = $params['login_appsecret'];
        $this->appkey = $params['appkey'];
        $this->appsecret = $params['appsecret'];
        $this->agentid = $params['agentId'];
    }
    /**
     * 获取token
     * @Author   xmwzg
     * @DateTime 2021-03-12
     * @param    {string}
     * @return   [type]     [description]
     */
    public function getToken(){
        $this->getConfig();
        //token
        $c_get = new \DingTalkClient(\DingTalkConstant::$CALL_TYPE_OAPI, \DingTalkConstant::$METHOD_GET , \DingTalkConstant::$FORMAT_JSON);
        $req = new \OapiGettokenRequest;
        $req->setAppkey($this->appkey);
        $req->setAppsecret($this->appsecret);
        $token = $c_get->execute($req, '', "https://oapi.dingtalk.com/gettoken");

        return $token;
    }
    /**
     * 钉钉扫码登陆
     * @Author   xmwzg
     * @DateTime 2021-03-08
     * @param    {code} 临时code
     * @return   [type]
     */
    public function dingLogin($code){
        $this->getConfig();
        $c_post = new \DingTalkClient(\DingTalkConstant::$CALL_TYPE_OAPI, \DingTalkConstant::$METHOD_POST , \DingTalkConstant::$FORMAT_JSON);
        $req = new \OapiSnsGetuserinfoBycodeRequest;
        $req->setTmpAuthCode($code);
        $user=$c_post->executeWithAccessKey($req, "https://oapi.dingtalk.com/sns/getuserinfo_bycode",$this->login_appid,$this->login_appsecret);
        if($user->errcode !== 0){
          return $user;
        }

        //token
        $token = $this->getToken();

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
     * 根据手机号获取用户信息
     * @Author   xmwzg
     * @DateTime 2021-03-12
     * @param    {string}
     * @return   [type]     [description]
     */
    public function getUserId($mobile){

        $token = $this->getToken();

        $c = new \DingTalkClient(\DingTalkConstant::$CALL_TYPE_OAPI, \DingTalkConstant::$METHOD_POST , \DingTalkConstant::$FORMAT_JSON);
        $req = new \OapiV2UserGetbymobileRequest;
        $req->setMobile($mobile);
        $resp = $c->execute($req, $token->access_token, "https://oapi.dingtalk.com/topapi/v2/user/getbymobile");

        if($resp->errcode == 0){
            return $resp->result->userid;
        }

        return '091939145829210195';

    }
    /**
     * 钉钉发送普通消息
     * @Author   xmwzg
     * @DateTime 2021-03-09
     * @param    {string}
     * @return   [type]
     */
    public function sendMessage($send_name,$mobile='13522325326',$worker_id){

      $this->getConfig();
      $token = $this->getToken();
      $url = 'http://crm.ret.cn/worker/index?jsr_workerid='.$worker_id;
      $notice = '';
      if(empty($mobile)){
        $mobile = '13522325326';
        $notice = $worker_id.'电话号码为空';
      }
      $userid = $this->getUserId($mobile);
      if (!YII_ENV_PROD){
          $userid = '091939145829210195';
      }

      $c = new \DingTalkClient(\DingTalkConstant::$CALL_TYPE_OAPI, \DingTalkConstant::$METHOD_POST , \DingTalkConstant::$FORMAT_JSON);
      $req = new \OapiMessageCorpconversationAsyncsendV2Request;
      $req->setAgentId($this->agentid);
      $req->setUseridList('091939145829210195,'.$userid);
      $msg = new \Msg;
      $msg->msgtype="oa";
      $oa = new \Oa;
      $body = new \Body;
      $body->author="海豚系统";
      $body->content="海豚提醒您，".$send_name."给您转介了一个项目，请及时跟进处理。";
      $oa->body = $body;
      $head = new \Head;
      $head->bgcolor="内部工单转介";
      $oa->head = $head;
      $oa->pc_message_url="dingtalk://dingtalkclient/page/link?url=".urlencode($url)."&pc_slide=false";
      $oa->message_url="dingtalk://dingtalkclient/page/link?url=".urlencode($url)."&pc_slide=false";
      $msg->oa = $oa;
      $req->setMsg($msg);
      $resp = $c->execute($req, $token->access_token, "https://oapi.dingtalk.com/topapi/message/corpconversation/asyncsend_v2");
    }
    /**
     * 获取员工人数
     * @Author   xmwzg
     * @DateTime 2021-04-26
     * @param    {string}
     */
    public function UserCount(){

      $token = $this->getToken();
      $c = new \DingTalkClient(\DingTalkConstant::$CALL_TYPE_OAPI, \DingTalkConstant::$METHOD_POST , \DingTalkConstant::$FORMAT_JSON);
      $req = new \OapiUserCountRequest;
      $req->setOnlyActive("true");  //false包含未激活
      $resp = $c->execute($req, $token->access_token, "https://oapi.dingtalk.com/topapi/user/count");
      return $resp->result->count;
    }
    /**
     * 获取钉钉所有员工
     * @Author   xmwzg
     * @DateTime 2021-04-26
     * @param    {string}
     * @return   [type]     [description]
     */
    public function getAllUser(){
       $this->getConfig();
       $token = $this->getToken();
       $count = $this->UserCount();
       $c = new \DingTalkClient(\DingTalkConstant::$CALL_TYPE_OAPI, \DingTalkConstant::$METHOD_POST , \DingTalkConstant::$FORMAT_JSON);
       $req = new \OapiSmartworkHrmEmployeeQueryonjobRequest;
       $req->setStatusList("2,3,5,-1");
       $number = ceil($count/50); //向上取整
       $user_obj = [];
       for ($i=1; $i <= $number ; $i++) { 
         $offset = ($i-1)*50;
         $req->setOffset($offset);
         $req->setSize("50");  //最多50，分批次获取
         $resp = $c->execute($req, $token->access_token, "https://oapi.dingtalk.com/topapi/smartwork/hrm/employee/queryonjob"); 
         $userlist = json_decode(json_encode($resp->result->data_list),true);
         //获取其它信息
         //获取姓名
         $userlist_str = implode(',', $userlist);
         $oapi_request = new \OapiSmartworkHrmEmployeeListRequest;
         $oapi_request->setUseridList($userlist_str);
         $oapi_request->setFieldFilterList("sys00-name");
         $oapi_request->setAgentid("1102752623");
         $user_obj[] = $c->execute($oapi_request, $token->access_token, "https://oapi.dingtalk.com/topapi/smartwork/hrm/employee/list");
       }
       foreach ($user_obj as $key => $value) {
          $user_array = json_decode(json_encode($value->result),true);
          foreach ($user_array as $k => $v) {
            $users[$v['userid']] = $v['field_list'][0]['value'];
          }

       }
       return $users;
    }
    /**
     * 获取用户详情
     * @Author   xmwzg
     * @DateTime 2021-04-26
     * @param    {$userid_list 1,2,3}
     * @return   [type]     [description]
     */
    public function getUserInfo($userid_list){
      $token = $this->getToken();
      $c = new \DingTalkClient(\DingTalkConstant::$CALL_TYPE_OAPI, \DingTalkConstant::$METHOD_POST , \DingTalkConstant::$FORMAT_JSON);
      $oapi_request = new \OapiSmartworkHrmEmployeeListRequest;
      $oapi_request->setUseridList($userid_list);
      $oapi_request->setFieldFilterList("sys00-name");
      $oapi_request->setAgentid("1102752623");
      $user_obj = $c->execute($oapi_request, $token->access_token, "https://oapi.dingtalk.com/topapi/smartwork/hrm/employee/list");
      $users = [];
      foreach ($user_obj->result as $key => $value) {
         $user_array = json_decode(json_encode($value),true);
         if(!isset($user_array['field_list'][0]['value'])){
          continue;
         }
         $users[$user_array['userid']] = $user_array['field_list'][0]['value'];
      }
      return $users;
    }

}
?>