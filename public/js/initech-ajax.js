$(document).ready(function() {

	$("#sort-input").keyup(function() {

		input = $(this).val();

		//need to check user input

		$.post(
			'/sort/',
			{
				"input": input
			},
			function(data) {
				$("#sort-output").html(data.output)
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