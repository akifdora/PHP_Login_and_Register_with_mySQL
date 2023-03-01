<?php

function sessionControl() {
	include 'connect.php';
	if (empty($_SESSION['user_email']) or empty($_SESSION['user_id'])) {
		header("location:login.php?status=login");
		exit;
	} else {

		$kullanici=$db->prepare("SELECT * FROM users where session_mail=:session_mail");
		$kullanici->execute(array(
			'session_mail' => $_SESSION['user_email']
		));

		$say=$kullanici->rowcount();
		$kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC);
		if ($say==0) {
			header("location:login.php?status=login");
			exit;
		}
	}	
};


function secure($gelen){
	$giden = addslashes($gelen);
	$giden = htmlspecialchars($giden);
	$giden = htmlentities($giden);
	$giden = strip_tags($giden);
	return $giden;
};

function encryption($user_mail) {
	$securityKey = 'ebacc5eb017493856c915d99b1225e98';
	return md5(sha1(md5($_SERVER['REMOTE_ADDR'] . $securityKey . $user_mail . "akifdora" . date('d.m.Y H:i:s') . $_SERVER['HTTP_USER_AGENT'])));
};

?>