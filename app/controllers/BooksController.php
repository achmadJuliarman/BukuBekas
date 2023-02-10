<?php 

class BooksController extends Controller
{
	protected $author = '';

	public function index($ano = '')
	{
		$data['ano'] = $ano;
		$data['title'] = 'Buku';
		$data['buku'] = $this->model('Buku')->getAllBuku();
		$this->view('templates/header', $data);
		$data['favorit'] = $this->model('Buku')->getFavorite(0);
		if (!empty($_SESSION)) {
			$data['id-user'] = $_SESSION['id_user'];
			$data['favorit'] = $this->model('Buku')->getFavorite($data['id-user']);
		}
		// var_dump($data['favorit']);
		$this->view('books/index', $data);
		$this->view('templates/footer');
	}


	public function author($id) // berdasarkan params yang dikirimkan di app.php kemudian di urutkan = $nama parameter ke 1 dst
	{
		$data['id'] = $id;
		$data['title'] = 'Buku';
		$data['buku'] = $this->model('Buku')->getBukuByAuthor($id);
		$this->view('templates/header', $data);
		$this->view('books/author', $data);
		$this->view('templates/footer');
	}

	public function cari($keyword) // berdasarkan params yang dikirimkan di app.php kemudian di urutkan = $nama parameter ke 1 dst
	{
		
		$data['title'] = 'Buku';
		$data['buku'] = $this->model('Buku')->cariBuku($keyword);
		$this->view('templates/header', $data);
		$this->view('books/author', $data);
		$this->view('templates/footer');
	}

	public function favorite($idBuku){

		$data['title'] = 'Buku';
		$this->view('templates/header', $data);
		$data['id-buku'] = $idBuku;
		$data['id-user'] = $_SESSION['id_user'];
		$this->model('Buku')->tambahFavorite($data);
		header('Location: '.BASEURL.'/Books/favoritemu');
	}

	public function favoritemu(){

		$data['title'] = 'Buku';
		$this->view('templates/header', $data);
		$data['id-user'] = $_SESSION['id_user'];
		$data['buku'] = $this->model('Buku')->getFavorite($data['id-user']);
		$this->view('books/favorite', $data);
		// header('Location: '.BASEURL.'/Books');
	}

	public function hapusFavorite($idBuku)
	{
		$data['title'] = 'Buku';
		$this->view('templates/header', $data);
		$data['id-user'] = $_SESSION['id_user'];
		$data['id-buku'] = $idBuku;
		if ($this->model('Buku')->hapusFavorite($data) > 0) {
			header('Location: '.BASEURL.'/Books/favoritemu');
			exit;		
		} 
	}

	public function tambah(){
		if ($this->model('Buku')->tambahBuku($_POST) > 0) {
			header('Location: '.BASEURL.'/Books');
			exit;
		}
    }
}