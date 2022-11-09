<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}

	public function index()
	{
		$this->load->view ('login_v');
	}
	public function ceklogin(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');

		$key="**";
		$password=$key."".$password."".$key;

		//echo "password = ".$password."<br>";
		//echo "password + key =".$password."<br>";
		//echo "password md5 = ".md5($password)."<br>";

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		$datausername=$this->Global_m->ceklogin_m('login',$where);

		foreach($datausername->result() as $dt){
			$nama=$dt->nama;
			$email=$dt->email;
		}

		
		//echo"Nama Anda Adalah : ".$nama;
		//echo"Email Anda Adalah : ".$email;
		if($datausername->num_rows()>0){
			$data_session = array(
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('dashboard'));
		}else{
			?>
				<script type="text/javascript">
					alert("Maaf Username atau Password Anda Salah!!");
					window.open("<?php echo base_url()."Login" ?>","_self"); 
				</script>
			<?php
		}

	}
}	