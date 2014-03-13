$(document).ready(function() {

	$("#sort-input").keyup(function() {

		input = $(this).val();

		//need to check user input
		$("#sort-ouput").html("Hello world");

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
});