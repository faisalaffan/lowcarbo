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
				<h2>Data DISTRICT</h2>
				<small class="text-danger">&nbsp;*harus mengisi city sebelum mengisi district</small>
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
				<table class="table table-striped table-bordered" id="dataDistrict">
					<thead>
						<tr>
							<th>NAMA KOTA</th>
							<th>DISTRICT NAME</th>
							<th>POSTAL CODE</th>
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
					<label for="exampleInputEmail1">Nama Tps</label>
					<input type="text" class="form-control" id="nama_tps" aria-describedby="nama_tps"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Alamat Tps</label>
					<input type="text" class="form-control" id="alamat_tps" aria-describedby="alamat_tps"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Latitude Tps</label>
					<input type="text" class="form-control" id="lat_tps" aria-describedby="lat_tps"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Longitude Tps</label>
					<input type="text" class="form-control" id="lng_tps" aria-describedby="lng_tps"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Dikelola</label>
					<input type="text" class="form-control" id="nama_tpa" aria-describedby="nama_tpa"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Username Tps</label>
					<input type="text" class="form-control" id="username_tps" aria-describedby="username_tps"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Password Tps</label>
					<input type="text" class="form-control" id="password_tps" aria-describedby="password_tps"
						placeholder="Enter email" disabled>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Gambar Tps</label><br>
					<img src="" alt="" srcset="" id="gambar_tps" height="100vh" class="img-thumbnail">
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
				<input type="hidden" name="id_district" id="id_district">
				<div class="form-group">
					<label for="inputState">City Name</label>
					<select class="selectpicker form-control show-tick" data-live-search="true"
						id="id_city"></select><br>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">District Name</label>
					<input type="text" class="form-control" id="district_name" aria-describedby="district_name"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Postal Code</label>
					<input type="text" class="form-control" id="postal_code" aria-describedby="postal_code"
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
				<input type="hidden" name="id_tps" id="id_tps">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama District</label>
					<input type="text" class="form-control" id="district_name" aria-describedby="district_name"
						placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="inputState">City Name</label>
					<select class="selectpicker form-control show-tick" data-live-search="true"
						id="id_city"></select><br>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Postal Code</label>
					<input type="text" class="form-control" id="postal_code" aria-describedby="postal_code"
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
	axios({
		url: "http://localhost/lowcarbo/api/admin/city",
		method: "GET",
	}).then(function (res) {
		res.data.data.map((val) => {
			$("#modalEdit select#id_city").append(`
					<option data-tokens="${val.city_name}" value="${val.id}">${val.city_name}</option>
				`);
			$("#modalTambah select#id_city").append(`
					<option data-tokens="${val.city_name}" value="${val.id}">${val.city_name}</option>
				`);
		});
	});
	$("#tambahButton").click(function (e) {
		e.preventDefault();
		$("#modalTambah").modal();
	});
	var tpa_url = "<?= base_url('api/admin/tpa') ?>";
	var jenis_sampah_url = "http://localhost/lowcarbo/api/admin/grafik?params=jenis_sampah";
	$(document).ready(function () {
		$table = $("#dataDistrict").DataTable({
			ajax: "http://localhost/lowcarbo/api/admin/district",
			columns: [{
					data: "city_name",
					// render: function (data, type, row) {
					// 	console.log(row);
					// 	if (row.city_name === null) {
					// 		return `<h1 class="text-danger">KOSONG</h1>`
					// 	} else {
					// 		return row.city_name;
					// 	}
					// }
				},
				{
					data: "district_name"
				},
				{
					data: "postal_code"
				},
				{
					data: null,
					defaultContent: `
					<button type="button" class="btn btn-success" id="buttonEdit">
						EDIT
					</button>
					<button type="button" class="btn btn-danger" id="buttonHapus">
						HAPUS
					</button>`
				},
			],
			// language: {
			// 	"decimal": "",
			// 	"emptyTable": "No data available in table",
			// 	"info": "Showing _START_ to _END_ of _TOTAL_ entries",
			// 	"infoEmpty": "Showing 0 to 0 of 0 entries",
			// 	"infoFiltered": "(filtered from _MAX_ total entries)",
			// 	"infoPostFix": "",
			// 	"thousands": ",",
			// 	"lengthMenu": "Show _MENU_ entries",
			// 	"loadingRecords": "Loading...",
			// 	"processing": "Processing...",
			// 	"search": "Search:",
			// 	"zeroRecords": "No matching records found",
			// 	"paginate": {
			// 		"first": "First",
			// 		"last": "Last",
			// 		"next": "Next",
			// 		"previous": "Previous"
			// 	},
			// 	"aria": {
			// 		"sortAscending": ": activate to sort column ascending",
			// 		"sortDescending": ": activate to sort column descending"
			// 	}
			// },
		});

		$('#dataDistrict tbody').on('click', 'td button#buttonEdit', function () {
			var data = $table.row($(this).parents('tr')).data();
			$("#modalEdit").modal();
			id_district = $("#modalEdit input#id_district").val(data.id);
			id_city = $("#modalEdit select#id_city :selected").val(data.id_city);
			district_name = $("#modalEdit input#district_name").val(data.district_name);
			postal_code = $("#modalEdit input#postal_code").val(data.postal_code);
		});

		$('#dataDistrict tbody').on('click', 'td button#buttonHapus', function () {
			var data = $table.row($(this).parents('tr')).data();
			var r = confirm("Apakah anda yakin menghapus data");
			if (r == true) {
				$.ajax({
					url: "http://localhost/lowcarbo/api/admin/district",
					type: "DELETE",
					data: {
						"id_district": data.id
					},
					success: function (res) {
						alert('berhasil hapus district');
						window.location.reload();
					}
				})
			}
		});

		$("#modalEdit #btnSave").click(function (e) {
			e.preventDefault();
			id_district = $("#modalEdit input#id_district").val();
			id_city = $("#modalEdit select#id_city :selected").val();
			district_name = $("#modalEdit input#district_name").val();
			postal_code = $("#modalEdit input#postal_code").val();
			var fd = new FormData();
			fd.append("id_district", id_district);
			fd.append("id_city", id_city);
			fd.append("district_name", district_name);
			fd.append("postal_code", postal_code);
			$.ajax({
				url: "http://localhost/lowcarbo/api/admin/district",
				method: "PUT",
				data: {
					"id_district": $("#modalEdit input#id_district").val(),
					"id_city": $("#modalEdit select#id_city :selected").val(),
					"district_name": $("#modalEdit input#district_name").val(),
					"postal_code": $("#modalEdit input#postal_code").val(),
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
			fd.append("id_city", $("#modalTambah select#id_city :selected").val());
			fd.append("district_name", $("#modalTambah input#district_name").val());
			fd.append("postal_code", $("#modalTambah input#postal_code").val());
			$.ajax({
				url: "http://localhost/lowcarbo/api/admin/district",
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
	});
	$("#logoutBtn").click(function (e) {
		sessionStorage.clear();
		window.location.reload();
		// window.location.href = "<?= base_url('auth') ?>";
	});
</script>