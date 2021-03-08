<?php

/**
 * 返回结果对象
 * @author auto create
 */
class AnnualReportResponse
{
	
	/** 
	 * 年累计打卡天数
	 **/
	public $at_check_days1y;
	
	/** 
	 * 年累计智能填表的人次，仅当type=1时有效
	 **/
	public $general_form_user_cnt1y;
	
	/** 
	 * 年累计新增内部群聊数量，仅当type=3时有效
	 **/
	public $inner_group_cnt1y;
	
	/** 
	 * 年累计发起视频会议时长（分钟）
	 **/
	public $join_succ_video_conf_len1y;
	
	/** 
	 * 年累计参与（含发起）视频会议次数
	 **/
	public $join_succ_video_conf_num1y;
	
	/** 
	 * 年累计参与（含发起）视频会议人次，仅当type=1时有效
	 **/
	public $join_succ_video_conf_user_cnt1y;
	
	/** 
	 * 年累计参与（含发起）语音会议时长（分钟）
	 **/
	public $join_succ_voip_conf_len1y;
	
	/** 
	 * 年累计参与（含发起）语音会议次数
	 **/
	public $join_succ_voip_conf_num1y;
	
	/** 
	 * 年累计参与（含发起）语音会议人次，仅当type=1时有效
	 **/
	public $join_succ_voip_conf_user_cnt1y;
	
	/** 
	 * 年累计参与直播次数
	 **/
	public $live_join_succ_cnt1y;
	
	/** 
	 * 年累计参与直播时长（分钟）
	 **/
	public $live_join_succ_time_len1y;
	
	/** 
	 * 年累计外勤天数
	 **/
	public $outside_days1y;
	
	/** 
	 * 处理审批数
	 **/
	public $process_inst_operate_cnt1y;
	
	/** 
	 * 发起审批数
	 **/
	public $process_inst_submit_cnt1y;
	
	/** 
	 * 年累计使用的应用数量
	 **/
	public $use_micro_app_cnt1y;
	
	/** 
	 * 年累计使用的应用人数，仅当type=1,2时有效
	 **/
	public $use_micro_user_cnt1y;	
}
?>