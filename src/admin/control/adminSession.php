<?php

function logIn(){

    $user = $_POST["login-name"];
    $pass = $_POST["login-pass"];

    //defines server variables for sql.
    $servername = "localhost";
    $username = "Jose";
    $password = ".12.,12jose";
    $dbname = "emenu";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT user, password, email FROM adminusers WHERE user='$user' OR email='$user'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $dbUser = $row["user"];
    $dbPassword = $row["password"];
    $dbEmail = $row["email"];

$passwordCheck = password_verify($pass, $dbPassword);
if ($passwordCheck === true){
    session_start();
    $_SESSION["admin"] = $dbUser;
    unset($_POST);
    header("Location: ../panel.php");
}
else {
     header("Location: ../admin.php?failedLog");
}

  }
} else {
  header("Location: ../admin.php?failedLog");
}
}




function failedLog()
{
    echo "<p class='alert alert-danger'>Usuario o contraseña incorrecta<p>";
}

function logOut(){
    session_start();

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();

    header("Location: ../admin.php");


}

function sessionCheck(){
    session_start();
    if (!isset($_SESSION["admin"])){
        header("Location: ../admin/admin.php?denied");
    }
}

function denied(){
    echo "<p class='alert alert-danger'>Acesso denegado. Inicie sesion por favor.<p>";
}

function indexSessionCheck(){
    session_start();
    if(isset($_SESSION["admin"])){
        header("Location: ./panel.php");
    }
}