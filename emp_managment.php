<?php 
include 'db.php';
error_reporting(0);
if(isset($_POST['login_data'])){
	$success='';
	$value=  array();                  
	parse_str($_POST['login_data'], $value);
	$username = $value['username'];
	$password = $value['password'];
	if($username==""){ echo 'USER_DUP'; } if($password==""){ echo 'PASS_DUP'; }
	$mysqli = mysqli_query($con,"select * from emp where emp_email="."'".$username."'"." and password="."'".$password."'");
	if(mysqli_affected_rows($con)>0){ $_SESSION['user']=$username; echo 'OK'; }else{ echo "NOT"; }
	echo $success;
}
if(isset($_POST['register_data'])){
	$value=  array();                  
	parse_str($_POST['register_data'], $value);
	$name = $value['name'];
	$email = $value['email'];
	$password = $value['password'];
	$experience = $value['experience'];
	$c_name = implode(",",$value['c_name']);
	$designation = implode(",",$value['designation']);
	$j_date = implode(",",$value['join_date']);
	$l_date = implode(",",$value['leave_date']);
	$captcha = $value['captcha'];
	$sql = "select * from emp";
	$err='';
	$mysqli=mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($mysqli)){
		if($row['emp_email'] == $email){ $err.='NOT'; }
	}
	if($err != 'NOT' && $captcha == $_SESSION['code']){
		$sql="insert into emp values(0,"."'".$name."'".","."'".$email."'".","."'".$password."'".","."'".$experience."'".","."'".$c_name."'".","."'".$designation."'".","."'".$j_date."'".","."'".$l_date."'".")";
		$mysqli = mysqli_query($con,$sql);
		if($mysqli==1){ echo 'OK'; }
	}
	else {
		echo 'EMAIL_DUP';
	}
}
if(isset($_POST['logout'])){
	session_destroy();
	echo 'OK';
}
if(isset($_POST['delete'])){
	$id=$_POST['delete'];
	$sql="delete from emp where ID=".$id;
	mysqli_query($con,$sql);
	echo 'OK';
}	
if(isset($_POST['edit'])){
	$id=$_POST['edit'];
	$sql="select * from emp where ID=".$id;
	$mysqli = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($mysqli))
	{
		?>
		<form action="emp_managment.php" method="post">
			<table id='mtable' style="margin: 66px 26px 1px 30%;" border="1">
				<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
				<tr>
					<td>Employee Name:</td>
					<td><input type="text" value="<?php echo $row['emp_name']; ?>" name="emp_name"></td>
				</tr>
				<tr>
					<td>Employee Email:</td>
					<td><input type="text" value="<?php echo $row['emp_email']; ?>" name="emp_email"></td>
				</tr>
				<tr>
					<td>Employee Experience:</td>
					<td><input type="text" value="<?php echo $row['emp_exp']; ?>" name="emp_exp"></td>
				</tr>
				<tr>
					<td></td>
					<td>Company</td>
				</tr>

				<?php $arr['c_name'] = explode(",",$row['c_name']);
				$arr['designation'] = explode(",",$row['designation']);
				$arr['j_date'] = explode(",",$row['j_date']);
				$arr['l_date'] = explode(",",$row['l_date']);?>
				<?php for($i=0;$i<3;$i++){ ?>
					<tr>	
						<input type="hidden" id="val" value="<?php echo count(array_filter($arr['c_name'])); ?>">
						<td><input type="text" value="<?php echo $arr['c_name'][$i];?>" name="c_name[]"></td>
						<td><input type="text" value="<?php echo $arr['designation'][$i];?>" name="designation[]"></td>
						<td><input type="text" value="<?php echo $arr['j_date'][$i];?>" name="j_date[]"></td>
						<td><input type="text" value="<?php echo $arr['l_date'][$i];?>" name="l_date[]"></td>
					</tr>
					<?php } ?>
					<tr>
						<td></td>
						<td><input type="submit" name="ed" value="Edit"></td>
					</tr>
				</table>
			</form>
			<?php
		}
	}
	if(isset($_POST['email'])){
		$email = $_POST['email'];
		$sql = "select * from emp where emp_email="."'".$email."'";
		$mysqli = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($mysqli)){
			?> 
			<?php $arr['c_name'] = explode(",",$row['c_name']);
			$arr['designation'] = explode(",",$row['designation']);
			$arr['j_date'] = explode(",",$row['j_date']);
			$arr['l_date'] = explode(",",$row['l_date']);?>
			<table id="mytable" border ="1" style="float: right;">
				<tr>
					<th>Company Name</th> 
					<th>Designation</th>
					<th>Join Date</th>
					<th>Leave Date</th>
				</tr>
				<tr>
					<?php for($i=0;$i<count(array_filter($arr['c_name']));$i++){ ?>
						<input type="hidden" id="val" value="<?php echo count(array_filter($arr['c_name'])); ?>">
						<td><?php echo $arr['c_name'][$i];?></td>
						<td><?php echo $arr['designation'][$i];?></td>
						<td><?php echo $arr['j_date'][$i];?></td>
						<td><?php echo $arr['l_date'][$i];?></td></tr>
						<?php } ?>
					</tr>
				</table>
				<?php }
			}
			if(isset($_POST['ed'])){
				$id=$_POST['id'];
				$name=$_POST['emp_name'];
				$email=$_POST['emp_email'];
				$exp=$_POST['emp_exp'];
				$c_name=implode(",",$_POST['c_name']);
				$designation = implode(",",$_POST['designation']);
				$j_date=implode(",",$_POST['j_date']);
				$l_date = implode(",",$_POST['l_date']);
				$sql="update emp set emp_name='$name',emp_email='$email',emp_exp='$exp',c_name='$c_name',designation='$designation',j_date='$j_date',l_date='$l_date' where ID=$id";
				mysqli_query($con,$sql);
				?>
				<script>
					window.location.href="dashboard.php";
				</script>
				<?php
			}
			if(isset($_POST['select'])){
				$select = $_POST['select'];
				$value = $_POST['value'];
				$sql = "select * from emp where $select='$value'";
				$mysqli = mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($mysqli)){?>
					<tr id="<?php echo $row['emp_email'];?>">
						<td><?php echo $row['emp_name'];?></td>
						<td><?php echo $row['emp_email'];?></td>
						<td><?php echo $row['emp_exp'];?></td>
						<td class="td">
							<button type="submit"  class="cmpy" id="<?php echo $row['emp_email'];?>" style="padding: 0 3px 2px 7px;background-color: deepskyblue;">Companies Detail</button>
							<input type="submit" val="<?php echo $row['ID']; ?>" name="edit" class="edit" value="Edit" style="background-color: blue;margin: 2px 8px 0px 5px;">
							<input type="submit" val="<?php echo $row['ID']; ?>" name="edit" class="delete" value="Delete" style="background-color: red;">
						</td>
					</tr><?php 
				}
			}
			if(isset($_POST['header'])){
				$header = $_POST['header'];
				$value = $_POST['value'];
				$sql="select * from emp order by $header $value";
				$mysqli = mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($mysqli)){ ?>
					<tr id="<?php echo $row['emp_email'];?>" class="t">
							<td><?php echo $row['emp_name'];?></td>
							<td><?php echo $row['emp_email'];?></td>
							<td><?php echo $row['emp_exp'];?></td>
							<td class="td">
								<button type="submit"  class="cmpy" id="<?php echo $row['emp_email'];?>" style="padding: 0 3px 2px 7px;background-color: deepskyblue;">Companies Detail</button>
								<input type="submit" val="<?php echo $row['ID']; ?>" name="edit" class="edit" value="Edit" style="background-color: blue;margin: 2px 8px 0px 5px;">
								<input type="submit" val="<?php echo $row['ID']; ?>" name="edit" class="delete" value="Delete" style="background-color: red;">
							</td>
							
						</tr><?php 
				}
			}
			?>