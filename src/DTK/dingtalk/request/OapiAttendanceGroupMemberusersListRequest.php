<?php
/**
 * dingtalk API: dingtalk.oapi.attendance.group.memberusers.list request
 * 
 * @author auto create
 * @since 1.0, 2019.07.31
 */
class OapiAttendanceGroupMemberusersListRequest
{
	/** 
	 * 游标
	 **/
	private $cursor;
	
	/** 
	 * 考勤组id
	 **/
	private $groupId;
	
	/** 
	 * 操作人userId
	 **/
	private $opUserId;
	
	private $apiParas = array();
	
	public function setCursor($cursor)
	{
		$this->cursor = $cursor;
		$this->apiParas["cursor"] = $cursor;
	}

	public function getCursor()
	{
		return $this->cursor;
	}

	public function setGroupId($groupId)
	{
		$this->groupId = $groupId;
		$this->apiParas["group_id"] = $groupId;
	}

	public function getGroupId()
	{
		return $this->groupId;
	}

	public function setOpUserId($opUserId)
	{
		$this->opUserId = $opUserId;
		$this->apiParas["op_user_id"] = $opUserId;
	}

	public function getOpUserId()
	{
		return $this->opUserId;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.attendance.group.memberusers.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
