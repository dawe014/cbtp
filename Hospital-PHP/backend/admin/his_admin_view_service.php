<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  if($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
}
$s_number=$_GET['serv_id'];
$sql = "SELECT * FROM Services where serv_id=$s_number";
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="../../assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="../../assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="../../assets/css/linearicons.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    </head>

<?php include ('assets/inc/head.php');?>

    <body>

       <!-- Preloader Starts -->
    <!-- <div class="preloader">
        <div class="spinner"></div>
    </div> -->
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <!-- <header class="header-area">
        <div id="header" id="home">
            <div class="container"> -->
                <!-- <div class="rowsss align-items-center justify-content-between d-flex"> -->
                <!-- <div id="logo">
                    <a href="index.php"></a>
                    <img src="assets/images/logo-light.png" alt="">
                </div>
                <nav id="nav-menu-container"> -->
                    <!-- <div class="logo">
                        <img src="assets/images/logo-light.png" alt="">
                    </div> -->
                    <!-- <div class="nav-menu">
                       
                        <li class="menu-active"><a href="index.php">Home</a></li>
                        <li class="menu-active list"><a href="#">Support+</a>
                            <div class="dropdown-menu">
                                <ul>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="clinic_policy.php">Clinic Policies</a></li>
                                <li><a href="contactus.php">Contact Us</a></li>
                                </ul>
                            </div>
                    </li>
                        <li class="menu-active"><a href="#">Services</a></li>
                        <li class="menu-active"><a href="#">News</a></li>
                        
                    </div> -->
                        <!-- <li><a href="backend/doc/index.php">Doctor's Login</a></li>
                        <li><a href="backend/inventory/index.php">Inventory Login</a></li>
                        <li><a href="backend/labratory/index.php">Labratory Login</a></li>
                        <li><a href="backend/pharmacy/index.php">Pharmacy Login</a></li>
                        <li><a href="backend/admin/index.php">Administrator Login</a></li>
                        <li><a href="backend/patient_old/user-login.php">Patient old Login</a></li>
                        <li><a href="backend/Patient/user-login.php">PATIENT Login</a></li> -->
                        <!-- <div class="reglog">
                        <li class="menu-active"><a href="backend/Patient/user-login.php">SIGN IN</a></li>
                        <li><a href="backend/Patient/index.php">REGISTER</a></li> -->
                    </div>
                </nav><!-- #nav-menu-container -->		    		
                <!-- </div> -->
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <!-- <section class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h4>Caring for better life</h4>
                    <h1>Leading the way in medical excellence</h1>
                    <p>HMS is awarded as one of the Top Hospital Management System, which can integrate all the HIS systems, processes and machines into an intelligent information system to derive operational efficiency and assist hospitals in decision making process through MIS and Analytics.</p>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="hero">
    <div class="banner-area "></div>
        <div class="description">
        <h4>We are here for your care.</h4>
        <h1>Best of Care, Close to Home.</h1>
        <a href="#">BOOK AN APPOINTMENT NOW</a>
        </div>
    </section> -->
   
    <!-- Services -->
    <div id="services">
    <div class="ser-container"> 
      <!-- <h1 class="sub-title">My Services</h1> -->
      <div class="sub-title">
        <h5>Services</h5>
        <h1>Our Services</h1>
      </div>
      <div class="services-list">
        <!-- <div>
          <h2>Web Design</h2>
          <p>Over the past one year, I have had the privilege of working with various clients, ranging from startups to established brands. One of my notable projects.
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt qui, repellendus molestias dolorum odio, incidunt nostrum nobis suscipit laboriosam et impedit quam commodi voluptas quasi similique, iure sunt voluptatibus doloribus!
            Lorem ipsum dolor sit ame
            nesciunt fuga unde aspernatur modi!</p>
            <a href="#">Learn more</a>
        </div>

        <div>
          <h2>UI/UX Design</h2>
          <p>Over the past one year, I have had the privilege of working with various clients, ranging from startups to established brands. One of my notable projects.
        </p>
            <a href="#">Learn more</a>
        </div>

        <div>
          <h2>App Design</h2>
          <p>Over the past one year, I have had the privilege of working with various clients, ranging from startups to established brands. One of my notable projectss.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores libero, culpa blanditiis cumque magni non! Repellendus maiores unde itaque illum pariatur voluptatum accusamus, eligendi soluta quaerat, quasi corrupti ipsam iure?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, maiores. Qui, quas rerum eaque debitis reprehenderit eligendi sed sunt nisi maxime vero doloremque maiores? Placeat ducimus ab nulla hic recusandae.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat dolore perferendis expedita dignissimos quae ab odio. Inventore atque iste, aliquid eum ipsa, porro reiciendis sequi mollitia pariatur quos, labore velit?
            <a href="#">Learn more</a>
        </div>

        <div>
          <h2>App Design</h2>
          <p>Over the past one year, I have had the privilege of working with various clients, ranging from startups to established brands. One of my notable projectss.
            <a href="#">Learn more</a> -->
        <!-- </div> -->
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <div>
                    <h2><?php echo $row["serv_title"]; ?></h2>
                    <p><?php echo $row["serv_desc"]; ?></p>
                    
                </div>
                <?php
            }
        } else {
            echo "0 results";
        }
        ?>
    <!-- </table>
        <div>
          <h2 ></h2>
          <p>Over the past one year, I have had the privilege of working with various clients, ranging from startups to established brands. One of my notable projectss.
            <a href="#">Learn more</a>
        </div> -->

      </div>
    </div>
  </div>

