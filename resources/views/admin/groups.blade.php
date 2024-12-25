<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>

            .mediaContainer {
                margin-bottom: 20px; /* Space below mediaContainer */
            }

            textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px; /* Adjust margin as needed */
                border: 1px solid #ccc;
                border-radius: 5px;
                resize: none; /* Prevent resizing */
            }

            #mediaDisplay {
                margin-top: 10px; /* Space between textarea and media */
                width: 100%; /* Set width to fill the container */
                max-width: 500px; /* Fixed width for the media display */
                margin: 0 auto; /* Center the media display */
            }
            img, video {
                max-width: 100%;
                margin: 10px 0;
            }

            .upload-icon {
                cursor: pointer;
                font-size: 2em; /* Adjust size as needed */
            }
            textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px; /* Adjust margin as needed */
                border: 1px solid #ccc;
                border-radius: 5px;
                resize: none; /* Prevent resizing */
                overflow: hidden;
            }
            #auto-resize-textarea {
                width: 100%;
                min-height: 50px;
                max-height: 500px; 
                overflow-y: hidden; 
                resize: none;       
                padding: 10px;
                font-size: 16px;
                line-height: 1.5;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            .image{
                height: 60px;
                width: 120px;
            }
            .image img{
                height:100%;
                width: 100%;
            }
            /* body {
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color: #f0f2f5;
            } */
            .container {
                width: 90%;
                max-width: 600px;
                padding: 20px;
               
                background-color: #fff;
                border-radius: 8px;
                text-align: center;
            }
            #file-list, #no-files-div {
                margin-top: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%;
            }
            .file-item {
                position: relative;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 10px 0;
                border-radius: 8px;
                background-color: #fafafa;
                padding: 10px;
            }
            .file-item img {
                max-width: 100%;
                max-height: 200px;
                object-fit: cover;
                border-radius: 8px;
            }
            .remove-btn {
                position: absolute;
                top: 5px;
                right: 5px;
                background-color: transparent;
                color: red;
                border: none;
                font-size: 24px;
                cursor: pointer;
                padding: 4px 8px;
            }
            #no-files-div img {
                max-width: 100%;
                max-height: 200px;
                border-radius: 8px;
            }

            
            #file-input-wrapper {
                display: inline-block;
                margin: 10px 0;
            }

            #file-input {
                display: none; 
            }

            #file-input-label {
                display: inline-block;
                padding: 10px 20px;
                
                color: white;
                font-size: 30px;
                border-radius: 4px;
                cursor: pointer;
            }


            
            @media (max-width: 600px) {
                .file-item img {
                    max-height: 150px;
                }
                .container {
                    padding: 15px;
                }
            }
            @media (min-width: 601px) and (max-width: 900px) {
                .file-item img {
                    max-height: 200px;
                }
            }
            @media (min-width: 901px) {
                .file-item img {
                    max-height: 250px;
                }
                .container {
                    max-width: 700px;
                }
            }
    </style>
