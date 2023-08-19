
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="folder2/assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
</head>
<body>

		<!--main area-->
   <br><br>
   <!DOCTYPE html>
<html>
<head>

	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
input[type="text"],input[type="password"]{
	margin-top: 30px;
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 40px;
}

.form-input::before{
	content: "\f007";
	font-family: "FontAwesome";
	padding-left: 07px;
	padding-top: 40px;
	position: absolute;
	font-size: 35px;
	color: #2980b9; 
}

.form-input:nth-child(2)::before{
	content: "\f023";
}

#image
{
	padding: 0px !important;
	height: 700px;
} 

.hover
{
	
}

</style>
<body style="background-color:#d3d3d3;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 image p-0" id="image"><br><br><br>
				<img src="https://coffee-code.tech/wp-content/uploads/2022/06/fabricasoftware.png" height="80%" width="96%" alt="">
			</div>
			<div class="col-md-6 text-center" style="border:2px solid black; height:700px; background-color:#d3d3d3;">
			<form action="{{URL:: to('/forgetpassword')}}" method="POST" >  
			@csrf
			<br>
				<div><br><br><br><br><br><br>
				<img src="https://www.mendix.com/wp-content/uploads/low-code-guide-pro-dev.png" alt="" style="height:17rem; width:34rem;">            
				<br><br>
					<label class="mt-5" for="frm-login-uname" style="font-weight:bold; color:black; margin-left:25px; font-size:2.2rem; color:#F7B205;">Please Provide Email Address</label><br><br>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-5">
							<input type="email" id="frm-login-uname" name="emailinput" style="border:2px solid black;font-weight:bold; font-size:1.6rem; width:39rem; height:5rem; border-radius:2rem; text-align:center;" required>										
						</div>
					</div>
				</div>
				<div>
			<br>

				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-5">
						<button class="" type="submit" style="background-color:#F7B205; width:18rem; font-weight:bold; height:5rem; width:25rem; border-radius:2rem; color:white; font-size:2.5rem;">Forgot Password</button>
						<!-- <input class="btn btn-primary" type="submit" value="Register" class="hover" style="	width:18rem; font-weight:bold; height:5rem;	width:18rem; border-radius:2rem; background-color:#c8c8c8; color:black;	font-size:2.5rem;"/> -->
					</div>
				</div><br>
					<div class="row">
						<div class="col-md-6"></div>
						<div class="col-md-4">
							<!-- <a href="/login" style="font-size:1.8rem;">Already Register</a> -->
						</div>
					</div>
				@if(session('succdess'))
					<div class="alert alert-primary" role="alert">
						<strong style="color:white;">{{(session('succdess'))}}</strong>
					</div>
				@endif
			</form>
			<br><br>
			</div>
		</div>
	</div>
</body>
</html>
