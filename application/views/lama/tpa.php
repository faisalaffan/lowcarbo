<style>
	ul {
		width: 100%;
	}

	li {
		transition: 0.2s all ease-in-out;
	}

	li:hover {
		transition: 0.4s all ease-in-out;
		box-shadow: 0 1.5px 4px rgba(0, 0, 0, 0.24), 0 1.5px 6px rgba(0, 0, 0, 0.12);
	}

	@media all and (max-width: 500px) {
		.mdl-button--colored {
			display: none !important;
		}
	}

	#fab {
		position: fixed;
		bottom: 3vh;
		right: 5vh;
		background-color: salmon !important;
	}

	dialog {
		/* width: 80% !important;
		height: 80% !important; */
	}

</style>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<div class="mdl-grid demo-content">
	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid"
		style="text-align: center;">
		<h3 class="mdl-cell mdl-cell--12-col mdl-cell--12-col-desktop ce">Data Tpa</h3>
		<ul class="demo-list-two mdl-list">
			<?php foreach ($tpa as $t ) : ?>
			<li class="mdl-list__item mdl-list__item--two-line">
				<span class="mdl-list__item-primary-content">
					<!-- <i class="material-icons mdl-list__item-avatar">person</i> -->
					<img class="mdl-list__item-avatar" src="<?= base_url('assets/') . $t['gambar_tpa'] ?>" alt="">
					<span><?= $t['nama_tpa'] ?></span>
					<span class="mdl-list__item-sub-title"><?= $t['alamat_tpa'] ?></span>
				</span>
				<span class="mdl-list__item-secondary-content">
					<a class="mdl-list__item-secondary-action">
						<button
							class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
							onclick="return modal('#editModal', <?= $t['id_tpa'] ?>);">
							<i class="material-icons">edit</i>
						</button> &nbsp;
						<button
							class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" onclick="return deleteData(<?= $t['id_tpa'] ?>)">
							<i class="material-icons">delete</i>
						</button>
					</a>
				</span>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" id="fab"
	onclick="return modal('#tambahModal');">
	<i class="material-icons">add</i>
</button>
<dialog class="mdl-dialog" id="tambahModal">
	<h4 class="mdl-dialog__title">Tambah Tpa</h4>
	<div class="mdl-dialog__content">
		<form action="<?= base_url('api/admin/tps') ?>" method="POST" enctype="multipart/form-data">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="alamat" name="alamat_tpa">
				<label class="mdl-textfield__label" for="alamat">ALAMAT</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="latitude" name="lat_tpa">
				<label class="mdl-textfield__label" for="latitude">LATITUDE</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="longitude" name="lng_tpa">
				<label class="mdl-textfield__label" for="longitude">LONGITUDE</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="nama" name="nama_tpa">
				<label class="mdl-textfield__label" for="nama">NAMA</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="file" name="gambar_tpa">
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="username" name="username_tpa">
				<label class="mdl-textfield__label" for="username">USERNAME</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" id="password" name="password_tpa">
				<label class="mdl-textfield__label" for="password">PASSWORD</label>
			</div>
	</div>
	<div class="mdl-dialog__actions">
		<!-- <button type="button" class="mdl-button" onclick="return tambahData();">Agree</button> -->
		<button type="submit" class="mdl-button">Agree</button>
		</form>
		<button type="button" class="mdl-button close">Disagree</button>
	</div>
</dialog>
<dialog class="mdl-dialog" id="editModal">
	<h4 class="mdl-dialog__title">Edit TPA</h4>
	<div class="mdl-dialog__content">
		<form enctype="multipart/form-data">
			<input class="mdl-textfield__input" type="hidden" id="id_tpa" name="id_tpa">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="ALAMAT" name="alamat_tpa">
				<label class="mdl-textfield__label" for="ALAMAT">ALAMAT</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="LATITUDE" name="lat_tpa">
				<label class="mdl-textfield__label" for="LATITUDE">LATITUDE</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="LONGITUDE" name="lng_tpa">
				<label class="mdl-textfield__label" for="LONGITUDE">LONGITUDE</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="NAMA" name="nama_tpa">
				<label class="mdl-textfield__label" for="NAMA">NAMA</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="file" name="gambar_tpa">
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="USERNAME" name="username_tpa">
				<label class="mdl-textfield__label" for="USERNAME">USERNAME</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" id="PASSWORD" name="password_tpa">
				<label class="mdl-textfield__label" for="PASSWORD">PASSWORD</label>
			</div>
	</div>
	<div class="mdl-dialog__actions">
		<button type="submit" class="mdl-button">Agree</button>
	</form>
		<button type="button" class="mdl-button close">Disagree</button>
	</div>
