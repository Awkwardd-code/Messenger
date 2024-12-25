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
				    <h4 class="page-title">Allocations</h4>
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#">Admin</a></li>
					  <li class="breadcrumb-item active" aria-curent="page">Dept Of Allocation</li>
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
							    <h2 class="ml-lg-2">Dept Of  Allocation</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							   <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Add New Allocation</span>
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
							 <th>Name</th>
                             <th>Group Name</th>
                             
							 <th>Actions</th>
							 </tr>
						  </thead>
						  
						  <tbody>
                                @if(count($messenger_groups) > 0)
                                    @php
                                        $key = 1; 
                                    @endphp
                                @foreach($messenger_groups as $allocation)
                                    <tr>
                                        <!-- <th><span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="option[]" value="1">
                                        <label for="checkbox1"></label></span></th> -->
                                        <th scope="row">@php echo $key++; @endphp</th>
                                        <th>{{$allocation->users[0]['name']}}</th>
                                        <th>{{$allocation->groups[0]['name']}}</th>
                                        <th>
                                            <a href="#editEmployeeModal" data-id="{{$allocation->id}}" data-user-id="{{$allocation->users[0]['id']}}" data-group-id="{{$allocation->groups[0]['id']}}"   class="edit editButton" id="showEditSubDept" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                        <a href="#deleteEmployeeModal" data-id="{{$allocation->id}}"  class="delete deleteButton"  data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                        </a>
                                        </th>
                                    </tr> 
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Data Not Found</td>
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
                        <h5 class="modal-title">Add Designation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addAllot">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Group Name</label>
                                <select class="form-control" aria-label="Default select example" required name="group_id" id="group_id">
                                    <option selected>Select A Group</option>
                                    @if(count($groups) > 0)
                                        @foreach ($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    @endif
                                    
                                </select>
                                
                            </div>
                           
                            <div class="form-group">
                                <label>User Name</label>
                                <select class="form-control" aria-label="Default select example" required name="user_id" id="sub_department">
                                    <option selected>Select A User</option>
                                </select>
                                
                            </div>
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" id="Add">Add</button>
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
                        <h5 class="modal-title">Edit Group Allocation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editAllocation">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" value=""  name="id" id="edit_group_allot_id">
                            </div>
                            
                            <div class="form-group">
                                <select class="form-control" aria-label="Default select example" required name="group_id" id="edit_group_id">
                                    @if(count($groups) > 0)
                                        @foreach ($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    @endif
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <select class="form-control" aria-label="Default select example" required name="user_id" id="edit_sub_department">
                                    <option selected>Select An User</option>
                                    
                                </select>
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
                        <form id="deleteAllocation">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Group Allocation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" value=""  name="id" id="delete_allot_id">
                                </div>
                                <p>Are you sure you want to delete this Records</p>
                                <p class="text-warning"><small>this action Cannot be Undone,</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success" id="btnDelete">Delete</button>
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
               //get data
                $('#group_id').on('change', function() {
                    var id = $(this).val();
                    var url = '{{ route("getUserDetais","id")}}';
                    url = url.replace('id',id);

                    $.ajax({
                        url:url,
                        type:"GET",
                        dataType: 'json',
                        success:function(data){
                            console.log(data);
                            $('#sub_department').html("");
                            $('#sub_department').append('<option selected>Select A User</option>');
                            $.each(data, function(key, city) {
                                $('#sub_department').append('<option value="' + city.id + '">' + city.name + '</option>');
                            });
                        }
                    })

                });
                //add
                $("#addAllot").submit(function(event){
                    event.preventDefault();
                    var form = $("#addAllot")[0];
                    var data = new FormData(form);
                    
                    $("#Add").prop("disabled",true);
                    $.ajax({
                        type:"POST",
                        url:"{{ route('addGroupAllot') }}",
                        data:data,
                        processData:false,
                        contentType:false,
                        success:function(data){
                        console.log(data);
                            location.reload();
                                
                        }
                    });
                    
                });
                //get edit data
                $(".editButton").click(function(){
                    var id = $(this).attr('data-id');
                    /* console.log(id); */
                    $("#edit_group_allot_id").val(id);
                    var url = '{{ route("getGroupAllotDetais","id")}}';
                    url = url.replace('id',id);

                    $.ajax({
                        url:url,
                        type:"GET",
                        success:function(data){
                                //console.log(data);
                            if(data.success == true){
                                var allocations = data.data;
                                $("#edit_group_allot_id").val(allocations[0].id);
                                $("#edit_group_id").val(allocations[0].group_id);
                            

                                /* var dataId = allocations[0].sub_department_id;
                                console.log(dataId);
                                
                                var url = '{{ route("getEditSubDeptDetais","id")}}';
                                url = url.replace('id',dataId);
                                $.ajax({
                                    url:url,
                                    type:"GET",
                                    dataType: 'json',
                                    success:function(data){
                                        console.log(data);
                                        
                                    }
                                }) */
                            }
                        }
                    })

                });
                $(".editButton").click(function(){
                    var id = $(this).attr('data-group-id');
                    var subDeptId = $(this).attr('data-user-id');
                    /* console.log(id); */
                    var url = '{{ route("getEditUserDetais","id")}}';
                    url = url.replace('id',id);

                    $.ajax({
                        url:url,
                        type:"GET",
                        dataType: 'json',
                        success:function(data){
                            console.log(data);
                           
                            
                            //console.log(id);
                            $('#edit_sub_department').html("");
                           // $('#edit_sub_department').append('<option>Select A Sub Department</option>');
                            $.each(data, function(key, city) {
                                var select ="";
                                if(city.id == subDeptId){
                                    select = "selected";
                                }

                                $('#edit_sub_department').append('<option value="' + city.id + '" '+ select +'>' + city.name + '</option>');
                            });
                        }
                        
                    })

                });
                //edit data
                $('#edit_group_id').on('change', function() {
                    var id = $(this).val();
                    var url = '{{ route("editUserDetais","id")}}';
                    url = url.replace('id',id);

                    $.ajax({
                        url:url,
                        type:"GET",
                        dataType: 'json',
                        success:function(data){
                            console.log(data);
                            $('#edit_sub_department').html("");
                            $('#edit_sub_department').append('<option selected>Select A User</option>');
                            $.each(data, function(key, city) {
                                $('#edit_sub_department').append('<option value="' + city.id + '">' + city.name + '</option>');
                            });
                        }
                    })

                });
                $("#editAllocation").submit(function(event){
                    
                    event.preventDefault();
                   
                    var form = $('#editAllocation')[0];
                    var data = new FormData(form);
                    $("#btnSubmit").prop("disabled",true);
                    
                    $.ajax({
                        url:"{{ route('editGroupAllot') }}",
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
                //delete data
                $(".deleteButton").click(function(){
                    var id = $(this).attr('data-id');
                    $("#delete_allot_id").val(id);
                })
                $("#deleteAllocation").submit(function(event){
                    
                    event.preventDefault();
                   
                    var form = $('#deleteAllocation')[0];
                    var data = new FormData(form);
                    $("#btnDelete").prop("disabled",true);
                    
                    $.ajax({
                        url:"{{ route('deleteGroupAllocation') }}",
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


