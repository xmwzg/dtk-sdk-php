<?php
/**
 * dingtalk API: dingtalk.oapi.finance.loan.contacts.update request
 * 
 * @author auto create
 * @since 1.0, 2021.01.19
 */
class OapiFinanceLoanContactsUpdateRequest
{
	/** 
	 * 联系人id
	 **/
	private $contactId;
	
	/** 
	 * 联系人手机号
	 **/
	private $contactMobile;
	
	/** 
	 * 钉钉客户唯一身份标识
	 **/
	private $idCardNo;
	
	/** 
	 * 联系人职业
	 **/
	private $userCategory;
	
	/** 
	 * 手机号
	 **/
	private $userMobile;
	
	/** 
	 * 联系人姓名
	 **/
	private $userName;
	
	/** 
	 * 联系人关系：配偶、父母、子女、朋友、同事、同学、其他家庭联系人、其他血亲、其他姻亲
	 **/
	private $userRelation;
	
	private $apiParas = array();
	
	public function setContactId($contactId)
	{
		$this->contactId = $contactId;
		$this->apiParas["contact_id"] = $contactId;
	}

	public function getContactId()
	{
		return $this->contactId;
	}

	public function setContactMobile($contactMobile)
	{
		$this->contactMobile = $contactMobile;
		$this->apiParas["contact_mobile"] = $contactMobile;
	}

	public function getContactMobile()
	{
		return $this->contactMobile;
	}

	public function setIdCardNo($idCardNo)
	{
		$this->idCardNo = $idCardNo;
		$this->apiParas["id_card_no"] = $idCardNo;
	}

	public function getIdCardNo()
	{
		return $this->idCardNo;
	}

	public function setUserCategory($userCategory)
	{
		$this->userCategory = $userCategory;
		$this->apiParas["user_category"] = $userCategory;
	}

	public function getUserCategory()
	{
		return $this->userCategory;
	}

	public function setUserMobile($userMobile)
	{
		$this->userMobile = $userMobile;
		$this->apiParas["user_mobile"] = $userMobile;
	}

	public function getUserMobile()
	{
		return $this->userMobile;
	}

	public function setUserName($userName)
	{
		$this->userName = $userName;
		$this->apiParas["user_name"] = $userName;
	}

	public function getUserName()
	{
		return $this->userName;
	}

	public function setUserRelation($userRelation)
	{
		$this->userRelation = $userRelation;
		$this->apiParas["user_relation"] = $userRelation;
	}

	public function getUserRelation()
	{
		return $this->userRelation;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.finance.loan.contacts.update";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->contactId,"contactId");
		RequestCheckUtil::checkNotNull($this->contactMobile,"contactMobile");
		RequestCheckUtil::checkNotNull($this->idCardNo,"idCardNo");
		RequestCheckUtil::checkNotNull($this->userCategory,"userCategory");
		RequestCheckUtil::checkNotNull($this->userMobile,"userMobile");
		RequestCheckUtil::checkNotNull($this->userName,"userName");
		RequestCheckUtil::checkNotNull($this->userRelation,"userRelation");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
