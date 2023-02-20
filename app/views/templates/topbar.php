<!-- profil -->


<!-- navbar baru -->
<nav class="navbar navbar-light bg-light static-top">
	<div class="container">
		<a class="navbar-brand <?=($data['title'] === "Home") ? "active" : "" ?>" href="<?= BASEURL; ?>">BukuBekas</a>
		<form action="" class="form-inline" style="<?php if (!empty($_SESSION)) {
			echo 'display:none;';
		} ?>">
			<a class="btn btn-primary rounded-pill" href="<?= BASEURL; ?>/user/login"
				style="text-decoration: none;">Sign In</a>
		</form>

		<?php if (!empty($_SESSION)) { ?>
			<div class="profil">
				<a href="<?= BASEURL; ?>/user/detail" style="text-decoration: none; color: black;">
					<b>
						<?= $_SESSION['nama']; ?>
					</b>
					<img src="<?= BASEURL; ?>/img/profile.png" alt="profil" style="width: 2vw;">
				</a>
			</div>
		<?php } ?>
	</div>

</nav>

<!-- Modal Box profil -->
<div class="modal" tabindex="-1" id="modal-profil">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header" style="display: none;">
				<h5 class="modal-title">Profil
					<?= $_SESSION['level']; ?>
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<!-- Logout -->
			<div align="right" <?php if (empty($_SESSION)) {
				echo "style='display: none;'";
			} ?>>
				<button type="button" class="btn btn-outline-danger mb-4">
					<a href="<?= BASEURL; ?>/user/logout" style="color: black; text-decoration: none;">
						Logout
					</a>
				</button>
			</div>
			<div class="modal-body">
				<!-- button untuk menuju ke halaman buku favorite user -->
				<div align="left" <?php if (isset($_SESSION['login'])) { ?> 	<?=($_SESSION["level"] === 'admin' && empty($_SESSION)) ? "style='display: none;'" : "" ?> 	<?php
				} else if (empty($_SESSION)) {
					echo "style='display: none;'";
				} ?>>
					<a href="<?= BASEURL; ?>/Books/favoritemu/<?= $_SESSION['id_user']; ?>">
						<button type="button" class="btn btn-primary mb-4">
							Buku FavoriteMu
						</button>
					</a>
					<!-- Button Untuk menuju halaman yang berisi buku yang diupload user -->

					<a href="<?= BASEURL; ?>/user/books" style="color: black; text-decoration: none;">
						<button type="button" class="btn btn-primary mb-4">
							Bukumu
						</button>
					</a>
				</div>
				<div class="modal-header d-flex justify-content-center">
					<img src="<?= BASEURL; ?>/img/profile.png" alt="" id="cover" align="center" style="width: 5vw;">
				</div>
				<br><br><br>
				<form action="<?= BASEURL; ?>/user/ubah" method="post">
					<input type="hidden" name="id_user" value="<?= $data['user']['id_user']; ?>">
					<div class="input-group flex-nowrap mt-2 mb-2">
						<span class="input-group-text" id="addon-wrapping">Nama : </span>
						<input type="text" class="form-control" id="nama" name="nama"
							value="<?= $data['user']['nama'] ?>">
					</div>
					<div class="input-group flex-nowrap mt-2 mb-2">
						<span class="input-group-text" id="addon-wrapping">Username : </span>
						<input type="text" class="form-control" id="username" name="username"
							value="<?= $data['user']['username'] ?>">
					</div>
					<div class="input-group flex-nowrap mt-2 mb-2">
						<span class="input-group-text" id="addon-wrapping">Password : </span>
						<input type="password" class="form-control" id="password" name="password"
							value="<?= $data['user']['password'] ?>">
					</div>
					<div class="input-group flex-nowrap mt-2 mb-2">
						<span class="input-group-text" id="addon-wrapping">No - Telp : </span>
						<input type="text" class="form-control" id="no" name="no"
							value="<?= $data['user']['no_telp'] ?>">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-warning" id="ubah" name="ubah">Ubah</button>
			</div>
		</div>
		</form>
	</div>
</div>

<script>
	$(document).on("click", "#profil", function () {
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
		$('.modal-body #harga').val('Rp.' + harga);
		$('.modal-body #judul').val(judul);
		$('.modal-body #deskripsi').val(deskripsi);
		$('.modal-body #cover').attr("src", '<?= BASEURL; ?>/img/'+cover);
		$('.modal-footer #no a').attr("href", 'https://api.whatsapp.com/send?phone=62' + no);
	});

</script>