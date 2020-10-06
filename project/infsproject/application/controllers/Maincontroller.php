<?php
class Maincontroller extends CI_Controller{
	public function index(){
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('header');

		$this->load->database();
		$this->load->model('Useraccount_model');

		$data['results']=$this->Useraccount_model->all_video();
		$this->load->view('footer',$data);

	}


	public function search(){
		$this->load->view('header');
		$this->load->database();
		$this->load->model('Useraccount_model');
		$keyword=$this->input->post('keyword');
		$data['results']=$this->Useraccount_model-> search($keyword);

		$this->load->view('search_view',$data);

	}

	public function search_ajax() {
		$this->load->database();
		$this->load->model('Useraccount_model');
		$keyword=$this->input->get('keyword');
		$results=$this->Useraccount_model-> search($keyword);
		$response='<ul>';
		foreach ($results as $result){
			$intro=$result->introduction;
			$response=$response.'<li>'.$intro.'</li>';

		}
		$response=$response.'</ul>';
		echo $response;
		}

	public function loginform(){
		$this->load->helper('url');
		$this->load->helper('form');

		/*if(!isset($_SESSION))
		{
			session_start();
		}
		if(isset($_SESSION['user'])) {
			$data['username']=$_SESSION['user'];
			$this->load->view('login_success', $data);
		}
		else{*/
			$this->load->view('loginform');

	}

	public function filechoice(){
		$this->load->view('fileuploadchoice');
	}

	public function drag_sig(){
		$this->load->view('drag_upload');
	}

	public function fileUpload(){


			$this->load->database();
			$this->load->helper('form');
			$this->load->model('Useraccount_model');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'mp4|ogg|webm';
			$config['max_size'] = '1024'; // max_size in kb
			$config['file_name'] = $_FILES['file']['name'];
			$this->load->library('upload',$config);


			$int=$this->input->post('int');
			$tag=$this->input->post('tag');
			if($this->upload->do_upload('file')){
				// Get data about the file

				if( $int!=Null && $tag!=Null ){
					$name=$_FILES['file']['name'];
					$src=base_url('uploads/').$_FILES['file']['name'];
					$this->Useraccount_model->upload_video($name,$src,$int,$tag);
					$data = array('upload_data' => $this->upload->data());
					$this->load->view('upload_success', $data);
					echo '1';
				}
				else{
					echo 'enter introduction & tag';
				}
			}
			else{
				echo 'please upload a file';
			}
          echo 'success';
		}






