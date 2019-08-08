


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>LOWCARBON</title>
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style>
		/* header */
		.demo-layout-transparent {
			background: url('https://getmdl.io/assets/demos/transparent.jpg') center / cover;
			background-repeat: no-repeat;
		}

		.cards-list {
			margin-top: 10% !important;
			z-index: 0;
			width: 100%;
			display: flex;
			justify-content: space-around;
			flex-wrap: wrap;
		}

		.card {
			margin: 30px auto;
			width: 300px;
			height: 300px;
			border-radius: 40px;
			box-shadow: 5px 5px 30px 7px rgba(0, 0, 0, 0.25), -5px -5px 30px 7px rgba(0, 0, 0, 0.22);
			cursor: pointer;
			transition: 0.4s;
		}

		.card .card_image {
			width: inherit;
			height: inherit;
			border-radius: 40px;
		}

		.card .card_image img {
			width: inherit;
			height: inherit;
			border-radius: 40px;
			object-fit: cover;
		}

		.card .card_title,
		.card .card_title p {
			text-align: center !important;
			border-radius: 0px 0px 40px 40px !important;
			font-family: sans-serif !important;
			font-weight: bold !important;
			font-size: 30px !important;
			margin-top: -80px !important;
			height: 40px !important;
		}

		.card:hover {
			transform: scale(0.9, 0.9);
			box-shadow: 5px 5px 30px 15px rgba(0, 0, 0, 0.25),
				-5px -5px 30px 15px rgba(0, 0, 0, 0.22);
		}

		.title-white {
			color: white !important;
		}

		.title-black {
			color: black !important;
		}

		@media all and (max-width: 500px) {
			.card-list {
				/* On small screens, we are no longer using row direction but column */
				flex-direction: column !important;
			}
			.mdl-button--colored{
				display: none !important;
			}
		}

		.card {
			margin: 30px auto;
			width: 300px;
			height: 300px;
			border-radius: 40px;
			background-image: url('https://i.redd.it/b3esnz5ra34y.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			background-repeat: no-repeat;
			box-shadow: 5px 5px 30px 7px rgba(0, 0, 0, 0.25), -5px -5px 30px 7px rgba(0, 0, 0, 0.22);
			transition: 0.4s;
		}

		#content {
			display: none;
			transition: 0.4s all ease-in-out;

		}

		.mdl-spinner {
			transition: 0.4s all ease-in-out;
			left: 45%;
			top: 45%;
			position: absolute;
			width: 84px;
			height: 84px;
		}

		.mdl-spinner__circle {
			transition: 0.4s all ease-in-out;
			border-width: 9px;
		}

	</style>

