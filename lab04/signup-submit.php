<?php include("top.html"); ?>

<?php
  $new_user["nome"] =$_POST["nome"];
  $new_user["sesso"] =$_POST["sesso"];
  $new_user["eta"] =$_POST["eta"];
  $new_user["personalita"] =$_POST["personalita"];
  $new_user["os"] =$_POST["os"];
  $new_user["min"] =$_POST["min"];
  $new_user["max"] =$_POST["max"];

  $line =implode(",",$new_user);
  $line =$line."\n";

  file_put_contents("singles.txt",$line,FILE_APPEND); 
?>

<p><strong>Thank you!</strong></p>

<p>Welcome to NerdLuv, <?= $new_user["nome"] ?>!</p>

<p>Now <a href="matches.php">log in to see your matches!</a></p>

<?php include("bottom.html"); ?>