<!DOCTYPE html>
<html lang="en">
<head>
	<title> Online Examination System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="  {{ asset('ContactFrom_v1/images/icons/favicon.ico ') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{ asset('ContactFrom_v1/vendor/bootstrap/css/bootstrap.min.css') }}">
<!-- ===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{ asset('ContactFrom_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{ asset('ContactFrom_v1/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{ asset('ContactFrom_v1/vendor/css-hamburgers/hamburgers.min.css ') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('ContactFrom_v1/vendor/select2/select2.min.css ') }}">

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('ContactFrom_v1/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('ContactFrom_v1/css/main.css') }}">
<!--=============================================================================================== -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--===============================================================================================-->
</head>
<body>

	
	   
	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src=" {{ asset('ContactFrom_v1/images/magi.png ') }}" alt="IMG">
			</div>
			<div class="contact1-form validate-form">
					<span class="contact1-form-title">
						Poseidon Possessions
					</span>
					<p class="poseidon">Mr. {{Auth::user()->name}}, You have been nominated as "Poseidon". <br> Your  Possessions are given below</p>
					<div class="container-contact1-form-btn">
						<a  href="/admin/adminDashboard" class="contact1-form-btn">
							<span>
								Admin Panel
								<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
							</span>
						</a>
						
						<a  href="/dashboard" class="contact1-form-btn atik">
							<span>
								User Panel
								<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
							</span>
						</a>
					
					</div>
				<br><br>
				
				
				
			</div>
			
		</div>
	</div>




<!--===============================================================================================-->
	<script src=" {{ asset('ContactFrom_v1/vendor/jquery/jquery-3.2.1.min.js ') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('ContactFrom_v1/vendor/bootstrap/js/popper.js ') }}"></script>
	<script src="{{ asset('ContactFrom_v1/vendor/bootstrap/js/bootstrap.min.js ') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('ContactFrom_v1/vendor/select2/select2.min.js ') }}"></script>
<!-- ============================================================================================== -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<script src="{{ asset('ContactFrom_v1/vendor/tilt/tilt.jquery.min.js ') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<!-- <script src=" {{ asset('ContactFrom_v1/js/main.js ') }}"></script>
 -->

</body>
</html>
