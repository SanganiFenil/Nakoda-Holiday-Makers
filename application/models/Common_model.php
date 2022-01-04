<?php
	class Common_model extends CI_Model
	{
        public function fill_source(){
            return $this->db->get('place')->result_array();
        }
        public function fill_destination($pid){
            return $this->db->where_not_in('place_name',$pid)->get('place')->result_array();
        }
        public function find_bus($req){
            return $this->db->select('b.*,r.*')
                    ->from('bus as b, route as r')
                    ->join('route','r.route_id = b.route_id')
                    ->where(array('r.source'=>$req['source'],'r.destination'=>$req['destination']))
                    ->group_by('b.bus_id')
                    ->get()
                    ->result_array();
        }
        public function get_first_stop($busid,$source){
            return $this->db->select('s.*, p.*')
                ->from('stops as s, pickup_point as p, place as pl')
                ->join('pickup_point','p.pickup_id = s.pickup_id')
                ->join('place','pl.place_id = p.place_id')
                ->where(array('s.bus_id'=>$busid,'pl.place_name'=>$source))
                ->get()->first_row();
        }
        public function get_last_stop($busid,$destination){
            return $this->db->select('s.*, p.*')
                ->from('stops as s, pickup_point as p, place as pl')
                ->join('pickup_point','p.pickup_id = s.pickup_id')
                ->join('place','pl.place_id = p.place_id')
                ->where(array('s.bus_id'=>$busid,'pl.place_name'=>$destination))
                ->get()->last_row();
        }
        public function get_pickups($busid,$source){
            return $this->db->select('s.*, p.*')
                ->from('stops as s, pickup_point as p, place as pl')
                ->join('pickup_point','p.pickup_id = s.pickup_id')
                ->join('place','pl.place_id = p.place_id')
                ->where(array('s.bus_id'=>$busid,'pl.place_name'=>$source))
                ->group_by('s.stop_id')
                ->get()->result_array();
        }
        public function check_seats($busid,$date){
            $result = $this->db->select('b.*,bd.*')
                ->from('booking as b, booking_dtls as bd')
                ->join('booking_dtls','b.booking_id = bd.booking_id')
                ->where(array('b.bus_id'=>$busid,'b.journey_date'=>$date))
                ->group_by('bd.booking_dtls_id')
                ->get()->result_array();
            return $result;
        }
        public function get_route_by_busid($busid){
            return $this->db->select('b.*,r.*')
                ->from('bus as b, route as r')
                ->join('route','r.route_id = b.route_id')
                ->where('b.bus_id',$busid)
                ->group_by('b.bus_id')
                ->get()->result_array();
        }
    }

?>