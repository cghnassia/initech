$(document).ready(function() {

	var request;
	var inProcess = false;
	var pattern = new RegExp(/^(\d+[, -]*)+$/);
	var progressbar = $("#sort-progress-bar");

	$("#sort-input").keyup(function(event) {
		//retrieve the all content
		input = $(this).val();

		//need to check user input
		if(! pattern.test(input)) {
			$("#sort-error").css("display", "block");
			return false;
		}

		//we check if the user add something relevant to sort it
		if(! String.fromCharCode(event.keyCode).match(/\d/) && e.keyCode != 8) {
			return false;
		}

		progressbar.stop();
		progressbar.css("width", "0%");

		if(inProcess) {
			request.abort();
		}

	
		//launch progressbar
		progressbar.animate({
				width: "100%"
			},
			2000
		);

		inProcess = true;
		request = $.post(
			'sort',
			{
				"input": input
			},
			function(data) {
				progressbar.stop();
				progressbar.css("width", "100%");

				if(data.status == 'success') {
					$("#sort-error").css("display", "none");

					output = '';

					var numbers = JSON.parse(data.output);
					for (var i in numbers) {
						output += '<span class="number">' + numbers[i] + '</span>';
					}
					$("#sort-output").html(output);
				}
				else {
					$("#sort-error").css("display", "block");
				}
				inProcess = false;
			},
			'json'
		);

		return false;
	});

	$(".form-signin").submit(function(event) {
		
		$username = $("#username").val();
		$password = $("#password").val();
		$remember = $("#remember").val();

		$.post(
			'/login',
			{
				"username": $username,
				"password": $password,
				"remember": $remember
			},
			function(data) {

				if(data.status) {
					$("#login-error").css("display", "none");
					$("#login-success").css("display", "block");

					window.setTimeout(function() {
							window.location.href ="/";
						},
						2000
					);
				}
				else {
					$("#login-error").css("display", "block")
				}		
			}
		);

		return false;
	});

});