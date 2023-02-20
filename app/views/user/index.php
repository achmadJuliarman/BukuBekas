<div class="container">
	<?php foreach ($data['user'] as $u) { ?>
		<a href="<?= BASEURL; ?>/books/author/<?= $u['id_user']; ?>" 
			style="text-decoration: none;">
			<h1><?= $u['nama']; ?></h1>
		</a>

	<div class="user card mb-4 mt-2 p-2 bg-light d-flex">
		

		<?php $buku_user = $this->model('buku')->getBukuByAuthor($u['id_user']); ?>
		<?php $i=1; ?>
		<?php foreach ($buku_user as $b) { ?>
		<div class="container">
			<div class="card buku mt-2 p-1" style="width: 18rem;">
			  <img class="card-img-top" src="<?= BASEURL; ?>/img/<?= $b['cover']; ?>" alt="buku <?= $u['nama']; ?>">
			  <div class="card-body">
			    <p class="card-text"><b><?= $b['judul']; ?></b></p>
			    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modal-detail"
					id="detail" data-idB="<?= $b['id_buku']; ?>" data-idU="<?= $b['id_user']; ?>"
					data-judul="<?= $b['judul']; ?>" data-harga="<?= $b['harga']; ?>" data-no="<?= $b['no_telp']; ?>"
					data-deskripsi="<?= $b['deskripsi']; ?>" data-cover="<?= $b['cover']; ?>">
					Lihat Detail..
				</button>
			  </div>
			</div>
		</div>
		<?php 
		$i++;
			if($i >= 2) break; 
		?>
		<?php } ?>
	<div align="right">
		<a href="<?= BASEURL; ?>/books/author/<?= $u['id_user']; ?>">Lihat Buku <?= $u['nama']; ?> Lainnya >></a>
	</div>
	
	</div>

	<?php } ?>
</div>

<!-- Modal Box Detail -->
<div class="modal modal-xl" tabindex="-1" id="modal-detail">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Buku</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img src="" alt="" id="cover"><br><br><br>
				<div class="penjual" id="penjual">
					<a href="" style="text-decoration: none;">
						<h4></h4>
					</a>
				</div><br>
				<input type="hidden" class="form-control" id="id-buku" name="id-buku">
				<input type="hidden" class="form-control" id="id-user" name="id-user">
				<div class="input-group flex-nowrap mt-2 mb-2">
					<span class="input-group-text" id="addon-wrapping">Judul : </span>
					<input type="text" class="form-control" id="judul" name="judul" readonly>
				</div>
				<div class="input-group flex-nowrap mt-2 mb-2">
					<span class="input-group-text" id="addon-wrapping">harga : </span>
					<input type="text" class="form-control" id="harga" name="harga" readonly>
				</div>
				<div>
					<label for="deskripsi">Deskripsi :</label>
					<textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 100px"
						readonly></textarea>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button class="btn btn-light" id="no" style="background-color: rgb(37,211,102); ">
					<a href="" style="color: white; text-decoration: none;" target="blank">Chat Ke WA</a>
				</button>
				<button class="btn btn-outline-primary" id="favorite"
					style="<?php if (!isset($_SESSION['login'])) {
						echo "display: none;";
					} ?>">
					<a href="" style="color:black; text-decoration: none; text-shadow: 1px 1px 1px 1px;"
						target="blank">Tambah Ke Favorite</a>
				</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).on("click", "#detail", function(){
		$('.modal-footer #favorite').show();
		const idB = $(this).data('idbuku');
		const idU = $(this).data('iduser');
		const judul = $(this).data('judul');
		const harga = $(this).data('harga');
		const no = $(this).data('no').slice(1);
		const deskripsi = $(this).data('deskripsi');
		const cover = $(this).data('cover');
		const nama = $(this).data('nama');
		const favorite = $(this).data('favorite');

		const idBF = $(this).data('bukufav');

		console.log(idBF);
		if (idBF === idB) {
			$('.modal-footer #favorite').hide();
		}
		$('.modal-footer #favorite a').attr('href', '<?= BASEURL; ?>/Books/favorite/'+idB);
		$('.modal-body #id-buku').val(idB);
		$('.modal-body #id-user').val(idU);
		$('.modal-body #penjual a h4').text(nama);
		$('.modal-body #penjual a').attr("href", '<?= BASEURL; ?>/Books/author/'+idU);
		$('.modal-body #judul').val(judul);
		$('.modal-body #harga').val('Rp.'+harga);
		$('.modal-body #judul').val(judul);
		$('.modal-body #deskripsi').val(deskripsi);
		$('.modal-body #cover').attr("src", '<?= BASEURL; ?>/img/'+cover);
		$('.modal-footer #no a').attr("href", 'https://api.whatsapp.com/send?phone=62'+no);
	});

	
</script>