<?php
	class Admin_model extends CI_Model
	{
        //insert functions

        public function place_insert($data){
            $insert['place_name'] = $data['placename'];
            $this->db->insert('place',$insert);     
        }
        public function pickup_point_insert($data){
            $insert['place_id'] = $data['place'];
            $insert['pickup_name'] = $data['pdname'];
            $this->db->insert('pickup_point',$insert);     
        }
        public function route_insert($data){
            $insert['source']=$data['source'];
            $insert['destination']=$data['destination'];
            $insert['route_status']=1;
            $this->db->insert('route',$insert);
            return $this->db->insert_id();
        }
        public function stop_insert($data){
            $insert['bus_id']=$data['bid'];
            $insert['pickup_id']=$data['stop'];
            $insert['time']=$data['stop_time'];
            $this->db->insert('stops',$insert);
            return $this->db->insert_id();
        }
        public function bus_insert($data){
            $insert['bus_name']=$data['busname'];
            $insert['route_id']=$data['route'];
            $insert['bus_no']=$data['busno'];
            $insert['total_seats']=$data['totalseats'];
            $insert['departure_time']=$data['departureTime'];
            $insert['destination_time']=$data['destinationTime'];
            $insert['fare']=$data['fare'];
            $this->db->insert('bus',$insert);
            return $this->db->insert_id();
        }
        public function driver_insert($data){
            $insert['name']=$data['name'];
            $insert['phone']=$data['phone'];
            $this->db->insert('driver',$insert);
            return $this->db->insert_id();
        }

        //display or select functions

        public function authenticate($data)
		{
			return $this->db->where(array('username'=>$data['username'],'password'=>$data['password']))
				->get('admin')->result_array();
		}

        public function place_display(){    
            return $this->db->get('place')->result_array();
        }
        public function pickup_display(){
            return $this->db->select('pk.*,p.*')
                    ->from('place as p, pickup_point as pk')
                    ->join('place','p.place_id = pk.place_id')
                    ->group_by('pk.pickup_id')
                    ->get()->result_array();
        }
        public function route_display(){
            return $this->db->get('route')->result_array();
        }
        public function bus_display(){
            return $this->db->get('bus')->result_array();
        }
        public function driver_display(){
            return $this->db->get('driver')->result_array();
        }
        public function booking_display(){
            return $this->db->get('booking')->result_array();
        }
        public function info_display(){
            return $this->db->get('user_inquiry')->result_array();
        }
        public function get_route($route_id){
            return $this->db->where('route_id',$route_id)->get('route')->result_array();
        }
        public function get_bus($busid){
            return $this->db->select('r.*,b.*')
                        ->from('bus as b, route as r')
                        ->join('route','r.route_id = b.route_id')
                        ->where('bus_id',$busid)
                        ->group_by('b.bus_id')
                        ->get()->result_array();
        }
         public function get_booking($booking_id){
           return $this->db->select('*')
                        ->from('booking')
                        ->where('booking_id',$booking_id)
                        ->get()->result_array();
        }
        public function get_stops($bid){
            return $this->db->select('p.*,s.*')
                        ->from('pickup_point as p, stops as s')
                        ->join('pickup_point','p.pickup_id = s.pickup_id')
                        ->group_by('p.pickup_id')
                        ->where('s.bus_id',$bid)->get()->result_array();
        }

        // update functions

        public function deactivate_bus($busid){
            $set['bus_status']='0';
            $where['bus_id']=$busid;
            $this->db->update('bus',$set,$where);
        }
        public function activate_bus($busid){
            $set['bus_status']='1';
            $where['bus_id']=$busid;
            $this->db->update('bus',$set,$where);
        }
        public function update_bus($data){
            $set['departure_time']=$data['departureTime'];
            $set['destination_time']=$data['destinationTime'];
            $set['fare']=$data['fare'];
            $where['bus_id']=$data['busid'];
            $this->db->update('bus',$set,$where);
        }
         public function update_booking($data){
            $set['name']=$data['fname'];
            $set['journey_date']=$data['journey_date'];
            // $set['fare']=$data['fare'];
            $where['booking_id']=$data['booking_id'];
            $this->db->update('booking',$set,$where);
        }
        public function deactivate_route($route_id){
            $set['route_status']='0';
            $where['route_id']=$route_id;
            $this->db->update('route',$set,$where);
        }
        public function activate_route($route_id){
            $set['route_status']='1';
            $where['route_id']=$route_id;
            $this->db->update('route',$set,$where);
        }
        public function activate_b($bus_id){
            $set['bus_status']='1';
            $where['bus_id']=$bus_id;
            $this->db->update('bus',$set,$where);
        }
        public function driver_contact_update($data){
            $set['phone']=$data['phone'];
            $where['driver_id']=$data['driverid'];
            $this->db->update('driver',$set,$where);
        }

        // delete functions

        public function delete_stop($stopid){
            $this->db->delete('stops',array('stop_id' => $stopid));
        }

        public function delete_bus($busid){
            $this->db->delete('bus',array('bus_id' => $busid));
        }
       
        public function delete_driver($driverid){
            $this->db->delete('driver',array('driver_id' => $driverid));
        }

        public function delete_booking($booking_id){
            $this->db->delete('booking',array('booking_id' => $booking_id));
        }

        public function delete_inquiry($inqid){
            $this->db->delete('user_inquiry',array('inqid' => $inqid));
        }
    }

?>