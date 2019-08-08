<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<style>
	th.dt-center,
	td.dt-center {
		text-align: center;
	}

	.float {
		position: fixed;
		width: 60px;
		height: 60px;
		bottom: 40px;
		right: 40px;
		background-color: #0C9;
		color: #FFF;
		border-radius: 50px;
		text-align: center;
		box-shadow: 2px 2px 3px #999;
		font-size: 18px;
		text-decoration: none !important;
		z-index: 100 !important;
	}

	.my-float {
		margin-top: 22px;
	}

	#map {
		height: 80vh !important;
		width: 100% !important;
		overflow: hidden !important;
		float: left;
		border: thin solid #333;
	}
</style>
<br />
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-6">
		<div class="x_panel">
			<div class="x_title">
				<h2>Grafik Pengumpulan Sampah</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
							aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a>
							</li>
							<li><a href="#">Settings 2</a>
							</li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="pieChart" style="height:50vh;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-6">
		<div class="x_panel">
			<div class="x_title">
				<h2>Table Sampah</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
							aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a>
							</li>
							<li><a href="#">Settings 2</a>
							</li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!-- <div class="x_content"> -->
			<table id="dataSampah" class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>Title</td>
						<td>Berat</td>
						<td>Ada Di Tps</td>
						<td>District</td>
						<td>Jenis Sampah</td>
					</tr>
				</thead>
				<tbody id="isiTable"></tbody>
			</table>
			<!-- </div> -->
		</div>
	</div>
</div>
<br />
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>MAPS TPA</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
							aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a>
							</li>
							<li><a href="#">Settings 2</a>
							</li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="map"></div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data TPA</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
							aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a>
							</li>
							<li><a href="#">Settings 2</a>
							</li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-striped table-bordered" id="dataTpa">
					<thead>
						<tr>
							<th>NAMA TPA</th>
							<th>ALAMAT TPA</th>
							<th>NO ALAMAT</th>
							<th>RT</th>
							<th>RW</th>
							<th>KOTA</th>
							<th>STATUS</th>
							<th>OPSI</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalTambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id_tpa" id="id_tpa">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Tpa</label>
					<input type="text" class="form-control" id="nama_tpa" aria-describedby="nama_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Alamat Tpa</label>
					<input type="text" class="form-control" id="alamat_tpa" aria-describedby="alamat_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">No Alamat</label>
					<input type="text" class="form-control" id="no_alamat" aria-describedby="no_alamat"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">RT</label>
					<input type="text" class="form-control" id="rt" aria-describedby="rt" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">RW</label>
					<input type="text" class="form-control" id="rw" aria-describedby="rw" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Latitude Tpa</label>
					<input type="text" class="form-control" id="lat_tpa" aria-describedby="lat_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Longitude Tpa</label>
					<input type="text" class="form-control" id="lng_tpa" aria-describedby="lng_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="inputState">District</label>
					<select class="selectpicker form-control show-tick" data-live-search="true"
						id="district_id"></select><br>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Username Tpa</label>
					<input type="text" class="form-control" id="username_tpa" aria-describedby="username_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Password Tpa</label>
					<input type="text" class="form-control" id="password_tpa" aria-describedby="password_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Gambar Tpa</label><br>
					<input type="file" name="tpa_gambar" id="tpa_gambar">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnSave">Save changes</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalDetail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Detail</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id_tpa" id="id_tpa">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Tpa</label>
					<input type="text" class="form-control" id="nama_tpa" aria-describedby="nama_tpa"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Alamat Tpa</label>
					<input type="text" class="form-control" id="alamat_tpa" aria-describedby="alamat_tpa"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">No Alamat</label>
					<input type="text" class="form-control" id="no_alamat" aria-describedby="no_alamat"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">RT</label>
					<input type="text" class="form-control" id="rt" aria-describedby="rt" placeholder="Enter email"
						disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">RW</label>
					<input type="text" class="form-control" id="rw" aria-describedby="rw" placeholder="Enter email"
						disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Latitude Tpa</label>
					<input type="text" class="form-control" id="lat_tpa" aria-describedby="lat_tpa"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Longitude Tpa</label>
					<input type="text" class="form-control" id="lng_tpa" aria-describedby="lng_tpa"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">District</label>
					<input type="text" class="form-control" id="district_id" aria-describedby="district_id"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Username Tpa</label>
					<input type="text" class="form-control" id="username_tpa" aria-describedby="username_tpa"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Password Tpa</label>
					<input type="text" class="form-control" id="password_tpa" aria-describedby="password_tpa"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Daftar Station</label>
					<a href="" type="button" class="form-control btn btn-primary" id="link_station">LIHAT STATION</a>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Gambar Tpa</label><br>
					<img src="" alt="" srcset="" id="tpa_gambar" height="100vh" class="img-thumbnail">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Edit</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id_tpa" id="id_tpa">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Tpa</label>
					<input type="text" class="form-control" id="nama_tpa" aria-describedby="nama_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Alamat Tpa</label>
					<input type="text" class="form-control" id="alamat_tpa" aria-describedby="alamat_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">No Alamat</label>
					<input type="text" class="form-control" id="no_alamat" aria-describedby="no_alamat"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">RT</label>
					<input type="text" class="form-control" id="rt" aria-describedby="rt" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">RW</label>
					<input type="text" class="form-control" id="rw" aria-describedby="rw" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Latitude Tpa</label>
					<input type="text" class="form-control" id="lat_tpa" aria-describedby="lat_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Longitude Tpa</label>
					<input type="text" class="form-control" id="lng_tpa" aria-describedby="lng_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="inputState">District</label>
					<select class="selectpicker form-control show-tick" data-live-search="true"
						id="district_id"></select><br>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Username Tpa</label>
					<input type="text" class="form-control" id="username_tpa" aria-describedby="username_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Password Tpa</label>
					<input type="text" class="form-control" id="password_tpa" aria-describedby="password_tpa"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Gambar Tpa</label><br>
					<img src="" alt="" srcset="" id="gambar_tpa" height="100vh" class="img-thumbnail">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Gambar Tps</label><br>
					<input type="file" name="tpa_gambar" id="tpa_gambar">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnSave">Save changes</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalKml">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="modalKmlLabel">Edit</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id_tpa" id="id_tpa">
				<div class="form-group">
					<label for="exampleInputEmail1">Kml File</label><br>
					<input type="file" name="kml_file" id="kml_file">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnSave">Save changes</button>
			</div>
		</div>
	</div>