<!-- mession and vission
<section class="mission_vission">
    <div class="mission_vission-container">
    <div class="mission_info">
        <div class="mission_info-desc">
            <h5>Our Mission & Vision</h5>
            <h1>Best Patient Care.</h1>
            <p>Our mission is to provide high-quality healthcare services to individuals and families in our community. We strive to deliver compassionate, patient-centered care that meets the unique needs of each person we serve. We are committed to fostering a collaborative relationship between our patients and healthcare providers to promote the health and wellbeing of our community.</p>
        </div>
        <div class="mission_info-list">
            <img src="assets/images/mv-icon-1.png" alt="">
            <p>Providing high-quality healthcare services to individuals and families in our community.</p>
        </div>
        <div class="mission_info-list">
            <img src="assets/images/mv-icon-1.png" alt="">
            <p>Delivering compassionate, patient-centered care that meets the unique needs of each person we serve.</p>
        </div>
    </div>
    <div class="mission_img">
        <img src="assets/images/about-svm-1.png" alt="">
    </div>
    </div>
</section> -->


 <!--  ************************* Contact Us Starts Here ************************** -->
    
 <!-- <section class="contact_us-single"> 
        <div class="row no-margin">

             <div  class="cols-sm-12 ">
            <h2 >Send Message</h2>
                <form class="form_contact"method="post">
              
                    <div class="rowsss cf-roof">
                        <div class="cols-sm-8"><input type="text" placeholder="Enter Name" name="fullname" class="form-input " required ></div>
                    </div>
                    <div  class="rowsss cf-roof">
                        <div class="cols-sm-8"><input type="text" name="emailid" placeholder="Enter Email Address" class="form-input "  required></div>
                    </div>
                     <div  class="rowsss cf-roof">
                        <div class="cols-sm-8"><input type="text" name="mobileno" placeholder="Enter Mobile Number" class="form-input    " required ></div>
                    </div>
                     <div  class="rowsss cf-roof">
                        <div class="cols-sm-8">
                          <textarea rowssss="5" placeholder="Enter Your Message" class="form-input " name="description" required></textarea>
                        </div>
                    </div>
                     <div  class="rowsss cf-roof">
                        <div class="cols-sm-8">
                         <button class="btn btn-success btn-sm" type="submit" name="submit">Send Message</button>
                        </div>
                </div>
            </form>
            </div>
     
        </div>
    </section> -->

    <!-- Javascript -->
    <script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="../../assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="../../assets/js/vendor/wow.min.js"></script>
    <script src="../../assets/js/vendor/owl-carousel.min.js"></script>
    <script src="../../assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="../../assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="../../assets/js/vendor/superfish.min.js"></script>
    <script src="../../assets/js/main.js"></script>
    </body>

</html>