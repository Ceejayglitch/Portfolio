<?php require_once("include/session.php") ?>
<?php

// Include database connection file
include_once("include/DB.php");

    global $ConnectingDB;
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    // Query to check if user exists
    $query = "SELECT * FROM adminprtfl WHERE userName = :username AND passWord = :password";
    $stmt = $ConnectingDB->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
    
    // Check if a user with the provided credentials exists
    if ($stmt->rowCount() == 1) {
        // User exists, set session variables
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["UserId"] = $user["id"];
        $_SESSION["UserName"] = $user["userName"];
        $_SESSION["AdminName"] = $user["adminName"];

        // Redirect to the admin page
        header("Location: admin.php");
        exit;
    } else {
        // Authentication failed, show error message
        $_SESSION["ErrorMessage"] = "Invalid username or password";
    }
}

// Close the database connection
$conn = null;
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        
        <title>Portfolio | Admin Login</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="../images/cj_logo.png" rel="icon">
        <link rel="stylesheet" href="assets/loginstyle.css">
</head>

<body>
   
    <div class="container">
        <div class="myform">
            <form action="login.php" method="post">
            <?php
			echo ErrorMessage();
			echo SuccessMessage();
			?>
                <h2>ADMIN LOGIN</h2>
                <input type="text" id="Username" name="Username" placeholder="Admin Username">
                <input type="password" id="Password" name="Password" placeholder="Admin Password">
                <button type="submit" name="Submit" value="Submit">LOGIN</button>
            </form>
        </div>
        <div class="image">
            <a href="../index.php"><img src="../images/cj_logo.png" alt="Portfolio Logo"></a>
        </div>
    </div>
</body>
</html>

