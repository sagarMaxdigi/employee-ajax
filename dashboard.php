<?php include 'db.php'; 
if(!isset($_SESSION['user'])){
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashoboard</title>
	<script src="jquery.min.js"></script>
	<script src="emp.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#search").click(function(event){
				event.preventDefault();
				$(".t").remove();
				var value=$("#name_id").val();
				var select = $("#select").val();
				$.ajax({
					url:"emp_managment.php",
					data:{'select':select,'value':value},
					type:'post',
					datatype:'html',
					success:function(result){
						if(result==""){ result="No data Avilable"; }
						$(".t").replaceWith(result);
						$("#tbl").append(result);
					}
				});
			});
			$(".heading").click(function(event){
				event.preventDefault();
				var header = $(this).attr('id');
				var value = $("#"+header+"").attr('val');
				if(value=="ASC")
				{
					$("#"+header+"").attr('val','DESC');
				}
				if(value=="DESC"){
					$("#"+header+"").attr('val','ASC');	
				}
				$.ajax({
        		url:'emp_managment.php',
        		method:'post',
        		data:{'header':header,'value':value},
        		dataType:'html',
        		success:function(data){
        			$(".t").remove();
        			$("#tbl").append(data);
        		}
        	});

			})
		});
	</script>
</head>
<body style="background-color: aqua;">
	<form id="form1">
		<p id="edit_btn" style="display: none;color: red;">Edited success....!</p>
		<p id="del" align="center" style="display: none;color: red;">Deleted success....!</p>
		<h1 align="center">Employee Data..!</h1>
		Search by:<select name="name" id="select">
			<option>emp_name</option>
			<option>emp_email</option>
			<option>emp_exp</option>
		</select>
		<input type="text" name="name" id="name_id"><button id="search">Search</button>
		<div id="table-first" style="width:100%; ">
			<div style="width:50%; ">
				<table id="tbl" border="1" align="margin-left" style="margin-top: 4%;">
					<tr>
						<th  class="heading" id="emp_name" val="DESC">Employee Name</th>
						<th  class="heading" id="emp_email" val="ASC">Employee Email</th>
						<th  class="heading" id="emp_exp" val="ASC">Experience</th>
						<th>Action</th>
					</tr>
					<?php 
					$sql="select * from emp";
					$mysqli=mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($mysqli)){?>
						<tr id="<?php echo $row['emp_email'];?>" class="t">
							<td><?php echo $row['emp_name'];?></td>
							<td><?php echo $row['emp_email'];?></td>
							<td><?php echo $row['emp_exp'];?></td>
							<td class="td">
								<button type="submit"  class="cmpy" id="<?php echo $row['emp_email'];?>" style="padding: 0 3px 2px 7px;background-color: deepskyblue;">Companies Detail</button>
								<input type="submit" val="<?php echo $row['ID']; ?>" name="edit" class="edit" value="Edit" style="background-color: blue;margin: 2px 8px 0px 5px;">
								<input type="submit" val="<?php echo $row['ID']; ?>" name="edit" class="delete" value="Delete" style="background-color: red;">
							</td>
							<?php } ?>
						</tr>
					</table>
				</div>
				<div id="m" style="width: 50%;left:0;float: right;left: 0;float: right;margin-top: -128px;right: 17px;">

				</div>
			</div>
		</form>
		<span id="tbl_my"></span>
		<input type="submit" id="logout" name="logout" value="logout" style="margin-left: 48%;margin-top: 12px;">
		
	</body>
	</html>