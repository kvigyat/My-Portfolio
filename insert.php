
    <?php
     $conn = mysqli_connect("localhost", "root", "", "cse3002");
         
     // Check connection
     if($conn === false){
         die("ERROR: Could not connect. "
             . mysqli_connect_error());
     }
        $name =  $_REQUEST['name'];
        $email =  $_REQUEST['email'];
        $age = $_REQUEST['age'];
        $phone = $_REQUEST['phone'];
        $campus = $_REQUEST['campus'];
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        
        $sql_u = "SELECT * FROM personal WHERE username='$username'";
        $sql_e = "SELECT * FROM personal WHERE email='$email'";
        $res_u=mysqli_query($conn, $sql_u);
        $res_e=mysqli_query($conn, $sql_e);

        if(mysqli_num_rows($res_u)>0)
        {
            echo "<h3>Sorry... Username already taken</h3><br>";
            echo "<a href='signup.html'><b>Sign up<b></a> again";
        }    
        else if(mysqli_num_rows($res_e)>0)
        {
            echo "<h3>Sorry... email already used.</h3><br>";
            echo "<a href='signup.html'><b>Sign up<b></a> again";
        }
        else
        {
            $sql = "INSERT INTO personal  VALUES ('$name','$email','$age','$phone','$campus','$username','$password')";

            if(mysqli_query($conn, $sql)){
                echo "<br><br>";
                echo '<h2>Your account has been successfully created</h2><br>'
                .'</h3>You can now <a href="login.html" class="link"><b>Log in<b></a> </h3>';
                echo '<p></p>';           
            
            }
            else{
                echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
            }
        }
         
        // Close connection
        
    
    mysqli_close($conn);
    ?>
    
