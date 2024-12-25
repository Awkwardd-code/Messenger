<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="  {{ asset('ContactFrom_v1/images/icons/favicon.ico ') }}"/>
  <style>
    .container{
        max-width: 700px !important;
        
    }
  </style>
</head>
<body>
      @extends('../layouts/layout-common')


      @section('space-work')

      
             
          <div class="container">
                <!-- Login Modal -->
                <div class="modal fade" id="exampleLoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login Functionalities</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" id="error_msg">
                        
                        <p class="email_log_first_err error err"></p>
                        <p class="email_log_sec_err error err"></p>
                        <p class="password_log_first_err error err"></p>
                        <p class="password_log_sec_err error err"></p>
                        <p class="success success_log"></p>
                        <p class="errorText"></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="errorData" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

            <div class="text">
                Login Form
                
            </div>
            <form id="Login_form">
                @csrf
                <div class="form-row">

                    <div class="input-data">
                        <input type="email" name="email">
                    <div class="underline"></div>
                    <label for=""> Email Address</label>
                        <div class="errorDiv imageError">
                          <p class="email_log_first_err error err"></p>
                          <p class="email_log_sec_err error err"></p>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data">
                        <input type="password" name="password">
                    <div class="underline"></div>
                    <label for=""> Password</label>
                        <div class="errorDiv imageError">
                          <p class="password_log_first_err error err"></p>
                          <p class="password_log_sec_err error err"></p>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data login_input_data">
                      Don't Have An Account!<a href="/register">  Register</a>
                    </div>
                    <div class="input-data login_input_data">
                        <a href="/forget-password">Forget Password</a>
                    </div>
                </div>
                <label id="fileInput" style="display:none;"></label>
                <div class="form-row ">
                        
                    <div class="input-data ">
                        
                        <div class="form-row submit-btn submit-login-btn">
                            <div class="input-data submit_button">
                                <div class="inner"></div>
                                <input type="submit" id="BtnRegister" value="Login">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
            
        </div>





        <!-- ---------------ajax ------------------------ -->
        <script>
            $(document).ready(function(){
              /* ---------------------Login---------------------------- */
              $("#Login_form").submit(function(event){
                event.preventDefault();
                var form = $("#Login_form")[0];
                var data = new FormData(form);
                $("#BtnRegister").prop("disabled",true);
                $.ajax({
                      type:"POST",
                      url:"{{ route('studentLogin') }}",
                      data:data,
                      processData:false,
                      contentType:false,
                      success:function(data){
                        console.log(data);
                        /* if(data.errors){
                          $(".error").text(""); 
                          $("input[type='email']").val('');
                          $("input[type='password']").val('');
                          //$(".err").text("");
                          setTimeout(function(){
                            //document.getElementById('error_msg').style.display = 'none';
                            $(".err").text("");
                          },10000);
                        }else{
                            if($.isEmptyObject(data.errors)){
                                $(".success_log").text("Login Successfull");
                                $(".errorText").text("");
                                
                                $(".error").text("");
                                
                            }
                            else{
                                printLoginErrorMsg(data.errors);
                                $("#BtnRegister").prop("disabled",false);
                            }
                        } */
                          if($.isEmptyObject(data.error)){
                            if ($.isEmptyObject(data.errors)) {
                              
                            console.log(data.success);
                            $(".success").text(data.success);
                            $(".success_log").text("Login Successfull");
                            $(".err").text(data.error);
                            if(data.super_admin == 1){
                              window.location.replace("/superAdmin/dashboard");
                            }else{
                              if (data.is_processed == 0) {
                                window.location.replace("/processing");
                              } else {
                                if (data.is_varified == 0){
                                  window.location.replace("/varification");
                                } else {
                                  if(data.is_admin == 1){
                                      window.location.replace("/admin/adminDashboard");
                                  }
                                  /* elseif(data.super_admin == 1){
                                    window.location.replace("/superAdmin/dashboard");
                                  } */
                                  else{
                                      window.location.replace("/dashboard");
                                  }
                                }
                              }
                              
                            }
                            $("input[type='email']").val('');
                            $("input[type='password']").val('');
                            setTimeout(function(){
                                //document.getElementById('error_msg').style.display = 'none';
                                $(".success").text("");
                            },10000);
                            } else {
                              $(".errorText").text(data.errors);
                              $("#BtnRegister").prop("disabled",false);
                              $("input[type='email']").val('');
                              $("input[type='password']").val('');
                          
                              setTimeout(function(){
                                //document.getElementById('error_msg').style.display = 'none';
                                $(".errorText").text("");
                                $(".err").text("");
                              },10000);
                            }
                            
                        }else{
                            
                            printLoginErrorMsg(data.error);


                            
                            
                        }
                            $("#BtnRegister").prop("disabled",false);
                            $("input[type='email']").val('');
                            $("input[type='password']").val('');
                        
                        setTimeout(function(){
                           //document.getElementById('error_msg').style.display = 'none';
                          $(".errorText").text("");
                          $(".err").text("");
                        },10000);
                        
                        
                    },
                });

              });
              function printLoginErrorMsg(msg){
                  $.each(msg,function(key,value){
                      console.log(key);
                      console.log(value[0]);
                      $('.'+key+'_log_first_err').text(value[0]);
                      $('.'+key+'_log_sec_err').text(value[1]);
                      $(".errorText").text("");
                      
                       // $("#BtnLogin").prop("disabled",false);
                  });
              }

              
            });

          </script>
          
      @endsection

      
</body>
</body>
</html>