<?php
$conNew= new mysqli('localhost','root','','schoolwebsitedatabase');
  if ($conNew->connect_error) {
      die("Connection failed: " . $conNew->connect_error);
  }
?>