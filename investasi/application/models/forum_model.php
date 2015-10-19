<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function getdata($table="", $where="", $order="", $limit="") {
		if($order!="") {
			$this->db->order_by($order[0], $order[1]);
		}
		
		if( $limit!="" ) {
			$this->db->limit($limit[1], $limit[0]);
		}
		
		if ($where == "") {
			$query = $this->db->get($table);
		} else {
			$query  = $this->db->get_where($table, $where);
		}
		
		$result = $query->result_array();
		if ($order == "") {
			if (count($result) > 0 ) {
				$result = $result[0];
			} else {
				$result = "";
			}
		}
		
		return $result;
	}
	
	function countdata($table="", $where="") {
		if($where != "") {
			$this->db->where($where);
		}
		$count = $this->db->from($table)->count_all_results();
		return $count;		
	}
	
	function updatedata($table, $data, $userid) {
		$this->db->where('id_user', $userid);
		return $this->db->update($table, $data); 
	}
	
	function insertdata($table="", $data="") {
		return $this->db->insert($table, $data); 
	}
	
	public function getrecursivedata($parent=0) {
		$data = array();
		$result = $this->getdata('tbl_forum_map', array('parent'=>$parent), array('forumid', 'ASC'));

		foreach($result as $row) {
			$data[] = array(
					'id'	=>$row['forumid'],
					'nama'	=>$row['forum_name'],
					// recursive
					'child'	=>$this->getrecursivedata($row['forumid'])
				);
		}
		return $data;
	}
}