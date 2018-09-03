<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<style>
	body{background-color: orange;}
	form{margin-top: 81px;}
</style>
<script src="jquery.min.js"></script>

<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<!--<script type="text/javascript" src="emp.js"></script>-->
<script >
	$(document).ready(function(){
		$("#login").click(function(event){
			event.preventDefault();
			var login=$("#form").serializeArray();
			var err='1';
			$.each(login, function(i, field){
				//alert(field.value);
        		if(field.name=="username"){ if(field.value=="" || IsEmail(field.value)==false){ err='0';alert("Insert valid email");} }
        		if(field.name=="password"){ if(field.value=="" || field.value.length>=10 || field.value.length<=4){ err='0';alert("Password must be greter than 5 and less than 8");}  }
    		});
			if(err=='1'){
				var login=$("#form").serialize();
				$.ajax({
					url:"emp_managment.php",
					data:{'login_data':login},
					type:'post',
					datatype:'html',
					success:function(result){
						if(result!='OK'){  
							$("#err").css('display','initial'); 
							setTimeout(function(){ $("#err").css('display','none');  }, 3000); 
						}else {  window.location.href="dashboard.php"; }
					}
				});
			}
		});
	});
	function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }
</script>
</head>
<body>
	<form id="form">
		<h1 align="center" id="e">Login</h1>
		<p id="err" align="center" style="display: none;color: red;">Not avilable</p>
		<table align="center">
			<tr>
				<td>Enter Email:</td>
				<td><input type="email" name="username" id="username">
				</td>
			</tr>
			<tr>
				<td>Enter Password:</td>
				<td><input type="Password" name="password" id="password"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="sub" value="Login" id="login">
					<a href="register.php">Register here...!</a>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>