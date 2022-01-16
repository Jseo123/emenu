<?php
if (isset($_POST["cvc"])) {
require_once "./databaseManager.php";
  addRestaurant($_POST);
  unset($_POST);
}





