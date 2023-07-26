
<!DOCTYPE html>
<html>
<head>
    <title>Send Mail with Attachment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: grey;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .container h2 {
            text-align: center;
        }

        .container label {
            display: block;
            margin-top: 10px;
        }

        .container input[type="text"],
        .container input[type="email"],
        .container textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }

        .container input[type="file"] {
            margin-top: 10px;
            
        }

        .container input[type="submit"]
        {
        	background-color: #4CAF50;
			border: none;
            text-align: center;
            color: white; 
            padding: 10px 14px;
			border-radius: 4px;
            font-size: 17.5px;
			cursor: pointer;
			font-family: inherit;			
			display: block;
			width: 100%;
			margin-top: 30px;
			margin-bottom: 20px;
        }
        .container a {
            display: block;
            background-color: #4CAF50;
            color: white;            
            padding: 10px 19px;
            border: none;            
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
        }

        .container input[type="submit"]:hover,
        .container a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You have to log in first";
        header('location: login.html');
    }
?>
<?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <?php  if (isset($_SESSION['username'])) : ?>  
 
        
                        
                        <strong>
                            <?php echo "User Info : ".$_SESSION['username']; ?>
                           
                            <?php       
                                date_default_timezone_set('Asia/Kolkata');

                                echo "<br>Time of start : ".date('d-m-y h:i:s',time());
                            ?>
                        </strong>
        
        <?php endif ?>
    <div class="container">
        <h2>Send Mail with Attachment</h2>
        <form method="post" action="sendmail.php" enctype="multipart/form-data">
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter the email address" required>

            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" placeholder="Enter the subject of your email" required>

            <label for="message">Message:</label>
            <textarea name="message" id="message" rows="5" placeholder="Enter the message here..." required></textarea>

            <label for="attachment">Attachment:</label>
            <input type="file" name="attachment" id="attachment">
            <br>

            <input type="submit" name="submit" value="Send">
            <div type="submit">
            
            <a href="logout.php">&nbsp Logout</a>
            </div>
        </form>
    </div>
</body>
</html>