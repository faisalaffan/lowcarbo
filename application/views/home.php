<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
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
				<table id="dataSampah" class="display">
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
<!-- /page content -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.2.1/echarts.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
	var tpa_url = "<?= base_url('api/admin/tpa') ?>";
	var jenis_sampah_url = "http://localhost/lowcarbo/api/admin/grafik?params=jenis_sampah";
	$(document).ready(function () {
		$.ajax({
			url: "http://localhost/lowcarbo/api/admin/sampah",
			method: "GET",
			success: function (res) {
				res.data.map((val) => {
					// console.log(val);
					$("#isiTable").append(`
						<tr>
							<td>${val.title}</td>
							<td>${val.berat}</td>
							<td>${val.nama_tps}</td>
							<td>${val.district_id}</td>
							<td>${val.nama_jenis_sampah}</td>
						</tr>
					`);
				});
			}
		})
		$("#dataSampah").DataTable();

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
</script>