<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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

	
	   <!-- Login Modal -->
	   			<div class="modal fade" id="exampleForgetPassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Password Functionalities</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" id="error_msg">
							<p class="success"></p>
							<p class="email_fisrt_err"></p>
							<p class="email_sec_err"></p>
							<p class="error"></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src=" {{ asset('ContactFrom_v1/images/magi.png ') }}" alt="IMG">
			</div>
			<div class="contact1-form validate-form">
				<form id="Forget_Password">
					@csrf
					<span class="contact1-form-title">
						Forget Password
					</span>

					<!-- <div class="wrap-input1 validate-input" data-validate = "Name is required">
						<input class="input1" type="text" name="name" placeholder="Enter Your Email">
						<span class="shadow-input1"></span>
					</div> -->

					<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input1" type="email" name="email" placeholder="Email">
						<span class="shadow-input1"></span>
					</div>



					<div class="container-contact1-form-btn1">
						<button type="submit" data-bs-toggle="modal" data-bs-target="#exampleForgetPassModal" class="contact1-form-btn" id="BtnForgetPass">
							<span>
								Forget Password
								<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</form>
				<br>
				<div class="container-contact1-form-btn1">
					<a href="/login" class="contact1-form-btn1">Back</a>
				</div>
			</div>
			
		</div>
	</div>


<!-- ============================================================================================= -->
	<script>
		$(document).ready(function(){
			$("#Forget_Password").submit(function(event){
                event.preventDefault();
                var form = $("#Forget_Password")[0];
                var data = new FormData(form);
				$("#BtnForgetPass").prop("disabled",true);
                $.ajax({
                      type:"POST",
                      url:"{{ route('forgetPassword') }}",
                      data:data,
                      processData:false,
                      contentType:false,
                      success:function(data){
                        
                        //$(".err").text("");
                        //$(".errorText").value(data.errors);
						if($.isEmptyObject(data.error)){
                          //console.log(data.success);
                          $(".success").text(data.success);
						  $('.email_fisrt_err').text("");
						  $('.email_sec_err').text("");
						  console.log(data.Error);
						  $(".error").text(data.Error);
						 /*  $(".errorText").value(""); */
						 $("input[type='email']").val('');
						 $("#BtnForgetPass").prop("disabled",false);
                        }else{
                          printErrorMsg(data.error);
						  $(".success").text("");
						  $(".error").text("");
						  $("input[type='email']").val('');
						  $("#BtnForgetPass").prop("disabled",false);
						  
                        }
                      }
                });

    		});
			function printErrorMsg(msg){
                $.each(msg,function(key,value){
                    console.log(key);
                    console.log(value[0]);
					console.log(value[1]);
					$('.email_fisrt_err').text(value[0]);
					$('.email_sec_err').text(value[1]);
                    //$('.'+key+'_first_err').text(value[0]);
                    /* $('.'+key+'_sec_err').text(value[0]);
					$('.'+key+'fisrt_err').text(value[1]); */
					
                });
            }

		});
	</script>

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
