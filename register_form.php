
<?php
@include 'config.php';


session_start();

if(isset($_POST['Button'])){
    $email= mysqli_real_escape_string($conn,$_POST['register_email']);
    $SID= md5($_POST['register_SID']);
    $Password= md5($_POST['register_password']);
    $CPassword=md5($_POST['confirm_password']);
    $select="SELECT * FROM users WHERE email= '$email'&& SID='$SID' && Password='$Password' ";
    $result=mysqli_query($conn,$select);

    if(mysqli_num_rows($result) > 0){
        $error[]='user already exixts';
    }else{
        if($Password !=$CPassword){
            $error[]='password not matched';
        }else{
            $insert="INSERT INTO users(email,SID,Password) VALUES('$email','$SID','$Password')";
            mysqli_query($conn,$insert);
            header('location:login.php');
        }
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Shuttle Bus</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <body>
       
        <div class="login-back">
            <div class="navbar">

                <img src="logo.png" class="logo">
                <ul>
                    <li> <a href="index.html">Home</a> </li>
                    <li> <a href="#">About</a> </li>
                    <li> <a href="Contact.html">Contacts</a> </li>
                </ul>

            </div>

            <div class="reg">
                <div class="form register">
                    <form action="" method="post">
                        <h2>Sign up</h2>

                        <?php
                         if(isset($error))
                         {
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            }
                         }
                        ?>

                        <div class="inputbox">
                            <span class="icon">
                                <i class='bx bxs-envelope'></i>
                            </span>
                            <input type="email" name="register_email" required>
                            <label for="register_email">Email</label>
                        </div>
                        <div class="inputbox">
                            <span class="icon">
                                <i class='bx bx-id-card'></i>
                            </span>
                            <input type="number" name="register_SID" required>
                            <label for="register_SID">SID</label>
                        </div>
                        <div class="inputbox">
                            <span class="icon">
                                <i class='bx bxs-lock-alt'></i>
                            </span>
                            <input type="password" name="register_password" required>
                            <label for="register_password">Password</label>
                        </div>
                        <div class="inputbox">
                            <span class="icon">
                                <i class='bx bxs-lock-alt'></i>
                            </span>
                            <input type="password" name="confirm_password" required>
                            <label for="confirm_password">Confirm Password</label>
                        </div>
                        <button type="submit" class="Button" name="Button">Sign Up</button><br><br>
                        <div class="create_account">
                            <p>Already have an Account!
                                <a href="login.php" class="Login-link"><b> Sign In</b></a>
                            </p>
                        </div>
                    </form>
                </div>



                
            
                </div>
            <script src="login.js"></script>

        </div>

    </body>

</html>