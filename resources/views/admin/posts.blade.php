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
                height: 100px;
                width: 110px;
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
                        <h4 class="page-title">Departments</h4>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-curent="page">Departments</li>
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
                                    <h2 class="ml-lg-2">Manage  Posts & Directions</h2>
                                </div>
                                <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i>
                                <span>Add New Post</span>
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
                                <th>Post Comment</th>
                                <th>Post Image</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                
                            @if(count($post) > 0)
                                    @php
                                        $key = 1; 
                                    @endphp
                                @foreach($post as $posts)
                                    <tr>
                                        <th scope="row">@php echo $key++; @endphp</th>
                                        <th>{{$posts->post}}</th>
                                        <th class="image"><img src="{{ asset('uploads/posts/' . $posts->file) }}" /></th>
                                        <th>
                                            <a href="#editEmployeeModal" class="edit editButton" data-id="{{$posts->id}}" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                        <a href="#deleteEmployeeModal" class="delete deleteButton" data-id="{{$posts->id}}" data-toggle="modal">
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
                            <h5 class="modal-title">Add Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addPost" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}"  name="user_id">
                                </div>
                                <div class="addcontainer">
                                    <div class="mediaContainer">
                                        <textarea id="auto-resize-textarea"  name="post" placeholder="Share Yours Thoughts......"></textarea>
                                        <!-- <textarea id="auto-resize-textarea" name="post" placeholder="Share Yours Thoughts......"></textarea> -->
                                        <div id="mediaDisplay" class="modal-body">
                                        </div>
                                    </div>
                                    <input type="file" id="fileInput" name="file" multiple accept="image/*,video/*" style="display:none;">
                                </div> 
                                
                            </div>
                            <div class="modal-footer">
                                <label for="fileInput" class="upload-icon">📁</label>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success" id="Post_Add">Add</button>
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
                            <h5 class="modal-title">Edit Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editPost" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" id="edit_post_id">
                                </div>
                                
                                <div class="containe">
                                    <div class="mediaContainer">
                                        <textarea id="auto-resize-textarea" class="edit_post" name="post"></textarea>
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
                                <!-- File Manager Icon to trigger file upload -->
                               <!--  <span id="fileIcon" class="file-icon">&#128193;</span> --> <!-- Unicode for a file manager icon -->
                                 <!-- Custom styled file input button -->
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
                            <form id="deletePost">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" value=""  name="id" id="delete_post_id">
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
                    
                    $("#addPost").submit(function(event){
                        event.preventDefault();
                        var form = $("#addPost")[0];
                        var data = new FormData(form);
                    
                        $("#Post_Add").prop("disabled",true);
                        $.ajax({
                            type:"POST",
                            url:"{{ route('addPost') }}",
                            data:data,
                            processData:false,
                            contentType:false,
                            success:function(data){
                            console.log(data);
                                $('#Post_Add').prop("disabled",false);
                                $('input[type="text"]').val('');
                                location.reload();
                                
                            },
                            error:function(e){
                                $('#Post_Add').prop("disabled",false);
                                $('input[type="text"]').val('');
                            }
                        });
                    
                    });
                    //edit Post



                    $(".editButton").click(function(){
                        var id = $(this).attr('data-id');
                        //$("#edit_post_id").val(id);
                        var url = '{{ route("getPostDetais","id")}}';
                        url = url.replace('id',id);

                        $.ajax({
                            url:url,
                            type:"GET",
                            success:function(data){
                                    console.log(data);
                                
                                if(data.success == true){
                                    var posts = data.data;
                                    var image = posts[0].file;
                                    $('#no-files-div').html("");
                                    $('#no-files-div').append('<img src="uploads/posts/'+image+'" alt="Default Preview">');
                                    
                                    $(".edit_post").val(posts[0].post);
                                    $("#edit_post_id").val(posts[0].id);
                                }
                            }
                        })

                    });
                    $("#editPost").submit(function(event){
                        
                        event.preventDefault();
                    
                        var form = $('#editPost')[0];
                        var data = new FormData(form);
                        
                        
                        $.ajax({
                            url:"{{ route('editPost') }}",
                            type:"POST",
                            data:data,
                            processData:false,
                            contentType:false,
                            success:function(data){
                               // location.reload();
                                console.log(data);
                                /* console.log(error); */
                                if(data.success == true){
                                    location.reload();
                                }else{
                                    alert(data.msg)
                                }
                            }
                        })
                    })
                    
                //delete Data
                $(".deleteButton").click(function(){
                    $('#delete_post_id').val($(this).attr('data-id'));
                });
                $("#deletePost").submit(function(event){
                    
                    event.preventDefault();
                   
                    var form = $('#deletePost')[0];
                    var data = new FormData(form);
                    
                    
                    $.ajax({
                        url:"{{ route('deletePost') }}",
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
               
                    /* // Function to load container content
                    function loadContainer() {
                        const containerHTML = `
                            <div class="container" data-existing-image-url="${asset('uploads/posts/feed-image-4.png')}">
                                <input type="file" id="editFileInput" accept="image/*" style="display: none;">
                                <input type="text" id="fileName" value="No file chosen" readonly style="display: none;">
                                <button id="selectFileButton" type="button">Upload</button>
                                <div id="preview" class="preview">
                                    <img id="previewImage" src="${asset('uploads/posts/feed-image-4.png')}" alt="File Preview">
                                    <div id="closeIcon" class="close-icon" style="display: none;">&times;</div>
                                </div>
                            </div>
                        `;

                        // Insert the container HTML into dynamicContainer and initialize functionality
                        document.getElementById('dynamicContainer').innerHTML = containerHTML;
                        initializeContainerFunctions(); // Call the function from the separate file
                    }

                    // Call loadContainer immediately when the page loads
                    window.addEventListener('DOMContentLoaded', loadContainer); */

            </script>


    @endsection
</body>
</html>