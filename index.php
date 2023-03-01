<?php
ob_start();
session_start(); 
include 'utility/connect.php';
include 'utility/functions.php';
sessionControl();

$kullanici=$db->prepare("SELECT * FROM users where session_mail=:mail");
$kullanici->execute(array(
	'mail' => $_SESSION['user_email']
));

$say=$kullanici->rowcount();
$kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC);
if ($say==0) {
	header("location:login.php?status=unauthorized");
	exit;
};

if ($kullanicicek['ip_adress']!=$_SERVER['REMOTE_ADDR']) {
	header("location:login.php?status=suspect");
	session_destroy();
	exit;
}
include 'header.php';
?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="utility/process.php" method="POST">
					<span class="login100-form-title p-b-49">
						Welcome User, you have successfully logged in!
					</span>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="signout" type="submit">
								Sign Out
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<?php
include 'footer.php';
?>