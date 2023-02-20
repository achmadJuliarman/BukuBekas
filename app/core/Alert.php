<?php 

class Alert
{
	public function __construct(){
		if (!session_id()) {
			session_start();
		}
	}
	static function setParams($pesan, $aksi, $table, $type){
		$_SESSION['alert'] = [
			'pesan' => $pesan,
			'aksi' => $aksi,
			'table' => $table,
			'tipe' => $type
		];
	}

	static function showAlert()
	{
		if (isset($_SESSION['alert'])) 
		{
			if ($_SESSION['alert']['tipe'] === 'success') {
				echo '
		<div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="margin-left: 16vw; width: 35vw;">
		  Data <strong>'.$_SESSION['alert']['table'].'</strong> '.$_SESSION['alert']['pesan'].' <strong>
		  Di'.$_SESSION['alert']['aksi'].' !</strong>
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
			}else{
				echo '
		<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" style="margin-left: 16vw; width: 35vw;">
		  Data <strong>'.$_SESSION['alert']['table'].'</strong> '.$_SESSION['alert']['pesan'].' <strong>
		  Di'.$_SESSION['alert']['aksi'].' !</strong>
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
			}
		}
	unset($_SESSION['alert']);
	}
}		