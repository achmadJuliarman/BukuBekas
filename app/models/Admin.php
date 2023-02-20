<?php
include 'User.php'; 
class Admin extends User{
	public function __construct()
	{
		$this->db = new Database;
	}


	public function hapusUser()
	{
		$data['id'] = $_POST['id_user'];
		$query = "DELETE FROM users WHERE id_user = :id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// tiadk memakai method ini
	public function ubahUser()
	{
		return 1;
	}

	public function tambahUser()
	{
		$query = "INSERT INTO users VALUES
		('', :username, :nama, :pass, :no, :level)";
		$this->db->query($query);
		$this->db->bind('username', $_POST['username']);
		$this->db->bind('nama', $_POST['nama']);
		$this->db->bind('pass', $_POST['pass']);
		$this->db->bind('no', $_POST['no']);
		$this->db->bind('level', $_POST['level']);
		$this->db->execute();
		return $this->db->rowCount();
	}


}