</head>
<body>
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
						<h4 class="page-title">Designations</h4>
						<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Admin</a></li>
						<li class="breadcrumb-item active" aria-curent="page">Designations</li>
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
									<h2 class="ml-lg-2">Manage  Designations</h2>
								</div>
								<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
								<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
								<i class="material-icons">&#xE147;</i>
								<span>Add New Group</span>
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
								<th>Group Name</th>
								<th>Department Name</th>
								<th>Group Image</th>
								<th>Actions</th>
								</tr>
							</thead>
							
							<tbody>
								@if(count($groups) > 0)
										@php
											$key = 1; 
										@endphp
									@foreach($groups as $group)
										<tr>
											<!-- <th><span class="custom-checkbox">
											<input type="checkbox" id="checkbox1" name="option[]" value="1">
											<label for="checkbox1"></label></span></th> -->
											<th scope="row">@php echo $key++; @endphp</th>
											<th>{{$group->name}}</th>
											<th>{{$group->departments[0]['dept_name']}}</th>
											<th class="image"><img src="{{ asset('uploads/groups/' . $group->image) }}" /></th>
											<th>
												<a href="#editEmployeeModal" class="edit editButton" data-id="{{$group->id}}" data-name="{{$group->name}}" data-toggle="modal">
											<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
											</a>
											<a href="#deleteEmployeeModal" class="delete deleteButton" data-id="{{$group->id}}" data-toggle="modal">
											<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
											</a>
											</th>
										</tr> 
									@endforeach
									@else
										<tr>
											<td colspan="3">Data Not Found</td>
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
							<h5 class="modal-title">Add Group</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="addDesignation" enctype="multipart/form-data">
							@csrf
							<div class="modal-body">
								<div class="form-group">
									<label>Group Name</label>
									<input type="text" class="form-control" name="name" placeholder="Enter A Group Name" required>
								</div>
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
								<div class="addcontainer">
									<label>Group Image</label>
                                    <div class="mediaContainer">
                                        <div id="mediaDisplay" class="modal-body"></div>
                                    </div>
                                    <input type="file" id="fileInput" name="file"  accept="image/*" style="display:none;">
                                </div>
							</div>
							<div class="modal-footer">
								<label for="fileInput" class="upload-icon">📁</label>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-success" id="Dept_Add">Add</button>
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
							<h5 class="modal-title">Edit Group</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="editDesignation" enctype="multipart/form-data">
							@csrf
							<div class="modal-body">
								<div class="form-group">
									<input type="hidden" class="form-control" value=""  name="id" id="edit_deg_id">
								</div>
								<div class="form-group">
									<label>Group Name</label>
									<input type="text" class="form-control" name="name" value="" id="edit_deg_name">
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

								<div class="containe">
									<label>Group Image</label>
                                    <div class="mediaContainer">
                                        <textarea id="auto-resize-textarea" style="display: none;" class="edit_post"></textarea>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="container">
                                    
                                   
                                    <!-- New div to display when no files are selected -->
                                    <div id="no-files-div">
                                        <!-- <img src="images/feed-image-1.png" alt="No files selected"> -->
                                    </div>
                                    
                                    <!-- Div to display selected files -->
                                    <div id="file-list" style="display: none;">
                                        <!-- Selected files will be displayed here -->
                                    </div>
                                </div>
                                
							</div>
							<div class="modal-footer">
								<div id="file-input-wrapper">
                                    <input type="file" id="file-input" name="image" multiple>
                                    <label for="file-input" id="file-input-label">&#128193;</label>
                                </div>
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
							<form id="deleteDesignation">
								@csrf
								<div class="modal-header">
									<h5 class="modal-title">Delete Group</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<input type="hidden" class="form-control" value=""  name="id" id="delete_deg_id">
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
					$("#addDesignation").submit(function(event){
						event.preventDefault();
						var form = $("#addDesignation")[0];
						var data = new FormData(form);
					
						$("#Dept_Add").prop("disabled",true);
						$.ajax({
							type:"POST",
							url:"{{ route('addGroup') }}",
							data:data,
							processData:false,
							contentType:false,
							success:function(data){
							console.log(data);
								$('#Dept_Add').prop("disabled",false);
								$('input[type="text"]').val('');
								location.reload();
								
							},
							error:function(e){
								$('#Dept_Add').prop("disabled",false);
								$('input[type="text"]').val('');
							}
						});
					
					});
					//edit Data
					$(".editButton").click(function(){
                        var id = $(this).attr('data-id');
                        //$("#edit_post_id").val(id);
                        var url = '{{ route("getGroupDetais","id")}}';
                        url = url.replace('id',id);

                        $.ajax({
                            url:url,
                            type:"GET",
                            success:function(data){
                                    console.log(data);
                                
                                if(data.success == true){
                                    var posts = data.data;
                                    var image = posts[0].image;
                                    $('#no-files-div').html("");
                                    $('#no-files-div').append('<img src="uploads/groups/'+image+'" alt="Default Preview">');
                                    $("#department_id").val(posts[0].dept_id);
                                    $("#edit_deg_name").val(posts[0].name);
                                    $("#edit_deg_id").val(posts[0].id);
                                }
                            }
                        })

                    });
					$("#editDesignation").submit(function(event){
						
						event.preventDefault();
					
						var form = $('#editDesignation')[0];
						var data = new FormData(form);
						
						
						$.ajax({
							url:"{{ route('editGroup') }}",
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
					//delete Data
					$(".deleteButton").click(function(){
						$('#delete_deg_id').val($(this).attr('data-id'));
					});
					$("#deleteDesignation").submit(function(event){
						
						event.preventDefault();
					
						var form = $('#deleteDesignation')[0];
						var data = new FormData(form);
						
						
						$.ajax({
							url:"{{ route('deleteGroup') }}",
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



</body>
</html>