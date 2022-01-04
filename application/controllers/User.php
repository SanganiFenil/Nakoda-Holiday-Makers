 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// constructor

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');

		$this->load->model('Common_model');
		
		$this->load->library('session');
	}

	// my functions
	function check_source($post_string)
	{
		return $post_string == '0' ? FALSE : TRUE;
	}
	function check_destination($post_string)
	{
		return $post_string == '0' ? FALSE : TRUE;
	} 
	
	//routing functions
	public function index()
	{
		$this->load->view('user/index');
	}
	public function search_results(){
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('source','Source','required');
		$this->form_validation->set_rules('destination','Destination','required|differs[source]');
		$this->form_validation->set_rules('date','Date','required');
		if($this->form_validation->run() == False){
			$this->load->view('user/index');
		} else {
			$data['find'] = $this->input->post(); 
			// echo '<pre>';
			// print_r($data);
			// $ticket = $this->Common_model->find_bus($data);
			// echo 'result';
			// print_r($ticket);
			 
		 	$this->load->view('user/showTicket',$data);
		}
	}

	public function searchPnr_display(){
			$req = $this->input->post();
			$this->load->library('form_validation');
            $this->form_validation->set_rules('t1','PNR NO','required');
            if($this->form_validation->run()==FALSE){
                $this->load->view('user/searchPnr');
            } 
    }        	

	public function modifyResult(){
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('source','Source','required');
		$this->form_validation->set_rules('destination','Destination','required|differs[source]');
		$this->form_validation->set_rules('date','Date','required');
		$data['find'] = $this->input->post(); 
		if($this->form_validation->run() == False){
			$this->load->view('user/showTicket',$data);
		} else {
			
			// echo '<pre>';
			// print_r($data);
			// $ticket = $this->Common_model->find_bus($data);
			// echo 'result';
			// print_r($ticket);
			 
		 	$this->load->view('user/showTicket',$data);
		}
	}

	public function confirmTicket(){
		$req = $this->input->post();
		// print_r($req);
		$data['seats'] = $req;
		$this->load->view('user/confirmTicket',$data);
	}
	public function cancleTicket(){
		$this->load->view('user/cancleTicket');
	}
	public function phoneBooking(){
		$this->load->view('user/phoneBooking');
	}
	public function contactUs(){
		//$this->load->library('form_validation');
		$this->load->view('user/contact');
	}
	public function header(){
		//$this->load->library('form_validation');
		$this->load->view('user/includes/header.php');
	}
	public function info()
	{
		$req = $this->input->post();
		$insert['fname'] = $req['fname'];
		$insert['lname'] = $req['lname'];
		$insert['email'] = $req['email'];
		$insert['subject'] = $req['subject'];
		$insert['message'] = $req['message'];

		$this->db->insert('user_inquiry',$insert);
		$this->load->view('user/contact');
	}

	public function bookTicket(){
		$req = $this->input->post();
		$bdate = date('Y-m-d h:i:s', time());
		echo $bdate;
		echo '<pre>';
		print_r($req);

		$digits_needed=11;

		$random_number=''; // set up a blank string

		$count=0;

		while ( $count < $digits_needed ) {
			$random_digit = mt_rand(0, 9);
			
			$random_number .= $random_digit;
			$count++;
		}

		echo "The random $digits_needed digit number is $random_number";


		$insert['bus_id'] = $req['busid'];
		$insert['pnr_no'] = $random_number;
		$insert['booking_status'] = '0';
		$insert['name'] = $req['fullname'];
		$insert['phone'] = $req['phone'];
		$insert['fare'] = $req['fare'];
		$insert['booking_date'] = $bdate;
		$insert['booking_type'] = '1';
		$insert['journey_date'] = $req['jdate'];
		$insert['payment'] = '0';


	}

	public function searchPnr(){
		$this->load->view('user/searchPnr');
	}


	// ajax functions
	public function getDestination($pid){
		$result=$this->User_model->fill_destination($pid);
			echo '<option value="0">To</option>';
			foreach ($result as $p) 
			{
				echo '<option value="'.$p['place_name'].'">'.$p['place_name'].'</option>';
			}
	}
	
	//registration function
	public function registration(){
		//$this->load->library('form_validation');
		$this->load->view('user/registration');
	}

	public function status(){
		//$this->load->library('form_validation');
		$this->load->view('user/status');
	}

	public function signUp(){
		$this->form_validation->set_message('is_unique','This Email address already exist, Please try another email.');
		$this->form_validation->set_rules('fullname','Full Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[usertbl.emailid]');
		$this->form_validation->set_rules('pass','Password','required|min_length[8]|max_length[14]');
		$this->form_validation->set_rules('confpass','Confirm Password','matches[pass]');

		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('user/registration');
		}
		else
		{
			$result = $this->input->post();
			$this->User_model->register($result);

			$this->session->set_flashdata("success","Your account has been Registred Successfully. You can Login now.");
			$this->load->view('user/login');
			//redirect('user/login');
		}
	}	

	//Login
	private function logged_in(){
        if( ! $this->session->userdata('user')){
            redirect('user/login');
        }
    }
	public function login(){
		$this->load->view('user/login.php');
	}

	public function CheckLogin()	{
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('pass','Password','required|min_length[8]|max_length[14]');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('user/login');
		}
		else
		{
			$result = $this->input->post();
			
			$chkEmail = $this->User_model->checkEmail($result);
			$chkPass = $this->User_model->checkPass($result);
			if(count($chkEmail)>0)
			{
				if(count($chkPass)>0){
					$faid = $this->User_model->fatchId($result);
					$this->session->set_userdata('user',$faid);
					//$this->load->view('user/index');
					redirect(base_url('index'));
				}
				else{
					$this->session->set_flashdata("danger","Inccoract Password..!!");
					$this->load->view('user/login');
					//redirect('User/login');
				}
			}
			else
			{
				$this->session->set_flashdata("danger","No such account exists in Database.");
				//redirect('user/login');
				$this->load->view('user/login');
			}
		}
	}

	//Logout
	public function chkLogout()
    {
        $this->session->sess_destroy();
		redirect(base_url('index'));
    }

	//Profile
	public function profile(){
		$data['fetch'] = $this->session->userdata('user');
		$this->load->view('user/profile',$data);
	}

	public function updateProfile(){
		$this->form_validation->set_message('is_unique','This Email address already exist, Please try another email.');
		$this->form_validation->set_rules('fullname','Full Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contect','Contect No','required|exact_length[10]');

		if($this->form_validation->run()==FALSE)
		{	
			$data['fetch'] = $this->session->userdata('user');
			$this->load->view('user/profile',$data);
		}
		else
		{
			$result = $this->input->post();
			$data = $this->session->userdata('user');
			$this->User_model->updProfile($result,$data);
			
			$faid = $this->User_model->fatchId($result);
			$this->session->set_userdata('user',$faid);
			
			$this->session->set_flashdata("success","Your Profile has been Successfully Updated.");
			$data['fetch'] = $this->session->userdata('user');
			$this->load->view('user/profile',$data);
			//redirect('user/login');
		}
	}

	public function pnr()
	{
		// $result = $this->input->post();
		$s = $this->User_model->search();	
		print_r($s);
		// $this->load->library('session');
		// $this->session->set_userdata('info',$data);
	}

	//Chnage Password
	public function chngPass(){
		$data['fetch'] = $this->session->userdata('user');
        $this->load->view('user/chngPassword',$data);
    }

	public function changePassword(){
		$this->form_validation->set_rules('oldpass','Old Password','callback_password_check');
		$this->form_validation->set_rules('newpass','New Password','required|min_length[8]|max_length[14]');
		$this->form_validation->set_rules('confpass','Confirm Password','matches[newpass]');

		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('user/chngPassword');
		}
		else
		{
			$user = $this->session->userdata('user');
			$data = $this->input->post('newpass');
			$this->User_model->update_pass($user,$data);
			$this->session->set_flashdata("success","Your Password has been Successfully Change.");
			$this->load->view('user/chngPassword');
			//redirect('user/login');
		}
	}
	// Old Password Check
	public function password_check($oldpass)
    {
        $user = $this->session->userdata('user');
		//  print_r(md5($oldpass)); echo"<br>";
		//  print_r($user[0]['password']);
        if(($user[0]['password'] != md5($oldpass))) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }

    public function tran(){
    	$req = $this->input->post();
    	$this->session->set_userdata('req',$req);
        
		$bdate = date('Y-m-d h:i:s', time());
		echo $bdate;
		echo '<pre>';
		print_r($req);

		$digits_needed=11;

		$random_number=''; // set up a blank string

		$count=0;

		while ( $count < $digits_needed ) {
			$random_digit = mt_rand(0, 9);
			
			$random_number .= $random_digit;
			$count++;
		}

		echo "The random $digits_needed digit number is $random_number";
		$this->session->set_userdata('pnr_number',$random_number);
        
		$insert['bus_id'] = $req['busid'];
		$insert['pnr_no'] = $random_number;
		$insert['booking_status'] = '0';
		$insert['name'] = $req['fullname'];
		$insert['phone'] = $req['phone'];
		$insert['fare'] = $req['fare'];
		$insert['booking_date'] = $bdate;
		$insert['booking_type'] = '1';
		$insert['journey_date'] = $req['jdate'];
		$insert['payment'] = '0';

		$booking = $this->db->insert('booking',$insert);
        $bid = $this->db->insert_id();

        $req = $insert = $this->session->userdata('req');
        $i = 0;
        foreach($req['seatno'] as $sn){
            $dt['booking_id'] = $bid;
            $dt['seat_number'] = $sn;
            $dt['gender'] = $req['gender'][$i];
            $i++;
            $this->db->insert('booking_dtls',$dt);
        }

        $this->session->set_userdata('booking_id',$bid); 
		// $this->session->set_userdata('booking_data',$insert);
		$this->load->view('user/Paytm/PaytmKit/TxnTest.php');
    }

    public function pgred()
    {	
    	$this->load->view('user/Paytm/PaytmKit/pgRedirect.php');
    }

    public function pres()
    {	
    	$this->load->view('user/Paytm/PaytmKit/pgResponse.php');
    }
    public function gallery()
    {	
    	$this->load->view('user/gallery.php');
    }
    public function delete_ticket()
    {
    	$data = $this->input->post();
    	$pnr = $data['pnr_text'];	
    	if(strlen($pnr) == 11)
    	{	
    		$this->User_model->delete_ticket($pnr);
    		$this->session->set_flashdata('del_bus',"Ticket Cancle Successfully.");
    	}
    	else
    	{
    		$this->session->set_flashdata('del_bus_failed',"Please Enter a valid PNR Nubmer.");
    	}	
    	redirect(base_url('cancleTicket'));
    }  
}
