<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EBook</title>
    <link rel="stylesheet" href="{{asset('EBook/EBook/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* .content-container {
            position: fixed;
            width: 350px !important;
            min-height: 280px;
            margin-top: 300px;
            background: #000;
            right: 2%;
          
            position: relative;
            right: 2%;
            top: 12%;
            width: 350px !important;
            min-height: 280px;
            border-radius: 10px;
            text-decoration: none;
            background: #000;
            transform: translateY(-500px);
            transition: all 0.7s ease;
        } */
        #toggleButton{
            cursor: pointer;
        }
        .post{
            margin:10px 0px ;
            font-style:italic;
        }

        .blog-box {
            opacity: 0;
            /* max-height: 0; */
            background:red;
            overflow: hidden;
            padding: 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* position: absolute; */
            top: 70px;
            right: 10px;
            position: fixed;
            width: 350px !important;
            min-height: 280px;
            transform: translateX(120vh);
            transition: all 0.5s ease;
        }

        .blog-box.active {
            transform: translateX(0vh);
            opacity: 1;
            /* 
            max-height: 500px; */
            padding: 20px;
        }

        .blog-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .blog-author {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .blog-description {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .blog-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .blog-actions a {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Space between icon and text */
            text-decoration: none;
            padding: 15px 20px;
            font-size: 14px;
            color: #000;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: left;
            width: 100%;
            /* Full-width buttons */
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .blog-actions a i {
            font-size: 18px;
            color: #555;
            /* Icon color */
        }

        .blog-actions a:hover {
            background-color: #676767;
            color: #fff;
        }

        .blog-actions a:hover i {
            color: #fff;
            /* Change icon color on hover */
        }
    </style>

</head>

<body>
  <!-- ------------------------------------------------------header---------------------------- -->
    <nav class="header">

        <div class="left">

            <div class="logo">
                <img src="{{asset('EBook/EBook/image/logo.png') }}">
            </div>


            <!-- <div class="search_bar">

                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search EBook">

            </div> -->

        </div>

        <div class="center ">


            <!-- <i class="fa-solid fa-house"></i>
            <i class="fa-solid fa-tv"></i>
            <i class="fa-solid fa-store"></i>
            <i class="fa-solid fa-users"></i> -->
            <div class="header-mid">
                <a href="#home" class="fas fa-bell"></a>
                <a href="/messenger/groups" class="fas fa-envelope"></a>
                <a href="#arrivals" class="fas fa-tv"></a>
            </div>

            <div class="input-group">
                <input type="search" placeholder="search here.." class="form-control">
                <div class="input-group-append">
                    <button id="input-group-text" class="fas fa-search"></button>
                </div>
            </div>

        </div>
        <div class="lower-header">
            <div class="lower-icons">
                <a href="#home" class="fas fa-home"></a>
                <a href="#featured" class="fas fa-list-ul"></a>
                <a href="#arrivals" class="fas fa-tags"></a>
                <a href="#reviews" class="fas fa-comments"></a>
                <a href="#blogs" class="fas fa-blog"></a>
            </div>
        </div>
        <div class="content-container">
            <div class="blog-box" id="blogBox">
                <div class="blog-title">User Details</div>
                <div class="blog-author">Name: {{Auth::user()->name}}</div>
                <div class="blog-description">
                    Welcome to my blog! Here, I share my thoughts on web development, design, and technology.
                </div>
                <div class="blog-actions">
                    <a href="{{ route('profileview') }}">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    <a href="/logout">
                        <i class="fas fa-sign-out"></i> Logout
                    </a>
                </div>
            </div>
        </div>
        <div class="right">

            <!-- <i class="fa-solid fa-list-ul"></i>
            <i class="fa-brands fa-facebook-messenger"></i>
            <i class="fa-solid fa-bell"></i>
            <i class="fa-solid fa-moon"></i> -->
           
            <!-- <a href="" class="profile">hi</a> -->
            <div class="profile" id="toggleButton">
                <img src="{{ asset('uploads/students/' . Auth::user()->image) }}">
            </div>
            
            

        </div>


    </nav>

  
    
    <!------------main--------------->

    <div class="main">

        <!------------------left------------------->
        

        <div class="left left-sidebar">

            <a href="" class="img">
                <img src="{{ asset('uploads/students/' . Auth::user()->image) }}">
                <p>John Deo</p>
            </a>

            <div class="img">
                <img src="{{asset('EBook/EBook/image/friend.png') }}">
                <p>Friends</p>
            </div>

            <div class="img">
                <img src="{{asset('EBook/EBook/image/saved.png') }}">
                <p>Saved</p>
            </div>

            <div class="img">
                <img src="{{asset('EBook/EBook/image/group.png') }}">
                <p>Groups</p>
            </div>

            <div class="img">
                <img src="{{asset('EBook/EBook/image/marketplace.png') }}">
                <p>Marketplace</p>
            </div>

            <div class="img">
                <img src="{{asset('EBook/EBook/image/watch.png') }}">
                <p>Watch</p>
            </div>

            <div class="img">
                <img src="{{asset('EBook/EBook/image/down_arrow.png') }}">
                <p>See more</p>
            </div>

            <hr>

            <h2>You shortcuts</h2>
            <p class="edit">Edit</p>

            <div class="shortcuts">
                <img src="{{asset('EBook/EBook/image/shortcuts_1.png') }}">
                <p>MOBILE GAMES</p>
            </div>

            <div class="shortcuts">
                <img src="{{asset('EBook/EBook/image/shortcuts_2.jpeg') }}">
                <p>Online Education</p>
            </div>

            <div class="shortcuts">
                <img src="{{asset('EBook/EBook/image/shortcuts_3.webp') }}">
                <p>Food Lovers</p>
            </div>

            <div class="shortcuts">
                <img src="{{asset('EBook/EBook/image/shortcuts_4.png') }}">
                <p>Social Media Academy</p>
            </div>

            <div class="shortcuts">
                <img src="{{asset('EBook/EBook/image/shortcuts_5.webp') }}">
                <p>PC Shop</p>
            </div>

            <div class="shortcuts">
                <img src="{{asset('EBook/EBook/image/down_arrow.png') }}">
                <p>See more</p>
            </div>

        </div>

        <!------------center---------------------->


        <div class="center main-body">

            <!-- <div class="top_box">

                <div class="my_story_card">

                    <img src="image/story_1.png">

                    <div class="story_upload">
                        <img src="image/upload.png">
                        <p class="story_tag">Create story</p>
                    </div>

                </div>

                <div class="story_card">

                    <img src="image/story_2.jpg">

                    <div class="story_profile">

                        <img src="image/profile_1.jpg">
                        <div class="cricle"></div>
                        
                    </div>

                    <div class="story_name">
                        <p class="name">Charith Disanayaka</p>
                    </div>

                </div>

                <div class="story_card">

                    <img src="image/story_3.jpg">

                    <div class="story_profile">

                        <img src="image/profile_2.jpg">
                        <div class="cricle"></div>
                        
                    </div>

                    <div class="story_name">
                        <p class="name">Minidu Thiranjana</p>
                    </div>

                </div>

                <div class="story_card">

                    <img src="image/story_4.png">

                    <div class="story_profile">

                        <img src="image/profile_3.jpg">
                        <div class="cricle"></div>
                        
                    </div>

                    <div class="story_name">
                        <p class="name">Kavisha Vidurangi</p>
                    </div>

                </div>

                <div class="story_card">

                    <img src="image/story_5.jpg">

                    <div class="story_profile">

                        <img src="image/profile_4.png">
                        <div class="cricle"></div>
                        
                    </div>

                    <div class="story_name">
                        <p class="name">Kavindu Akalanka</p>
                    </div>

                </div>

                

            </div> -->


            <div class="my_post">

                <div class="post_top">

                    <img src="{{ asset('uploads/students/' . Auth::user()->image) }}">
                    <input type="text" placeholder="What's on you mind, John?">

                </div>

                <hr>

                <div class="post_bottom">
                    <div class="post_icon">
                        <i class="fa-solid fa-images green"></i>
                        <p>Photo/video</p>
                    </div>

                    <div class="post_icon">
                        <i class="fa-regular fa-face-grin yellow"></i>
                        <p>Feeling/activity</p>
                    </div>

                </div>

            </div>


            <!-- <div class="room">
                
                <div class="room_image">

                    <img src="image/live_video.png">
                    <p class="room_tag">Create room</p>

                </div>

                <div class="room_profile">

                    <img src="image/profile_1.jpg">
                    <img src="image/profile_2.jpg">
                    <img src="image/profile_3.jpg">
                    <img src="image/profile_4.png">
                    <img src="image/profile_5.png">
                    <img src="image/profile_6.png">
                    <img src="image/profile_7.png">
                    <img src="image/profile_8.png">

                </div>

            </div> -->

            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="friends_post">

                        <div class="friend_post_top">

                            <div class="img_and_name">

                            <img src="{{ asset('uploads/students/' . $post->users[0]['image']) }}">

                                <div class="friends_name">
                                    <p class="friends_name">
                                        {{$post->users[0]['name']}}
                                    </p>
                                   <!--  <p class="time">16h.<i class="fa-solid fa-user-group"></i></p> -->
                                </div>


                            </div>

                            <div class="menu">

                                <i class="fa-solid fa-ellipsis"></i>

                            </div>

                        </div>
                        <p class="post">{{$post->post}}</p>
                        <img src="{{ asset('uploads/posts/' . $post->file) }}">

                        <div class="info">

                            <div class="emoji_img">
                                <img src="{{asset('EBook/EBook/image/like.png') }}">
                                <img src="{{asset('EBook/EBook/image/haha.png') }}">
                                <img src="{{asset('EBook/EBook/image/heart.png') }}">
                                <p>You, Charith Disanayaka and 25K others</p>
                            </div>

                            <div class="comment">
                                <p>421 Comments</p>
                                <p>1.3K Shares</p>
                            </div>

                        </div>

                        <hr>

                        <div class="like">

                            <div class="like_icon">
                                <i class="fa-solid fa-thumbs-up activi"></i>
                                <p>Like</p>
                            </div>

                            <div class="like_icon">
                                <i class="fa-solid fa-message"></i>
                                <p>Comments</p>
                            </div>

                            <!-- <div class="like_icon">
                                <i class="fa-solid fa-share"></i>
                                <p>Share</p>
                            </div> -->

                        </div>

                        <hr>

                        <div class="comment_warpper">

                        <img src="{{ asset('uploads/students/' . Auth::user()->image) }}">
                            <div class="circle"></div>

                            <div class="comment_search">

                                <input type="text" placeholder="Write a comment">
                                <i class="fa-regular fa-face-smile"></i>
                                <i class="fa-solid fa-camera"></i>
                                <i class="fa-regular fa-note-sticky"></i>

                            </div>

                        </div>

                    </div>                  
                @endforeach
            @else
                                    
            @endif 
            <!-- <div class="friends_post">

                <div class="friend_post_top">

                    <div class="img_and_name">

                        <img src="image/post_1.jpg">

                        <div class="friends_name">
                            <p class="friends_name">
                                Senuda De Silva
                            </p>
                            <p class="time">16h.<i class="fa-solid fa-user-group"></i></p>
                        </div>


                    </div>

                    <div class="menu">

                        <i class="fa-solid fa-ellipsis"></i>

                    </div>

                </div>

                <img src="image/post_1.jpg">

                <div class="info">

                    <div class="emoji_img">
                        <img src="image/like.png">
                        <img src="image/haha.png">
                        <img src="image/heart.png">
                        <p>You, Charith Disanayaka and 25K others</p>
                    </div>

                    <div class="comment">
                        <p>421 Comments</p>
                        <p>1.3K Shares</p>
                    </div>

                </div>

                <hr>

                <div class="like">

                    <div class="like_icon">
                        <i class="fa-solid fa-thumbs-up activi"></i>
                        <p>Like</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-message"></i>
                        <p>Comments</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-share"></i>
                        <p>Share</p>
                    </div>

                </div>

                <hr>

                <div class="comment_warpper">

                    <img src="image/profile.png">
                    <div class="circle"></div>

                    <div class="comment_search">

                        <input type="text" placeholder="Write a comment">
                        <i class="fa-regular fa-face-smile"></i>
                        <i class="fa-solid fa-camera"></i>
                        <i class="fa-regular fa-note-sticky"></i>

                    </div>

                </div>

            </div>

            <div class="friends_post">

                <div class="friend_post_top">

                    <div class="img_and_name">

                        <img src="image/profile_9.png">

                        <div class="friends_name">
                            <p class="friends_name">
                                Senuda De Silva
                            </p>
                            <p class="time">16h.<i class="fa-solid fa-user-group"></i></p>
                        </div>


                    </div>

                    <div class="menu">

                        <i class="fa-solid fa-ellipsis"></i>

                    </div>

                </div>

                <img src="image/post_2.jpg">

                <div class="info">

                    <div class="emoji_img">
                        <img src="image/like.png">
                        <img src="image/haha.png">
                        <img src="image/heart.png">
                        <p>You, Charith Disanayaka and 25K others</p>
                    </div>

                    <div class="comment">
                        <p>421 Comments</p>
                        <p>1.3K Shares</p>
                    </div>

                </div>

                <hr>

                <div class="like">

                    <div class="like_icon">
                        <i class="fa-solid fa-thumbs-up activi"></i>
                        <p>Like</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-message"></i>
                        <p>Comments</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-share"></i>
                        <p>Share</p>
                    </div>

                </div>

                <hr>

                <div class="comment_warpper">

                    <img src="image/profile.png">
                    <div class="circle"></div>

                    <div class="comment_search">

                        <input type="text" placeholder="Write a comment">
                        <i class="fa-regular fa-face-smile"></i>
                        <i class="fa-solid fa-camera"></i>
                        <i class="fa-regular fa-note-sticky"></i>

                    </div>

                </div>

            </div>

            <div class="friends_post">

                <div class="friend_post_top">

                    <div class="img_and_name">

                        <img src="image/profile_10.png">

                        <div class="friends_name">
                            <p class="friends_name">
                                Senuda De Silva
                            </p>
                            <p class="time">16h.<i class="fa-solid fa-user-group"></i></p>
                        </div>


                    </div>

                    <div class="menu">

                        <i class="fa-solid fa-ellipsis"></i>

                    </div>

                </div>

                <img src="image/post_3.png">

                <div class="info">

                    <div class="emoji_img">
                        <img src="image/like.png">
                        <img src="image/haha.png">
                        <img src="image/heart.png">
                        <p>You, Charith Disanayaka and 25K others</p>
                    </div>

                    <div class="comment">
                        <p>421 Comments</p>
                        <p>1.3K Shares</p>
                    </div>

                </div>

                <hr>

                <div class="like">

                    <div class="like_icon">
                        <i class="fa-solid fa-thumbs-up activi"></i>
                        <p>Like</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-message"></i>
                        <p>Comments</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-share"></i>
                        <p>Share</p>
                    </div>

                </div>

                <hr>

                <div class="comment_warpper">

                    <img src="image/profile.png">
                    <div class="circle"></div>

                    <div class="comment_search">

                        <input type="text" placeholder="Write a comment">
                        <i class="fa-regular fa-face-smile"></i>
                        <i class="fa-solid fa-camera"></i>
                        <i class="fa-regular fa-note-sticky"></i>

                    </div>

                </div>

            </div>

            <div class="friends_post">

                <div class="friend_post_top">

                    <div class="img_and_name">

                        <img src="image/profile_11.png">

                        <div class="friends_name">
                            <p class="friends_name">
                                Senuda De Silva
                            </p>
                            <p class="time">16h.<i class="fa-solid fa-user-group"></i></p>
                        </div>


                    </div>

                    <div class="menu">

                        <i class="fa-solid fa-ellipsis"></i>

                    </div>

                </div>
               
                <img src="image/post_4.jpg">

                <div class="info">

                    <div class="emoji_img">
                        <img src="image/like.png">
                        <img src="image/haha.png">
                        <img src="image/heart.png">
                        <p>You, Charith Disanayaka and 25K others</p>
                    </div>

                    <div class="comment">
                        <p>421 Comments</p>
                        <p>1.3K Shares</p>
                    </div>

                </div>

                <hr>

                <div class="like">

                    <div class="like_icon">
                        <i class="fa-solid fa-thumbs-up activi"></i>
                        <p>Like</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-message"></i>
                        <p>Comments</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-share"></i>
                        <p>Share</p>
                    </div>

                </div>

                <hr>

                <div class="comment_warpper">

                    <img src="image/profile.png">
                    <div class="circle"></div>

                    <div class="comment_search">

                        <input type="text" placeholder="Write a comment">
                        <i class="fa-regular fa-face-smile"></i>
                        <i class="fa-solid fa-camera"></i>
                        <i class="fa-regular fa-note-sticky"></i>

                    </div>

                </div>

            </div>

            <div class="friends_post">

                <div class="friend_post_top">

                    <div class="img_and_name">

                        <img src="image/profile_12.jpg">

                        <div class="friends_name">
                            <p class="friends_name">
                                Senuda De Silva
                            </p>
                            <p class="time">16h.<i class="fa-solid fa-user-group"></i></p>
                        </div>


                    </div>

                    <div class="menu">

                        <i class="fa-solid fa-ellipsis"></i>

                    </div>

                </div>

                <img src="image/post_5.jpg">

                <div class="info">

                    <div class="emoji_img">
                        <img src="image/like.png">
                        <img src="image/haha.png">
                        <img src="image/heart.png">
                        <p>You, Charith Disanayaka and 25K others</p>
                    </div>

                    <div class="comment">
                        <p>421 Comments</p>
                        <p>1.3K Shares</p>
                    </div>

                </div>

                <hr>

                <div class="like">

                    <div class="like_icon">
                        <i class="fa-solid fa-thumbs-up activi"></i>
                        <p>Like</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-message"></i>
                        <p>Comments</p>
                    </div>

                    <div class="like_icon">
                        <i class="fa-solid fa-share"></i>
                        <p>Share</p>
                    </div>

                </div>

                <hr>

                <div class="comment_warpper">

                    <img src="image/profile.png">
                    <div class="circle"></div>

                    <div class="comment_search">

                        <input type="text" placeholder="Write a comment">
                        <i class="fa-regular fa-face-smile"></i>
                        <i class="fa-solid fa-camera"></i>
                        <i class="fa-regular fa-note-sticky"></i>

                    </div>

                </div>

            </div>
 -->
            <div class="loard">
                <button>Loard More</button>
            </div>

            <p class="end">Design By<span><i class="fa-regular fa-face-grin"></i>
                    WT Master Code</span></p>


        </div>

        <!------------------right------------------>
        <div class="righ"></div>

        <div class="right right-sidebar">

            <div class="first_warpper">

                <div class="page">

                    <h2>Your Pages and profiles</h2>
                    <div class="menu">
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>

                </div>

                <div class="page_img">
                    <img src="{{asset('EBook/EBook/image/page.jpg') }}">
                    <p>Web Designer</p>
                </div>

                <div class="page_icon">
                    <i class="fa-regular fa-bell"></i>
                    <p>20 Notifications</p>
                </div>

                <div class="page_icon">
                    <i class="fa-solid fa-bullhorn"></i>
                    <p>Create promotion</p>
                </div>

            </div>

            <hr>

            <div class="second_warpper">

                <h2>Birthdays</h2>

                <div class="img_and_tag">

                    <img src="{{asset('EBook/EBook/image/gift.png') }}">
                    <p><span>Senuda De Silva </span>and<span> 2 others </span>have birthdays today</p>

                </div>

            </div>

            <hr>


            <div class="third_warpper">

                <div class="contact_tag">

                    <h2>Contacts</h2>

                    <div class="contact_icon">

                        <i class="fa-solid fa-video"></i>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <i class="fa-solid fa-ellipsis"></i>

                    </div>

                </div>

                <div class="contact">

                    <img src="image/contact_1.jpg">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/contact_2.jpg">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/contact_3.jpg">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/contact_4.jpg">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/contact_5.jpg">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/profile_1.jpg">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/profile_2.jpg">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/profile_3.jpg">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/profile_4.png">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/profile_5.png">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/profile_6.png">
                    <p>Senuda De Silva</p>

                </div>

                <div class="contact">

                    <img src="image/profile_7.png">
                    <p>Senuda De Silva</p>

                </div>

            </div>

        </div>

    </div>

    <!-- -----------------------------------------------Java Script------------------------- -->
    <script>
        // Attach event listener using ID
        document.getElementById("toggleButton").addEventListener("click", function () {
          const blogBox = document.getElementById("blogBox");
          blogBox.classList.toggle("active");
        });
      </script>
</body>

</html>