<?php 



class HomeController extends Controller
{
	public function index()
	{
		$data['title'] = 'Home';
		$data['nama'] = $this->model('User')->getNama();
		$this->view('templates/header-rendy', $data);
		$this->view('templates/topbar', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}