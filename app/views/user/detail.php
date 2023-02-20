<div class="container text-decoration-none" align="right">
	<div class="container d-flex justify-content-between">
		<a href="<?= BASEURL; ?>/books/favoritemu">
			<button class="btn btn-primary" style="width: 200px;">Buku Favoritmu</button>
		</a>
		<a href="<?= BASEURL; ?>/user/logout" onclick="confirm('Log Out ?')">
			<button class="btn btn-danger" style="width: 200px;">Log Out</button>
		</a>
	</div>

	<div class="container d-flex justify-content-between">
		<button class="btn btn-primary mt-1" style="width: 200px;" data-bs-toggle="modal"
			data-bs-target="#modal-upload">Upload Buku</button>
		<a href="<?= BASEURL; ?>/user/books">
			<button class="btn btn-primary mt-1">
				Lihat Bukumu
			</button>
		</a>
	</div>
</div>
<div class="container shadow-sm p-3 mb-4 bg-white rounded mt-4" style="width: 800px;">
	<!-- <?php var_dump($data['user']); ?> -->
	<p style="font-size: 30px;">Biodata Anda</p>
	<form action="<?= BASEURL; ?>/user/ubah" method="post">
		<input type="hidden" value="<?= $data['user']['id_user']; ?>" name="id_user">
		<div class="form-group row mt-1">
			<label for="staticEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="nama" value="<?= $data['user']['nama']; ?>" name="nama">
			</div>
		</div>
		<div class="form-group row mt-1">
			<label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="nama" value="<?= $data['user']['username']; ?>"
					name="username">
			</div>
		</div>
		<div class="form-group row mt-1">
			<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="inputPassword" value="<?= $data['user']['password']; ?>"
					name="password">
				<!-- An element to toggle between password visibility -->
				<input type="checkbox" onclick="myFunction()"> Tampilkan Password
			</div>
		</div>
		<div class="form-group row mt-1">
			<label for="inputPassword" class="col-sm-2 col-form-label">No. Telp.</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="inputPassword" value="<?= $data['user']['no_telp'] ?>"
					name="no">
			</div>
		</div>
		<div class="d-flex flex-row-reverse mt-2">
			<button class="btn btn-primary" type="submit">Ubah</button>
		</div>
	</form>

</div>
<hr>
<!-- <div class="container shadow-sm p-3 mb-4 bg-white rounded mt-4" style="width: 800px;">
	<p style="font-size: 30px;">Buku</p>
	<form>
		<div class="form-group row mt-1">
			<label for="Judul" class="col-sm-2 col-form-label">Judul</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Judul" placeholder="Judul Buku">
			</div>
		</div>
		<div class="form-group row mt-1">
			<label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
			<div class="col-sm-10">
				<input type="Text" class="form-control" id="inputDeskripsi" placeholder="Deskripsi">
			</div>
		</div>
		<div class="form-group row mt-1">
			<label for="inputGambar" class="col-sm-2 col-form-label">Cover</label>
			<div class="col-sm-10">
				<input type="file" class="form-control-file mt-2" id="inputGambar">
			</div>
		</div>
	</form>
	<div class="d-flex flex-row-reverse mt-2">
		<button class="btn btn-primary">Simpan</button>
	</div>
</div>
<div class="container justify-content-center shadow-sm p-3 mb-4 bg-white rounded mt-4" style="width: 800px;">
	<a href="">
		<button class="btn btn-success m-2" style="width: 760px;">Etalase Buku Anda</button>
	</a>
	<a href="">
		<button class="btn btn-danger m-2" style="width: 760px;">Back</button>
	</a>
</div> -->

<!-- Modal Box Upload Buku -->
<div class="modal modal-lg" tabindex="-1" id="modal-upload">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload Buku</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= BASEURL; ?>/books/tambah" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" class="form-control" id="id-user" value="<?= $_SESSION['id_user']; ?>"
						name="id">
					<div class="col-md-6">
						<label for="judul" class="form-label">Judul</label>
						<input type="text" class="form-control" id="judul" name="judul" required>
					</div>
					<div class="col-md-6">
						<label for="harga" class="form-label">Harga</label>
						<input type="number" class="form-control" id="harga" name="harga" required>
					</div>
					<div class="mb-3">
						<label for="cover" class="form-label">Pilih Cover</label>
						<input class="form-control form-control-sm" id="formFileSm" type="file" name="gambar" required>
					</div>
					<div class="form-floating">
						<textarea class="form-control" id="deskripsi" style="height: 100px" name="deskripsi"
							required></textarea>
						<label for="deskripsi">Deskripsi</label>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Upload</button>
				</div>
			</form>
		</div>
	</div>
	<script>
		function myFunction() {
			var x = document.getElementById("inputPassword");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
</div>