</div>
<a href="" class="float" id="tambahButton">
	<i class="fa fa-plus my-float"></i>
</a>

<!-- /page content -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.2.1/echarts.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script>
	axios({
		url: "http://localhost/lowcarbo/api/admin/district",
		method: "GET",
	}).then(function (res) {
		// console.log(res);
		res.data.data.map((val) => {
			$("#modalEdit select#district_id").append(`
					<option data-tokens="${val.district_name}" value="${val.id}">${val.district_name}</option>
				`);
			$("#modalTambah select#district_id").append(`
					<option data-tokens="${val.district_name}" value="${val.id}">${val.district_name}</option>
				`);
		})
	});
	$("#tambahButton").click(function (e) {
		e.preventDefault();
		$("#modalTambah").modal();
	});
	$("#modalTambah #btnSave").click(function (e) {
		e.preventDefault();
		var fd = new FormData();
		fd.append("nama_tpa", $("#modalTambah #nama_tpa").val());
		fd.append("alamat_tpa", $("#modalTambah #alamat_tpa").val());
		fd.append("no_alamat", $("#modalTambah #no_alamat").val());
		fd.append("rt", $("#modalTambah #rt").val());
		fd.append("rw", $("#modalTambah #rw").val());
		fd.append("district_id", $("#modalTambah #district_id").val());
		fd.append("lat_tpa", $("#modalTambah #lat_tpa").val());
		fd.append("lng_tpa", $("#modalTambah #lng_tpa").val());
		fd.append("gambar_tpa", $("#modalTambah #tpa_gambar")[0].files[0]);
		fd.append("username_tpa", $("#modalTambah #username_tpa").val());
		fd.append("password_tpa", $("#modalTambah #password_tpa").val());
		axios({
			url: "http://localhost/lowcarbo/api/admin/tpa",
			method: "POST",
			data: fd
		}).then(function (res) {
			window.location.reload();
		}).catch(function (err) {
			window.location.reload();
		});
	})
	var tpa_url = "<?= base_url('api/admin/tpa') ?>";
	var jenis_sampah_url = "http://localhost/lowcarbo/api/admin/grafik?params=jenis_sampah";
	$(document).ready(function () {
		var $table = $("#dataTpa").DataTable({
			// processing: true,
			// serverSide: true,
			responsive: true,
			ajax: "http://localhost/lowcarbo/api/admin/tpa",
			columns: [{
					data: "nama_tpa"
				},
				{
					data: "alamat_tpa"
				},
				{
					data: "no_alamat"
				},
				{
					data: "rt"
				},
				{
					data: "rw"
				},
				{
					data: "district_id"
				},
				{
					data: null,
					defaultContent: `
						<span class="btn btn-round btn-success">AMAN</span>
					`
				},
				{
					data: null,
					defaultContent: `
					<button type="button" class="btn btn-warning" id="buttonUploadKml">
						UPLOAD KML
					</button> 
					<button type="button" class="btn btn-primary" id="buttonDetail">
						DETAIL
					</button> 
					<button type="button" class="btn btn-success" id="buttonEdit">
						EDIT
					</button>
					<button type="button" class="btn btn-danger" id="buttonHapus">
						HAPUS
					</button>`
				},
			],
			"columnDefs": [{
					className: "dt-center",
					"targets": "_all"
				},
				{
					className: "dt-center",
					"targets": "_all"
				},
				{
					className: "dt-center",
					"targets": "_all"
				},
				{
					className: "dt-center",
					"targets": "_all"
				},
				{
					className: "dt-center",
					"targets": "_all"
				},
				{
					className: "dt-center",
					"targets": "_all"
				},
				{
					className: "dt-center",
					"targets": "_all"
				},
				{
					className: "dt-center",
					"targets": "_all"
				},
			]
		});

		// UPLOAD KML BUTTON
		$('#dataTpa tbody').on('click', 'td button#buttonUploadKml', function () {
			var data = $table.row($(this).parents('tr')).data();
			console.log(data.kml_file);
			if (data.kml_file == null) {
				$("#modalKml").modal();
				id_tpa = $("#modalKml input#id_tpa").val(data.id_tpa);
				label = $("#modalKml #modalKmlLabel").text("UPLOAD KML " + data.nama_tpa);
			} else {
				r = confirm("data kml " + data.nama_tpa +
					" sudah ada. apakah anda ingin mengubah data kml terbaru ?");
				if (r == true) {
					$("#modalKml").modal();
					id_tpa = $("#modalKml input#id_tpa").val(data.id_tpa);
					label = $("#modalKml #modalKmlLabel").text("UPLOAD KML " + data.nama_tpa);
				} else {
					alert("Data Anda Masih Yang lama :)");
				}
			}
		});

		$("#modalKml #btnSave").click(function (e) {
			e.preventDefault();
			id_tpa = $("#modalKml input#id_tpa").val();
			kml_file = $("#modalKml #kml_file")[0].files[0];
			fd = new FormData();
			fd.append("id_tpa", id_tpa);
			fd.append("kml_file", kml_file);
			$.ajax({
				url: "http://localhost/lowcarbo/api/admin/tpakml",
				method: "POST",
				data: fd,
				cache: false,
				contentType: false,
				processData: false,
				success: function (res) {
					console.log(res);
					window.location.reload()
				}
			});
		});

		// DETAIL BUTTON
		$('#dataTpa tbody').on('click', 'td button#buttonDetail', function () {
			var data = $table.row($(this).parents('tr')).data();
			console.log(data);
			$("#modalDetail").modal();
			$("#modalDetail input#nama_tpa").val(data.nama_tpa);
			$("#modalDetail input#alamat_tpa").val(data.alamat_tpa);
			$("#modalDetail input#no_alamat").val(data.no_alamat);
			$("#modalDetail input#rt").val(data.rt);
			$("#modalDetail input#rw").val(data.rw);
			$("#modalDetail input#lat_tpa").val(data.lat_tpa);
			$("#modalDetail input#lng_tpa").val(data.lng_tpa);
			$("#modalDetail input#district_id").val(data.district_name);
			$("#modalDetail input#username_tpa").val(data.username_tpa);
			$("#modalDetail input#password_tpa").val(data.password_tpa);
			$("#modalDetail img#tpa_gambar").attr("src", "<?= base_url('assets/') ?>" + data.gambar_tpa);
			$("#modalDetail a#link_station").attr("href", "<?= base_url('tpa/station/') ?>" + data.id_tpa);
		});

		// HAPUS BUTTON
		$('#dataTpa tbody').on('click', 'td button#buttonHapus', function () {
			var data = $table.row($(this).parents('tr')).data();
			var r = confirm("Apakah anda yakin menghapus data");
			if (r == true) {
				$.ajax({
					url: "http://localhost/lowcarbo/api/admin/tpa",
					type: "DELETE",
					data: {
						"id_tpa": data.id_tpa
					},
					success: function (res) {
						console.log(res);
						alert('berhasil hapus tpa');
						window.location.reload();
					}
				})
			}
		});

		// EDIT BUTTON
		$('#dataTpa tbody').on('click', 'td button#buttonEdit', function () {
			var data = $table.row($(this).parents('tr')).data();
			$("#modalEdit").modal();
			id_tpa = $("#modalEdit input#id_tpa").val(data.id_tpa);
			nama_tpa = $("#modalEdit input#nama_tpa").val(data.nama_tpa);
			alamat_tpa = $("#modalEdit input#alamat_tpa").val(data.alamat_tpa);
			no_alamat = $("#modalEdit input#no_alamat").val(data.no_alamat);
			rt = $("#modalEdit input#rt").val(data.rt);
			rw = $("#modalEdit input#rw").val(data.rw);
			lat_tpa = $("#modalEdit input#lat_tpa").val(data.lat_tpa);
			lng_tpa = $("#modalEdit input#lng_tpa").val(data.lng_tpa);
			district = $("#modalEdit input#district_id").val(data.district_name);
			username_tpa = $("#modalEdit input#username_tpa").val(data.username_tpa);
			password_tpa = $("#modalEdit input#password_tpa").val(data.password_tpa);
			gambar_tpa = $("#modalEdit img#gambar_tpa").attr("src", "<?= base_url('assets/') ?>" + data
				.gambar_tpa);
		});

		$("#modalEdit #btnSave").click(function (e) {
			e.preventDefault();
			// id_tps = $("#modalEdit input#id_tps").val();
			// nama_tps = $("#modalEdit input#nama_tps").val();
			// id_tpa = $("select#id_tpa :selected").val();
			// alamat_tps = $("#modalEdit input#alamat_tps").val();
			// lat_tps = $("#modalEdit input#lat_tps").val();
			// lng_tps = $("#modalEdit input#lng_tps").val();
			// username_tps = $("#modalEdit input#username_tps").val();
			// password_tps = $("#modalEdit input#password_tps").val();
			// gambar_tps = $("#modalEdit input#tps_gambar")[0].files[0];
			// console.log(id_tps);
			// console.log(nama_tps);
			// console.log(id_tpa);
			// console.log(alamat_tps);
			// console.log(lat_tps);
			// console.log(lng_tps);
			// console.log(username_tps);
			// console.log(password_tps);
			// console.log(gambar_tps);
			var fd = new FormData();
			fd.append("id_tpa", $("#modalEdit #id_tpa").val());
			fd.append("nama_tpa", $("#modalEdit #nama_tpa").val());
			fd.append("alamat_tpa", $("#modalEdit #alamat_tpa").val());
			fd.append("no_alamat", $("#modalEdit #no_alamat").val());
			fd.append("rt", $("#modalEdit #rt").val());
			fd.append("rw", $("#modalEdit #rw").val());
			fd.append("district_id", $("#modalEdit select#district_id :selected").val());
			fd.append("lat_tpa", $("#modalEdit #lat_tpa").val());
			fd.append("lng_tpa", $("#modalEdit #lng_tpa").val());
			fd.append("gambar_tpa", $("#modalEdit #tpa_gambar")[0].files[0]);
			fd.append("username_tpa", $("#modalEdit #username_tpa").val());
			fd.append("password_tpa", $("#modalEdit #password_tpa").val());
			$.ajax({
				url: "http://localhost/lowcarbo/api/admin/tpaupdate",
				method: "POST",
				data: fd,
				cache: false,
				contentType: false,
				processData: false,
				success: function (res) {
					if (res.status == true) {
						alert("Berhasil update data");
						window.location.reload();
					}
					window.location.reload();
				}
			});
		});

		$("#dataSampah").DataTable({
			ajax: "http://localhost/lowcarbo/api/admin/sampah",
			columns: [{
					data: "title"
				},
				{
					data: "berat"
				},
				{
					data: "tertampung"
				},
				{
					data: "district_id"
				},
				{
					data: "nama_jenis_sampah"
				},
			]
		});

		// jenis sampah
		$.ajax({
			url: jenis_sampah_url,
			method: "GET",
			success: function (res) {
				if (res.status == true) {
					data = [];
					res.data.map(function (val) {
						// console.log(val);
						obj = {};
						obj["value"] = val.count_jenis_sampah;
						obj["name"] = val.nama_jenis_sampah;
						data.push(obj);
					});
					var m = echarts.init(document.getElementById("pieChart"));
					m.setOption({
						title: {
							text: "PENGUMPULAN",
							left: 'center',
							top: 20,
							textStyle: {
								color: '#2c343c'
							}
						},

						tooltip: {
							trigger: 'item',
							formatter: "{a} <br/>{b} : {c} ({d}%) <br/>"
						},

						visualMap: {
							show: false,
							min: 0,
							max: 4,
							inRange: {
								colorLightness: [0, 1]
							}
						},
						series: [{
							name: "",
							type: 'pie',
							radius: '55%',
							center: ['50%', '50%'],
							data: data.sort(function (a, b) {
								return a.value - b.value;
							}),
							roseType: 'radius',
							label: {
								normal: {
									textStyle: {
										color: 'rgba(255, 255, 255, 0.3)'
									}
								}
							},
							labelLine: {
								normal: {
									lineStyle: {
										color: 'rgba(255, 255, 255, 0.3)'
									},
									smooth: 0.2,
									length: 10,
									length2: 20
								}
							},
							itemStyle: {
								normal: {
									color: '#c23531',
									shadowBlur: 0,
									shadowColor: 'rgba(0, 0, 0, 0.5)'
								}
							},

							animationType: 'scale',
							animationEasing: 'elasticOut',
							animationDelay: function (idx) {
								return Math.random() * 200;
							}
						}]
					});
				}
			}
		});
	});
	$("#logoutBtn").click(function (e) {
		sessionStorage.clear();
		window.location.reload();
		// window.location.href = "<?= base_url('auth') ?>";
	});
