<?php require_once("DB.php"); ?>
<?php
function Redirect_to($New_Location){
    header("Location:".$New_Location);
    exit;
}


function Login_Attempt($Username, $Password) {

    global $ConnectingDB;
    $sql = "SELECT * FROM adminprtfl WHERE userName=:username AND passWord=:password LIMIT 1";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':username', $Username);
    $stmt->bindValue(':password', $Password);
    $stmt->execute();
    $Result = $stmt->rowCount();
        if ($Result==1) {
            return $Found_Account = $stmt->fetch();
        } else {
            return null;
        }

}


function Confirm_Login() {
    if(isset($_SESSION["UserId"])) {
        return true;
    } else {
        $_SESSION["ErrorMessage"]="Login Required !";
        Redirect_to("login.php");
    }
}

?>