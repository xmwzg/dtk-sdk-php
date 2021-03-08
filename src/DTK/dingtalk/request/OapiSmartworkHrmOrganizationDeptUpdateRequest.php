<?php
/**
 * dingtalk API: dingtalk.oapi.smartwork.hrm.organization.dept.update request
 * 
 * @author auto create
 * @since 1.0, 2021.01.26
 */
class OapiSmartworkHrmOrganizationDeptUpdateRequest
{
	/** 
	 * 部门ID
	 **/
	private $deptId;
	
	/** 
	 * 字段code
	 **/
	private $fieldCode;
	
	/** 
	 * 字段值
	 **/
	private $fieldValue;
	
	private $apiParas = array();
	
	public function setDeptId($deptId)
	{
		$this->deptId = $deptId;
		$this->apiParas["dept_id"] = $deptId;
	}

	public function getDeptId()
	{
		return $this->deptId;
	}

	public function setFieldCode($fieldCode)
	{
		$this->fieldCode = $fieldCode;
		$this->apiParas["field_code"] = $fieldCode;
	}

	public function getFieldCode()
	{
		return $this->fieldCode;
	}

	public function setFieldValue($fieldValue)
	{
		$this->fieldValue = $fieldValue;
		$this->apiParas["field_value"] = $fieldValue;
	}

	public function getFieldValue()
	{
		return $this->fieldValue;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.smartwork.hrm.organization.dept.update";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->deptId,"deptId");
		RequestCheckUtil::checkNotNull($this->fieldCode,"fieldCode");
		RequestCheckUtil::checkNotNull($this->fieldValue,"fieldValue");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
