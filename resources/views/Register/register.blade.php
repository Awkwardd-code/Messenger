<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
      @extends('../layouts/layout-common')


      @section('space-work')

      
             
          <div class="container">
                <!-- Registeration Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registration Functionalities</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" id="error_msg">
                        <p class="name_first_err err"></p>
                        <p class="name_sec_err err"></p>
                        <p class="email_first_err err"></p>
                        <p class="email_sec_err err"></p>
                        <p class="password_first_err err"></p>
                        <p class="password_sec_err err"></p>
                        <p class="image_first_err err"></p>
                        <p class="image_sec_err err"></p>

                        <p class="success"></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

            <div class="text">
                Register Form
                <center>
                    <div id="imagePreview" class="image-preview"></div>
                </center>
            </div>
            <form id="Register_form">
                @csrf
                <div class="form-row form-row-register name-input-data">
                    <div class="input-data nameErrorDiv input-data-register">
                        <input type="text" name="name">
                      <div class="underline"></div>
                        
                      <label for="">Name</label>
                      <div class="errorDiv ">
                          <p class="name_first_err err"></p>
                          <p class="name_sec_err err"></p>
                        </div>
                    </div>
                    <div class="input-data input-data-register">
                        <input type="email" name="email">
                    <div class="underline"></div>
                        <div class="errorDiv">
                        <p class="email_first_err err"></p>
                        <p class="email_sec_err err"></p>
                        </div>
                    <label for=""> Email Address</label>
                    </div>
                </div>
                <div class="form-row form-row-register">
                    <div class="input-data input-data-register">
                        <input type="password" name="password">
                    <div class="underline"></div>
                      <div class="errorDiv">
                      <p class="password_first_err err"></p>
                        </div>
                    <label for=""> Password</label>
                    </div>
                    <div class="input-data input-data-register">
                        <input type="password" name="password_confirmation">
                    <div class="underline"></div>
                    <div class="errorDiv">
                      <p class="password_sec_err err"></p>
                        </div>
                    <label for="">Confirm Password</label>
                    </div>
                </div>
                <div class="file-input custom-file-input">
                    <label for="fileInput"  class="upload-button" class="file-input-hidden">Choose a profile...</label>
                    <input type="file" id="fileInput" name="image" class="file-input-label" accept="image/*">
                </div>
                <div class="errorDiv imageError">
                        <p class="email_first_err err"></p>
                        <p class="email_sec_err err"></p>
                        </div>
                <div class="form-row form-row-register">
                    <div class="input-data input-data-register">
                      Already Have An Account?<a href="/login"> Login</a>
                    </div>
                </div>
                <div class="form-row form-row-register">
                        
                    <div class="input-data input-data-register">
                        
                        <div class="form-row submit-btn submit-register">
                            <div class="input-data  submit_button">
                                <div class="inner"></div>
                                <input type="submit" id="BtnRegister" value="Register">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
            
        </div>





        <!-- ---------------ajax ------------------------ -->
        <script>
            $(document).ready(function(){
              /* ---------------------Register------------------------- */
              
              $("#Register_form").submit(function(event){
                event.preventDefault();
                var form = $("#Register_form")[0];
                var data = new FormData(form);
            
                $("#BtnRegister").prop("disabled",true);
                $.ajax({
                      type:"POST",
                      url:"{{ route('studentRegister') }}",
                      data:data,
                      processData:false,
                      contentType:false,
                      success:function(data){
                        console.log(data);
                        if($.isEmptyObject(data.error)){
                            console.log(data.success);
                            $(".success").text(data.success);
                                if(data.success){
                                  window.location.replace("/login");
                                }

                            $(".err").text("");
                            setTimeout(function(){
                                
                                $(".success").text("");
                            },10000);
                        }else{
                          printErrorMsg(data.error);
                        }
                        $("#BtnRegister").prop("disabled",false);
                        $("input[type='text']").val('');
                        $("input[type='email']").val('');
                        $("input[type='file']").val('');
                        $("input[type='password']").val('');
                        //$(".err").text("");
                        setTimeout(function(){
                           //document.getElementById('error_msg').style.display = 'none';
                          $(".err").text("");
                        },10000);
                         
                      }
                });

              });


               function printErrorMsg(msg){
                $.each(msg,function(key,value){
                    console.log(key);
                    console.log(value[0]);
                    $('.'+key+'_first_err').text(value[0]);
                    $('.'+key+'_sec_err').text(value[1]);
                    $(".success").text("");
                });
              }
              /* ---------------------Login---------------------------- */
              
            });

          </script>
          
      @endsection

      
</body>
</body>
</html>