<!DOCTYPE html>
<html>
<head>
	<title>Register here</title>
	<script src="jquery.min.js"></script>
	<script type="text/javascript" src="emp.js"></script>
	<script src="jquery.validate.min.js"></script>
	<script src="additional-methods.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#register_data").click(function(){
				$("#register").validate({
					rules: {
						name: "required",
						email:{
							required:true,
							email:true
						},
						password:{
							required:true,
							minlength:5,
							maxlength:8
						},
						captcha:{
							required:true,
						}
						
					},
					messages:{
						name:"Enter Name",
						email:"Email format not match",
						password:"Enter valid password",
						captcha:"Enter Captcha Feild"
					},
					submitHandler: function() { 
						ajaxSubmit()
					}
				});
			});
			function ajaxSubmit(){
				var login = $("#register").serialize();
				alert(login);
				$.ajax({
					url:"emp_managment.php",
					data:{'register_data':login},
					type:'post',
					datatype:'html',
					success:function(result){
						if(result=='OK'){ window.location.href="index.php0;" }
						if(result=='EMAIL_DUP'){ alert("Duplicate Email ID"); }
					}
				});
			}

			var count=0;
			$("#company_add").click(function(event){
				event.preventDefault();
				count++;
				if(count<=3){
					var d="<tr>"+""
					+"<td>"+count+" Company::</td>"+""
					+"<td></td>"+""
					+"</tr>"+""
					+"<tr>"+""
					+"<td>Enter Compnay Name</td>"+""
					+"<td><input type=text name=c_name[]></td>"+""
					+"</tr>"+""
					+"<tr>"+""
					+"<td>Enter Your Designation</td>"+""
					+"<td><input type=text name=designation[]></td>"+""
					+"<tr>"+""
					+"<tr>"+""
					+"<td>Enter Joining Date</td>"+""
					+"<td><input type=text name=j_date[]></td>"+""
					+"<tr>"+""
					+"<tr>"+""			
					+"<td>Enter Leaving Date:</td>"+""
					+"<td><input type=text name=l_date[]></td>"+""
					+"</tr>";
				}
				$("#tbl").append(d);
			});
		});
	</script>
	<style type="text/css">
	div.box { background: #EEE;height: 100%;width: 100%;}
	div.div1 {float: left;height: 100%;width:50%;}
	div.div2 {background: #666;height: 100%;}
	div.clear {clear: both;height: 1px;overflow: hidden;font-size: 0pt;margin-top: -1px;}
</style>
</head>
<body>
	<div class="box">
		<form id="register">
			<h1 align="center">Register...!</h1>
			<p id="ERR"  style="padding-left: 48%;color: red;display: none;"></p>
			<div class="div1">
				<table align="right">
					<tr>
						<td>Enter employee Name:</td>
						<td><input type="text" name="name" id="name"></td>
					</tr>
					<tr>
						<td>Enter employee Email:</td>
						<td><input type="email" id="email" name="email"></td>
					</tr>
					<tr>
						<td>Enter password:</td>
						<td><input type="password" name="password" id="password"></td>
					</tr>
					<tr>
						<td>Employee Experience:</td>
						<td><input type="text" name="experience" id="exp"></td>
					</tr>
					<tr>
						<td>Captcha.</td>
						<td><img src="captcha.php" id="recaptcha"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" id="recap" name="cap" value="Recaptcha"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="text" name="captcha"></td>
					</tr>
				</table>
			</div>
			<div class="div2">
				<table id="tbl" align="left">
					<tr>
						<td><a id="company_add"><img src="plus.png" width="25px" height="25px"></a></td>
						<td>Add Company</td>
					</tr>
				</table>
			</div>
			<div class="clear"></div>
			<input type="submit" name="sub" id="register_data" value="Register" style="background-color:  black;color: white;margin-left: 44%;margin-top: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;
			Already Register...!&nbsp;&nbsp;<a href="index.php">Login here.</a>
		</form>
	</div>	
</body>
</html>