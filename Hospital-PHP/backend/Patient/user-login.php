<?php
session_start();
error_reporting(0);
include('assets/inc/config.php');
if(isset($_POST['submit']))
{ 
$puname=$_POST['username'];	
$ppwd=md5($_POST['password']);
$ret=mysqli_query($mysqli,"SELECT * FROM his_patients WHERE pat_email='$puname' and pat_pass='$ppwd'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['username'];
$_SESSION['pat_id']=$num['pat_id'];	
$_SESSION['pat_number']=$num['pat_number'];	
$pid=$num['pat_id'];
$pnum = $num['pat_number'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log = mysqli_query($mysqli, "INSERT INTO userlog(uid, username, userip, status,pat_number) VALUES ('{$num['pat_id']}', '$puname', '$uip', '$status','$pnum')");
header("location:his_doc_dashboard.php");

}elseif($num==0){
    $doc_number=$puname;
    $doc_pwd=sha1($ppwd);
    echo "dawe";
    $stmt=$mysqli->prepare("SELECT doc_number, doc_pwd, doc_id FROM his_docs WHERE  doc_number=? AND doc_pwd=? ");//sql to log in user
        $stmt->bind_param('ss', $doc_number, $doc_pwd);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($doc_number, $doc_pwd ,$doc_id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['doc_id'] = $doc_id;
        $_SESSION['doc_number'] = $doc_number;//Assign session to doc_number id
        //$uip=$_SERVER['REMOTE_ADDR'];
        //$ldate=date('d/m/Y h: i:s', time());
        if($rs)
            {//if its sucessfull
                header("location:../doc/his_doc_dashboard.php");
            }
elseif($rs==0){
    $ad_email=$puname;
        $ad_pwd=sha1($ppwd);//double encrypt to increase security
        $stmt=$mysqli->prepare("SELECT ad_email ,ad_pwd , ad_id FROM his_admin WHERE ad_email=? AND ad_pwd=? ");//sql to log in user
        $stmt->bind_param('ss',$ad_email,$ad_pwd);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($ad_email,$ad_pwd,$ad_id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['ad_id']=$ad_id;//Assign session to admin id
        //$uip=$_SERVER['REMOTE_ADDR'];
        //$ldate=date('d/m/Y h:i:s', time());
        if($rs)
            {//if its sucessfull
                header("location:../admin/his_admin_dashboard.php");
            }
}
}
else
{
// For stroing log if user login unsuccessfull
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$pnum = $_SESSION['pat_number'];
$status=0;
mysqli_query($mysqli,"insert into userlog(username,userip,status,pat_number) values('$puname','$uip','$status','$pnum')");
$_SESSION['errmsg']="Invalid username or password";

header("location:user-login.php");
}
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User-Login</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets2/css/styles.css">
		<link rel="stylesheet" href="assets2/css/plugins.css">
		<link rel="stylesheet" href="assets2/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.php"><h2> HMS | Patient Login</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
								Please enter your name and password to log in.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" placeholder="Username">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password">
									<i class="fa fa-lock"></i>
									 </span><a href="forgot-password.php">
									Forgot Password ?
								</a>
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Don't have an account yet?
								<a href="index.php">
									Create an account
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						</span><span class="text-bold text-uppercase"> Hospital Management System</span>.
					</div>
			
				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
	<!-- end: BODY -->
</html>