@extends('../layouts/admin-common')


@section('space-work')
  


   
      <!-------page-content start----------->
   
      <div id="content">
	     
		  <!------top-navbar-start-----------> 
		     
		  <div class="top-navbar">
		     <div class="xd-topbar">
			     <div class="row">
				     <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					    <div class="xp-menubar">
						    <span class="material-icons text-white">signal_cellular_alt</span>
						</div>
					 </div>
					 
					 <div class="col-md-5 col-lg-3 order-3 order-md-2">
					     <div class="xp-searchbar">
						     <form>
							    <div class="input-group">
								  <input type="search" class="form-control"
								  placeholder="Search">
								  <div class="input-group-append">
								     <button class="btn" type="submit" id="button-addon2">Go
									 </button>
								  </div>
								</div>
							 </form>
						 </div>
					 </div>
					 
					 
					 <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
					     <div class="xp-profilebar text-right">
						    <nav class="navbar p-0">
							   <ul class="nav navbar-nav flex-row ml-auto">
							   <li class="dropdown nav-item active">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <span class="material-icons">notifications</span>
								  <span class="notification">4</span>
								 </a>
								  <ul class="dropdown-menu">
								     <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
								  </ul>
							   </li>
							   
							   <li class="nav-item">
							     <a class="nav-link" href="#">
								   <span class="material-icons">question_answer</span>
								 </a>
							   </li>
							   
							   <li class="dropdown nav-item">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <img src="img/user.jpg" style="width:40px; border-radius:50%;"/>
								  <span class="xp-user-live"></span>
								 </a>
								  <ul class="dropdown-menu small-menu">
								     <li><a href="#">
									 <span class="material-icons">person_outline</span>
									 Profile
									 </a></li>
									 <li><a href="#">
									 <span class="material-icons">settings</span>
									 Settings
									 </a></li>
									 <li><a href="/logout">
									 <span class="material-icons">logout</span>
									 Logout
									 </a></li>
									 
								  </ul>
							   </li>
							   
							   
							   </ul>
							</nav>
						 </div>
					 </div>
					 
				 </div>
				 
				 <div class="xp-breadcrumbbar text-center">
				    <h4 class="page-title">Departments</h4>
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#">Admin</a></li>
					  <li class="breadcrumb-item active" aria-curent="page">Sub Departments</li>
					</ol>
				 </div>
				 
				 
			 </div>
		  </div>
		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
		     
		      <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
					     
					   <div class="table-title">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Manage  Sub Departments</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							   <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Add New Sub Department</span>
							   </a>
							   <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
							   <i class="material-icons">&#xE15C;</i>
							   <span>Delete</span>
							   </a>
							 </div>
					     </div>
					   </div>
					   
					   <table class="table table-striped table-hover">
					      <thead>
						     <tr>
							 <!-- <th><span class="custom-checkbox">
							 <input type="checkbox" id="selectAll">
							 <label for="selectAll"></label></th> -->
                             <th>#</th>
							 <th>Sub Dept Name</th>
                             <th>Dept Name</th>
							 <th>Actions</th>
							 </tr>
						  </thead>
						  
						  <tbody>
                            @if(count($sub_department) > 0)
                                    @php
                                        $key = 1; 
                                    @endphp
                                @foreach($sub_department as $dept)
                                    <tr>
                                        <!-- <th><span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="option[]" value="1">
                                        <label for="checkbox1"></label></span></th> -->
                                        <th scope="row">@php echo $key++; @endphp</th>
                                        <th>{{$dept->sub_dept_name}}</th>
                                        <th>{{$dept->departments[0]['dept_name']}}</th>
                                        <th>
                                            <a href="#editEmployeeModal" class="edit editButton" data-id="{{$dept->id}}" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                        <a href="#deleteEmployeeModal" class="delete deleteButton" data-id="{{$dept->id}}" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                        </a>
                                        </th>
                                    </tr> 
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">Data Not Found</td>
                                    </tr>
                                @endif
						    <!-- <tr>
                                <th><span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="option[]" value="1">
                                <label for="checkbox1"></label></th>
                                <th>Thomas Hardy</th>
                                <th>ThomasHardy@gmail.com</th>
                                <th>90r parkdground poland Usa.</th>
                                <th>(78-582552-9)</th>
                                <th>
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                                </th>
							</tr>
							 
							 
							<tr>
							 <th><span class="custom-checkbox">
							 <input type="checkbox" id="checkbox2" name="option[]" value="1">
							 <label for="checkbox2"></label></th>
							 <th>Dominique Perrier</th>
							 <th>dominiquePerrier@gmail.com</th>
							 <th>90r ser57, Berlin poland Bermany.</th>
							 <th>(78-5235-2-9)</th>
							 <th>
							    <a href="#editEmployeeModal" class="edit" data-toggle="modal">
							   <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
							   </a>
							   <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
							   <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
							   </a>
							 </th>
							</tr>
							 
							 
							<tr>
							 <th><span class="custom-checkbox">
							 <input type="checkbox" id="checkbox3" name="option[]" value="1">
							 <label for="checkbox3"></label></th>
							 <th>Marai Andres</th>
							 <th>MarariAndres@gmail.com</th>
							 <th>90r ser57, Berlin poland Bermany.</th>
							 <th>(78-239-669)</th>
							 <th>
							    <a href="#edit" class="edit" data-toggle="modal">
							   <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
							   </a>
							   <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
							   <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
							   </a>
							 </th>
							</tr>
							 
							<tr>
							 <th><span class="custom-checkbox">
							 <input type="checkbox" id="checkbox4" name="option[]" value="1">
							 <label for="checkbox4"></label></th>
							 <th>Vishweb Design</th>
							 <th>vishwebdesign@gmail.com</th>
							 <th> B-2 ser57 Nodia East Delhi,India.</th>
							 <th>(78-239-669)</th>
							 <th>
							    <a href="#editEmployeeModal" class="edit" data-toggle="modal">
							   <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
							   </a>
							   <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
							   <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
							   </a>
							 </th>
							</tr>
							 
							<tr>
							 <th><span class="custom-checkbox">
							 <input type="checkbox" id="checkbox5" name="option[]" value="1">
							 <label for="checkbox5"></label></th>
							 <th>Vishwajeet Kumar</th>
							 <th>vishkumar234@gmail.com</th>
							 <th> B-2 ser57 Nodia East Delhi,India.</th>
							 <th>(78-555-229)</th>
							 <th>
							    <a href="#editEmployeeModal" class="edit" data-toggle="modal">
							   <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
							   </a>
							   <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
							   <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
							   </a>
							 </th>
							</tr>
							  -->
						  </tbody>
						  
					      
					   </table>
					   
					   <div class="clearfix">
					     <div class="hint-text">showing <b>5</b> out of <b>25</b></div>
					     <ul class="pagination">
						    <li class="page-item disabled"><a href="#">Previous</a></li>
							<li class="page-item "><a href="#"class="page-link">1</a></li>
							<li class="page-item "><a href="#"class="page-link">2</a></li>
							<li class="page-item active"><a href="#"class="page-link">3</a></li>
							<li class="page-item "><a href="#"class="page-link">4</a></li>
							<li class="page-item "><a href="#"class="page-link">5</a></li>
							<li class="page-item "><a href="#" class="page-link">Next</a></li>
						 </ul>
					   </div>
					   
					   
					   
					   
	
					   
					   
					   
					   
					   </div>
					</div>
					
					
									   <!----add-modal start--------->
		<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="AddSubDepartment">
                        @csrf
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <label>Department Name</label>
                                <select class="form-control" aria-label="Default select example" required name="department_id">
                                    <option selected>Select Department</option>
                                    @if(count($department) > 0)
                                        @foreach($department as $dept)
                                            <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Department Name</label>
                                <input type="text" class="form-control" name="sub_dept_name" placeholder="Enter A Sub Department Name" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" id="Dept_Sub_Add">Add</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

					   <!----edit-modal end--------->
					   
					   
					   
					   
					   
				   <!----edit-modal start--------->
		<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Sub Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editSubDepartment">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" value=""  name="id" id="edit_sub_dept_id">
                            </div>
                            <div class="form-group">
                                <label>Department Name</label>
                                <select class="form-control" aria-label="Default select example" required name="department_id" id="department_id">
                                    <option selected>Select Department</option>
                                    @if(count($department) > 0)
                                        @foreach($department as $dept)
                                            <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Department Name</label>
                                <input type="text" class="form-control" name="sub_dept_name" value="" id="edit_sub_dept_name" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" id="btnSubmit">Save</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

					   <!----edit-modal end--------->	   
					   
					   
					 <!----delete-modal start--------->
		    <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="deleteSubDepartment">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Department</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" value=""  name="sub_dept_id" id="delete_subdept_id">
                                </div>
                                <p>Are you sure you want to delete this Records</p>
                                <p class="text-warning"><small>this action Cannot be Undone,</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Delete</button>
                            </div>
                        </form>
					
                    
                    </div>
                </div>
            </div>

					   <!----edit-modal end--------->   
					   
					
					
				 
			     </div>
			  </div>
		  
		    <!------main-content-end-----------> 
		  



