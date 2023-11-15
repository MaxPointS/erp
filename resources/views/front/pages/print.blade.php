<html>
    <head>
       
   
<style>
    .sidebar {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  right: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
}
.rtl{
    direction: rtl;
    text-align: right;
}
/* The sidebar links */
.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidebar a:hover {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 0px;
  font-size: 36px;

}

.sidebar  {
  position: absolute;
  top: 0;
  right: 0px;
  font-size: 36px;
  width: -20px;
 
 
}
.closebtn {
  position: absolute;
  top: 0;
  left: 0;
  font-size: 36px;
  margin-right: 95%;
}

/* The button used to open the sidebar */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;

}
ul{
    list-style: none;
    padding: 0;
    margin: 0;
}
.sidebar ul li{
    background-color: #535353 ;
    padding: 10 10px;
    margin: 2px;
}
.openbtn{
    display:none;
}
/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-right .5s; /* If you want a transition effect */
  
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-width: 600px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
  .openbtn{display: inline;}
  .closebtn {
  margin-right: 90%;
}

}

</style>

<link rel="stylesheet" src="{{asset('css/bootstrap.min.css')}}" />
<link rel="stylesheet" src="{{asset('css/app.css')}}" />
</head>

<body class="rtl">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="/" class="navbar-brand">Bootstrap 4</a>
            <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbar9">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar9">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="//codeply.com">Codeply</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

<div id="mySidebar" class="sidebar text-center">
    <div class="text-center">
        <img src="{{asset('imgs/logo.png')}}" width="100%" height="50%" />
    </div>
    <a role="link" href="javascript:void(0);" class="closebtn" onclick="closeNav()">x</a>
    <ul>
        <li><a href="f">dsfdsfdsfdsfdsfsd</a></li>
        <li><a href="f">dsfdsfdsfdsfdsfsd</a></li>
        <li><a href="f">dsfdsfdsfdsfdsfsd</a></li>
        <li><a href="index">dsfdsfdsfdsfdsfsd</a></li>
    </ul>
  </div>

  
  <div id="main" class="rtl">
    <button class="openbtn"  onclick="openNav()">&#9776;افتح</button>
    <h2>افتح</h2>
    <p>Content...</p>
  </div>



  <script>
  
    window.print();

  </script>
</body>
  </html>