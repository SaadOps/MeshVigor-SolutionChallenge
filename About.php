<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login_form.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header('location: index.html');
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Icon css link -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  css file --> 
    <link rel="stylesheet" href="Header-footer.css">    
</head>
<body>
<div class="header">
        <!-- Logo -->
        <nav id="logo"><a class="navbar-brand" href="Home.php"><img src="assets/images/newlogo.png"> </a></nav>
        <!-- Logo-->
        <input type="checkbox" id="chk">
        <label for="chk" class="show-btn">
            <i class="fa fa-bars" ></i>
        </label>
        <ul class="menu">
            <!-- Links -->

           <li><a href="About.php">About Us</a></li>
           <li><a href="faq_page.php">FAQ</a></li>
           <li class = "dropdown"><a href="docharity.php">Do Charity<i class="fa fa-caret-down" aria-hidden="true"></i></a>
            <ul class="submenu">
                <li> <a href="docharity.php#individual">Individual</a></li>
                <li><a href="docharity.php#emergency">Emergency</a></li>
                <li><a href="docharity.php#organization">Organization</a></li>
            </ul>
        </li>
        <li><a href="myaccount.php">My Account</a></li>
        <li><a href="contact us.php">Contact Us</a></li>
        <li>
          <!------logout button ------>
          <a href="Home.php?logout='1'"> 
          <input type="submit" value = "Log out" name = "logout" class = "logout"></a>
        </li>
           
           
           <label for="chk" class="hide-btn">
               <i class="fa fa-times" ></i>
           </label>
        </ul>
       
    </div>
    
    <br><br><br><br><br>

    <div class="header-img"></div>
    <div class="header-txt">
        <h1>Donate</h1>
        <h3>for a better world</h3>
        <p>MeshVigor is a Social, Cultural, Economic, Health, Educational, relief and rural/urban community development organisation. We are committed to the Millennium development goals. Our vision is for a just and compassionate Indian society in which all people will have the opportunity to achieve their optimum potential. </p>
        <a href="docharity.php">Donate Now</a>
        <a href="contact us.php">Contact Us</a>
    </div>

    <div class="about-us">
        <hr>
        <h1>ABOUT US</h1>
        <p>MeshVigor priorities and objectives are to carry out charitable, holistic and sustainable development work among the poor, marginalized, downtrodden, illiterate, vulnerable and the exploited ones, irrespective of their caste, creed, colour or religion. In achieving the same we work in partnership with other national and international NGOs.The vision of MeshVigor is to create a just, equal and peaceful society where everybody shares and cares for the poor,  unprivileged and exploited people and make the world a better place to live in.This is best done by establishing a redeemed, regenerated and progressive society, which will be free from exploitation, injustice and disparities – where the overall development and dignity of every person will be secured, where people can live in peace, solidarity, co-operation and brotherhood and where the rights of each one will be protected. </p>
        <hr>
    </div>

    <div class="service-img"></div>
    <div class="service-txt">
        <h1>Services We Provide ...</h1>
        <div class="box">
            <img src="../MeshVigor/assets/images/about-ind.jpg" alt="">
            <h2>Individual</h2>
            <p>While Save the Children appreciates monthly donations where you choose to donate a small fixed amount monthly for us to be able to plan our programmes for a longer term, a single donation can also help save a child.</p>
           
        </div>
        <div class="box">
            <img src="../MeshVigor/assets/images/about-org.jpg" alt="">
            <h2>Organization</h2>
            <p>If there's one organisation through which Indians can choose to commit to give their country a better future through children , their right to a childhood they can cherish and an adulthood that Indians deserve, it is Save the Children.</p>
            
        </div>
        <div class="box">
            <img src="../MeshVigor/assets/images/about-emr.jpg" alt="">
            <h2>Emergency</h2>
            <p>Our core is our programmes, whether it is the remotest corners of the country or the most disaster-torn or dangerous areas or slums in metros, we do whatever it takes to help children shine in life.</p>
          
        </div>
    </div>
    <br>
    <!-- Team -->
    <div class="team">
    <h1>Our Team</h1>
    <div class="circles">
        <div class="circle"><img src="data:image/jpeg;base64,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" alt=""></div>
        <div class="circle unnati"><img src="https://team-page-b6609b.netlify.app/img/photo2.png" alt=""></div>
        <div class="circle nandinee"><img src="https://team-page-b6609b.netlify.app/img/photo3.png" alt=""></div>
    </div>
    <div class="boxes">
        <div class="box-1"><h3>Saad Ansari</h3><p><h4><br>Work-Frontend and Backend<br>Location-Mumbai</h4></p></div>
        <div class="box-1 "><h3>Krishna Limbasiya</h3><p><h4><br>Work-Frontend <br>Location-Mumbai</h4></p></div>
        <div class="box-1 "><h3>Fardeen Shaikh</h3><p><h4><br>Work-Frontend<br>Location-Mumbai</h4></p></div>
    </div>
</div>  

   <!-- Footer -->
   <footer>
        <div class="footer">
            <div class="container">
                 <!-- Grid row -->
                 <div class="row">
                    <!-- Grid column1 -->
                   <div class="col-md-3 col-sm-6 col-xs-12 segment-one">
                       <h3>MeshVigor</h3>
                       <p>Hope for Children is an international charity working towards a world where every child has a happy childhood that sets them up for a positive future.</p> 
                                    
                   </div>
                    <!-- Grid column1 -->

                     <!-- Grid column2 -->
                     <div class="col-md-3 col-sm-6 col-xs-12 segment-two ">
                        <!-- Links -->
                       <h2>Useful  Link</h2>
                      <ul>
                      <li><a href="About.php">About Us</a></li>
                          <li><a href="faq_page.php">FAQ</a></li>
                          <li><a href="docharity.php">Do Charity</a></li>
                          <li><a href="myaccount.php">My Account</a></li>
                          <li><a href="contact us.php">Contact Us</a></li>
                      </ul>
                                    
                   </div>
                    <!-- Grid column2 -->

                     <!-- Grid column3 -->
                     <div class="col-md-3 col-sm-6 col-xs-12 segment-three ">
                        <h2>Follow Us</h2>
                        <!-- Links -->
                        <p>Please Follow us on our Social Media Profile In order to keep updated.</p>
                        <a href="www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="www.pinterest.ca"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="www.linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                    <!-- Grid column3 -->

                     <!-- Grid column 4-->
                     <div class="col-md-3 col-sm-6 col-xs-12 segment-four ">
                        <h2>Our Newsletter</h2>
                        <p>We are helping to change this by delivering education, health, livelihoods and Child Rights projects that benefit thousands of children and families each year.</p>
                         <!-- Form -->
                         <form action="">
                            <input type="email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                     <!-- Grid column 4-->

                </div>
                <!-- Grid row -->
                </div>
        </div>
         <!-- Copyright -->
         <p class="footer-bottom-text">All Right reserved by &copy;MeshVigor.2024</p>
         <!-- Copyright -->
    </footer>
    <!-- End Footer -->

</body>
</html>