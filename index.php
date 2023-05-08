<!DOCTYPE html>
<html lang="en" style="-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
		<link rel="stylesheet" href="css/custom.css">
	</head>
	<body>
		<div id="data"></div>
		<script src="js/jquery-3.6.0.min.js"></script>
		<script>
			$(document).ready(function(){
				login();
			});
			function login(){
				$('#data').prepend('<p>Menghubungkan/p>');
				$.ajax({
					type: "POST",
					url: 'login.php',
					success: function(data){
						console.log(data);
						$('#data').prepend('<p>'+data+'</p>');
						setInterval(display, 5000);
					}
				});
			}
			function display(){
				$.ajax({
					type: "POST",
					url: 'wheal.php',
					success: function(data){
						if (data == ''){
							$('#data').prepend('<p>Terputus</p>');
							clearInterval(display);
							login();
						}
						console.log(data);
						$('#data').prepend('<p>'+data+'</p>');
					}
				});
			}
		</script>
	</body>
</html>