	public function load_sig(){
		$this->load->view('uploadupdate');
	}
	public function uploadupdatef()
	{
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'mp4|ogg|webm';
		$config['max-size'] = '1000';
		$this->load->library('upload', $config);

		$int=$this->input->post('int');
		$tag=$this->input->post('tag');

		if( $int!=Null && $tag!=Null ){
			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());//data['error']=$this->upload->display_errors();
				$this->load->view('uploadupdate', $error);

			} else {

				//$data = $this->upload->data();
				$name=$_FILES['userfile']['name'];
				$src=base_url('uploads/').$_FILES['userfile']['name'];


				$this->load->model('Useraccount_model');
				$this->Useraccount_model->upload_video($name,$src,$int,$tag);
				$data = array('upload_data' => $this->upload->data());
				$this->load->view('upload_success', $data);

		}
		}
	}
	public function dlfile($name){

		$file_name = $name;
		$file_dir = "./uploads/"; //file exist location
		$file = fopen ( $file_dir . $file_name, "rb" );//binary
		Header ( "Content-type: application/octet-stream" );//文件流
		Header ( "Accept-Ranges: bytes" );
		Header ( "Accept-Length: " . filesize ( $file_dir . $file_name ) );
		echo fread ( $file, filesize ( $file_dir . $file_name ) );
		fclose ( $file );
		exit ();


		/*header('Content-type: application/mp4');
		header('Content-Disposition: attachment; filename='.$name);
		readfile($name);*/


	}

	public function load_muti(){
		$this->load->view('uploadmulti');
	}
	public function uploadmultif(){
		$this->load->database();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'mp4|ogg|webm';
		$config['max-size'] = '1024*1024*10';
		$this->load->library('upload', $config);

		$num= count($_FILES['userfiles']['name']);

		$int=$this->input->post('int');
		$tag=$this->input->post('tag');
		if( $int!=Null && $tag!=Null ){

		}
		for ($i=0; $i<$num; $i++){
			$this->upload->initialize($config);
			if(!empty($_FILES['userfiles']['name'][$i])){
				$_FILES['file']['name']=$_FILES['userfiles']['name'][$i];
				$_FILES['file']['type']=$_FILES['userfiles']['type'][$i];
				$_FILES['file']['tmp_name']=$_FILES['userfiles']['tmp_name'][$i];
				$_FILES['file']['error']=$_FILES['userfiles']['error'][$i];
				$_FILES['file']['size']=$_FILES['userfiles']['size'][$i];
				if (! $this->upload->do_upload('file')){
					$error = array('error' => $this->upload->display_errors());//data['error']=$this->upload->display_errors();
					$this->load->view('uploadmulti', $error);
				}
				else{
					$data = $this->upload->data();
					$name=$_FILES['file']['name'];
					//$src=$data['full_path'];//$_FILES?: this is the url directly go to the destination(绝对路径)
					$src=base_url('uploads/').$_FILES['file']['name'];
					$this->load->model('Useraccount_model');
					$this->Useraccount_model->upload_video($name,$src,$int,$tag);

					$data = array('upload_data' => $this->upload->data());
					$this->load->view('uploadmultisuccess', $data);
				}
			}
		}

		}


	 public function signupform(){
		 $this->load->view('signup');
	}

     public function signup(){
		 $this->load->database();
		 $this->load->helper('form');
		 $this->load->helper('url');
		 //$this->load->view('signup');
		 $this->load->model('Useraccount_model');

		 $username=$this->input->post('un');
		 $pw=$this->input->post('pw');
		 $hash = password_hash($pw, PASSWORD_DEFAULT);

		 $phone=$this->input->post('phone');
		 $email=$this->input->post('email');
		 $ques=$this->input->post('question');
		 $ans=$this->input->post('answer');



		if (isset($_POST['check']))	 {
			if($_POST['check']){
				if($username!=Null && $pw!=Null && $phone!=Null &&$email!=Null && $ques!=Null &&$ans!=Null){

					$score=0;
					if(preg_match("/[0-9]+/",$pw)){
						$score ++;

					}
					if(preg_match("/[0-9]{3,}/",$pw)){
						$score ++;
					}

					if(preg_match("/[a-z]+/",$pw)){
						$score ++;

					}
					if(preg_match("/[a-z]{3,}/",$pw)) {
						$score++;
					}

					if(preg_match("/[A-Z]+/",$pw)) {
						$score++;
					}
					if(preg_match("/[A-Z]{3,}/",$pw)) {
						$score++;
					}
					if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/",$pw)) {
						$score += 2;
					}
					if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]{3,}/",$pw))
					{
						$score ++ ;
					}
					if(strlen($pw) >= 10)
					{
						$score ++;
					}

					$data['nam']=$username;

					if ($score>=5){
						$check=$this->Useraccount_model->finduser($username);
						$checkemail=$this->Useraccount_model->finduser_email($email);

						if ($check != null){
							$this->load->view('user_exist');

						}
						if ($checkemail != null){
							$this->load->view('email_exist');

						}

						if($check==null && $checkemail==null){
							$this->Useraccount_model->simple_insert($username,$hash,$phone,$email,$ques,$ans);
							$this->load->view('reg_ard',$data);
						}

					}
					else{
						$this->load->view('reg_fail');
					}

				}

			}
		}
		else{

			$this->load->view("botview");
		}

	 }

	public function login($yzm)
	{
		$this->load->database();
		$this->load->model('Useraccount_model');
		$this->load->helper('form');
		/*if(!$this->session->userdata('logged_in')){

    }Q here*/
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$security= $this->input->post('entercode');
		$this->load->helper('url');
		$results = $this->Useraccount_model->first_query();

		$flag='false';

		/*$yzm = "";
		for($i=0;$i<5;$i++)
		{
			$a = rand(0,9);
			$yzm.= $a;
		}

		$data['yzm']=$yzm;
		$this->load->view('loginform',$data);//use argument*/
		if(!isset($_SESSION))
		{
			session_start();
		}
		if(!isset($_SESSION['user'])) {
			foreach ($results as $result) {
				if ($username == $result->username && password_verify($password,$result->password) &&$security==$yzm) {
					/*$user_data=array('username'=>$username,'logged_in'=>true);
					$this->session->set_userdate($user_data);create session*/

					$data['username'] = $username;

					$user = $_POST['username'];
					$pw = $_POST['password'];

					if(isset($_POST['rem'])){
						if ($_POST['rem']) {
							setcookie("username", $user, time() + 3600,'/');
							setcookie("password", $pw, time() + 3600,'/');

							//echo '1';
						} else {
							setcookie("username", '', time() - 3600,'/');
							setcookie("password", '', time() - 3600,'/');
						}
					}
					$_SESSION['user']=$user;
					$_SESSION['pw']=$pw;
					$_SESSION["login_time"]=time();
					echo "success";
					$flag='true';
					$this->load->view('login_success', $data);
					break;
				}

			}
			if ($flag=='false') {

				$this->load->view('login_failure');
			}
		}
		}

	public function logout(){

		if(isset($_SESSION['user'])){
			unset($_SESSION['user']);
			$this->load->view('logoutform');
		}
	}

	public function display_user_info() {
		$this->load->database();
		$this->load->model('Useraccount_model');
		if(isset($_SESSION['user'])) {

			$data['user']=$this->Useraccount_model->display_user_info($_SESSION['user']);

			$this->load->view('display_info',$data);
		}

	}

	public function edituserfileform($username){
		$data['username']=$username;
		$this->load->view('editform',$data);
	}
	public function edituserfile($username)
	{
		$this->load->database();
		$this->load->model('Useraccount_model');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$question=$this->input->post('question');
		$answer=$this->input->post('answer');
		$this->Useraccount_model->edit_user($username,$phone,$email,$question,$answer);
		$this->load->view("success_edit");
	}

	public function forget_password_form(){
  		$this->load->view('forget_password_form');
	}
	public function forget_password()
	{
		$this->load->database();
		$this->load->model('Useraccount_model');
		if (!empty($_POST['username'])) {

			$username = $this->input->post("username");//user input
			$result = $this->Useraccount_model->finduser($username);//database
			if ($result) { //if match or not; return one array

				$data['row'] = $result;

				$this->load->view('enter_answer', $data);
			}

			else{
					echo 'username not exist';
				}

			}
		}


	public function check_answer($ans,$username){
		$this->load->database();
		$this->load->model('Useraccount_model');
		$password=$this->input->post('password');
		$hash = password_hash($password, PASSWORD_DEFAULT);
		if($password!=Null){
			if($_POST['sub']) {
				$answer=$this->input->post('ans');
				if($ans==$answer) {
					$this->Useraccount_model->edit_password($username,$hash);
					echo "Your have already changed your password";

				}
				else{
					echo'Your answer is not correct please try again';
				}
			}
		}
		else{
			$this->load->view('forget_password_wrong');
		}

	}
	public function video_detail($vid){
		$this->load->database();
		$this->load->model('Useraccount_model');
		$data['results']=$this->Useraccount_model->search_video($vid);
		$this->load->view('video_page_header');
		$this->load->view('video_page',$data);
		//play video
		//$this->load->view('video_page_footer');
		$results = $this->Useraccount_model->show_comment($vid);
		$data['results']=$results;
		//echo $results;

		$this->load->view('video_page_footer',$data);
	}
	public function comment($vid){
		$this->load->database();
		$this->load->model('Useraccount_model');
		$content=$this->input->post('content');
		$rate=$this->input->post('rate');
		if(isset($_SESSION['user'])) {
			$username=$_SESSION['user'];
		}
		else{
			$username=$_SERVER['REMOTE_ADDR'];
		}
		$this->Useraccount_model->add_comment($vid,$username,$content,floatval($rate));//return float value
		$this->video_detail($vid);


	}

	public function verify_email($yzm,$username){
		$this->load->database();
		$this->load->model('Useraccount_model');
		$code=$this->input->post('verify');
        if ($code==$yzm){
			$data['username']=$username;
			$this->Useraccount_model->edit_status($username);
        	$this->load->view('verify_success',$data);

		}
		else{
			$this->load-view('verify_fail');
		}
	}

	public function email($email,$username){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'mailhub.eait.uq.edu.au',
			'smtp_port' => 25,
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$yzm = "";
		for ($i = 0; $i < 4; $i++) {
			$a = rand(0, 9);
			$yzm .= $a;
		}

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('xufeng.zheng@uqconnect.edu.au');
		$this->email->to($email);
		$this->email->subject('Email Verification');
		$this->email->message($yzm);
		$this->email->send();
		$data['yzm']=$yzm;
		$data['username']=$username;
		$this->load->view('email_verify',$data);


	}

	public function location(){
		$this->load->view('location_view');
	}
	public function testview(){
		$this->load->view('testview');
	}

}





