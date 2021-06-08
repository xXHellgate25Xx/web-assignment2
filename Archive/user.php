<?php
session_start();

$db_host = 'localhost';
$db = 'DB_asm2';  
$db_user = 'root';
$db_password = '';

$connect = new mysqli($db_host, $db_user, $db_password, $db);
if ($connect->connect_error){
    die("Unable to connect to Database");
}
//For Sign Up
$signup_UserName_Error = "";
$signup_FullName_Error = "";
$signup_Email_Error = "";
$signup_Password_Error = "";
$signup_Phone_Error = "";
$invalid_Account_Error = "";
$old_Password_Error = "";
$new_Password_Error = "";

$login_Username_Error = "";
$login_Password_Error = "";
//For Editing Profile
$edit_FullName_Error = "";
$edit_Email_Error = "";
$edit_Phone_Error = "";


if(isset($_POST['btnSignup'])) {
    $user_name = $_POST['signup_username'];
    $full_name = $_POST['signup_fullname'];
    $email = $_POST['signup_email'];
    $phone = $_POST['signup_phone'];
    $password = $_POST['signup_password'];
    

    $username_query = "SELECT * FROM users WHERE username='$user_name'";
    $result = mysqli_query($connect, $username_query);
    $user = mysqli_fetch_assoc($result);
    //Check user_name
    if ($user_name == "") {
        $signup_UserName_Error = "Please fill in the blanks";
    }
    else if(strlen($user_name) < 1 || strlen($user_name) > 20 || preg_match("/[ ]/", $user_name)) {
        $signup_UserName_Error = "Username has to have length of between 1 and 20 characters and without any spaces";
    }
    else if($user) {
        $signup_UserName_Error = "This account has already existed";
    }

    if ($full_name == "") {
        $signup_FullName_Error = "Please fill in the blanks";
    }

    $email_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $email_query);
    $user = mysqli_fetch_assoc($result);
    if ($email == "") {
        $signup_Email_Error = "Please fill in the blanks";
    }
    else if(!preg_match("/^.*@.*\..*/i", $email)) {
        $signup_Email_Error = "Email has to be in this format: sth@sth.sth.";
    }
    else if($user) {
        $signup_Email_Error = "This email has existed";
    }

    
    if ($password == "") {
        $signup_Password_Error = "Please fill in the blanks";
    }
    else if(strlen($password) < 1 || strlen($password) > 20 || preg_match("/[ ]/", $password)) {
        $signup_Password_Error = "Password has to have length of between 1 and 20 characters and without any spaces";
    }
    
    $phone_query = "SELECT * FROM users WHERE phone='$phone'";
    $result = mysqli_query($connect, $phone_query);
    $user = mysqli_fetch_assoc($result);
    if ($phone == "") {
        $signup_Phone_Error = "Please fill in the blanks";
    }
    else if(strlen($phone) <= 9 || strlen($phone) >= 12 || !preg_match("/[0-9]/", $phone)) {
        $signup_Phone_Error = "Phone number has to be between 10 and 11 numbers";
    }
    else if($user) {
        $signup_Phone_Error = "This phone number has existed";
    }


    if($signup_UserName_Error == "" && $signup_FullName_Error == "" && $signup_Email_Error=="" && $signup_Password_Error== "" && $signup_Phone_Error == "") 
    {
        $create_time = new DateTime('now', new DateTimezone('Asia/Ho_Chi_Minh'));
        $create_time = $create_time->format("Y-m-d H:i:s");
        $query = "INSERT INTO users (username, fullname, email, phone, password, createtime) VALUES ('$user_name', '$full_name','$email', '$phone', '$password', '$create_time');";
        if (mysqli_query($connect, $query)) {
            $_SESSION['signup_success'] = "Successfully Signed Up";
        }
        else {
            die($connect->error.__LINE__);
        }
    }
}

