<style>
	.demo-list-three,
	.mdl-list,
	.mdl-list__item,
	.mdl-list__item-text-body {
		color: white !important;
	}

	.mdl-sheet__container {
		position: fixed;
		right: 32px;
		bottom: 32px;
		-webkit-transform: rotate(0deg);
		transform: rotate(0deg);
	}

	.mdl-sheet {
		position: absolute;
		right: 0;
		bottom: 0;
		background: #FF5722;
		width: 60px;
		height: 60px;
		border-radius: 50%;
		cursor: pointer;
		transition: all 180ms;
	}

	.mdl-sheet .mdl-sheet__content {
		display: none;
	}

	.mdl-sheet__icon {
		color: #fff;
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-12px, -12px);
		transform: translate(-12px, -12px);
		font-size: 24px;
		width: 24px;
		height: 24px;
		line-height: 24px;
	}

	.mdl-sheet--opened {
		background: #fff;
		color: #263238;
		border-radius: 2px;
		width: 240px;
		height: auto;
		min-height: 150px;
		max-height: 80vh;
		overflow-y: auto;
	}

	.mdl-sheet--opened .mdl-sheet__icon {
		display: none;
	}

	.mdl-sheet--opened .mdl-sheet__content {
		display: block;
	}

	.btn-edit {
		background-color: #6cc070 !important;
	}

	.btn-hapus {
		background-color: #d9534f !important;
	}

	.mdl-dialog {
		border: none;
		box-shadow: 0 9px 46px 8px rgba(0, 0, 0, 0.14), 0 11px 15px -7px rgba(0, 0, 0, 0.12), 0 24px 38px 3px rgba(0, 0, 0, 0.2);
		width: 280px;
	}

	.mdl-dialog__title {
		padding: 24px 24px 0;
		margin: 0;
		font-size: 2.5rem;
	}

	.mdl-dialog__actions {
		padding: 8px 8px 8px 24px;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-flex-direction: row-reverse;
		-ms-flex-direction: row-reverse;
		flex-direction: row-reverse;
		-webkit-flex-wrap: wrap;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	}

	.mdl-dialog__actions>* {
		margin-right: 8px;
		height: 36px;
	}

	.mdl-dialog__actions>*:first-child {
		margin-right: 0;
	}

	.mdl-dialog__actions--full-width {
		padding: 0 0 8px 0;
	}

	.mdl-dialog__actions--full-width>* {
		height: 48px;
		-webkit-flex: 0 0 100%;
		-ms-flex: 0 0 100%;
		flex: 0 0 100%;
		padding-right: 16px;
		margin-right: 0;
		text-align: right;
	}

	.mdl-dialog__content {
		padding: 20px 24px 24px 24px;
		color: rgba(0, 0, 0, 0.54);
	}

</style>
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
					<span class="mdl-layout-title">Sampah</span>
					<!-- Add spacer, to align navigation to the right -->
					<div class="mdl-layout-spacer"></div>
					<!-- Navigation -->
					<nav class="mdl-navigation">
						<a class="mdl-navigation__link" href="sampah">Sampah</a>
						<a class="mdl-navigation__link" href="tps">Tps</a>
						<a class="mdl-navigation__link" href="tpa">Tpa</a>
						<a class="mdl-navigation__link" href="">Pengguna</a>
					</nav>
				</div>
			</header>
			<div class="mdl-layout__drawer">
				<span class="mdl-layout-title">Sampah</span>
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="">Sampah</a>
					<a class="mdl-navigation__link" href="">Tps</a>
					<a class="mdl-navigation__link" href="">Tpa</a>
					<a class="mdl-navigation__link" href="">Pengguna</a>
				</nav>
			</div>
			<main class="mdl-layout__content">
				<ul class="demo-list-three mdl-list">
					<?php foreach ($sampah as $s ) : ?>
					<li class="mdl-list__item mdl-list__item--three-line">
						<span class="mdl-list__item-primary-content">
							<i class="material-icons mdl-list__item-avatar">person</i>
							<span><?= $s['title'] ?> - <?= $s['nama_jenis_sampah'] ?></span>
							<span class="mdl-list__item-text-body">
								<?= $s['waktu_ditambahkan'] ?>
							</span>
						</span>
						<!-- <span class="mdl-list__item-secondary-content">
						<a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">star</i></a>
					</span> -->
						<button
							class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored btn-edit">
							<i class="material-icons">edit</i>
						</button> &nbsp;&nbsp;&nbsp;
						<button
							class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored btn-hapus">
							<i class="material-icons">delete</i>
						</button>
					</li>
					<?php endforeach; ?>
				</ul>
				<div class="mdl-sheet__container">
					<div class="mdl-sheet mdl-shadow--2dp">
						<i class="material-icons mdl-sheet__icon">add</i>

						<div class="mdl-sheet__content">
							<div class="mdl-list">
								<div class="mdl-list__item">
									<span class="mdl-list__item-primary-content">
										<i class="material-icons mdl-list__item-avatar">person</i>
										<span>Bryan Cranston</span>
									</span>
									<a class="mdl-list__item-secondary-action" href="#"><i
											class="material-icons">add</i></a>
								</div>
								<div class="mdl-list__item">
									<span class="mdl-list__item-primary-content">
										<i class="material-icons mdl-list__item-avatar">person</i>
										<span>Aaron Paul</span>
									</span>
									<a class="mdl-list__item-secondary-action" href="#"><i
											class="material-icons">add</i></a>
								</div>
								<div class="mdl-list__item">
									<span class="mdl-list__item-primary-content">
										<i class="material-icons mdl-list__item-avatar">person</i>
										<span>Bob Odenkirk</span>
									</span>
									<span class="mdl-list__item-secondary-content">
										<a class="mdl-list__item-secondary-action" href="#"><i
												class="material-icons">star</i></a>
									</span>
								</div>
							</div>
						</div>
					</div>
			</main>
		</div>
	</div>
	<dialog id="dialog" class="mdl-dialog">
		<h3 class="mdl-dialog__title">MDL Dialog</h3>
		<div class="mdl-dialog__content">
			<p>
				This is an example of the Material Design Lite dialog component.
				Please use responsibly.
			</p>
		</div>
		<div class="mdl-dialog__actions">
			<button type="button" class="mdl-button">Close</button>
			<button type="button" class="mdl-button" disabled>Disabled action</button>
		</div>
	</dialog>

	<script>
		var dialogButton = document.querySelector('.dialog-button');
		var dialog = document.querySelector('#dialog');
		if (!dialog.showModal) {
			dialogPolyfill.registerDialog(dialog);
		}
		dialogButton.addEventListener('click', function () {
			dialog.showModal();
		});
		dialog.querySelector('button:not([disabled])')
			.addEventListener('click', function () {
				dialog.close();
			});

	</script>
