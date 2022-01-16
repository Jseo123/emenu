<?php
if (isset($_POST["cvc"])) {
  $data = $_POST;
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
  $password = $data["password"];
  $notes = $data["notes"];
  unset($_POST);
  print_r($data);
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

  $sql = "INSERT INTO restaurants (first_name, last_name, restaurant_name, adress, phone, card_number, cvc, expiration_date, email, user, password, notes)
VALUES ('$firstName', '$lastName', '$restaurantName', '$adress', '$phone', '$cardNumber', '$cvc', '$expirationDate', '$email', '$user', '$password', '$notes')";

if ($conn->query($sql) === TRUE) {
header("Location: ../newRestaurant.php?restaurantAdded");
} else {
  header("Location: ../newRestaurant.php?error");
}

}



