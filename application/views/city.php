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
				<h2>Data CITY</h2>
				<small class="text-danger">&nbsp;*harus mengisi province sebelum mengisi city</small>
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
				<table class="table table-striped table-bordered" id="dataCity">
					<thead>
						<tr>
							<th>PROVINCE NAME</th>
							<th>CITY NAME</th>
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
				<div class="form-group">
					<label for="exampleInputEmail1">City Name</label>
					<input type="text" class="form-control" id="city_name" aria-describedby="city_name"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Province Name</label>
					<input type="text" class="form-control" id="province_name" aria-describedby="province_name"
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
				<input type="hidden" name="id_city" id="id_city">
				<div class="form-group">
					<label for="inputState">Nama Province</label>
					<select class="selectpicker form-control show-tick" data-live-search="true"
						id="province_id"></select><br>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">City Name</label>
					<input type="text" class="form-control" id="city_name" aria-describedby="city_name"
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
					<label for="inputState">Province Name</label>
					<select class="selectpicker form-control show-tick" data-live-search="true"
						id="province_id"></select><br>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">City Name</label>
					<input type="text" class="form-control" id="city_name" aria-describedby="city_name"
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
	console.log(base_url);
	axios({
		url: base_url + "api/admin/province",
		method: "GET",
	}).then(function (res) {
		console.log(res);
		res.data.data.map((val) => {
			$("#modalEdit select#province_id").append(`
					<option data-tokens="${val.province_name}" value="${val.id}">${val.province_name}</option>
				`);
			$("#modalTambah select#province_id").append(`
					<option data-tokens="${val.province_name}" value="${val.id}">${val.province_name}</option>
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
		$table = $("#dataCity").DataTable({
			ajax: base_url + "/api/admin/city",
			columns: [
				{
					data: "province_name"
				},
				{
					data: "city_name"
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
		$('#dataCity tbody').on('click', 'td button#buttonDetail', function () {
			var data = $table.row($(this).parents('tr')).data();
			$("#modalDetail").modal();
			$("#modalDetail input#city_name").val(data.city_name);
			$("#modalDetail input#province_name").val(data.province_name);
		});

		$('#dataCity tbody').on('click', 'td button#buttonEdit', function () {
			var data = $table.row($(this).parents('tr')).data();
			$("#modalEdit").modal();
			id_city = $("#modalEdit input#id_city").val(data.id);
			city_name = $("#modalEdit input#city_name").val(data.city_name);
		});

		$('#dataCity tbody').on('click', 'td button#buttonHapus', function () {
			var data = $table.row($(this).parents('tr')).data();
			var r = confirm("Apakah anda yakin menghapus data");
			if (r == true) {
				$.ajax({
					url: base_url + "api/admin/city",
					type: "DELETE",
					data: {
						"id_city": data.id
					},
					success: function (res) {
						console.log(res);
						alert('berhasil hapus city');
						window.location.reload();
					}
				})
			}
		});

		$("#modalEdit #btnSave").click(function (e) {
			e.preventDefault();
			$.ajax({
				url: base_url + "api/admin/city",
				method: "PUT",
				data: {
					"id_city" : $("#modalEdit input#id_city").val(),
					"province_id" : $("#modalEdit select#province_id :selected").val(),
					"city_name" : $("#modalEdit input#city_name").val(),
				},
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
			fd.append("province_id", $("#modalTambah select#province_id :selected").val());
			fd.append("city_name", $("#modalTambah input#city_name").val());
			$.ajax({
				url: base_url + "api/admin/city",
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