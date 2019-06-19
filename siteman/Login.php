
<?php 
    session_start();
    include('dbconnect.php');

    if(isset($_POST['doLogin_admin'])){
        $credential = '';
        $nama = '';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $sql = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        while ($data = mysql_fetch_array($sql)) {
            $credential = $data['credential'];
            $nama = $data['nama'];
        }
        if(mysql_num_rows($sql)){
            $_SESSION['username'] = $username;
            $_SESSION['credential'] = $credential;
            $_SESSION['nama'] = $nama;
            echo "<script>document.location.href='index.php?menu=home'</script>";
        }else{
            echo "<script>alert('Kombinasi username dan password salah')</script>";
        }
    }
 ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Deltafm Admin</title>
<!--
you can substitue the span of reauth email for a input with the email and
include the remember me checkbox
-->
<body id="login">
<div class="container" style="position: relative;">
    <div class="card card-container" style=" margin-top: 30vh;">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <!-- <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" /> -->
        <h3>Delta Admin Login</h3>
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin"   method="post">
            <!-- <span id="reauth-email" class="reauth-email"></span> -->
            <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
<!--             <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div> -->
            <input type="submit"  class="btn btn-lg btn-primary btn-block btn-signin" value="Sign In" name="doLogin_admin">
            <!-- <button type="submit">Sign in</button> -->
        </form><!-- /form -->
        <font style="font-size: 10px; float: right;">
                    <b>Powered By</b> <a href="https://limadigit.com"><img src="https://joker.5dapps.com/masimanetwork/prambors/images/limad-logo.png" style="height: 20px;"></a>
                </font>
<!--         <a href="#" class="forgot-password">
            Forgot the password?
        </a> -->
    </div><!-- /card-container -->
</div><!-- /container -->
</body>

<style type="text/css">
    /*
 * Specific styles of signin component
 */
/*
 * General styles
 */
body, html {
    height: 100%;
      

background: rgba(241,231,103,1);
background: -moz-linear-gradient(left, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(241,231,103,1)), color-stop(100%, rgba(254,182,69,1)));
background: -webkit-linear-gradient(left, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -o-linear-gradient(left, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -ms-linear-gradient(left, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: linear-gradient(to right, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1e767', endColorstr='#feb645', GradientType=1 );


}

#login
{
    
background: rgba(241,231,103,1);
background: -moz-linear-gradient(left, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(241,231,103,1)), color-stop(100%, rgba(254,182,69,1)));
background: -webkit-linear-gradient(left, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -o-linear-gradient(left, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -ms-linear-gradient(left, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: linear-gradient(to right, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1e767', endColorstr='#feb645', GradientType=1 );


}

.card-container.card {
    max-width: 350px;
    padding: 40px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: rgb(104, 145, 162);
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(12, 97, 33);
}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}
</style>
