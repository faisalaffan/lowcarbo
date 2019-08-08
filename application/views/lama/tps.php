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

	dialog,
	#tambahModal.mdl-dialog {
		/* width: 80% !important; */
		height: 80% !important;
	}

	#tambahModal.mdl-dialog {
		overflow-y: initial !important;
	}

	.mdl-dialog__content {
		margin-top: 5vh !important;
		height: 65%;
		overflow-y: auto;
		-webkit-box-shadow: 0px 0px 20px -10px rgba(0, 0, 0, 0.5) !important;
		-moz-box-shadow: 0px 0px 20px -10px rgba(0, 0, 0, 0.5) !important;
		box-shadow: 0px 0px 20px -10px rgba(0, 0, 0, 0.5) !important;
		border-radius: 1vh !important;
	}

	::-webkit-scrollbar {
		display: none;
	}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/getmdl-select@2.0.1/getmdl-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/getmdl-select@2.0.1/getmdl-select.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<div class="mdl-grid demo-content">
	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid"
		style="text-align: center;">
		<h3 class="mdl-cell mdl-cell--12-col mdl-cell--12-col-desktop ce">Data Tps</h3>
		<ul class="demo-list-two mdl-list">
			<?php foreach ($tps as $t ) : ?>
			<li class="mdl-list__item mdl-list__item--two-line">
				<span class="mdl-list__item-primary-content">
					<!-- <i class="material-icons mdl-list__item-avatar">person</i> -->
					<img class="mdl-list__item-avatar" src="<?= base_url('assets/') . $t['gambar_tps'] ?>" alt="">
					<span><?= $t['nama_tps'] ?></span>
					<span class="mdl-list__item-sub-title"><?= $t['alamat_tps'] ?></span>
				</span>
				<span class="mdl-list__item-secondary-content">
					<a class="mdl-list__item-secondary-action">
						<button
							class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
							onclick="return modal('#editModal', <?= $t['id_tps'] ?>);">
							<i class="material-icons">edit</i>
						</button> &nbsp;
						<button
							class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
							onclick="return deleteData(<?= $t['id_tps'] ?>);">
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
	<h4 class="mdl-dialog__title">Tambah Tps</h4>
	<div class="mdl-dialog__content">
		<form action="<?= base_url('api/admin/tps') ?>" method="POST" enctype="multipart/form-data" id="formTambah">
			<input type="hidden" name="id_tpa" value="" id="id_tpa">
			<div
				class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
				<input type="text" value="" class="mdl-textfield__input" id="sample5" readonly>
				<input type="hidden" value="" name="sample5">
				<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
				<label for="sample5" class="mdl-textfield__label">Country</label>
				<ul for="sample5" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
					<div id="tpa_data"></div>
				</ul>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="alamat" name="alamat_tps">
				<label class="mdl-textfield__label" for="alamat">ALAMAT</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="latitude" name="lat_tps">
				<label class="mdl-textfield__label" for="latitude">LATITUDE</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="longitude" name="lng_tps">
				<label class="mdl-textfield__label" for="longitude">LONGITUDE</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="nama" name="nama_tps">
				<label class="mdl-textfield__label" for="nama">NAMA</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="file" name="gambar_tps">
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="username" name="username_tps">
				<label class="mdl-textfield__label" for="username">USERNAME</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" id="password" name="password_tps">
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
	<h4 class="mdl-dialog__title">Edit TPS</h4>
	<div class="mdl-dialog__content">
		<form enctype="multipart/form-data" id="formEdit">
			<input class="mdl-textfield__input" type="hidden" id="id_tps" name="id_tps">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="ALAMAT" name="alamat_tps">
				<label class="mdl-textfield__label" for="ALAMAT">ALAMAT</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="LATITUDE" name="lat_tps">
				<label class="mdl-textfield__label" for="LATITUDE">LATITUDE</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="LONGITUDE" name="lng_tps">
				<label class="mdl-textfield__label" for="LONGITUDE">LONGITUDE</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="NAMA" name="nama_tps">
				<label class="mdl-textfield__label" for="NAMA">NAMA</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="file" name="gambar_tps">
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="USERNAME" name="username_tps">
				<label class="mdl-textfield__label" for="USERNAME">USERNAME</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" id="PASSWORD" name="password_tps">
				<label class="mdl-textfield__label" for="PASSWORD">PASSWORD</label>
			</div>
	</div>
	<div class="mdl-dialog__actions">
		<!-- <button type="button" class="mdl-button" onclick="return editData()">Agree</button> -->
		<button type="submit" class="mdl-button">Agree</button>
		</form>
		<button type="button" class="mdl-button close">Disagree</button>
	</div>
