<?php
class Users extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_user($number){
		$this->db->from('users');
		$this->db->where('users.number', $number);
		$result = $this->db->get()->row();

		if (count($result)==0){
			$this->db->from('users');
			$this->db->where('users.u_key', $number);
			$result = $this->db->get()->row();
		}

		return $result;
	}

	public function get_user_attributes($u_id){
		$this->db->distinct('user_attributes.`group`, user_attributes.`attribute`, user_attributes.`value`');
		$this->db->from('user_attributes');
		$this->db->where('user_attributes.u_id', $u_id);
		$this->db->group_by('user_attributes.`Group`, user_attributes.`attribute`');
		$this->db->order_by('Min(user_attributes.group_pos), user_attributes.`Group`, user_attributes.`pos`, user_attributes.`attribute`, user_attributes.`value`', '', false);
		return $this->db->get();
	}
	
	public function get_roster($team = 1, $active = 1, $fresh_meat = 0, $staff_type = 15){
		$this->db->from('users');
		$this->db->join('user_team_map', 'user_team_map.u_id = users.u_key');
		if (isset($staff_type)){
			$this->db->join('user_staff_type_map', 'user_staff_type_map.u_id = users.u_key');
			$this->db->where('user_staff_type_map.st_id', $staff_type);
		}
		$this->db->where('user_team_map.t_id', $team);
		$this->db->where('user_team_map.active', $active);
		if (isset($fresh_meat)){ $this->db->where('user_team_map.fresh_meat', $fresh_meat); }
		$this->db->order_by('IfNull(users.skate_name, users.first_name), users.number', '', false);
		return $this->db->get();
	}

	public function get_featured(){
		$this->db->from('users');
		$this->db->join('user_team_map', 'user_team_map.u_id = users.u_key');
		$this->db->join('user_staff_type_map', 'user_staff_type_map.u_id = users.u_key');
		$this->db->where('user_staff_type_map.st_id', 15);
		$this->db->where('user_team_map.t_id', 1);
		$this->db->where('user_team_map.active', 1);
		$this->db->where('user_team_map.fresh_meat', 0);
		$this->db->order_by('rand()', '', false);
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function update_user($u_key, $post_data){
		$this->db->where('u_key', $u_key);
		$this->db->update('users', $post_data); 
	}
}
?>