</script>
<script>
	function initMap() {
		var myLatLng = {
			lat: -7.24917,
			lng: 112.75083
		};

		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 4,
			center: myLatLng
		});

		$.ajax({
			url: "http://localhost/lowcarbo/api/admin/tpa",
			method: "GET",
			success: function (res) {
				// console.log(res);
				res.data.map(function (val) {
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(val.lat_tpa, val.lng_tpa),
						map: map,
						title: val.nama_tpa
					});
					addInfoWindow(marker, val);
				});
			}
		})


		marker.addListener('click', function () {
			infowindow.open(map, marker);
		});
	}

	function addInfoWindow(marker, data) {

		console.log(data);

		// var message = '<div id="content">' +
		// 	'<div id="siteNotice">' +
		// 	'</div>' +
		// 	'<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
		// 	'<div id="bodyContent">' +
		// 	'<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
		// 	'sandstone rock formation in the southern part of the ' +
		// 	'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) ' +
		// 	'south west of the nearest large town, Alice Springs; 450&#160;km ' +
		// 	'(280&#160;mi) by road. Kata Tjuta and Uluru are the two major ' +
		// 	'features of the Uluru - Kata Tjuta National Park. Uluru is ' +
		// 	'sacred to the Pitjantjatjara and Yankunytjatjara, the ' +
		// 	'Aboriginal people of the area. It has many springs, waterholes, ' +
		// 	'rock caves and ancient paintings. Uluru is listed as a World ' +
		// 	'Heritage Site.</p>' +
		// 	'<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
		// 	'https://en.wikipedia.org/w/index.php?title=Uluru</a> ' +
		// 	'(last visited June 22, 2009).</p>' +
		// 	'</div>' +
		// 	'</div>';

		var message = `
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Tpa</label>
					<input type="text" class="form-control" id="nama_tpa" aria-describedby="nama_tpa"
						placeholder="Enter email" value="${data.nama_tpa}" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Alamat Tpa</label>
					<input type="text" class="form-control" id="alamat_tpa" aria-describedby="alamat_tpa"
						placeholder="Enter email" value="${data.alamat_tpa}" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">RT</label>
					<input type="text" class="form-control" id="rt" aria-describedby="rt" placeholder="Enter email"
						value="${data.rt}" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">RW</label>
					<input type="text" class="form-control" id="rw" aria-describedby="rw" placeholder="Enter email"
					value="${data.rw}" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">District</label>
					<input type="text" class="form-control" id="district_id" aria-describedby="district_id"
						placeholder="Enter email" value="${data.district_name}" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Daftar Station</label>
					<a href="<?= base_url('tpa/station/') ?>${data.id_tpa}" type="button" class="form-control btn btn-primary" id="link_station">LIHAT STATION</a>
				</div>
		`;

		var infoWindow = new google.maps.InfoWindow({
			content: message
		});

		google.maps.event.addListener(marker, 'click', function () {
			infoWindow.open(map, marker);
		});
	}
</script>
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQm6Y1NjB8PLn8piM5CVz5B_XBxE98aHM&callback=initMap">
</script>