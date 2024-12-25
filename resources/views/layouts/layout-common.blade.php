
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>Document</title>
    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="  {{ asset('ContactFrom_v1/images/icons/favicon.ico ') }}"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
   <!-- <link rel="stylesheet" href="./style.css"> -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <link rel="stylesheet" href="{{ asset('contact-us-form/src/style.css') }}">
   <style>
       
       .custom-file-input {
           display: inline-block;
           position: relative;
           cursor: pointer;
           border: 1px solid #ccc;
           padding: 6px;
           border-radius: 4px;
           background-color: #fff;
           color: #333;
           margin: 0px 20px;
       }
       .imageError{
            margin: 10px 20px;
        }

       .custom-file-input input[type="file"] {
           display: none; 
       }

       .file-name {
           display: inline-block;
       }


       .custom-file-input input[type="file"]:focus + .file-name {
           outline: none;
           border: 1px solid #007bff; 
       }

       #fileInput {
           display: none; /* Hide the original file input */
           cursor: pointer;
       }
       .upload-button{
           cursor: pointer;
       }

       .image-preview {
           width: 70px;
           height: 70px;
           border-radius:50%;
           display: flex;
           justify-content: center;
           align-items: center;
           background-color: white;
       }
       
       .image-preview img {
           width: 100%;
           height: 100%;
           border-radius:50%;
       }
        .err{
            color:red;
        }
        .success{
            color:green;
        }
   </style>

</head>
<body>
    @yield('space-work')
    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const imagePreview = document.getElementById('imagePreview');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagePreview.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image">`;
                };
                
                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = 'Please select a valid image file.';
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>