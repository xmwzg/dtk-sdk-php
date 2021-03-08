<?php
/**
 * dingtalk API: dingtalk.oapi.planetom.feeds.create request
 * 
 * @author auto create
 * @since 1.0, 2021.01.28
 */
class OapiPlanetomFeedsCreateRequest
{
	/** 
	 * 主播在组织内的id（staffId）
	 **/
	private $anchorId;
	
	/** 
	 * 约定开播时间戳（未来时间）
	 **/
	private $appointBeginTime;
	
	/** 
	 * 封面url
	 **/
	private $coverUrl;
	
	/** 
	 * 课程类型
	 **/
	private $feedType;
	
	/** 
	 * 绑定群列表
	 **/
	private $groupIds;
	
	/** 
	 * 简介
	 **/
	private $introduction;
	
	/** 
	 * 图片简介url
	 **/
	private $picIntroductionUrl;
	
	/** 
	 * 课程标题
	 **/
	private $title;
	
	private $apiParas = array();
	
	public function setAnchorId($anchorId)
	{
		$this->anchorId = $anchorId;
		$this->apiParas["anchor_id"] = $anchorId;
	}

	public function getAnchorId()
	{
		return $this->anchorId;
	}

	public function setAppointBeginTime($appointBeginTime)
	{
		$this->appointBeginTime = $appointBeginTime;
		$this->apiParas["appoint_begin_time"] = $appointBeginTime;
	}

	public function getAppointBeginTime()
	{
		return $this->appointBeginTime;
	}

	public function setCoverUrl($coverUrl)
	{
		$this->coverUrl = $coverUrl;
		$this->apiParas["cover_url"] = $coverUrl;
	}

	public function getCoverUrl()
	{
		return $this->coverUrl;
	}

	public function setFeedType($feedType)
	{
		$this->feedType = $feedType;
		$this->apiParas["feed_type"] = $feedType;
	}

	public function getFeedType()
	{
		return $this->feedType;
	}

	public function setGroupIds($groupIds)
	{
		$this->groupIds = $groupIds;
		$this->apiParas["group_ids"] = $groupIds;
	}

	public function getGroupIds()
	{
		return $this->groupIds;
	}

	public function setIntroduction($introduction)
	{
		$this->introduction = $introduction;
		$this->apiParas["introduction"] = $introduction;
	}

	public function getIntroduction()
	{
		return $this->introduction;
	}

	public function setPicIntroductionUrl($picIntroductionUrl)
	{
		$this->picIntroductionUrl = $picIntroductionUrl;
		$this->apiParas["pic_introduction_url"] = $picIntroductionUrl;
	}

	public function getPicIntroductionUrl()
	{
		return $this->picIntroductionUrl;
	}

	public function setTitle($title)
	{
		$this->title = $title;
		$this->apiParas["title"] = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.planetom.feeds.create";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->anchorId,"anchorId");
		RequestCheckUtil::checkNotNull($this->appointBeginTime,"appointBeginTime");
		RequestCheckUtil::checkNotNull($this->feedType,"feedType");
		RequestCheckUtil::checkNotNull($this->groupIds,"groupIds");
		RequestCheckUtil::checkMaxListSize($this->groupIds,999,"groupIds");
		RequestCheckUtil::checkNotNull($this->title,"title");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
