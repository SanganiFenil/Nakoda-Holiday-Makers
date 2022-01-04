<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    // constructor

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Common_model');
    }

    //my operational functions
    function check_default($post_string) {
        return $post_string == '0' ? FALSE : TRUE;
    }
    function check_route($post_string)
	{
		return $post_string == '0' ? FALSE : TRUE;
	}

    // Page routing functions

    public function index(){
        $this->logged_in();
        $this->load->view('admin/index');
    }
    public function mannualBooking(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->load->view('admin/mannualBooking');
    }
    public function findBus(){
        $this->load->library('form_validation');
		$this->form_validation->set_rules('source','Source','required');
		$this->form_validation->set_rules('destination','Destination','required|differs[source]');
		$this->form_validation->set_rules('date','Date','required');
		$data['find'] = $this->input->post(); 
		if($this->form_validation->run() == False){
			$this->load->view('admin/mannualBooking',$data);
		} else {
			
			// echo '<pre>';
			// print_r($data);
			// $ticket = $this->Common_model->find_bus($data);
			// echo 'result';
			// print_r($ticket);
			 
		 	$this->load->view('admin/mannualBooking',$data);
		}
    }

    // login function
    public function login(){
        $this->load->view('admin/login');
    }
    public function logOut()
    {
        $this->session->sess_destroy();
        redirect(base_url('C_admin/login'));
    }
    public function loginCheck()
    {
        $data=$this->input->post();
        $result=$this->Admin_model->authenticate($data);
        if(count($result)>0)
        {
            echo "success";
            $this->session->set_userdata('admin',$result[0]);
            redirect(base_url('C_admin'));
        }
        else
        {
            $this->session->set_flashdata('message',"Invalid Username or Password");
            redirect(base_url('C_admin/login'));
        }
    }

    public function logged_in()
    {
        if(! $this->session->userdata('admin'))
        {
            $this->session->set_flashdata('warning','You have to login first...');
            redirect('C_admin/login');
        }
    }

     public function booking(){
        $this->logged_in();
        $this->load->view('admin/booking');
    }
    public function info(){
        $this->logged_in();
        $this->load->view('admin/user_inquiry');
    }
    public function routes(){
        $this->logged_in();
        $this->load->library('form_validation');
        $data['routes'] = $this->Admin_model->route_display();
        $this->load->view('admin/routes',$data);
    }
    public function places(){
        $this->logged_in();
        $data['places'] = $this->Admin_model->place_display();
        $this->load->view('admin/places',$data);
    }
    public function buses(){
        $this->logged_in();
        $data['buses'] = $this->Admin_model->bus_display();
        $this->load->view('admin/buses',$data);
    }
    public function pickupPoints(){
        $this->logged_in();
        $data['pickup'] = $this->Admin_model->pickup_display();
        $this->load->view('admin/pickupPoint',$data);
    }
    public function drivers(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->load->view('admin/drivers');
    }
    public function stops(){
        $this->logged_in();
        $this->load->view('admin/stops');
    }
    public function addPlacePage(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->load->view('admin/addPlaces');
    }
    public function addStopsPage($busid){
        $this->logged_in();
        $this->load->library('form_validation');
        $data['bid'] = $busid; 
        $this->load->view('admin/addStops',$data);
    }
    public function addPickupPointPage(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->load->view('admin/addPickupPoints');
    }
    public function addRoutePage(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->load->view('admin/addRoute');
    }
    public function addBusPage(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->load->view('admin/addBus');
    }
    public function editBusPage($busid){
        $this->logged_in();
        $this->load->library('form_validation');
        $data['busid'] = $busid;
        // $bus = $this->Admin_model->get_bus($busid);
        // echo '<pre>';
        // print_r($bus);
        $this->load->view('admin/editBus',$data);
    }
    public function editBooking($booking_id){
        $this->logged_in();
        $this->load->library('form_validation');
        $data['booking_id'] = $booking_id;
        // $bus = $this->Admin_model->get_bus($busid);
        // echo '<pre>';
        // print_r($bus);
        $this->load->view('admin/editBooking',$data);
    }
    public function addDriverPage(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->load->view('admin/addDriver');
    }

    //insert operation functions

    public function addPlace(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('placename','Place name','required|alpha|is_unique[place.place_name]');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/addPlaces');
        } else {
            $req = $this->input->post();
            $this->Admin_model->place_insert($req);
            $this->session->set_flashdata('addPlace','Place added successfully..!');
            redirect(base_url('C_admin/places'));
        }
    }

    public function addPickupPoint(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pdname','Pickup point name','required|alpha_numeric_spaces');
        $this->form_validation->set_rules('place','Place','required|callback_check_default');
        $this->form_validation->set_message('check_default','Please select Place');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/addPickupPoints');
        } else {
            $req = $this->input->post();
            $this->Admin_model->pickup_point_insert($req);
            $this->session->set_flashdata('msg_upload',"Pickup Point added successfully..!");
            redirect(base_url('C_admin/pickupPoints'));
        }
    }

    public function addRoute(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('source','Source','required|callback_check_default');
        $this->form_validation->set_rules('destination','Destination','required|callback_check_default');
        $this->form_validation->set_message('check_default','Please select source and desitination properly..!');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/addRoute');
        } else {
            $req = $this->input->post();
            $route_id = $this->Admin_model->route_insert($req);
            $this->session->set_flashdata('msg_upload',"Route added successfully..!");
            redirect(base_url('C_admin/routes/'));
        }
    }
    
    public function addStop(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('stop_time','Stop time','required');
        $this->form_validation->set_rules('stop','Stop name','required|callback_check_default');
        $this->form_validation->set_message('check_default','Please select Stop');
        $req = $this->input->post();
        if($this->form_validation->run()==FALSE){
            $data['bid'] = $req['bid'];
            $this->load->view('admin/addStops',$data);
        } else {
            $this->Admin_model->stop_insert($req);
            $this->session->set_flashdata('msg_upload',"Stop added successfully..!");
            redirect(base_url('C_admin/addStopsPage/').$req['bid']);
        }
    }

    public function addBus(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('busname','Bus name','required');
		$this->form_validation->set_rules('route','Route','required|callback_check_route');
		$this->form_validation->set_message('check_route','Please select route');
        $this->form_validation->set_rules('busno','Bus number','required');
        $this->form_validation->set_rules('departureTime','Departure Time','required');
        $this->form_validation->set_rules('destinationTime','Destination Time','required');
        $this->form_validation->set_rules('fare','Fare amount','required|numeric');
        $this->form_validation->set_rules('totalseats','Total seats','required|numeric');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/addBus');
        } else {
            $req = $this->input->post();
            $this->Admin_model->bus_insert($req);
            $this->session->set_flashdata('msg_upload',"Bus added successfully..!");
            redirect(base_url('C_admin/buses'));
        }
    }

    public function addDriver(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Driver name','required|alpha');
        $this->form_validation->set_rules('phone','Phone number','required|numeric|exact_length[10]');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/addDriver');
        } else {
            $req = $this->input->post();
            $this->Admin_model->driver_insert($req);
            $this->session->set_flashdata('msg_upload',"Driver added successfully..!");
            redirect(base_url('C_admin/drivers'));
        }
    }

    // edit/update functions

    public function editBus(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('departureTime','Departure Time','required');
        $this->form_validation->set_rules('destinationTime','Destination Time','required');
        $this->form_validation->set_rules('fare','Fare Amount','required|numeric');
        $req = $this->input->post();
        $data['busid']=$req['busid'];
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/editBus',$data);
        } else {
            $route_id = $this->Admin_model->update_bus($req);
            $this->session->set_flashdata('msg_upload',"Bus updated successfully..!");
            redirect(base_url('C_admin/buses/'));
        }
    }
    public function edit_Booking(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('journey_date','Journey Date','required');
        // $this->form_validation->set_rules('destinationTime','Destination Time','required');
        // $this->form_validation->set_rules('fare','Fare Amount','required|numeric');
        $req = $this->input->post();
        $data['booking_id']=$req['booking_id'];
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/editBooking',$data);
        } else {
            $this->Admin_model->update_booking($req);
            $this->session->set_flashdata('msg_upload',"Bus updated successfully..!");
            redirect(base_url('C_admin/booking/'));
        }
    }

    public function deactivateRoute($rid){
        $this->logged_in();
        $this->Admin_model->deactivate_route($rid);
        $this->session->set_flashdata('msg_upload',"Route deactivated successfully..!");
        redirect(base_url('C_admin/routes'));
    }
    public function activateRoute($rid){
        $this->logged_in();
        $this->Admin_model->activate_route($rid);
        $this->session->set_flashdata('msg_upload',"Route activated successfully..!");
        redirect(base_url('C_admin/routes'));
    }
    public function activate_Bus($bus_id){
        $this->logged_in();
        $this->Admin_model->activate_b($bus_id);
        $this->session->set_flashdata('msg_upload',"Bus activated successfully..!");
        redirect(base_url('C_admin/buses'));
    }
    public function updateDriverContact(){
        $this->logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('phone','Mobile number','required|numeric|exact_length[10]');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/drivers');
        } else {
            $req = $this->input->post();
            $route_id = $this->Admin_model->driver_contact_update($req);
            $this->session->set_flashdata('msg_upload',"Mobile number updated successfully..!");
            redirect(base_url('C_admin/drivers/'));
        }
    }

    // Delete functions

    public function deleteStop($stopid,$busid){
        $this->logged_in();
        $this->Admin_model->delete_stop($stopid);
        $this->session->set_flashdata('msg_upload',"Stop deleted successfully..!");
        redirect(base_url('C_admin/addStopsPage/').$busid);
    }

    public function deactivateBus(){
        $this->logged_in();
        $req = $this->input->post();
        $this->Admin_model->delete_bus($req['busid']);
        $this->session->set_flashdata('msg_upload',"Bus Deactivated successfully..!");
        redirect(base_url('C_admin/buses/'));
    }
    public function activateBus(){
        $this->logged_in();
        $req = $this->input->post();
        $this->Admin_model->delete_bus($req['busid']);
        $this->session->set_flashdata('msg_upload',"Bus Activated successfully..!");
        redirect(base_url('C_admin/buses/'));
    }

    public function deleteDriver(){
        $this->logged_in();
        $req = $this->input->post();
        $this->Admin_model->delete_driver($req['driverid']);
        $this->session->set_flashdata('msg_upload',"Driver deleted successfully..!");
        redirect(base_url('C_admin/drivers/'));
    }
     public function deleteBooking(){
        $this->logged_in();
        $req = $this->input->post();
        $this->Admin_model->delete_booking($req['booking_id']);
        $this->session->set_flashdata('msg_upload',"Driver deleted successfully..!");
        redirect(base_url('C_admin/booking/'));
    }
     public function deleteInquiry(){
        $this->logged_in();
        $req = $this->input->post();
        $this->Admin_model->delete_inquiry($req['inqid']);
        $this->session->set_flashdata('msg_upload',"Driver deleted successfully..!");
        redirect(base_url('C_admin/info/'));
    }

}