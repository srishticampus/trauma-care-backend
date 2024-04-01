<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.page-content{

  	}
  	::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #000;
  opacity: 1;
}
  </style>
</head>
<!-- background: #d8e7d0 -->
<body class="form-v10" >
	<div style="background-color: #000;">
	<img src="uploads/trauma-logo.jpeg" style="width: 100px;height: 100px;"><span style="  font-size: 40px;font-family: Arial Black,Arial Bold,Gadget,sans-serif;  font-weight:50;color: #aac99c;
"><sub>Trauma Care</sub></span>
</div>
	<div class="page-content"style="background: #fff" >
		<div class="form-v10-content" >

			<div class="form-detail" action="#" method="post" id="myform" >
				<div class="form-left">
					<h2 style="color: #000">Login</h2>
					
					
					<div class="form-row">
						<input type="text" name="email_id" class="company" id="email_id" placeholder="Email Id" required>
					</div>
					<div class="form-row">
						<input type="password" name="pass" class="company" id="pass" placeholder="Password" required>
					</div>
					<div class="form-row-last">
						<input type="button" name="register" class="login" id="login" value="Login" style="width: 30%;
    background: #eda537;
    border-radius: 10px;
    margin-left: 50px;color: #000;">
    <a href="forgot_password.php" style="margin-left: 400px;margin-top: 50px;">Forgot Password</a>
					</div>

					
				</div>
				<div class="form-right" style="background-color:  #aac99c;color: #000000">
					<h2  style="color: #000">Registartion</h2>
					<span id="span"></span>
					<form  action="hospital_registration.php" method="post" enctype="multipart/form-data">
					<div class="form-row">
						<input type="text" name="name" class="street" id="name" placeholder="Name" required>
					</div>
					<div class="form-row">
						<input type="email" name="email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" class="street" id="email" placeholder="Email Id" required>
					</div>
					<div class="form-row">
						<input type="text" name="phone" class="street" id="phone" placeholder="Phone Number" required>
					</div>
					<div class="form-row">
						<input type="text" name="bno" class="additional" id="bno" placeholder="Building Number" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="street" class="zip" id="street" placeholder="Street" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="city" class="phone" id="city" placeholder="City" required>
							
						</div>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="district" class="zip" id="district" placeholder="District" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="state" class="phone" id="state" placeholder="State" required>
							
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="regno" class="phone" id="regno" placeholder="Register Number" required>
						
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="lat" class="code" id="lat" placeholder="Lattitude" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="long" class="phone" id="long" placeholder="Longitude" required>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="landmark" id="landmark" class="input-text" required  placeholder="Land Mark">
					</div>
					<div class="form-row">
						<input type="password" name="password" id="password" class="input-text" required  placeholder="Password">
					</div>
					<div class="form-row">
						<input type="file" name="file" id="file" class="input-text" required  placeholder="File" style="color: #000">
					</div>
					<div class="form-row">
						<textarea name="description" id="description" class="input-text" rows="4" cols="58" required  placeholder="Hospital Description" style="color: #000;background: #aac99c;border-color:rgba(255, 255, 255, 0.3);outline: none"></textarea>
					</div>
					
					<div class="form-row-last">
						<input type="submit" name="register" class="register" id="register" value="Register" style="background-color: #eda537">
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
$('#login').click(function(){
	var email_id=$('#email_id').val();
	var pass=$('#pass').val();
$.ajax({
	url:'hospital_login.php',
	type:'post',
	data:{email_id:email_id,pass:pass},
	success:function(data){

if(data==1){
	window.location.href='../hospital/index.php';
	}
	else{
		window.location.href='index.php';
	}
}


});
});

// $('#register').click(function(){
// 	var name=$('#name').val();
// 	var email=$('#email').val();
// 	var phone=$('#phone').val();
// 	var bno=$('#bno').val();
// 	var street=$('#street').val();
// 	var city=$('#city').val();

// 	var district=$('#district').val();
// 	var state=$('#state').val();
// 	var regno=$('#regno').val();
// 	var lat=$('#lat').val();
// 	var long=$('#long').val();
// 	var landmark=$('#landmark').val();
// 	var password=$('#password').val();
// 	$.ajax({
// 		url:'hospital_registration.php',
// 		type:'post',
// 		data:{name:name,email:email,phone:phone,bno:bno,street:street,city:city,district:district,state:state,regno:regno,lat:lat,long:long,landmark:landmark,password:password},
// 		success:function(data){
// if(data==1){
// $('#span').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong>  <a href="#" class="alert-link">Registartion Successfull</a>.</div>');
// }
// else if(data==2){
// 	$('#span').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failed!</strong>  <a href="#" class="alert-link">Registartion Failed</a>.</div>');
// }
// else{
// $('#span').html('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning!</strong>  <a href="#" class="alert-link">Already Register</a>.</div>');
// }
// 		}
// 	})


// });
	});
</script>
</html>