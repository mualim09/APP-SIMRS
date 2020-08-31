<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model {

	public function get_do_report($factory, $start_date, $end_date)
	{
		$this->db->order_by('trips.trip_date', 'ASC');
		$query=$this->db->where('origin', $factory)
		->where('trip_date >=', $start_date)
		->where('trip_date <', $end_date)
		->where("trip_status <> '0'")
		->from('trips')
		->join('orders','trips.trip_id=orders.trip_id')
		->join('products','orders.product_id=products.product_id')
		->join('uom','products.uom_id=uom.uom_id')
		->join('plans','trips.plan_id=plans.plan_id')
		->join('fleets','plans.fleet_id=fleets.fleet_id')
		->join('users','plans.driver_id=users.user_id')
		->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_do_report2($start_date, $end_date)
	{
		$this->db->order_by('trips.trip_date', 'ASC');
		$query=$this->db->where('trip_date >=', $start_date)
		->where('trip_date <', $end_date)
		->where("trip_status <> '0'")
		->from('trips')
		->join('orders','trips.trip_id=orders.trip_id')
		->join('products','orders.product_id=products.product_id')
		->join('uom','products.uom_id=uom.uom_id')
		->join('plans','trips.plan_id=plans.plan_id')
		->join('fleets','plans.fleet_id=fleets.fleet_id')
		->join('users','plans.driver_id=users.user_id')
		->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_factory()
	{
		$query=$this->db->where('office_type_id', 'OT002')
		->get('offices');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_driver()
	{
		$this->db->order_by('full_name', 'ASC');
		$query=$this->db->where('level_id','L008')
		->where('user_status','1')
		->get('users');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_fleet()
	{
		$this->db->order_by('hull_number', 'ASC');
		$query=$this->db->where('fleet_status','1')
		->get('fleets');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function find_office($office_id)
	{
		$query=$this->db->where('office_id', $office_id)
		->limit(1)
		->from('offices')
		->join('regions','offices.region_id=regions.region_id')
		->get();
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function find_trip_history($trip_id, $mark_id)
	{
		$query=$this->db->where('trip_id', $trip_id)
		->where('mark_id', $mark_id)
		->limit(1)
		->get('trip_history');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function find_plan_history($plan_date, $fleet_id)
	{
		$query=$this->db->where('fleet_id', $fleet_id)
		->where("TIMESTAMPDIFF(SECOND, '$plan_date', `date_planned`) IN (SELECT MIN(TIMESTAMPDIFF(SECOND, '$plan_date', `date_planned`)) AS min_timestamp FROM `plans` WHERE `date_planned` > '$plan_date' AND fleet_id = '$fleet_id')")
		->limit(1)
		->get('plans');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return 0;
		}
	}

	public function find_geo_history($plan_date, $fleet_id, $geo_id)
	{
		$query=$this->db->where('no_lambung', $fleet_id)
		->where('geo_id', $geo_id)
		->where("TIMESTAMPDIFF(SECOND, '$plan_date', `time_in`) IN (SELECT MIN(TIMESTAMPDIFF(SECOND, '$plan_date', `time_in`)) AS min_timestamp FROM `temp_geoDuration` WHERE `time_in` > '$plan_date' AND no_lambung = '$fleet_id')")
		->limit(1)
		->get('temp_geoDuration');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return 0;
		}
	}

	public function find_user($user_id)
	{
		$query=$this->db->where('user_id', $user_id)
		->limit(1)
		->get('users');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
}