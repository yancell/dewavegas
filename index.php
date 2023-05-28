<!DOCTYPE html>
<html lang="en" style="-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
	</head>
	<body>
		<form onsubmit="ok(); return false;">
			<label>Username</label>
			<input tyoe="text" name="user">
			<label>Password</label>
			<input tyoe="text" name="password">
			<label>Type</label>
			<select name="type" onchange="change(this);" >
				<option value="reload">RELOAD</option>
				<option value="inject">INJECT</option>
			</select>
			<label>Value</label>
			<select name="_reload[]" multiple>
				<option value="250000" selected>250000</option>
				<option value="100000">100000</option>
				<option value="75000">75000</option>
				<option value="50000">50000</option>
				<option value="35000">35000</option>
				<option value="20000">20000</option>
				<option value="10000">10000</option>
			</select>
			<input type="submit" value="START">
		</form>
		<div id="data"></div>
		<script src="js/jquery-3.6.0.min.js"></script>
		<script>
			function ok(){
				var start = $('input[type="submit"]').val();
				if (start == 'STOP'){
					$('input[type="submit"]').attr('value', 'START');
					clearInterval(myInterval);
					return;
				}
				$('input[type="submit"]').attr('value', 'STOP');
                login();
			}
			function change(obj){
				var a = $(obj);
				var b = a.find(":selected").val();
				if (b == 'inject') $('select:eq(1)').attr('name', '_inject').removeAttr('multiple');
				else $('select:eq(1)').attr('name', '_reload[]').attr('multiple', true);
			}
			function login(){
				var user = $('input[name="user"]').val();
				var password = $('input[name="password"]').val();
				var type = $('select[name="type"]').val();
				var action = type == 'reload' ? $('select[name="_reload[]"]').val() : $('select[name="_inject"]').val();
				$.ajax({
					type: "POST",
					url: 'login.php',
                    data: {
						user: user,
						password: password,
						val: action
					},
					success: function(data){
						console.log(data);
						if (data == ''){
							$('input[type="submit"]').attr('value', 'START');
							return;
						}
						if (data == '1'){
							$('input[type="submit"]').attr('value', 'START');
							alert("Target terpenuhi");
							return;
						}
						if (action.indexOf(data) != -1){
							$('input[type="submit"]').attr('value', 'START');
							alert("Target terpenuhi");

	
							return;
							}
						$('#data').prepend('<p>'+data+'</p>');
						myInterval = setInterval(display, 5000);
					}
				});
			}
			function display(){
				var user = $('input[name="user"]').val();
				var action = $('select[name="_reload[]"]').val();
				$.ajax({
					type: "POST",
					url: 'display.php',
                    data: {
						user: user,
						val: action
					},
					success: function(data){
						console.log(data);
						if (data == ''){
							clearInterval(myInterval);
							login();
						}
						if (action.indexOf(data) != -1){
							clearInterval(myInterval);
							$('input[type="submit"]').attr('value', 'START');
							alert("Target terpenuhi");
						}
						$('#data').prepend('<p>'+data+'</p>');
					}
				});
			}
		</script>
	</body>
</html>
