<?php
function confirmationMessage(){
    echo "<p class ='alert alert-success d-flex justify-content-center'>!Restaurante agregado con exito!</p>";
}

function errorMessage(){
    echo "<p class ='alert alert-danger d-flex justify-content-center'>!Error al rellenar los datos!</p>";
}

function duplicationMessage(){
  echo "<p class ='alert alert-danger d-flex justify-content-center'>!El usuario o email ya existe!</p>";
}

function addRestaurant($array){
    $data =$array;
  $firstName = $data["ownerName"];
  $lastName = $data["lastName"];
  $restaurantName = $data["restaurantName"];
  $adress = $data["adress"];
  $phone = $data["phone"];
  $cardNumber = $data["cardNumber"];
  $cvc = $data["cvc"];
  $expirationDate = $data["expirationDate"];
  $email = $data["email"];
  $user = $data["user"];
  $pass = password_hash($data["pass"], PASSWORD_DEFAULT);
  $notes = $data["notes"];
  //defines server variables for sql.
  $servername = "localhost";
  $username = "Jose";
  $password = ".12.,12jose";
  $dbname = "emenu";
  $duplicateError = 1062;

  // Create connection
  try {
  $conn = mysqli_connect($servername, $username, $password, $dbname);


  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO restaurants (first_name, last_name, restaurant_name, adress, phone, card_number, cvc, expiration_date, email, user, password, notes, creation_date)
VALUES ('$firstName', '$lastName', '$restaurantName', '$adress', '$phone', '$cardNumber', '$cvc', '$expirationDate', '$email', '$user', '$pass', '$notes', now())";

if ($conn->query($sql) === TRUE) {
header("Location: ../newRestaurant.php?restaurantAdded");
} else {
  header("Location: ../newRestaurant.php?error");
}
}
catch(Exception $duplicateError){
  header("Location: ../newRestaurant.php?duplication");
}
}