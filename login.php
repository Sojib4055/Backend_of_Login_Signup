

<?php
@include 'config.php';


session_start();

if(isset($_POST['Button'])){
    
    $SID= md5($_POST['SID']);
    $Password= md5($_POST['Password']);
   
    $select="SELECT * FROM users WHERE SID='$SID' && Password='$Password' ";
    $result=mysqli_query($conn,$select);

    if(mysqli_num_rows($result) > 0){
       $_SESSION['register_SID']=$SID;
       header('location:Buses.html');

    }else{
        $error[]='Incorrect ID or Password';
    }
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Shuttle Bus</title>
    <link rel="stylesheet" href="login.css">
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


            <div class="login">

                <div class="form log_in">
                    <form action="" method="post">
                        <h2>Sign in</h2>

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
                            <i class='bx bx-id-card'></i>
                        </span>
                            <input type="Number" required name="SID">
                            <label for="">SID</label>
                        </div>
                        <div class="inputbox">
                            <span class="icon">
                            <i class='bx bxs-lock-alt'></i>
                        </span>
                            <input type="text" required name="Password">
                            <label for="">Password</label>


                        </div>
                        <div class="RemmemberPass">
                            <label for=""><input type="checkbox" name="" id=""> Remember me</label>
                            <a href="#">Forgot Password</a>
                        </div>
                        <button class="Button" name="Button">Log In</button> <br><br>
                        <div class="create_account">
                            <p>Create an Account!
                                <a href="register_form.php" class="register-link"> <b> Sign Up</b></a>
                            </p>
                        </div>


                    </form>
                </div>

               




            </div>
            <script src="login.js"></script>

        </div>

    </body>

</html>