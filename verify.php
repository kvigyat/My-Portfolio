<?php
    $db = mysqli_connect("localhost", "root", "", "cse3002");
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $query = "SELECT * FROM personal WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userid = $row["username"];
        $start_time = time();
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION['success'] = "You have logged in!";
      
        // Set a cookie that will expire after 30 days
        $cookie_name = "user_info";
        $cookie_value = $userid . "|" . $start_time;
        setcookie($cookie_name, $cookie_value, time() + (30 * 24 * 60 * 60));
      
        // Redirect to the mail page
        header("Location: mail.php");
      }
    else{  
            echo "<h1> Login failed. Invalid username or password. Please try again.</h1><br>";  
            echo '<h3><a href="login.html" class="link"><b>Log in<b></a></h3>';
    } 
        
?>