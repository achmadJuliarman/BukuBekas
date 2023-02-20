<?php 

class UserController extends Controller{

	public function index(){
		$data['title'] = 'User';
		$data['user'] = $this->model('User')->getAllUsers();
		$this->view('templates/header', $data);
		$this->view('templates/topbar', $data);
		$this->view('user/index', $data);
	}

	public function register()
	{	
		// var_dump($_POST);
		$data['title'] = 'Login';
		$this->view('templates/header', $data);
		$this->view('templates/topbar', $data);
		$this->view('user/register');
		if (isset($_POST['register'])) {
			if ($this->model('User')->register() > 0) {
				echo "<script>alert('Berhasil Registrasi');
				window.location.href = '".BASEURL."/user/login';</script>";
				exit;
			}else{
				echo "<script>alert('Gagal Registrasi Coba Lagi');
				window.location.href = '".BASEURL."/user/register';</script>";
			}
			
			
		}

	}

	public function login(){
		$data['title'] = 'Login';
		$this->view('templates/header', $data);
		$this->view('templates/topbar', $data);
		
		if (isset($_POST['login'])) {
			 // var_dump($_POST);
			 // die();
			  $user = $this->model('User');
			  $user->login($_POST['username'], $_POST['password']);
			  if ($_SESSION['level'] === 'admin') {
			  	echo "<script>window.location.href = '".BASEURL."/admin/users';</script>";
			  }else{
			  	echo "<script>window.location.href = '".BASEURL."/Books';</script>";
			  }
			  // echo "<script>window.location.href = '".BASEURL."/Books';</script>";
		}
		$this->view('user/login');
		if (!empty($_SESSION)) {
		    echo "<script>alert('Sudah Login !');
		    window.location.href = '".BASEURL."/Books';</script>";
		}
		
	}

	public function Books(){
		$data['title'] = 'Buku Anda';
		$this->view('templates/header', $data);
		if (!empty($_SESSION)) { // disimpan disini karna sessio_start ada di header 
			$data['id-user'] = $_SESSION['id_user'];
			$data['favorit'] = $this->model('Buku')->getFavorite($data['id-user']);
			$data['user'] = $this->model('User')->cariById($data['id-user']);
			$data['buku'] = $this->model('Buku')->getBukuByAuthor($data['id-user']);
		}else{
			echo "<script>alert('Login Terlebih Dahulu');
				window.location.href = '".BASEURL."/books';</script>";
		}
		$this->view('templates/topbar', $data);
		$this->view('user/books',$data);
	}

	public function ubah(){
		$data['title'] = "User";
		$this->view('templates/header', $data);
		if ($this->model('IntegratedUser')->ubah($_POST) > 0) {
			echo "<script>alert('Berhasil Ubah Data User');
			window.location.href = '".BASEURL."/user/detail';</script>";
			exit;
		}else{
			echo "<script>alert('Tidak Ada Perubahan Data');
			window.location.href = '".BASEURL."/user/detail';</script>";
		}
		
	} 

	public function detail()
	{
		
		$data['title'] = 'User Detail';
		$this->view('templates/header', $data);
		$data['user'] = 0;
		if (!empty($_SESSION)) {
			$idU = $_SESSION['id_user'];
			$user = $this->model('User')->cariById($idU);
			$data['user'] = $user;
		}
		$this->view('templates/topbar', $data);
		$this->view('user/detail', $data);

	}

	public function logout(){
		$this->model('User')->logout();
		header("Location: ".BASEURL."/Home");
	}
}