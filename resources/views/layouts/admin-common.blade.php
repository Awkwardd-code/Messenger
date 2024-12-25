<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
         <!--===============================================================================================-->
	    <link rel="icon" type="image/png" href="  {{ asset('ContactFrom_v1/images/icons/favicon.ico ') }}"/>
    	<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('crud dashboard/crud dashboard/weblab/css/bootstrap.min.css ') }}">
	    <!----css3---->
        <link rel="stylesheet" href="{{asset('crud dashboard/crud dashboard/weblab/css/custom.css') }}">

		<!-- ajax -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- font awasome -->
        

		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 
    <title>Document</title>
</head>
<body>
    
<div class="wrapper">
     
     <div class="body-overlay"></div>
    
    <!-------sidebar--design------------>
    
    <div id="sidebar">
       <div class="sidebar-header">
          <h3><img src="img/logo.png" class="img-fluid"/><span>vishweb design</span></h3>
       </div>
       <ul class="list-unstyled component m-0">
         <li class="active">
         <a href="/admin/adminDashboard" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
         </li>
         <li>
         <a href="/departments" class="dashboard"><i class="material-icons">branding_watermark</i>Departments </a>
         </li>
         <li>
         <a href="/sub-departments" class="dashboard"><i class="material-icons">quickreply</i>Sub Dept </a>
         </li>
         <li>
         <a href="/designation" class="dashboard"><i class="material-icons">contact_mail</i>Designation </a>
         </li>
         <li>
         <a href="/post" class="dashboard"><i class="material-icons">post_add</i>Posts & Reviews </a>
         </li>
         <li>
           <a href="/allocations" class="dashboard"><i class="material-icons">how_to_reg</i>Allocations </a>
         </li>
         <li>
           <a href="/message-groups" class="dashboard"><i class="material-icons">groups</i>Groups</a>
         </li>
         <li>
           <a href="/messenger-groups" class="dashboard"><i class="material-icons">ballot</i>Group Allot</a>
         </li>
         <li>
           <a href="/messenger/groups" class="dashboard"><i class="material-icons">sms</i>Messenger</a>
         </li>
         <!-- <li class="dropdown">
         <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" 
         class="dropdown-toggle">
         <i class="material-icons">branding_watermark</i>Departments
         </a>
         <ul class="collapse list-unstyled menu" id="homeSubmenu1">
            <li><a href="#">layout 1</a></li>
            <li><a href="#">layout 2</a></li>
            <li><a href="#">layout 3</a></li>
         </ul>
         </li> -->
         
         
          <!-- <li class="dropdown">
         <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" 
         class="dropdown-toggle">
         <i class="material-icons">apps</i>widgets
         </a>
         <ul class="collapse list-unstyled menu" id="homeSubmenu2">
            <li><a href="#">Apps 1</a></li>
            <li><a href="#">Apps 2</a></li>
            <li><a href="#">Apps 3</a></li>
         </ul>
         </li> -->
         
          <!-- <li class="dropdown">
         <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" 
         class="dropdown-toggle">
         <i class="material-icons">equalizer</i>charts
         </a>
         <ul class="collapse list-unstyled menu" id="homeSubmenu3">
            <li><a href="#">Pages 1</a></li>
            <li><a href="#">Pages 2</a></li>
            <li><a href="#">Pages 3</a></li>
         </ul>
         </li> -->
         
         
          <!-- <li class="dropdown">
         <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" 
         class="dropdown-toggle">
         <i class="material-icons">extension</i>UI Element
         </a>
         <ul class="collapse list-unstyled menu" id="homeSubmenu4">
            <li><a href="#">Pages 1</a></li>
            <li><a href="#">Pages 2</a></li>
            <li><a href="#">Pages 3</a></li>
         </ul>
         </li> -->
         
          <!-- <li class="dropdown">
         <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" 
         class="dropdown-toggle">
         <i class="material-icons">border_color</i>forms
         </a>
         <ul class="collapse list-unstyled menu" id="homeSubmenu5">
            <li><a href="#">Pages 1</a></li>
            <li><a href="#">Pages 2</a></li>
            <li><a href="#">Pages 3</a></li>
         </ul>
         </li>
         
         <li class="dropdown">
         <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" 
         class="dropdown-toggle">
         <i class="material-icons">grid_on</i>tables
         </a>
         <ul class="collapse list-unstyled menu" id="homeSubmenu6">
            <li><a href="#">table 1</a></li>
            <li><a href="#">table 2</a></li>
            <li><a href="#">table 3</a></li>
         </ul>
         </li> -->
         
         
         <!-- <li class="dropdown">
         <a href="#homeSubmenu7" data-toggle="collapse" aria-expanded="false" 
         class="dropdown-toggle">
         <i class="material-icons">content_copy</i>Pages
         </a>
         <ul class="collapse list-unstyled menu" id="homeSubmenu7">
            <li><a href="#">Pages 1</a></li>
            <li><a href="#">Pages 2</a></li>
            <li><a href="#">Pages 3</a></li>
         </ul>
         </li> -->
         
          
         <!-- <li class="">
         <a href="#" class=""><i class="material-icons">date_range</i>copy </a>
         </li>
         <li class="">
         <a href="#" class=""><i class="material-icons">library_books</i>calender </a>
         </li> -->
       
       </ul>
    </div>
    
  <!-------sidebar--design- close----------->
  
  @yield('space-work')	 
		 
		 <!----footer-design------------->
		 
		 <footer class="footer">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2021 Vishweb Design . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
		 
		 
		 
		 
	  </div>
   