</dialog>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
	function modal(namaModal, editId = null) {
		if (namaModal == "#editModal") {
			$.ajax({
				url: "<?= base_url('api/admin/tpa/') ?>?id_tpa=" + editId,
				type: 'get',
				success: function (res) {
					$.map(res.data, (val, i) => {
						console.log(val);
						$('#editModal input[name="id_tpa"]').val(val.id_tpa);
						$('#editModal input[name="alamat_tpa"]').val(val.alamat_tpa);
						$('#editModal input[name="lat_tpa"]').val(val.lat_tpa);
						$('#editModal input[name="lng_tpa"]').val(val.lng_tpa);
						$('#editModal input[name="nama_tpa"]').val(val.nama_tpa);
						$('#editModal input[name="password_tpa"]').val(val.password_tpa);
						$('#editModal input[name="username_tpa"]').val(val.username_tpa);
					});
				}
			});
		}
		var dialog = document.querySelector(namaModal);
		dialog.showModal();
		dialog.querySelector('.close').addEventListener('click', function () {
			dialog.close();
		});
	}

	function editData() {
		let data = {
			'id_tpa': $('#editModal input[name="id_tpa"]').val(),
			'alamat_tpa': $('#editModal input[name="alamat_tpa"]').val(),
			'lat_tpa': $('#editModal input[name="lat_tpa"]').val(),
			'lng_tpa': $('#editModal input[name="lng_tpa"]').val(),
			'nama_tpa': $('#editModal input[name="nama_tpa"]').val(),
			'gambar_tpa': $('#editModal input[name="gambar_tpa"]').val(),
			'username_tpa': $('#editModal input[name="username_tpa"]').val(),
			'password_tpa': $('#editModal input[name="password_tpa"]').val()
		};
		if (data.alamat_tpa != "" && data.lat_tpa != "" && data.lng_tpa != "" && data.nama_tpa != "" && data.username_tpa != "" && data.password_tpa != "") {
			$.ajax({
				url: "<?= base_url('api/admin/tpaupdate') ?>",
				type: 'post',
				data: data,
				success: function (res) {
					console.log(res);
					alert('Berhasil update data');
					location.reload();
				}
			});
		} else {
			alert('gagal update mungkin ada field yang kosong');
			location.reload();
		}
	}

	
	$('#editModal').submit(function (e) {
		e.preventDefault();
		var formData = new FormData();
		formData.append("id_tpa", $('#editModal input[name="id_tpa"]').val());
		formData.append("alamat_tpa", $('#editModal input[name="alamat_tpa"]').val());
		formData.append("lat_tpa", $('#editModal input[name="lat_tpa"]').val());
		formData.append("lng_tpa", $('#editModal input[name="lng_tpa"]').val());
		formData.append("nama_tpa", $('#editModal input[name="nama_tpa"]').val());
		formData.append("username_tpa", $('#editModal input[name="username_tpa"]').val());
		formData.append("password_tpa", $('#editModal input[name="password_tpa"]').val());

		var imageFile = $('#editModal input[name="gambar_tpa"]')[0].files[0];
		formData.append("gambar_tpa", imageFile);
		var url = "<?= base_url('api/admin/tpaupdate') ?>";
		axios.post(url, formData, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
			console.log(res);
			if (res.data.status == true) {
				alert('berhasil update data');
				location.reload();
			} else {
				alert('gagal update data');
				location.reload();
			}
		}).catch(err => {
			console.log(err);
		});
	});

	$('#tambahModal').submit(function (e) {
		e.preventDefault();
		var formData = new FormData();
		formData.append("alamat_tpa", $('#tambahModal input[name="alamat_tpa"]').val());
		formData.append("lat_tpa", $('#tambahModal input[name="lat_tpa"]').val());
		formData.append("lng_tpa", $('#tambahModal input[name="lng_tpa"]').val());
		formData.append("nama_tpa", $('#tambahModal input[name="nama_tpa"]').val());
		formData.append("username_tpa", $('#tambahModal input[name="username_tpa"]').val());
		formData.append("password_tpa", $('#tambahModal input[name="password_tpa"]').val());

		var imageFile = $('#tambahModal input[name="gambar_tpa"]')[0].files[0];
		formData.append("gambar_tpa", imageFile);
		var url = "<?= base_url('api/admin/tpa') ?>";
		axios.post(url, formData, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
			console.log(res);
			if (res.data.status == true) {
				alert('berhasil tambah data');
				location.reload();
			} else {
				alert('gagal tambah data');
				location.reload();
			}
		}).catch(err => {
			console.log(err);
		});

	});

	function tambahData() {
		let data = {
			'alamat_tpa': $('#tambahModal input[name="alamat_tpa"]').val(),
			'lat_tpa': $('#tambahModal input[name="lat_tpa"]').val(),
			'lng_tpa': $('#tambahModal input[name="lng_tpa"]').val(),
			'nama_tpa': $('#tambahModal input[name="nama_tpa"]').val(),
			'gambar_tpa': $('#tambahModal input[name="gambar"]').val(),
			'username_tpa': $('#tambahModal input[name="username_tpa"]').val(),
			'password_tpa': $('#tambahModal input[name="password_tpa"]').val()
		};
		$.ajax({
			url: "<?= base_url('api/admin/tpa') ?>",
			type: 'post',
			data: data,
			success: function (res) {
				console.log(res);
				alert('Berhasil tambah data');
				location.reload();
			}
		});
	}
	
	function deleteData(id) {
		const c = confirm('Apakah anda yakin menghapus ?');
		if (c == true) {
			$.ajax({
				url: "<?= base_url('api/admin/tpaHapus?id_tpa=') ?>" + id,
				type: 'get',
				success: function (res) {
					alert('berhasil hapus data');
					location.reload();
				}
			});
		} else {
			location.reload();
		}
	}

</script>
