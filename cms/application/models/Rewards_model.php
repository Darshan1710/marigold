<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Rewards_model extends CI_Model{

	public function construct(){
		parent::__construct();
	}

	public function getRewardsMasterList(){
		return $this->db->get('rewards_master')->result_array();
	}
	public function addrewardsMaster($data){
		return $this->db->insert('rewards_master',$data);
	}
	public function getRewardsMasterDetails($filter){
		$this->db->where($filter);
		return $this->db->get('rewards_master')->row_array();
	}
	public function updateRewardsMaster($filter,$data){
		$this->db->where($filter);
		return $this->db->update('rewards_master',$data);
	}
	public function addRewards($data){
		return $this->db->insert('rewards_earned',$data);
	}
	public function getRewardsActivityDetails($filter){
		$this->db->where($filter);
		return $this->db->get('rewards_activity')->row_array();
	}
	public function getPointsDetails($filter){
		$this->db->where($filter);
		return $this->db->get('rewards_points')->row_array();
	}
	public function addRewardsPoints($data){
		return $this->db->insert('rewards_points',$data);
	}
	public function updateRewardsPoints($mobile,$points){
		$sql = 'UPDATE rewards_points SET points_earned = points_earned + '.$points.' WHERE mobile = '.$mobile;
		return $this->db->query($sql);
	}
	public function redeemPoints($mobile,$points){
		$sql = 'UPDATE rewards_points SET points_redeemed = points_redeemed + '.$points.' WHERE mobile = '.$mobile;
		return $this->db->query($sql);
	}
	public function addRewardsUsage($data){
		return $this->db->insert('rewards_usage',$data);
	}



}


?>