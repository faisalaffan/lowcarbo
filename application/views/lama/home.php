</head>
<body>
<!-- loader -->
<div class="mdl-spinner mdl-js-spinner is-active" id="spinner"></div>
<!-- content -->
<div id="content">
	<div class="demo-layout-transparent mdl-layout mdl-js-layout">
		<header class="mdl-layout__header mdl-layout__header--transparent">
			<div class="mdl-layout__header-row">
				<!-- Title -->
				<span class="mdl-layout-title">Dashboard</span>
				<!-- Add spacer, to align navigation to the right -->
				<div class="mdl-layout-spacer"></div>
				<!-- Navigation -->
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="">Sampah</a>
					<a class="mdl-navigation__link" href="">Tps</a>
					<a class="mdl-navigation__link" href="">Tpa</a>
					<a class="mdl-navigation__link" href="">Pengguna</a>
				</nav>
			</div>
		</header>
		<div class="mdl-layout__drawer">
			<span class="mdl-layout-title">Dashboard</span>
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="">Sampah</a>
				<a class="mdl-navigation__link" href="">Tps</a>
				<a class="mdl-navigation__link" href="">Tpa</a>
				<a class="mdl-navigation__link" href="">Pengguna</a>
			</nav>
		</div>
		<main class="mdl-layout__content">
			<div class="cards-list">
				<div class="card 1" onclick="navigate('sampah')">
					<div class="card_image"> <img src="https://media.giphy.com/media/26tn6t51nYZDwNIqI/giphy.gif" />
					</div>
					<div class="card_title title-white">
						<p>LAPORAN SAMPAH</p>
					</div>
				</div>
				<div class="card 2" onclick="navigate('tps')">
					<div class="card_image">
						<img src="https://media.giphy.com/media/4ad4jcX9odVZmo1Fcj/giphy.gif" />
					</div>
					<div class="card_title title-white">
						<p>DATA TPS</p>
					</div>
				</div>
				<div class="card 3" onclick="navigate('tpa')">
					<div class="card_image">
						<img src="https://media.giphy.com/media/10SvWCbt1ytWCc/giphy.gif" />
					</div>
					<div class="card_title title-white">
						<p>DATA TPA</p>
					</div>
				</div>
				<div class="card 4" onclick="navigate('user')">
					<div class="card_image">
						<img src="https://media.giphy.com/media/LwIyvaNcnzsD6/giphy.gif" />
					</div>
					<div class="card_title title-white">
						<p>DATA PENGGUNA</p>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
