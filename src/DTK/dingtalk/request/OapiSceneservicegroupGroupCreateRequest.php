<?php
/**
 * dingtalk API: dingtalk.oapi.sceneservicegroup.group.create request
 * 
 * @author auto create
 * @since 1.0, 2021.01.21
 */
class OapiSceneservicegroupGroupCreateRequest
{
	/** 
	 * 业务关联
	 **/
	private $bizid;
	
	/** 
	 * 群名称
	 **/
	private $groupName;
	
	/** 
	 * 标签列表
	 **/
	private $groupTagids;
	
	/** 
	 * 成员员工列表
	 **/
	private $memberStaffids;
	
	/** 
	 * 服务群群组ID
	 **/
	private $openGroupsetid;
	
	/** 
	 * 服务群团队ID
	 **/
	private $openTeamid;
	
	/** 
	 * 群主员工id
	 **/
	private $ownerStaffId;
	
	private $apiParas = array();
	
	public function setBizid($bizid)
	{
		$this->bizid = $bizid;
		$this->apiParas["bizid"] = $bizid;
	}

	public function getBizid()
	{
		return $this->bizid;
	}

	public function setGroupName($groupName)
	{
		$this->groupName = $groupName;
		$this->apiParas["group_name"] = $groupName;
	}

	public function getGroupName()
	{
		return $this->groupName;
	}

	public function setGroupTagids($groupTagids)
	{
		$this->groupTagids = $groupTagids;
		$this->apiParas["group_tagids"] = $groupTagids;
	}

	public function getGroupTagids()
	{
		return $this->groupTagids;
	}

	public function setMemberStaffids($memberStaffids)
	{
		$this->memberStaffids = $memberStaffids;
		$this->apiParas["member_staffids"] = $memberStaffids;
	}

	public function getMemberStaffids()
	{
		return $this->memberStaffids;
	}

	public function setOpenGroupsetid($openGroupsetid)
	{
		$this->openGroupsetid = $openGroupsetid;
		$this->apiParas["open_groupsetid"] = $openGroupsetid;
	}

	public function getOpenGroupsetid()
	{
		return $this->openGroupsetid;
	}

	public function setOpenTeamid($openTeamid)
	{
		$this->openTeamid = $openTeamid;
		$this->apiParas["open_teamid"] = $openTeamid;
	}

	public function getOpenTeamid()
	{
		return $this->openTeamid;
	}

	public function setOwnerStaffId($ownerStaffId)
	{
		$this->ownerStaffId = $ownerStaffId;
		$this->apiParas["owner_staffId"] = $ownerStaffId;
	}

	public function getOwnerStaffId()
	{
		return $this->ownerStaffId;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.sceneservicegroup.group.create";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->groupName,"groupName");
		RequestCheckUtil::checkMaxListSize($this->groupTagids,999,"groupTagids");
		RequestCheckUtil::checkMaxListSize($this->memberStaffids,999,"memberStaffids");
		RequestCheckUtil::checkNotNull($this->openGroupsetid,"openGroupsetid");
		RequestCheckUtil::checkNotNull($this->openTeamid,"openTeamid");
		RequestCheckUtil::checkNotNull($this->ownerStaffId,"ownerStaffId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
