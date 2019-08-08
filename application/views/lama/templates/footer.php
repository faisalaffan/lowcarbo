<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
	function navigate(opsi) {
		window.location.href = opsi;
	}
	$(document).ready(function () {
		$(window).on('scroll', scrollFunction());

		function scrollFunction() {

		}
	});

	function onReady(callback) {
		var intervalId = window.setInterval(function () {
			if (document.getElementsByTagName('body')[0] !== undefined) {
				window.clearInterval(intervalId);
				callback.call(this);
			}
		}, 300);
	}

	function setVisible(selector, visible) {
		document.querySelector(selector).style.display = visible ? 'block' : 'none';
	}

	onReady(function () {
		setVisible('.mdl-spinner', false);
		setVisible('.mdl-spinner__circle', false);
		setVisible('#content', true);
	});
	var $sheet = $('.mdl-sheet');

	if ($sheet.length > 0) {
		$('html').on('click', function () {
			$sheet.removeClass('mdl-sheet--opened')
		});

		$sheet.on('click', function (event) {
			event.stopPropagation();

			$sheet.addClass('mdl-sheet--opened');
		});
	}

</script>
</body>

</html>
