<?php
/**
 * dingtalk API: dingtalk.oapi.attendance.class.get request
 * 
 * @author auto create
 * @since 1.0, 2020.12.25
 */
class OapiAttendanceClassGetRequest
{
	/** 
	 * 班次id
	 **/
	private $classId;
	
	private $apiParas = array();
	
	public function setClassId($classId)
	{
		$this->classId = $classId;
		$this->apiParas["class_id"] = $classId;
	}

	public function getClassId()
	{
		return $this->classId;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.attendance.class.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->classId,"classId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
