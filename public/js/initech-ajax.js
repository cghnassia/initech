$(document).ready(function() {

	var pattern_keyup = new RegExp(/^(\d+(\s*[,-]\s*)*)*\s*$/);
	var pattern_submit = new RegExp(/^(\d+(\s*[,-]\s*\d+)*)+\s*$/);

	var isRequestSort = false;
	var isRequestLogin = false;

	if($("#input-sort").val()) {
		keyUpHandler();
	}

	$("#input-sort").keyup(function(event) {
		keyUpHandler();
	});

	$("#form-sort").submit(function(event) {
		sortHandler();
		return false;
	});

	$(".form-signin").submit(function(event) {
		loginHandler();
		return false;
	});

	function keyUpHandler() {

		var input = $("#input-sort").val();

		$("#sort-success").css("display", "none");
		$("#sort-error").css('display', 'block');

		//we test that the user entered a valid input
		if(pattern_keyup.test(input)) {
			$("#sort-error").css("visibility", "hidden");
		}
		else {
			$("#sort-error").css("visibility", "visible");
		}
	}


	function sortHandler() {

		var input = $("#input-sort").val();
		var token = $("#token").val();

		$("#sort-success").css("display", "none");
		$("#sort-error").css('display', 'block');

		if(pattern_submit.test(input)) {
			$("#sort-error").css("visibility", "hidden");
		}
		else {
			$("#sort-error").css("visibility", "visible");
			return;
		}

		//if a request is already running, we cancel it
		if(isRequestSort) {
			this.request.abort();
			$("#sort-progress-bar").stop();
		}

		//we start the progress bar
		$("#sort-progress-bar").css("width", "0%");
		$("#sort-progress-bar").animate(
			{
				width: "100%"
			},
			2000
		);

		isRequestSort = true;
		this.request = $.post(
			'sort',
			{
				"input": input,
				"token": token
			},
			function(data) {
				$("#sort-progress-bar").stop();
				$("#sort-progress-bar").css("width", "100%");

				if(data.status == 'success') {
					$("#sort-error").css("display", "none");
					$("#sort-success").css('display', 'block');

					output = '';

					var numbers = JSON.parse(data.output);
					for (var i in numbers) {
						//output += '<span class="number">' + numbers[i] + '</span>';
						output += numbers[i] + ', '
					}
					//$("#sort-output").html(output);
					$("#input-sort").val(output.substr(0, output.length - 2));
				}
				else {
					$("#sort-error").css("visibility", "visible");
				}
				isRequestSort = false;
			},
			'json'
		);

	}
	
	function loginHandler() {

		if(isRequestLogin) {
			return;
		}

		this.isRequestLogin = true;

		username = $("#username").val();
		password = $("#password").val();
		remember = $("#remember").val();
		token = $("#token").val();

		$("#login-error").css("visibility", "hidden");
		$("#login-success").css("display", "none");

		$.post(
			'/login',
			{
				"username": username,
				"password": password,
				"remember": remember,
				"token": token
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
					$("#login-error").css("visibility", "visible");
				}		

				isRequestLogin = false;
			}
		);
	}

});