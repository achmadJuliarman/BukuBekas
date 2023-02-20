<?php 
class User{
	private $id = 0;
	private $nama = '';
	private $db;


	public function __construct()
	{
		$this->db = new Database; // dipanggil di int sehingga tidak usah include_once di file ini
	}

	public function register()
	{
		$query = "INSERT INTO users VALUES
		('', :username, :nama, :pass, :no, :level)";
		$users = $this->getAllUsers();
		$this->db->query($query);
		$this->db->bind('username', $_POST['username']);
		$this->db->bind('nama', $_POST['nama']);
		$this->db->bind('pass', $_POST['pass']);
		$this->db->bind('no', $_POST['no']);
		$this->db->bind('level', 'user');
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function login($username, $pass){

		$users = $this->db->query("SELECT * FROM users WHERE username = '$username';");
		$users = $this->db->resultSet();
		// var_dump($users);
		// die();
		if ($this->db->rowCount() === 1	) {
			if ($pass === $users[0]['password']) {
				$_SESSION['login'] = true;
				$_SESSION['username'] = $users[0]['username'];
				$_SESSION['nama'] = $users[0]['nama'];
				$_SESSION['id_user'] = $users[0]['id_user'];
				$_SESSION['level'] = $users[0]['level'];
				return 1;
			}else{
				echo "<script>alert('password salah Bro')</script>"; // ubah pake pop up bootstrap jika berkenan
				echo "<script>window.location.href = '".BASEURL."/';</script>";
			}

		}else{
			echo "<script>alert('username salah Bro')</script>";
			echo "<script>window.location.href = '".BASEURL."/';</script>";
			return 212;
		}
		
	}

	public function logout(){
		session_start();
		unset($_SESSION);
		session_destroy();
		header("Location: ".BASEURL."/Home");
	}

	public function cariById($idU)
	{
		$this->db->query('SELECT * FROM users WHERE id_user =:id');
		$this->db->bind('id', $idU);
		return $this->db->single();
	}


	public function getAllUsers(){
		$this->db->query('SELECT * FROM users;');	
		return $this->db->resultSet();
	}
	public function getNama(){
		return $this->nama;
	}
	public function getId(){
		return $this->id;
	}

	
	
}