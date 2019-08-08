<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Tpa</title>
    <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        *:hover,
        *:focus {
            outline: 0
        }

        html {
            height: 100%;
        }

        body {
            position: relative;
            height: 100%;
            background: rgba(0, 0, 0, .3);
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            font-size: 17px;
            color: #777;
        }

        button,
        select,
        input {
            font-family: 'Roboto', sans-serif;
            font-size: 17px;
        }

        .quiz-window {
            position: absolute;
            left: 0;
            right: 0;
            top: 50px;
            margin: auto;
            width: 600px;
            border-radius: 4px;
            background: #fff;
            overflow: hidden;
        }

        .quiz-window-header {
            padding: 20px 15px;
            text-align: center;
            position: relative;
        }

        .quiz-window-title {
            font-size: 26px;
        }

        .quiz-window-close {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 0;
            background: none;
            border: 0;
            width: 30px;
            height: 30px;
            font-size: 60px;
            font-weight: 100;
            line-height: 24px;
            color: #777;
            cursor: pointer;
        }

        .quiz-window-body {
            background-color: #f9f9f9;
        }

        .guiz-awards-row {
            margin: 0;
            padding: 10px 40px;
            list-style: none;
        }

        .guiz-awards-row:after {
            content: '';
            display: table;
            clear: both;
        }

        .guiz-awards-row-even {
            background-color: #fff;
        }

        .guiz-awards-row li {
            display: inline-block;
            vertical-align: top;
            float: left;
        }

        .guiz-awards-header {
            text-align: center;
            padding: 20px 40px;
        }

        .guiz-awards-star,
        .guiz-awards-track,
        .guiz-awards-time,
        .guiz-awards-header-star,
        .guiz-awards-header-track,
        .guiz-awards-header-time {
            min-width: 54px;
            text-align: center;
            width: 16%;
        }

        .guiz-awards-title {
            width: 40%;
            min-width: 160px;
            font-size: 18px;
            font-weight: normal;
            padding-top: 3px;
        }

        .guiz-awards-header-title {
            width: 40%;
            min-width: 160px;
        }

        .guiz-awards-subtitle {
            color: #858585;
            font-size: 14px;
            font-weight: 300;
        }

        .guiz-awards-track,
        .guiz-awards-time {
            width: 22%;
            min-width: 80px;
            font-size: 18px;
            line-height: 45px
        }

        .guiz-awards-header-track,
        .guiz-awards-header-time {
            width: 22%;
            min-width: 80px;
        }

        .guiz-awards-track .null,
        .guiz-awards-time .null {
            color: #bababa;
        }

        .star {
            display: block;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid #bdc2c1;
            background: #d6d6d6;
        }

        .goldstar {
            border-color: #4c8193;
            background: #14b0bf;
        }

        .silverstar {
            border-color: #557e3a;
            background: #66931f;
        }

        .bronzestar {
            border-color: #998247;
            background: #aa984b;
        }

        .rhodiumstar {
            border-color: #743a7f;
            background: #a0409d;
        }

        .platinumstar {
            border-color: #10393b;
            background: #2b5770;
        }

        .guiz-awards-buttons {
            background: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .guiz-awards-but-back {
            display: inline-block;
            background: none;
            border: 1px solid #61a3e5;
            border-radius: 21px;
            padding: 7px 40px 7px 20px;
            color: #61a3e5;
            font-size: 17px;
            cursor: pointer;
            transition: all .3s ease;
        }

        .guiz-awards-but-back:hover {
            background: #61a3e5;
            color: #fff;
        }

        .guiz-awards-but-back i {
            font-size: 26px;
            line-height: 17px;
            margin-right: 20px;
            position: relative;
            top: 2px;
        }
    </style>
</head>

<body>
    <div class="quiz-window">
        <div class="quiz-window-header">
            <div class="quiz-window-title">DATA STATION</div>
            <button class="quiz-window-close">&times;</button>
        </div>
        <div class="quiz-window-body">
            <div class="gui-window-awards" id="dataStation">
                <ul class="guiz-awards-row guiz-awards-header">
                    <li class="guiz-awards-header-star">&nbsp;</li>
                    <li class="guiz-awards-header-title">Nama Station</li>
                    <li class="guiz-awards-header-track">Latitude Station</li>
                    <li class="guiz-awards-header-time">Longitude Station</li>
                </ul>
            </div>
            <div class="guiz-awards-buttons" id="btnBack"><button class="guiz-awards-but-back"><i
                        class="fa fa-angle-left"></i>
                    Back</button></div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
    var url = "<?= base_url('api/admin/station?id_tpa='); ?>" + window.location.pathname.split("/")[4];
    $.ajax({
        url: url,
        method: "GET",
        success: function (res) {
            res.data.map(function (val) {
                console.log(val);
                $("#dataStation").append(`
                    <ul class="guiz-awards-row guiz-awards-row-even">
                        <li class="guiz-awards-star"><span class="star goldstar"></span></li>
                        <li class="guiz-awards-title">${val.nama_station}
                            <div class="guiz-awards-subtitle">90-100% correct answers</div>
                        </li>
                        <li class="guiz-awards-track">${val.lat_station}</li>
                        <li class="guiz-awards-time">${val.lng_station}</li>
                    </ul>
                `);
            });
        }
    });
    $("#btnBack").click(function (e) {
        e.preventDefault();
        window.location.href = "<?= base_url('/tpa') ?>";
    });
    $("#logoutBtn").click(function (e) {
        sessionStorage.clear();
        window.location.reload();
        // window.location.href = "<?= base_url('auth') ?>";
    });
</script>

</html>