<?php
/**
 * dingtalk API: dingtalk.oapi.finance.loan.bankcard.list request
 * 
 * @author auto create
 * @since 1.0, 2021.01.18
 */
class OapiFinanceLoanBankcardListRequest
{
	/** 
	 * 身份证号
	 **/
	private $idCardNo;
	
	/** 
	 * 手机号
	 **/
	private $userMobile;
	
	private $apiParas = array();
	
	public function setIdCardNo($idCardNo)
	{
		$this->idCardNo = $idCardNo;
		$this->apiParas["id_card_no"] = $idCardNo;
	}

	public function getIdCardNo()
	{
		return $this->idCardNo;
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

	public function getApiMethodName()
	{
		return "dingtalk.oapi.finance.loan.bankcard.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->idCardNo,"idCardNo");
		RequestCheckUtil::checkNotNull($this->userMobile,"userMobile");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
