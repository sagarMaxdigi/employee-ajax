$(document).ready(function(){
	var count=$("#val").val();
	/*$("#login").click(function(event){
		event.preventDefault();
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
	});*/
	$("#recap").click(function(event){
		event.preventDefault();
		$("#recaptcha").attr("src",'captcha.php');
	});
	$("#logout").click(function(event){
		event.preventDefault();
		$.ajax({
			url:'emp_managment.php',
			data:{'logout':'logout'},
			type:'post',
			datatype:'html',
			success:function(data){
				if(data=='OK'){ window.location.href='dashboard.php'; }
			}
		});
	});
	$(".delete").click(function(event){
		event.preventDefault();
		var id=$(this).attr('val');
		alert(id);
		$.ajax({
			type:'post',
			url:'emp_managment.php',
			data:{'delete':id},
			datatype:'html',
			success:function(data){
				if(data=='OK'){ $("#del").css('display','initial');
				window.location.href="dashboard.php"; }
			}	
		});
	});
	$(".edit").click(function(event){
		event.preventDefault();
		var id=$(this).attr('val');
		$.ajax({
			type:'post',
			url:'emp_managment.php',
			data:{'edit':id},
			datatype:'html',
			success:function(data){
				$("#mtable").remove();
				$("#tbl_my").append(data);
			}	
		});
	});

	$(".cmpy").click(function(event){
		event.preventDefault();
		var data = $(this).attr('id');
		$.ajax({
			url:'emp_managment.php',
			data:{'email':data},
			dataType:'html',
			method:'post',
			success:function(data){
				$("#mytable").remove();
				$("#m").append(data);
			}
		});
	});
	
});