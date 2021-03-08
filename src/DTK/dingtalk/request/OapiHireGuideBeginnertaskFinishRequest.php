<?php
/**
 * dingtalk API: dingtalk.oapi.hire.guide.beginnertask.finish request
 * 
 * @author auto create
 * @since 1.0, 2021.01.11
 */
class OapiHireGuideBeginnertaskFinishRequest
{
	/** 
	 * 任务编码
	 **/
	private $taskCode;
	
	/** 
	 * 任务类型：0表示基础任务，1表示高阶任务
	 **/
	private $taskType;
	
	/** 
	 * 员工标识
	 **/
	private $userid;
	
	private $apiParas = array();
	
	public function setTaskCode($taskCode)
	{
		$this->taskCode = $taskCode;
		$this->apiParas["task_code"] = $taskCode;
	}

	public function getTaskCode()
	{
		return $this->taskCode;
	}

	public function setTaskType($taskType)
	{
		$this->taskType = $taskType;
		$this->apiParas["task_type"] = $taskType;
	}

	public function getTaskType()
	{
		return $this->taskType;
	}

	public function setUserid($userid)
	{
		$this->userid = $userid;
		$this->apiParas["userid"] = $userid;
	}

	public function getUserid()
	{
		return $this->userid;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.hire.guide.beginnertask.finish";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->taskCode,"taskCode");
		RequestCheckUtil::checkNotNull($this->taskType,"taskType");
		RequestCheckUtil::checkNotNull($this->userid,"userid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
