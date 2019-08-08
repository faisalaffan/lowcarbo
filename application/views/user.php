<style>
	ul#data-append {
		width: 100%;
	}

	ul#data-append li {
		transition: 0.2s all ease-in-out;
	}

	ul#data-append li:hover {
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
<div class="mdl-grid demo-content">
	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid"
		style="text-align: center;">
		<h3 class="mdl-cell mdl-cell--12-col mdl-cell--12-col-desktop ce">Data User</h3>
		<ul class="demo-list-two mdl-list" id="data-append">
			<!-- <?php foreach ($tps as $t ) : ?>
			<li class="mdl-list__item mdl-list__item--two-line">
				<span class="mdl-list__item-primary-content">
					<i class="material-icons mdl-list__item-avatar">person</i>
					<span><?= $t['nama_tps'] ?></span>
					<span class="mdl-list__item-sub-title"><?= $t['alamat_tps'] ?></span>
				</span>
				<span class="mdl-list__item-secondary-content">
					<a class="mdl-list__item-secondary-action" href="#">
						<button
							class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
							onclick="return modal('#editModal');">
							<i class="material-icons">edit</i>
						</button> &nbsp;
						<button
							class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" onclick="return deleteData(<?= $t['id_tps'] ?>)">
							<i class="material-icons">delete</i>
						</button>
					</a>
				</span>
			</li>
			<?php endforeach; ?> -->
		</ul>
	</div>
</div>
<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" id="fab"
	onclick="return modal('#tambahModal');">
	<i class="material-icons">add</i>
</button>
<dialog class="mdl-dialog" id="tambahModal">
	<h4 class="mdl-dialog__title">Tambah User</h4>
	<div class="mdl-dialog__content">
		<form enctype="multipart/form-data">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="fullname" name="fullname_member">
				<label class="mdl-textfield__label" for="fullname">NAMA LENGKAP</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="alamat" name="alamat_member">
				<label class="mdl-textfield__label" for="alamat">ALAMAT MEMBER</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="telp" name="telp_member">
				<label class="mdl-textfield__label" for="telp">TELEPON MEMBER</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="username" name="username_member">
				<label class="mdl-textfield__label" for="username">USERNAME</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="password" name="password_member">
				<label class="mdl-textfield__label" for="password">PASSWORD</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="status" id="status" name="status_member">
				<label class="mdl-textfield__label" for="status">STATUS MEMBER</label>
			</div>
		</form>
	</div>
	<div class="mdl-dialog__actions">
		<button type="button" class="mdl-button" onclick="return tambahData();">Agree</button>
		<button type="button" class="mdl-button close">Disagree</button>
	</div>
</dialog>
<dialog class="mdl-dialog" id="editModal">
	<h4 class="mdl-dialog__title">Edit USER</h4>
	<div class="mdl-dialog__content">
		<form enctype="multipart/form-data">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="fullname" name="fullname_member">
				<label class="mdl-textfield__label" for="fullname">NAMA LENGKAP</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="alamat" name="alamat_member">
				<label class="mdl-textfield__label" for="alamat">ALAMAT MEMBER</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="telp" name="telp_member">
				<label class="mdl-textfield__label" for="telp">TELEPON MEMBER</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="username" name="username_member">
				<label class="mdl-textfield__label" for="username">USERNAME</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="password" name="password_member">
				<label class="mdl-textfield__label" for="password">PASSWORD</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="status" id="status" name="status_member">
				<label class="mdl-textfield__label" for="status">STATUS MEMBER</label>
			</div>
		</form>
	</div>
	</form>
	<div class="mdl-dialog__actions">
		<button type="button" class="mdl-button" onclick="return editData();">Agree</button>
		<button type="button" class="mdl-button close">Disagree</button>
	</div>
</dialog>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
	function getData() {
		$.ajax({
			url: "<?= base_url('api/admin/member') ?>",
			type: 'get',
			success: function (res) {
				res.data.map(async obj => {
					await $('#data-append').append(
						`
					<li class="mdl-list__item mdl-list__item--two-line">
						<span class="mdl-list__item-primary-content">
							<i class="material-icons mdl-list__item-avatar">person</i>
							<span>${obj.fullname_member}</span>
							<span class="mdl-list__item-sub-title">${obj.alamat_member}</span>
						</span>
						<span class="mdl-list__item-secondary-content">
							<a class="mdl-list__item-secondary-action">
								<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
									onclick="return modal('#editModal');">
									<i class="material-icons">edit</i>
								</button> &nbsp;
								<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
									onclick="return deleteData(${obj.id_member})">
									<i class="material-icons">delete</i>
								</button>
							</a>
						</span>
					</li>
					`
					);
				})
			}
		});
	}
	this.getData();

	function modal(namaModal, editId = null) {
		var dialog = document.querySelector(namaModal);
		dialog.showModal();
		dialog.querySelector('.close').addEventListener('click', function () {
			dialog.close();
		});
	}

	function tambahData() {
		let data = {
			'fullname_member': $("#tambahModal input[name='fullname_member']").val(),
			'alamat_member': $('#tambahModal input[name="alamat_member"]').val(),
			'telp_member': $('#tambahModal input[name="telp_member"]').val(),
			'username_member': $('#tambahModal input[name="username_member"]').val(),
			'password_member': $('#tambahModal input[name="password_member"]').val(),
			'status_member': $('#tambahModal input[name="status_member"]').val(),
		};
		$.ajax({
			url: "<?= base_url('api/admin/member') ?>",
			type: 'POST',
			data: data,
			success: function (res) {
				alert('Berhasil tambah data');
				location.reload();
			}
		});
	}

	function editData() {
		let data = {
			'fullname_member': $('#editModal input[name="fullname_member"]').val(),
			'alamat_member': $('#editModal input[name="alamat_member"]').val(),
			'telp_member': $('#editModal input[name="telp_member"]').val(),
			'username_member': $('#editModal input[name="username_member"]').val(),
			'password_member': $('#editModal input[name="password_member"]').val(),
			'status_member': $('#editModal input[name="status_member"]').val(),
		};
		if (data.fullname_member != "" && data.alamat_member != "" && data.telp_member != "" && data.username_member !=
			"" && data.password_member != "" && data.status_member != "") {
			$.ajax({
				url: "<?= base_url('api/admin/tpsupdate') ?>",
				type: 'POST',
				data: data,
				success: function (res) {
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
				headers: {
					contentType: "application/x-www-form-urlencoded; charset=UTF-8"
				},
				url: "<?= base_url('api/admin/member') ?>",
				type: 'DELETE',
				data: {
					'id_member': id,
				},
				success: function (res) {
					alert('berhasil hapus data');
					location.reload();
				}
			});
		} else {
			// location.reload();
			alert("Ok :)");
		}
	}

	$(document).on("click", ".level", function () {
		var clickedBtnID = $(this).attr('data-val'); // or var clickedBtnID = this.id
	});

	$("#logoutBtn").click(function (e) {
		sessionStorage.clear();
		window.location.reload();
	});
</script>