</dialog>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
	$(document).on("click", ".level", function () {
		var selectedItem = $(this).attr('data-val'); // or var clickedBtnID = this.id
		$("#id_tpa").val(selectedItem);
	});
	$.ajax({
		url: "<?= base_url('api/admin/tpa') ?>",
		type: 'get',
		success: (res) => {
			res.data.map(res => {
				// <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="${res.nama_tpa}">
				// 	<input type="radio" id="${res.nama_tpa}" class="mdl-radio__button" name="id_tpa" value="${res.id_tpa}">
				// 	<span class="mdl-radio__label">${res.nama_tpa}</span>
				// </label>
				$('#tpa_data').append(`
					<li class="mdl-menu__item level" data-val="${res.id_tpa}">${res.nama_tpa}</li>
				`);
			});
		}
	});

	$('#formTambah').submit(function (e) {
		e.preventDefault();
		var formData = new FormData();
		formData.append("id_tpa", $('#id_tpa').val());
		formData.append("alamat_tps", $('#tambahModal input[name="alamat_tps"]').val());
		formData.append("lng_tps", $('#tambahModal input[name="lng_tps"]').val());
		formData.append("lat_tps", $('#tambahModal input[name="lat_tps"]').val());
		formData.append("nama_tps", $('#tambahModal input[name="nama_tps"]').val());
		formData.append("username_tps", $('#tambahModal input[name="username_tps"]').val());
		formData.append("password_tps", $('#tambahModal input[name="password_tps"]').val());

		var imageFile = $('#tambahModal input[name="gambar_tps"]')[0].files[0];
		formData.append("gambar_tps", imageFile);

		var url = "<?= base_url('api/admin/tps') ?>";
		axios.post(url, formData, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
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

	function modal(namaModal, editId = null) {
		if (namaModal == "#editModal") {
			$.ajax({
				url: "<?= base_url('api/admin/tps/') ?>?id_tps=" + editId,
				type: 'get',
				success: function (res) {
					$.map(res.data, (val, i) => {
						console.log(val);
						$('#editModal input[name="id_tps"]').val(val.id_tps);
						$('#editModal input[name="alamat_tps"]').val(val.alamat_tps);
						$('#editModal input[name="lat_tps"]').val(val.lat_tps);
						$('#editModal input[name="lng_tps"]').val(val.lng_tps);
						$('#editModal input[name="nama_tps"]').val(val.nama_tps);
						$('#editModal input[name="password_tps"]').val(val.password_tps);
						$('#editModal input[name="username_tps"]').val(val.username_tps);
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

	// this is the id of the form
	function tambahData() {
		var formData = new FormData();
		formData.append("id_tpa", $('#id_tpa').val());
		formData.append("alamat_tps", $('#tambahModal input[name="alamat_tps"]').val());
		formData.append("lng_tps", $('#tambahModal input[name="lng_tps"]').val());
		formData.append("lat_tps", $('#tambahModal input[name="lat_tps"]').val());
		formData.append("nama_tps", $('#tambahModal input[name="nama_tps"]').val());
		formData.append("username_tps", $('#tambahModal input[name="username_tps"]').val());
		formData.append("password_tps", $('#tambahModal input[name="password_tps"]').val());

		var imageFile = $('#tambahModal input[name="gambar_tps"]')[0];
		formData.append("gambar_tps", imageFile.files[0]);
		axios.post("<?= base_url('api/admin/tps') ?>", formData, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
			console.log(res)
		}).catch(err => {
			console.log(err);
		});

		// let data = {
		// 	'id_tpa': $('#id_tpa').val(),
		// 	'alamat_tps': $('#tambahModal input[name="alamat_tps"]').val(),
		// 	'lat_tps': $('#tambahModal input[name="lat_tps"]').val(),
		// 	'lng_tps': $('#tambahModal input[name="lng_tps"]').val(),
		// 	'nama_tps': $('#tambahModal input[name="nama_tps"]').val(),
		// 	'gambar_tps': $('#tambahModal input[name="gambar_tps"]').val(),
		// 	'username_tps': $('#tambahModal input[name="username_tps"]').val(),
		// 	'password_tps': $('#tambahModal input[name="password_tps"]').val()
		// };
		// $.ajax({
		// 	url: "<?= base_url('api/admin/tps') ?>",
		// 	type: 'POST',
		// 	data: formData,
		// 	processData: false,
		// 	contentType: false,
		// 	cache: false,
		// 	async: false,
		// 	success: function (res) {
		// 		console.log(res);
		// 		location.reload();
		// 	}
		// });
	}

	$('#formEdit').submit(function (e) {
		e.preventDefault();
		var formData = new FormData();
		formData.append("id_tps", $('#editModal input[name="id_tps"]').val());
		formData.append("alamat_tps", $('#editModal input[name="alamat_tps"]').val());
		formData.append("lng_tps", $('#editModal input[name="lng_tps"]').val());
		formData.append("lat_tps", $('#editModal input[name="lat_tps"]').val());
		formData.append("nama_tps", $('#editModal input[name="nama_tps"]').val());
		formData.append("username_tps", $('#editModal input[name="username_tps"]').val());
		formData.append("password_tps", $('#editModal input[name="password_tps"]').val());

		var imageFile = $('#editModal input[name="gambar_tps"]')[0].files[0];
		formData.append("gambar_tps", imageFile);

		var url = "<?= base_url('api/admin/tpsupdate') ?>";
		axios.post(url, formData, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
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


	function editData() {
		let data = {
			'id_tps': $('#editModal input[name="id_tps"]').val(),
			'alamat_tps': $('#editModal input[name="alamat_tps"]').val(),
			'lat_tps': $('#editModal input[name="lat_tps"]').val(),
			'lng_tps': $('#editModal input[name="lng_tps"]').val(),
			'nama_tps': $('#editModal input[name="nama_tps"]').val(),
			'gambar_tps': $('#editModal input[name="gambar_tps"]').val(),
			'username_tps': $('#editModal input[name="username_tps"]').val(),
			'password_tps': $('#editModal input[name="password_tps"]').val()
		};
		if (data.alamat_tps != "" && data.lat_tps != "" && data.lng_tps != "" && data.nama_tps != "" && data
			.username_tps != "" && data.password_tps != "") {
			$.ajax({
				url: "<?= base_url('api/admin/tpsupdate') ?>",
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

	function deleteData(id) {
		const c = confirm('Apakah anda yakin menghapus ?');
		if (c == true) {
			$.ajax({
				url: "<?= base_url('api/admin/tpshapus?id_tps=') ?>" + id,
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