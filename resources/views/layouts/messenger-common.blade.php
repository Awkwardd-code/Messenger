<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="{{ asset('facebook-design-using-html-css/Chat/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=filter" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        #loading p {
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }
        #scrollable-container {

            height: 370px;
            overflow-y: auto;
            /* display: flex; */
            flex-direction: column-reverse;

        }

        #scrollable-container::-webkit-scrollbar {
            width: 0;

            background: transparent;

        }
         
    </style>
</head>
<body>
    @yield('space-work')
    <script src=" {{ asset('facebook-design-using-html-css/Chat/script.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const container = document.querySelector("#scrollable-container");
            

            // Scroll to the bottom on page load
            container.scrollTop = container.scrollHeight;

        });
    </script>
</body>
</html>