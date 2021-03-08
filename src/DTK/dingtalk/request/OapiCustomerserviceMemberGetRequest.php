<?php
/**
 * dingtalk API: dingtalk.oapi.customerservice.member.get request
 * 
 * @author auto create
 * @since 1.0, 2021.02.04
 */
class OapiCustomerserviceMemberGetRequest
{
	/** 
	 * 1，智能客服
	 **/
	private $productionType;
	
	/** 
	 * 三方租户id
	 **/
	private $thirdTenantId;
	
	/** 
	 * 账号id
	 **/
	private $userId;
	
	/** 
	 * 账号来源
	 **/
	private $userSourceId;
	
	private $apiParas = array();
	
	public function setProductionType($productionType)
	{
		$this->productionType = $productionType;
		$this->apiParas["production_type"] = $productionType;
	}

	public function getProductionType()
	{
		return $this->productionType;
	}

	public function setThirdTenantId($thirdTenantId)
	{
		$this->thirdTenantId = $thirdTenantId;
		$this->apiParas["third_tenant_id"] = $thirdTenantId;
	}

	public function getThirdTenantId()
	{
		return $this->thirdTenantId;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
		$this->apiParas["user_id"] = $userId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function setUserSourceId($userSourceId)
	{
		$this->userSourceId = $userSourceId;
		$this->apiParas["user_source_id"] = $userSourceId;
	}

	public function getUserSourceId()
	{
		return $this->userSourceId;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.customerservice.member.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->thirdTenantId,"thirdTenantId");
		RequestCheckUtil::checkNotNull($this->userId,"userId");
		RequestCheckUtil::checkNotNull($this->userSourceId,"userSourceId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
