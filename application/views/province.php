<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<style>
	th.dt-center,
	td.dt-center {
		text-align: center;
	}

	* {
		padding: 0;
		margin: 0;
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

	a:link {
		/* Applies to all unvisited links */
		text-decoration: none;
	}

	a:visited {
		/* Applies to all visited links */
		text-decoration: none;
		color: white;
	}

	a:hover {
		/* Applies to links under the pointer */
		text-decoration: none;
	}

	a:active {
		/* Applies to activated links */
		text-decoration: none;
	}
</style>
<br />
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data PROVINCE</h2>
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
				<table class="table table-striped table-bordered" id="dataProvince">
					<thead>
						<tr>
							<th>PROVINCE NAME</th>
							<th>LAT PROVINCE</th>
							<th>LNG PROVINCE</th>
							<th class="text-center">OPSI</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
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
					<label for="exampleInputEmail1">Province Name</label>
					<input type="text" class="form-control" id="province_name" aria-describedby="province_name"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Lat Province</label>
					<input type="text" class="form-control" id="lat_province" aria-describedby="lat_province"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Lng Province</label>
					<input type="text" class="form-control" id="lng_province" aria-describedby="lng_province"
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
				<h4 class="modal-title" id="myModalLabel">Edit</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="province_id" id="province_id">
				<div class="form-group">
					<label for="exampleInputEmail1">Province Name</label>
					<input type="text" class="form-control" id="province_name" aria-describedby="province_name"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Lat Province</label>
					<input type="text" class="form-control" id="lat_province" aria-describedby="lat_province"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Lng Province</label>
					<input type="text" class="form-control" id="lng_province" aria-describedby="lng_province"
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
					<label for="exampleInputEmail1">Province Name</label>
					<input type="text" class="form-control" id="province_name" aria-describedby="province_name"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Latitude Province</label>
					<input type="text" class="form-control" id="lat" aria-describedby="lat" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Longitude Province</label>
					<input type="text" class="form-control" id="lng" aria-describedby="lng" placeholder="Enter email">
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
	$("#tambahButton").click(function (e) {
		e.preventDefault();
		$("#modalTambah").modal();
	});
	var tpa_url = "<?= base_url('api/admin/tpa') ?>";
	var jenis_sampah_url = "http://localhost/lowcarbo/api/admin/grafik?params=jenis_sampah";
	$(document).ready(function () {
		$table = $("#dataProvince").DataTable({
			ajax: "http://localhost/lowcarbo/api/admin/province",
			columns: [{
					data: "province_name"
				},
				{
					data: "lat"
				},
				{
					data: "lng"
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
			]
		});
		$('#dataProvince tbody').on('click', 'td button#buttonDetail', function () {
			var data = $table.row($(this).parents('tr')).data();
			$("#modalDetail").modal();
			$("#modalDetail input#province_name").val(data.province_name);
			$("#modalDetail input#lat_province").val(data.lat);
			$("#modalDetail input#lng_province").val(data.lng);
		});

		$('#dataProvince tbody').on('click', 'td button#buttonEdit', function () {
			var data = $table.row($(this).parents('tr')).data();
			$("#modalEdit").modal();
			$("#modalEdit input#province_id").val(data.id);
			$("#modalEdit input#province_name").val(data.province_name);
			$("#modalEdit input#lat_province").val(data.lat);
			$("#modalEdit input#lng_province").val(data.lng);
		});

		$('#dataProvince tbody').on('click', 'td button#buttonHapus', function () {
			var data = $table.row($(this).parents('tr')).data();
			var r = confirm("Apakah anda yakin menghapus data");
			if (r == true) {
				$.ajax({
					url: "http://localhost/lowcarbo/api/admin/province",
					type: "DELETE",
					data: {
						"id_province": data.id
					},
					success: function (res) {
						alert('berhasil hapus tps');
						window.location.reload();
					}
				})
			}
		});

		$("#modalEdit #btnSave").click(function (e) {
			e.preventDefault();
			$.ajax({
				url: "http://localhost/lowcarbo/api/admin/province",
				method: "PUT",
				data: {
					"id_province": $("#modalEdit input#province_id").val(),
					"province_name": $("#modalEdit input#province_name").val(),
					"lat": $("#modalEdit input#lat_province").val(),
					"lng": $("#modalEdit input#lng_province").val(),
				},
				success: function (res) {
					if (res.status == true) {
						alert("Berhasil tambah data");
						window.location.reload();
					}
					window.location.reload();
				}
			});
		});

		$("#modalTambah #btnSave").click(function (e) {
			e.preventDefault();
			var fd = new FormData();
			fd.append("province_name", $("#modalTambah input#province_name").val());
			fd.append("lat", $("#modalTambah input#lat").val());
			fd.append("lng", $("#modalTambah input#lng").val());
			$.ajax({
				url: "http://localhost/lowcarbo/api/admin/province",
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