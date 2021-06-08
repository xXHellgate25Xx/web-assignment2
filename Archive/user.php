<?php
session_start();
// session_destroy();
$db_host = 'localhost';
$db = 'DB_asm2';  
$db_user = 'root';
$db_password = '';

$conn = new mysqli($db_host, $db_user, $db_password, $db);
if ($conn->connect_error){
    die("Fatal error");
}

$signup_UserName_Error = "";
$signup_FullName_Error = "";
$signup_Email_Error = "";
$signup_Password_Error = "";
$signup_Phone_Error = "";
$invalid_Account_Error = "";
$old_Pass_Error = "";
$new_Pass_Error = "";

$login_Username_Error = "";
$login_Password_Error = "";


if(isset($_POST['btnSignup'])) {
    $user_name = $_POST['signup_username'];
    $full_name = $_POST['signup_fullname'];
    $email = $_POST['signup_email'];
    $phone = $_POST['signup_phone'];
    $password = $_POST['signup_password'];
    

    $username_query = "SELECT * FROM users WHERE username='$user_name'";
    $result = mysqli_query($conn, $username_query);
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
    $result = mysqli_query($conn, $email_query);
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
    $result = mysqli_query($conn, $phone_query);
    $user = mysqli_fetch_assoc($result);
    if ($phone == "") {
        $signup_Phone_Error = "Please fill in the blanks";
    }
    else if(strlen($phone) < 10 || strlen($phone) > 11 || !preg_match("/[0-9]/", $phone)) {
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
        if (mysqli_query($conn, $query)) {
            $_SESSION['signup_success'] = "Successfully Signed Up";
        }
        else {
            die($conn->error . __LINE__);
        }
    }
}

if(isset($_POST['btnLogin'])) {
    $user_name = $_POST['login_username'];
    $password = $_POST['login_password'];
    $username_query = "SELECT * FROM users WHERE username='$user_name' AND password='$password'";
    $result = mysqli_query($conn, $username_query);
    $user = mysqli_fetch_assoc($result);
    if ($user_name == "") {
        $login_Username_Error = "Please fill in the blanks";
    }
    else if(strlen($user_name) < 1 || strlen($user_name) > 20 || preg_match("/[ ]/", $user_name)) {
        $login_Username_Error = "Username has to have length between 1 and 20 characters and without spaces";
    }

    if ($password == "") {
        $login_Password_Error = "Please fill in the blanks";
    }
    else if(strlen($password) < 1 || strlen($password) > 20 || preg_match("/[ ]/", $password)) {
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

if (isset($_GET['logoutBtn'])) {
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

if (isset($_POST['editProfileBtn'])) {
    unset($_SESSION['isChangePassword']);

    $full_name = $_POST['update_name'];
    $email = $_POST['update_email'];
    $phone = $_POST['update_phone'];
    $address = $_POST['update_address'];

    if ($full_name == "") {
        $signup_FullName_Error = "Vui lòng không bỏ trống.";
    }

    $email_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $email_query);
    $user = mysqli_fetch_assoc($result);
    if ($email == "") {
        $signup_Email_Error = "Vui lòng không bỏ trống.";
    }
    else if(!preg_match("/^.*@.*\..*/i", $email)) {
        $signup_Email_Error = "Email phải đúng định dạng sth@sth.sth.";
    }
    else if($user && $email != $_SESSION['email']) {
        $signup_Email_Error = "Email đã tồn tại trên hệ thống.";
    }

      
    $phone_query = "SELECT * FROM users WHERE phone='$phone'";
    $result = mysqli_query($conn, $phone_query);
    $user = mysqli_fetch_assoc($result);
    if ($phone == "") {
        $signup_Phone_Error = "Vui lòng không bỏ trống.";
    }
    else if(strlen($phone) < 10 || strlen($phone) > 11 || !preg_match("/[0-9]/", $phone)) {
        $signup_Phone_Error = "Số điện thoại phải chứa từ 10-11 số và không chứa khoảng trắng.";
    }
    else if($user && $phone != $_SESSION['phone']) {
        $signup_Phone_Error = "Số điện thoại đã tồn tại trên hệ thống.";
    }


    if($signup_FullName_Error == "" && $signup_Email_Error=="" && $signup_Phone_Error == "" && $signupAddressError == "") {
        $query = "UPDATE users SET full_name= '$full_name', email='$email', phone='$phone', address='$address', imgUrl='$unique_image' WHERE user_name='$_SESSION[user_name]';";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION['full_name'] = $full_name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['updateProfileSuccess'] = "true";
            unset($_SESSION['isUpdateProfile']);
        } else {
            die($conn->error . __LINE__);
        }
    }
    else {
        $_SESSION['isUpdateProfile'] = "true";
    }
}

if (isset($_POST['changePasswordBtn'])) {
    unset($_SESSION['isUpdateProfile']);
    $oldPass = $_POST['oldPassword'];
    $newPass = $_POST['newPassword'];

    $username_query = "SELECT * FROM users WHERE user_name='$_SESSION[user_name]' AND password='$oldPass'";
    $result = mysqli_query($conn, $username_query);
    $user = mysqli_fetch_assoc($result);
    if ($oldPass == "") {
        $old_Pass_Error = "Vui lòng không bỏ trống.";
    }
    else if(strlen($oldPass) < 5 || strlen($oldPass) > 15 || preg_match("/[ ]/", $oldPass)) {
        $old_Pass_Error = "Mật khẩu phải chứa từ 5-15 ký tự và không chứa khoảng trắng.";
    }
    else if(!$user) {
        $old_Pass_Error = "Mật khẩu hiện tại không chính xác.";
    }

    if ($newPass == "") {
        $new_Pass_Error = "Vui lòng không bỏ trống.";
    }
    else if(strlen($newPass) < 5 || strlen($newPass) > 15 || preg_match("/[ ]/", $newPass)) {
        $new_Pass_Error = "Mật khẩu phải chứa từ 5-15 ký tự và không chứa khoảng trắng.";
    }

    if($new_Pass_Error == "" && $old_Pass_Error=="") {
        $query = "UPDATE users SET password= '$newPass' WHERE user_name='$_SESSION[user_name]';";
        if (mysqli_query($conn, $query)) {
            $_SESSION['changePasswordSuccess'] = "true";
            unset($_SESSION['isChangePassword']);
        } else {
            die($conn->error . __LINE__);
        }
    }
    else {
        $_SESSION['isChangePassword'] = "true";
    }

}
?>