<!-------complete html----------->




<!-- ===========================================Ajax & Jquery========================= -->
         <!-- ---------------ajax ------------------------ -->
         <script>
            $(document).ready(function(){
              /* ---------------------Add------------------------- */
                $("#AddSubDepartment").submit(function(event){
                    event.preventDefault();
                    var form = $("#AddSubDepartment")[0];
                    var data = new FormData(form);
                
                    $("#Dept_Sub_Add").prop("disabled",true);
                    $.ajax({
                        type:"POST",
                        url:"{{ route('addSubDepartment') }}",
                        data:data,
                        processData:false,
                        contentType:false,
                        success:function(data){
                        console.log(data);
                            $('#Dept_Sub_Add').prop("disabled",false);
                            $('input[type="text"]').val('');
                            location.reload();
                            
                        },
                        error:function(e){
                            $('#Dept_Sub_Add').prop("disabled",false);
                            $('input[type="text"]').val('');
                        }
                    });
                
                });
                
                //edit Sub Dept
                $(".editButton").click(function(){
                    var id = $(this).attr('data-id');
                    $("#edit_sub_dept_id").val(id);
                    var url = '{{ route("getDeptDetais","id")}}';
                    url = url.replace('id',id);

                    $.ajax({
                        url:url,
                        type:"GET",
                        success:function(data){
                                /* console.log(data); */
                            if(data.success == true){
                                var sub_dept = data.data;
                                $("#edit_sub_dept_name").val(sub_dept[0].sub_dept_name);
                                $("#department_id").val(sub_dept[0].dept_id);
                            }
                        }
                    })

                });
                $("#editSubDepartment").submit(function(event){
                    
                    event.preventDefault();
                   
                    var form = $('#editSubDepartment')[0];
                    var data = new FormData(form);
                    
                    
                    $.ajax({
                        url:"{{ route('updateSubDept') }}",
                        type:"POST",
                        data:data,
                        processData:false,
                        contentType:false,
                        success:function(data){
                            location.reload();
                            //console.log(data);
                           /* if(data.success == true){
                            location.reload();
                           }else{
                            alert(data.msg)
                           } */
                        },
                        error:function(e){
                            $('#btnSubmit').prop("disabled",false);
                        }
                    })
                })
                //delete Exam
                $(".deleteButton").click(function(){
                    var id = $(this).attr('data-id');
                    $("#delete_subdept_id").val(id);
                })
                $("#deleteSubDepartment").submit(function(event){
                    
                    event.preventDefault();
                   
                    var form = $('#deleteSubDepartment')[0];
                    var data = new FormData(form);
                    
                    
                    $.ajax({
                        url:"{{ route('deleteSubDepartment') }}",
                        type:"POST",
                        data:data,
                        processData:false,
                        contentType:false,
                        success:function(data){
                            location.reload();
                            //console.log(data);
                           
                        }
                    })
                })
                    
                    
            

            

              
            });

          </script>


@endsection

