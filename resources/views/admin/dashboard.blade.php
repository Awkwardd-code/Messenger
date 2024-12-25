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
									 <li><a href="#">
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
				    <h4 class="page-title">Dashboard</h4>
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#">Vishweb</a></li>
					  <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
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
							    <h2 class="ml-lg-2 mb-1">Manage  Employees</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							   <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Add New Employees</span>
							   </a> -->
							   <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
							   <i class="material-icons">&#xE15C;</i>
							   <span>Delete</span>
							   </a> -->
							 </div>
					     </div>
					   </div>
					   
					   <table class="table table-striped table-hover">
					      <thead>
						     <!-- <tr>
							 <th><span class="custom-checkbox">
							 <input type="checkbox" id="selectAll">
							 <label for="selectAll"></label></th> -->
							 <th>#</th>
							 <th>Name</th>
							 <th>Email</th>
							 <th>Phone</th>
							 <th>Status</th>
							 <th>Actions</th>
							 </tr>
						  </thead>
						  
						  <tbody>
						     
						  		@if(count($user) > 0)
                                    @php
                                        $key = 1; 
                                    @endphp
                                @foreach($user as $users)
                                    <tr>
                                        <!-- <th><span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="option[]" value="1">
                                        <label for="checkbox1"></label></span></th> -->
                                        <th scope="row">@php echo $key++; @endphp</th>
                                        <th>{{$users->name}}</th>
										<th>{{$users->email}}</th>
										<th>{{$users->phone}}</th>
										<th>
											@if($users->is_varified == 1)
												<i  class="fa">&#xf046;</i>
											@else
												<a href="#editEmployeeModal" class="edit varifyButton" data-id="{{$users->id}}" data-toggle="modal">
													<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
												</a>
											@endif
										<!-- <i style="font-size:24px" class="fa">&#xf087;</i> --></th>
                                        <th>
                                        <a href="#deleteEmployeeModal" class="delete deleteButton" data-id="{{$users->id}}" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                        </a>
                                        </th>
                                    </tr> 
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Data Not Found</td>
                                    </tr>
                                @endif
							 
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
						<h5 class="modal-title">Add Employees</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="emil" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-success">Add</button>
					</div>
					</div>
				</div>
		</div>

					   <!----edit-modal end--------->
					   
					   
					   
					   
					   
				   <!----edit-modal start--------->
			<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">

						<form id="varifyUser">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Varify User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control"   name="id" id="varify_id">
                                </div>
                                <p>Are you sure you want to varify this User</p>
                                <p class="text-warning"><small>this action Cannot be Undone,</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success" id="varifyBtn">Varify</button>
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
								<form id="deleteUser">
									@csrf
									<div class="modal-header">
										<h5 class="modal-title">Delete User</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<input type="hidden" class="form-control" value=""  name="id" id="delete_user_id">
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
              /* ---------------------varification------------------------- */
              	$(".varifyButton").click(function(){
                    $('#varify_id').val($(this).attr('data-id'));
                });
				$("#varifyUser").submit(function(event){
                    
                    event.preventDefault();
                   
                    var form = $('#varifyUser')[0];
                    var data = new FormData(form);
                    $("#varifyBtn").prop("disabled",true);
                    
                    $.ajax({
                        url:"{{ route('varifyUser') }}",
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
                        }
                    })
                })
				/* --------------------------------deactivate------------------------ */
				//delete Data
                $(".deleteButton").click(function(){
                    $('#delete_user_id').val($(this).attr('data-id'));
                });
                $("#deleteUser").submit(function(event){
                    
                    event.preventDefault();
                   
                    var form = $('#deleteUser')[0];
                    var data = new FormData(form);
                    
                    
                    $.ajax({
                        url:"{{ route('deleteUser') }}",
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


