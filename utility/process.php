<?php
@ob_start();
@session_start();
include 'connect.php';
include 'functions.php';

if (isset($_GET['api_key'])) {
    if ($_GET['api_key']==$api_key) {
      $api=true;
    } else {
     echo json_encode(['status' => 'error', 'mesaj' => "Your API key is incorrect!"]);
     $api=false;
     exit;
   }
  } else {
    $api=false;
}

/*######################## REGISTER ########################*/
if (isset($_POST['register'])) {
    if ($_POST['password'] != $_POST['confirmpassword']) {
    header("location:../register.php?status=matcherror");
      exit;
    }
    $query=$db->prepare("INSERT INTO users SET
        user_email=:email,
        user_password=:pass
    ");
    $userRegister=$query->execute(array(
        'email' => $_POST['email'],
        'pass' => md5($_POST['password'])
    ));

    if ($userRegister) {
        if (!$api) {
            header("location:../login.php?status=ok");
        }
        exit;
    } else {
        if (!$api) {
        header("location:../login.php?status=no");
        }
        exit;
    }
  exit;
}
/*##########################################################*/

/*######################### LOGIN #########################*/
if (isset($_POST['login'])) {

	if (isset($_POST['email']) AND isset($_POST['password'])) {
    $user_email=secure($_POST['email']);
    $user_password=md5($_POST['password']);
    
    $query=$db->prepare("SELECT * FROM users WHERE user_email=:email and user_password=:pass");
    $query->execute(array(
      'email'=> $user_email,
      'pass'=> $user_password
    ));
    $result=$query->rowCount();
    if ($result==1) {
      $confirmUser=$query->fetch(PDO::FETCH_ASSOC);
      $_SESSION['user_email']=encryption($user_email); 
      $_SESSION['user_id']=$confirmUser['user_id'];

      $saveIP=$db->prepare("UPDATE users SET
        ip_adress=:ip_adress, 
        session_mail=:session_mail WHERE 
        user_email=:user_email
        ");

      $save=$saveIP->execute(array(
        'ip_adress' => $_SERVER['REMOTE_ADDR'], 
        'session_mail' => encryption($user_email),
        'user_email' => $user_email
      ));

      if ($api) {
        echo json_encode([
          'durum' => 'ok',
          'bilgiler' => $confirmUser
        ]);
      } else {
        header("location:../index.php");
      }

      exit;
    } else {
    if (!$api) {
      header("location:../login.php?status=error");
    }
  }
} else {
    header("location:../login.php?status=no");
}

exit;
}
/*##########################################################*/

/*######################## SIGN OUT ########################*/
if (isset($_POST['signout'])) {
    session_start();
    session_destroy();
    header("location:../login.php");
}
/*##########################################################*/