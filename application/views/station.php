<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<style>
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
				<h2>Data STATION</h2>
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
				<table class="table table-striped table-bordered" id="dataStation">
					<thead>
						<tr>
							<th>NAMA STATION</th>
							<th>LAT STATION</th>
							<th>LNG STATION</th>
							<th>OPSI</th>
						</tr>
					</thead>
					<tbody id="isiStation"></tbody>
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
				<div class="form-group">
					<label for="inputState">Nama Tpa</label>
					<select class="selectpicker form-control show-tick" data-live-search="true"
						id="id_tpa"></select><br>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Station</label>
					<input type="text" class="form-control" id="nama_station" aria-describedby="nama_station"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Latitude Station</label>
					<input type="text" class="form-control" id="lat_station" aria-describedby="lat_station"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Longitude Station</label>
					<input type="text" class="form-control" id="lng_station" aria-describedby="lng_station"
						placeholder="Enter email">
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
				<input type="hidden" name="id_tps" id="id_tps">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Station</label>
					<input type="text" class="form-control" id="nama_station" aria-describedby="nama_station"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Milik Tpa</label>
					<input type="text" class="form-control" id="id_tpa" aria-describedby="id_tpa"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Latitude Station</label>
					<input type="text" class="form-control" id="lat_station" aria-describedby="lat_station"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Longitude Station</label>
					<input type="text" class="form-control" id="lng_station" aria-describedby="lng_station"
						placeholder="Enter email" disabled>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
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
				<h4 class="modal-title" id="myModalLabel">Update</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id_station" id="id_station">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Station</label>
					<input type="text" class="form-control" id="nama_station" aria-describedby="nama_station"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="inputState">Milik Tpa</label>
					<select class="selectpicker form-control show-tick" data-live-search="true"
						id="id_tpa"></select><br>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Latitude Station</label>
					<input type="text" class="form-control" id="lat_station" aria-describedby="lat_station"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Longitude Station</label>
					<input type="text" class="form-control" id="lng_station" aria-describedby="lng_station"
						placeholder="Enter email">
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
	var base_url = "<?= base_url('') ?>";
	axios({
		url: base_url + "api/admin/tpa",
		method: "GET",
	}).then(function (res) {
		// console.log(res);
		res.data.data.map((val) => {
			$("#modalEdit select#id_tpa").append(`
					<option data-tokens="${val.nama_tpa}" value="${val.id_tpa}">${val.nama_tpa}</option>
				`);
			$("#modalTambah select#id_tpa").append(`
					<option data-tokens="${val.nama_tpa}" value="${val.id_tpa}">${val.nama_tpa}</option>
				`);
		})
	});
	$("#tambahButton").click(function (e) {
		e.preventDefault();
		$("#modalTambah").modal();
	});
	var tpa_url = "<?= base_url('api/admin/tpa') ?>";
	var jenis_sampah_url = base_url + "api/admin/grafik?params=jenis_sampah";
	$(document).ready(function () {
		$("#dataSampah").DataTable({
			ajax: base_url + "api/admin/sampah",
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
		var $table = $("#dataStation").DataTable({
			"ajax": base_url + "api/admin/station",
			"columns": [{
					data: "nama_station"
				},
				{
					data: "lat_station"
				},
				{
					data: "lng_station"
				},
				{
					data: null,
					defaultContent: `
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
			]
		});
		$('#dataStation tbody').on('click', 'td button#buttonDetail', function () {
			var data = $table.row($(this).parents('tr')).data();
			$("#modalDetail").modal();
			$("#modalDetail input#id_tpa").val(data.nama_tpa);
			$("#modalDetail input#nama_station").val(data.nama_station);
			$("#modalDetail input#lat_station").val(data.lat_station);
			$("#modalDetail input#lng_station").val(data.lng_station);
		});

		$('#dataStation tbody').on('click', 'td button#buttonEdit', function () {
			var data = $table.row($(this).parents('tr')).data();
			$("#modalEdit").modal();
			$("#modalEdit input#id_station").val(data.id_station);
			$("#modalEdit input#id_tpa").val(data.nama_tpa);
			$("#modalEdit input#nama_station").val(data.nama_station);
			$("#modalEdit input#lat_station").val(data.lat_station);
			$("#modalEdit input#lng_station").val(data.lng_station);
		});

		$('#dataStation tbody').on('click', 'td button#buttonHapus', function () {
			var data = $table.row($(this).parents('tr')).data();
			var r = confirm("Apakah anda yakin menghapus data");
			if (r == true) {
				$.ajax({
					url: base_url + "api/admin/station",
					type: "DELETE",
					data: {
						"id_station": data.id_station
					},
					success: function (res) {
						// console.log(res);
						alert('berhasil hapus station');
						window.location.reload();
					}
				})
			}
		});

		$("#modalEdit #btnSave").click(function (e) {
			e.preventDefault();
			var fd = new FormData();
			fd.append("id_tpa", $("#modalTambah select#id_tpa :selected").val());
			fd.append("id_station", $("#modalEdit input#id_station").val());
			fd.append("nama_station", $("#modalEdit input#nama_station").val());
			fd.append("lat_station", $("#modalEdit input#lat_station").val());
			fd.append("lng_station", $("#modalEdit input#lng_station").val());
			$.ajax({
				url: base_url + "api/admin/stationupdate",
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

		$("#modalTambah #btnSave").click(function (e) {
			e.preventDefault();
			var fd = new FormData();
			fd.append("id_tpa", $("#modalTambah select#id_tpa :selected").val());
			fd.append("nama_station", $("#modalTambah input#nama_station").val());
			fd.append("lat_station", $("#modalTambah input#lat_station").val());
			fd.append("lng_station", $("#modalTambah input#lng_station").val());
			$.ajax({
				url: base_url + "api/admin/station",
				method: "POST",
				data: fd,
				cache: false,
				contentType: false,
				processData: false,
				success: function (res) {
					if (res.status == true) {
						alert("Berhasil tambah data");
						window.location.reload();
					}
					window.location.reload();
				}
			});
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