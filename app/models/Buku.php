<?php 

include_once 'Model.php';

class Buku extends Model
{
	private $db;

	public function __construct()
	{
		$this->db = new Database; // dipanggil di int sehingga tidak usah include_once di file ini
	}

	public function getAllBuku()
	{
		$this->db->query('SELECT * FROM buku JOIN users using(id_user);');	
		return $this->db->resultSet();
	}

	public function getBukuByAuthor($id)
	{
		$this->db->query('SELECT * FROM buku JOIN users using(id_user) WHERE id_user =:id');
		$this->db->bind('id', $id);
		return $this->db->resultSet(); // di eksekusi querynya lalu di tampilkan
	}

	public function tambahBuku($data)
	{	
		// var_dump($data);
		// die();
		$query = "INSERT INTO buku 
				  VALUES 
				  ('', :id_user, :cover, :judul, :deskripsi, :harga);";

		var_dump($data);
		$cover = $this->uploadGambar();
		$this->db->query($query);
		$this->db->bind('id_user', $data['id']);
		$this->db->bind('cover', $cover);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('deskripsi', $data['deskripsi']);	
		$this->db->bind('harga', $data['harga']);

		$this->db->execute();

		return $this->db->rowCount();

	}

	public function tambahFavorite($data)
	{	
		// var_dump($data);
		// die();
		$query = "INSERT INTO favorit 
				  VALUES 
				  ('', :id_user, :id_buku);";

		$this->db->query($query);
		$this->db->bind('id_user', $data['id-user']);
		$this->db->bind('id_buku', $data['id-buku']);

		$this->db->execute();

		return $this->db->rowCount();

	}

	public function getFavorite($idUser)
	{
		$query = "SELECT * FROM favorit 
		INNER JOIN users
		on favorit.id_user = users.id_user
		INNER JOIN buku
		on favorit.id_buku = buku.id_buku
		WHERE favorit.id_user =:id";
		$this->db->query($query);
		$this->db->bind('id', $idUser);

		return $this->db->resultSet();
	}

	public function hapusFavorite($data)
	{
		$query = "DELETE FROM favorit WHERE id_buku =:idB AND id_user=:idU";
		$this->db->query($query);
		$this->db->bind('idB', $data['id-buku']);
		$this->db->bind('idU', $data['id-user']);

		$this->db->execute();
		// echo $this->db->rowCount();
		// die();
		return $this->db->rowCount();

	}

	// public function cariBuku($keyword)
	// {
	// 	$this->db->query('SELECT * FROM buku JOIN users using(id_user) 
	// 		WHERE judul LIKE :%keyword%
	// 		OR nama LIKE :%keyword%
	// 		OR deskripsi LIKE :%keyword%');
	// 	$this->db->bind('keyword', $keyword);
	// 	$this->db->resultSet();
	// }
}