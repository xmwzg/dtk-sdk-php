<?php
/**
 * dingtalk API: dingtalk.oapi.finance.loan.bankcard.add request
 * 
 * @author auto create
 * @since 1.0, 2021.01.18
 */
class OapiFinanceLoanBankcardAddRequest
{
	/** 
	 * 银行编码
	 **/
	private $bankCode;
	
	/** 
	 * 银行名称
	 **/
	private $bankName;
	
	/** 
	 * 银行预留手机号
	 **/
	private $bankcardMobile;
	
	/** 
	 * 银行卡号
	 **/
	private $bankcardNo;
	
	/** 
	 * 身份证号
	 **/
	private $idCardNo;
	
	/** 
	 * 手机号
	 **/
	private $userMobile;
	
	private $apiParas = array();
	
	public function setBankCode($bankCode)
	{
		$this->bankCode = $bankCode;
		$this->apiParas["bank_code"] = $bankCode;
	}

	public function getBankCode()
	{
		return $this->bankCode;
	}

	public function setBankName($bankName)
	{
		$this->bankName = $bankName;
		$this->apiParas["bank_name"] = $bankName;
	}

	public function getBankName()
	{
		return $this->bankName;
	}

	public function setBankcardMobile($bankcardMobile)
	{
		$this->bankcardMobile = $bankcardMobile;
		$this->apiParas["bankcard_mobile"] = $bankcardMobile;
	}

	public function getBankcardMobile()
	{
		return $this->bankcardMobile;
	}

	public function setBankcardNo($bankcardNo)
	{
		$this->bankcardNo = $bankcardNo;
		$this->apiParas["bankcard_no"] = $bankcardNo;
	}

	public function getBankcardNo()
	{
		return $this->bankcardNo;
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
		return "dingtalk.oapi.finance.loan.bankcard.add";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->bankCode,"bankCode");
		RequestCheckUtil::checkNotNull($this->bankName,"bankName");
		RequestCheckUtil::checkNotNull($this->bankcardMobile,"bankcardMobile");
		RequestCheckUtil::checkNotNull($this->bankcardNo,"bankcardNo");
		RequestCheckUtil::checkNotNull($this->idCardNo,"idCardNo");
		RequestCheckUtil::checkNotNull($this->userMobile,"userMobile");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