if(isset($_POST['btnLogin'])) {
    $user_name = $_POST['login_username'];
    $password = $_POST['login_password'];
    $username_query = "SELECT * FROM users WHERE username='$user_name' AND password='$password'";
    $result = mysqli_query($connect, $username_query);
    $user = mysqli_fetch_assoc($result);
    if ($user_name == "") {
        $login_Username_Error = "Please fill in the blanks";
    }
    else if(strlen($user_name) <= 0 || strlen($user_name) >= 21 || preg_match("/[ ]/", $user_name)) {
        $login_Username_Error = "Username has to have length between 1 and 20 characters and without spaces";
    }

    if ($password == "") {
        $login_Password_Error = "Please fill in the blanks";
    }
    else if(strlen($password) <= 0 || strlen($password) >= 21 || preg_match("/[ ]/", $password)) {
        $login_Password_Error = "Password has to have length between 1 and 20 characters and without spaces";
    }

    if($login_Password_Error == "" && $login_Username_Error == "") {
        if(!$user) {
            $invalid_Account_Error = "Invalid Username or Password";
        }
        else {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['full_name'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['createtime'] = $user['createtime'];
            $_SESSION['login_success'] = 'Successfully Logged In';
        }
    }
    

}

if (isset($_GET['BtnLogout'])) {
    unset($_SESSION['user_name']);
    unset($_SESSION['full_name']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['createtime']);
    unset($_SESSION['login_success']);
    unset($_SESSION['signup_success']);
    session_destroy();
    header('location: index.php');
}

if (isset($_POST['BtneditProfile'])) {
    $full_name = $_POST['edit_fullname'];
    $email = $_POST['edit_email'];
    $phone = $_POST['edit_phone'];

    if ($full_name == "") {
        $edit_FullName_Error = "Please fill in the blanks";
    }

    $email_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $email_query);
    $user = mysqli_fetch_assoc($result);
    if ($email == "") {
        $edit_Email_Error = "Please fill in the blanks";
    }
    else if(!preg_match("/^.*@.*\..*/i", $email)) {
        $edit_Email_Error = "Email has to be in the form of sth@sth.sth.";
    }

      
    $phone_query = "SELECT * FROM users WHERE phone='$phone'";
    $result = mysqli_query($connect, $phone_query);
    $user = mysqli_fetch_assoc($result);
    if ($phone == "") {
        $edit_Phone_Error = "Please fill in the blanks";
    }
    else if(strlen($phone) < 10 || strlen($phone) > 11 || !preg_match("/[0-9]/", $phone)) {
        $edit_Phone_Error = "Phone number should be 10 to 11 numbers in length and without spaces";
    }


    if($edit_FullName_Error == "" && $edit_Email_Error=="" && $edit_Phone_Error == "") {
        $query = "UPDATE users SET fullname= '$full_name', email='$email', phone='$phone' WHERE username='$_SESSION[user_name]';";
        
        if (mysqli_query($connect, $query)) {
            $_SESSION['full_name'] = $full_name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['edit_profile_success'] = "Successfully Edited";
        } else {
            die($connect->error.__LINE__);
        }
    }
}

if (isset($_POST['BtnchangePassword'])) {
    $old_Password = $_POST['change_old_password'];
    $new_Password = $_POST['change_new_password'];

    $username_query = "SELECT * FROM users WHERE username='$_SESSION[user_name]' AND password='$old_Password'";
    $result = mysqli_query($connect, $username_query);
    $user = mysqli_fetch_assoc($result);
    if ($old_Password == "") {
        $old_Password_Error = "Please fill in the blanks";
    }
    else if(strlen($old_Password) <= 0 || strlen($old_Password) >= 21 || preg_match("/[ ]/", $old_Password)) {
        $old_Password_Error = "Password has to have a length between 1 and 20 and without spaces";
    }
    else if(!$user) {
        $old_Password_Error = "Wrong password, please retry";
    }

    if ($new_Password == "") {
        $new_Password_Error = "Please fill in the blanks";
    }
    else if(strlen($new_Password) <= 0 || strlen($new_Password) >= 21 || preg_match("/[ ]/", $new_Password)) {
        $new_Password_Error = "Password has to have a length between 1 and 20 and without spaces";
    }

    if($new_Password_Error == "" && $old_Password_Error=="") {
        $query = "UPDATE users SET password= '$new_Password' WHERE username='$_SESSION[user_name]';";
        if (mysqli_query($connect, $query)) {
            $_SESSION['change_password_success'] = "Successfully Changed Password";
        } else {
            die($connect->error.__LINE__);
        }
    }

}
?>