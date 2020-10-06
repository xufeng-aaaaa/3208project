
<?php
class Useraccount_model extends CI_Model {

	public function first_query(){
		$query = $this->db->query('SELECT * FROM useraccount');
		return $query->result();
	}


	public function edit_user($username,$phone,$email,$question,$answer){
		$data = array(

			'phone' => $phone,
			'email' => $email,
			'secret_ques' => $question,
			'answer' => $answer,
		);

		$this->db->where('username', $username);
		$this->db->update('useraccount', $data);
	}
	public function finduser ($username){
		//$query=$this->db->query("SELECT * FROM useraccount WHERE username= '$username'"); //find row
		//return $query->result();
		//echo $query->result()->answer;
		$query = $this->db->get_where('useraccount', array('username'=>$username));
		return $query->row_array();
	}
	public function finduser_email ($email){
		$query = $this->db->get_where('useraccount', array('email'=>$email));
		return $query->row_array();

	}


	public function edit_password($username,$password){
		$data = array(

			'password' => $password,

		);

		$this->db->where('username', $username);
		$this->db->update('useraccount', $data);

	}

	public function all_video(){
		$query = $this->db->query('SELECT * FROM videos');
		return $query->result();
	}

	public function search_video($vid){
		$query = $this->db->get_where('videos', array('vid'=>$vid));
		return $query->row_array();

	}
	public function upload_video($name,$src,$introduction,$tag){
		$data=array(

			'name'=>$name,
			'src'=>$src,
			'introduction'=>$introduction,
			'tag'=>$tag,);
		$this->db->insert('videos',$data);

			}

	public function simple_insert($username,$pw,$phone,$email,$ques,$ans){
		//Query
		$data=array(

			'username'=>$username,
			'password'=>$pw,
			'phone'=>$phone,
			'email'=>$email,
			'secret_ques'=>$ques,
			'answer'=>$ans,
		);
		$this->db->insert('useraccount',$data);

	}

	public function search($keyword){
		$query=$this->db->query("SELECT * FROM videos WHERE introduction like '%$keyword%'");
		return $query->result();

	}
	public function display_user_info ($keyword){

		$query = $this->db->get_where('useraccount', array('username'=>$keyword));
		return $query->row_array();

	}


	public function add_comment ($vid,$username,$content,$rate){
	$data=array(

			'vid'=>$vid,
			'username'=>$username,
			'content'=>$content,
		'rating'=>$rate,);

		$this->db->insert('comment',$data);
	}
	public function show_comment($vid){
		$query = $this->db->query("SELECT * FROM comment WHERE vid='$vid'"  );
		return $query->result();
	}
	public function edit_status($username){

		$data = array(

			'status' => 'true',

		);

		$this->db->where('username', $username);
		$this->db->update('useraccount', $data);

	}
}


?>

