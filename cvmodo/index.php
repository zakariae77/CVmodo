<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<style>

  body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    margin: 5px;
  }


  .topnav {
    overflow: hidden;
    display:flex;
    justify-content:space-between;
  }

  .topnav a {
    float: left;
    display: block;
    color: Black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }



  .topnav a.active {
    background-color: #04AA6D;
    color: white;
    border: none;
    border-radius: 5px;
  }

  .topnav a.btn-signUp {
    background-color: #04AA6D;
    color: white;
    border: none;
    border-radius: 5px;	
  }

  .topnav .icon {
    display: none;
  }

  @media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {display: none;}
    .topnav a.icon {
      float: right;
      display: block;
    }
    
    .topnav {
    overflow: hidden;
    display:block;
    }

    .active{
      width: 98px;
    }

    .bV{
        display:block;
    }

  }
  @media screen and (max-width: 600px) {
    .topnav.responsive {position: relative;}
    .topnav.responsive .icon {
      position: absolute;
      right: 0;
      top: 0;
    }
    .topnav.responsive a {
      float: none;
      display: block;
      text-align: left;
    }
    
      .topnav {
    overflow: hidden;
    display:block;
    }

    .active{
      width: 98px;
    }

    .btn-signUp{
      width: 90px;
    }

    .bV{
        display:block;
    }

  }
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">CVmodo</a>
  <a href="#news">Model</a>
  <a href="#contact">Premium</a>
  <a href="#about">Q&A</a>
  <span class="bV"> <hr> </span>

  <?php
      if(isset($_SESSION["userLoggedIn"] )){
        echo "<a href='login.php' class='btn-signUp'>" . $_SESSION["userLoggedIn"]. "</a>";
      }
      else{

        echo "<a href='login.php' class='btn-signUp'>Sign up</a>";}
?>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>



<div class="welcome">
<div>
        <h1> CVmodo </h1>
        <p> Create professional CV with more with 100+ modals </p>
        <button> Create a CV </button>
        </div>
</div>

<div class="projects-catalog">
  <div id="imageSlider1" class="catalog-slider">
    <div class="catalog-cover">
      <ul id="sliderWrapper1" class="catalog-list corporate-projects">
        <a href="#" class="image_cv">
        	<img src="https://www.modeles-de-cv.com/wp-content/uploads/2019/09/85-modele-cv-exemplaire.jpg">
          </a>
          <a href="#" class="image_cv">
        	<img src="https://www.modeles-de-cv.com/wp-content/uploads/2019/09/85-modele-cv-exemplaire.jpg">
          </a>
          <a href="#" class="image_cv">
        	<img src="https://www.modeles-de-cv.com/wp-content/uploads/2019/09/85-modele-cv-exemplaire.jpg">
          </a>
          <a href="#" class="image_cv">
        	<img src="https://www.modeles-de-cv.com/wp-content/uploads/2019/09/85-modele-cv-exemplaire.jpg">
          </a>
          <a href="#" class="image_cv">
        	<img src="https://www.modeles-de-cv.com/wp-content/uploads/2019/09/85-modele-cv-exemplaire.jpg">
          </a>
      </ul>
    </div>
  </div>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
