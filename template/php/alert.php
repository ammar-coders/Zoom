<?php
if (isset($_SESSION["message"])) {
  echo "<script>alert('" . $_SESSION["message"] . "');</script>";
  unset($_SESSION["message"]);
}
?>