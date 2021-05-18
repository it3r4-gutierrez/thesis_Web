<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Login_model');
		$this->load->model('users_model');
	}

	public function index()
	{
		//load session library
		$this->load->library('session');

		//restrict users to go back to login if session has been set
		if ($this->session->userdata('User')) {
			redirect('adminhome');
		} else {
			$this->load->view('Login_view');
		}
	}

	public function forward_con()
	{
		//load session library
		$this->load->library('session');
		if ($this->session->userdata('User')) {

			$ID = $_POST['Ereport_index'];
			$IDre = $_POST['Responder_index'];
			$usrinfo = new users_model;
			$data = $usrinfo->get_requestEmer();
			$Ereport_I = $data[$ID - 1]->Ereport_ID;
			$datamodal = $usrinfo->get_responder();
			$Responder_I = $datamodal[$IDre - 1]->Responder_ID;
			$Forwardtores = [
				'Ereport_ID' => $Ereport_I,
				'Responder_ID' => $Responder_I,
				'Admin_ID' => 2,
				'Status_incident' => "Pending",
				'status_seen' => "0"
			];




			$dat = $this->users_model->ForwardTo_Mod($Forwardtores);

			if ($dat) {
				$this->users_model->Updatestat($Ereport_I);
				redirect('History');
			}
		}
	}
	public function updatestatusinres()
	{

		$this->load->library('session');
		if ($this->session->userdata('User')) {
			$Status_incident = $_POST['Status_incident'];
			$Freport_ID = $_POST['Freport_ID'];
			$this->users_model->FUpdatestat($Freport_ID, $Status_incident);
			redirect('responderhome');
		}
	}
	public function login()
	{
		//load session library
		$this->load->library('session');

		$email = $_POST['email'];
		$password = $_POST['password'];
		$data = $this->Login_model->login($email, $password);
		if ($data['userLevel'] == 'Admin') {
			$this->session->set_userdata('User', $data);
			redirect('adminhome');
		}
		if ($data['userLevel'] == 'Responder') {
			$this->session->set_userdata('User', $data);
			redirect('responderhome');
		} else {
			header('location:' . base_url() . $this->index());
			$this->session->set_flashdata('error', 'Invalid login. User not found');
		}
	}
	public function count_unseen()
	{
		$this->load->library('session');
		//restrict users to go to home if not logged in
		if ($this->session->userdata('User')) {
			$usrinfo = new users_model;
			

			echo $data;
		$this->load->view('includes/header', $data);
			// $this->load->view('adminhom', $data);
			// $this->load->view('includes/footer'); 
		} else {
			redirect('/');
		}
	}

	public function getCount(){

		$count= $this->users_model->get_count();
		echo $count;

	}
	public function getCountRes(){
		$ID = $this->session->userdata('User')['userInfo_ID'];
		$count= $this->users_model->get_countRes($ID);
		echo $count;
		// var_dump($this->session->userdata('User'));
		
	}

	public function adminhome()
	{
		$this->load->library('session');
		//restrict users to go to home if not logged in
		if ($this->session->userdata('User')) {
			$this->users_model->updateSeen();
			$usrinfo = new users_model;
		
			$dataReturn = array();
			$dataReturn['data'] = $usrinfo->get_requestEmer();
			$dataReturn['datamodal'] = $usrinfo->get_responder();
			
			// var_dump($datamodal[0]->userInfo_ID);
			$this->load->view('includes/header');
			$this->load->view('adminhom', $dataReturn);
			$this->load->view('includes/footer',); 
		} else {
			redirect('/');
		}
	}
	public function deleteC()
	{
		$this->load->library('session');
		if ($this->session->userdata('User')) {
			$ID = $_POST['userInfo_ID'];
			$data = $this->users_model->delete($ID);
			if ($data) {
				redirect('users');
			} else {
				redirect('/');
			}
		}
	}
	public function users()
	{
		$this->load->library('session');
		if ($this->session->userdata('User')) {

			$usrinfo = new users_model;
			$data['data'] = $usrinfo->get_userinfo();
			$this->load->view('includes/header');
			$this->load->view('users', $data);
			$this->load->view('includes/footer');
		} else {
			redirect('/');
		}
	}
	public function History()
	{
		$this->load->library('session');
		//restrict users to go to home if not logged in
		if ($this->session->userdata('User')) {
			$usrinfo = new users_model;
			$data['data'] = $usrinfo->get_requestEmerForwarded();
			$this->load->view('includes/header');
			$this->load->view('history', $data);
			$this->load->view('includes/footer');
		} else {
			redirect('/');
		}
	}

	public function testy(){

		$userID = $this->session->userdata('User')['userInfo_ID'];
		echo($this->users_model->updateSeenRes($userID));
	}

	public function responderhome()
	{

		$this->load->library('session');
		//restrict users to go to home if not logged in
		if ($this->session->userdata('User')) {
			$userID = $this->session->userdata('User')['userInfo_ID'];
			$this->users_model->updateSeenRes($userID);
			$usrinfo = new users_model;
			$dataReturnResponder = array();
			$RespondID = $usrinfo->getresponderId($userID);
			
			$Responder_ID = $RespondID[0]->Responder_ID;
			$dataReturnResponder['data'] = $usrinfo->getresponderfromForward($Responder_ID);
			$this->load->view('includes/resheader', $Responder_ID);
			$this->load->view('responder_view', $dataReturnResponder);
			$this->load->view('includes/resfooter');
		} else {
			redirect('/');
		}
	}
	public function responderhistory()
	{

		$this->load->library('session');
		//restrict users to go to home if not logged in
		if ($this->session->userdata('User')) {
			$userID = $this->session->userdata('User')['userInfo_ID'];
			$usrinfo = new users_model;

			$RespondID = $usrinfo->getresponderId($userID);
			$Responder_ID = $RespondID[0]->Responder_ID;
			$data['data'] = $usrinfo->getresponderfromForwardDONE($Responder_ID);
			$this->load->view('includes/resheader');
			$this->load->view('responderhistory', $data);
			$this->load->view('includes/resfooter');
		} else {
			redirect('/');
		}
	}


	public function logout()
	{
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('User');
		redirect('/');
	}

	public function createresponder()
	{
		//load session library

		$this->load->library('session');
		if ($this->session->userdata('User')) {
			$responderDatauserinfo = [
				'emailAddress' => $_POST['emailAddress'],
				'password' => $_POST['Password'],
				'FirstName' => $_POST['fname'],
				'LastName' => $_POST['lname'],
				'userLevel' => "Responder",
			];
			$responderData = [
				'Department' => $_POST['department'],
				'Address' => $_POST['Address'],
				'ContactNumber' => $_POST['ContactNum'],
			];
			$this->users_model->CreateRes($responderDatauserinfo, $responderData);
			redirect('users');
		} else {
			redirect('/');
		}
	}

	public function createresident()
	{
		//load session library

		$this->load->library('session');
		if ($this->session->userdata('User')) {
			$residentDatauserinfo = [
				'emailAddress' => $_POST['emailAddress'],
				'password' => $_POST['Password'],
				'FirstName' => $_POST['fname'],
				'LastName' => $_POST['lname'],
				'userLevel' => "Resident",
			];
			$residentData = [
				'Address' => $_POST['Address'],
				'ContactNumber' => $_POST['ContactNum'],
			];
			$this->users_model->CreateResident($residentDatauserinfo, $residentData);
			redirect('users');
		} else {
			redirect('/');
		}
	}
}