</div>


   
    


    
    
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" {{asset('crud dashboard/crud dashboard/weblab/js/jquery-3.3.1.slim.min.js') }} "></script>
   <script src="{{asset('crud dashboard/crud dashboard/weblab/js/popper.min.js ') }}"></script>
   <script src="{{asset('crud dashboard/crud dashboard/weblab/js/bootstrap.min.js  ') }}"></script>
   <script src=" {{asset('crud dashboard/crud dashboard/weblab/js/jquery-3.3.1.min.js ') }}"></script>
  
  
  <script type="text/javascript">
       $(document).ready(function(){
            $(".xp-menubar").on('click',function(){
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
         });
         
         $('.xp-menubar,.body-overlay').on('click',function(){
            $("#sidebar,.body-overlay").toggleClass('show-nav');
         });
         
         });



       

        /* Add */
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const files = event.target.files;
            const mediaDisplay = document.getElementById('mediaDisplay');
            mediaDisplay.innerHTML = ''; // Clear previous media

            Array.from(files).forEach(file => {
                const url = URL.createObjectURL(file);
                const mediaElement = document.createElement(file.type.startsWith('video/') ? 'video' : 'img');

                if (file.type.startsWith('video/')) {
                    mediaElement.src = url;
                    mediaElement.controls = true; // Add controls for video
                } else {
                    mediaElement.src = url;
                }

                mediaDisplay.appendChild(mediaElement);
            });
        });

        /* textarea */
        const textarea = document.getElementById('auto-resize-textarea');
        textarea.addEventListener('input', () => {
            textarea.style.height = 'auto'; // Reset the height to auto
            textarea.style.height = `${textarea.scrollHeight}px`; // Set it to the scroll height
        });



        /* edit */



        const fileInput = document.getElementById('file-input');
        const fileList = document.getElementById('file-list');
        const noFilesDiv = document.getElementById('no-files-div');
        let selectedFiles = []; // Array to hold selected files

        fileInput.addEventListener('change', function(event) {
            const files = Array.from(event.target.files);

            // Update display based on whether files are selected
            if (files.length === 0) {
                noFilesDiv.style.display = "block";
                fileList.style.display = "none";
                selectedFiles = []; // Clear selectedFiles array
                return;
            } else {
                noFilesDiv.style.display = "none";
                fileList.style.display = "flex";
            }

            fileList.innerHTML = ""; // Clear the displayed file list
            selectedFiles = files;

            files.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.classList.add('file-item');

                // Display image if the file is an image
                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.onload = () => URL.revokeObjectURL(img.src);
                    fileItem.appendChild(img);
                } else {
                    // If not an image, display the file name
                    const placeholder = document.createElement('div');
                    placeholder.textContent = `📄 ${file.name}`;
                    placeholder.style.fontSize = "16px";
                    placeholder.style.color = "#333";
                    fileItem.appendChild(placeholder);
                }

                // Add remove button
                const removeBtn = document.createElement('button');
                removeBtn.textContent = "×"; 
                removeBtn.classList.add('remove-btn');
                removeBtn.type = "button";
                removeBtn.onclick = () => removeFile(index);
                fileItem.appendChild(removeBtn);

                fileList.appendChild(fileItem);
            });
        });

        function removeFile(index) {
            selectedFiles.splice(index, 1);  // Remove the file from selectedFiles array
            updateFileListDisplay();

            // Show the no-files-div if no files remain
            if (selectedFiles.length === 0) {
                noFilesDiv.style.display = "block";
                fileList.style.display = "none";
                fileInput.value = "";  // Reset file input
            }
        }

        function updateFileListDisplay() {
            fileList.innerHTML = ""; // Clear current display

            selectedFiles.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.classList.add('file-item');

                // Display image if the file is an image
                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.onload = () => URL.revokeObjectURL(img.src);
                    fileItem.appendChild(img);
                } else {
                    // If not an image, display the file name
                    const placeholder = document.createElement('div');
                    placeholder.textContent = `📄 ${file.name}`;
                    placeholder.style.fontSize = "16px";
                    placeholder.style.color = "#333";
                    fileItem.appendChild(placeholder);
                }

                // Add remove button
                const removeBtn = document.createElement('button');
                removeBtn.textContent = "Remove";
                removeBtn.classList.add('remove-btn');
                removeBtn.type = "button";
                removeBtn.onclick = () => removeFile(index);
                fileItem.appendChild(removeBtn);

                fileList.appendChild(fileItem);
            });
        }
        

                


  </script>
</body>
</html>