<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <style>
          body{
            	background-size:100% 100%;
            	font-family:"Open Sans", sans-serif;
            }
            a.nostyle{
            	color:inherit;
            	text-decoration:none;
            	padding:0;
            	margin:0;
            }
            div.portfoliocard{
            	position:relative;
            	height:450px;
            	width:500px;
            	background:rgba(255,255,255,1);
            	border:1px solid rgba(0,0,0,0.7);
            	box-shadow:0px -1px 3px rgba(0,0,0,0.1),
            				0px 2px 6px rgba(0,0,0,0.5);
            	border-radius:6px;
            	margin:10% auto;
            	overflow:hidden;
            	z-index:100;
            }
            div.portfoliocard div.coverphoto{
            	width:100%;
            	height:120px;
            	background: rgb(50, 50, 50);
            	background-position:center center;
            	border-top-right-radius:5px;
            	border-top-left-radius:5px;
            	border-bottom:1px solid rgba(0,0,0,0.1);
            	box-shadow:inset 0px 3px 20px rgba(255,255,255,0.3),
            				1px 0px 2px rgba(255,255,255,0.7);
            	z-index:99;
            }
            div.portfoliocard div.left_col, div.portfoliocard div.right_col{
            	float:left;
            	height:340px;
            }
            div.portfoliocard div.left_col{
            	width:40%;
            	padding-top:85px;
            	box-sizing:border-box;
            }
            div.portfoliocard div.right_col{
            	width:60%;
            	background:rgba(245,245,245,1);
            	border-left:1px solid rgba(230,230,230,1);
            	box-shadow:inset 0px 1px 1px rgba(255,255,255,0.7);
            	margin-left:-1px;
            	border-bottom-right-radius:5px;
            }
            div.portfoliocard div.profile_picture{
            	width:110px;
            	height:110px;
            	background:rgba(255,255,255,1);
            	position:absolute;
            	top:65px;
            	left:40px;
            	border-radius:100%;
            	background-image: url('http://cache.spreadshirt.net/Public/Common/images/profile-pic-placeholder_130x130.png');
            	background-size:100% 100%;
            	padding:7px;
            	border:4px solid rgba(255,255,255,1)
            }
            div.portfoliocard div.right_col h2.name{
            	font-size:30px;
            	font-weight:300;
            	color: rgba(30,30,30,1);
            	padding:0;
            	margin:20px 10px 0px 30px;
            }
            div.portfoliocard div.right_col h3.location{
            	font-size:15px;
            	font-weight:300;
            	color:rgba(170,170,170,1);
            	padding:0;
            	margin:-5px 10px 10px 30px;
            }
            div.portfoliocard ul.contact_information{
            	margin-top:20px;
            	padding-left:30px;
            	list-style-type:none;
            }
            img {
                max-width: 100%;
                max-height: 100%;
                border-radius: 50%;
            }
            div.portfoliocard ul.contact_information li{
            	height:25px;
            	width:300px;
            	line-height:25px;
            	font-weight:300;
            	font-size:15px;
            	color:rgba(140,140,140,1);
            	text-shadow:1px 1px 1px rgba(255,255,255,0.8);
            	padding:5px 0px;
            	background-repeat:no-repeat;
            	background-size:18px 18px;
            	border-bottom:1px solid rgba(0,0,0,0.1);
            	box-shadow:0px 1px 1px rgba(255,255,255,0.6);
            	cursor:default;
            }
            div.portfoliocard ul.contact_information li:before{
            	content:"";
            	width:25px;
            	height:25px;
            	display:block;
            	float:left;
            	background-position:center;
            	background-size:18px 18px;
            	background-repeat:no-repeat;
            	margin-right:5px;
            	opacity:0.7;
            }
            div.portfoliocard ul.contact_information li:hover:before{
            	opacity:1;
            }
            div.portfoliocard ul.contact_information li.work:before{
            	background-image: url('http://schulzmarcel.de/x/icons/case_24.png');
            }
            div.portfoliocard ul.contact_information li.website:before{
            	background-image: url('http://schulzmarcel.de/x/icons/globe_24.png');
            }
            div.portfoliocard ul.contact_information li.mail:before{
            	background-image: url('http://schulzmarcel.de/x/icons/paper_plane_24.png');
            }
            div.portfoliocard ul.contact_information li.phone:before{
            	background-image: url('http://schulzmarcel.de/x/icons/phone_24.png');
            }
            div.portfoliocard ul.contact_information li.resume:before{
            	background-image: url('http://schulzmarcel.de/x/icons/inbox_24.png');
            }
            div.portfoliocard div.followers, div.portfoliocard div.following{
            	margin:15px 0px 0px 35px;
            	font-weight:300;
            	font-size:16px;
            	color:rgba(30,30,30,1);
            }
            div.portfoliocard div.follow_count{
            	font-weight:400;
            	font-size:25px;
            	color:rgba(140,140,140,1);
            }

        </style>
    </head>
    <body>
        <div class="portfoliocard">
      		<div class="coverphoto"></div>
      		<a  href="{{$result->html_url}}">
      		<div class="profile_picture">
      		  <img src="{{$result->avatar_url}}">
      		</div>
      		</a>
      		<div class="left_col">
      			<div class="followers">
      				<div class="follow_count">{{$result->followers}}</div>
      				Followers
      			</div>
      			<div class="following">
      				<div class="follow_count">{{$result->following}}</div>
      				Following
      			</div>
      		</div>
      		<div class="right_col">
      			<h2 class="name">{{$result->name}}</h2>
      			<h3 class="location">{{$result->location}}</h3>
      			<ul class="contact_information">
      				<li class="work">{{$result->company}}</li>
      				<li class="website"><a class="nostyle" href="{{$result->blog}}">{{$result->blog}}</a></li>
      				<li class="mail">{{$result->email}}</li>
      				<li class="phone">1-(732)-757-2923</li>
      				<p class="follow_count">{{$result->bio}}</p>
      			</ul>
      		</div>
      		</div>
    </body>
</html>
