<?php include("top.html"); ?>

<?php 
  $nome =$_GET["name"];
  $righe =file("singles.txt");
  
  $i =0;
  $min =-1;
  $quante_righe =count($righe);
 while($i < $quante_righe and -1 == $min){
    $words =explode(",",$righe[$i]);
    if(0 == strcmp($words[0],$nome)){
      $sesso =$words[1];
      $personalita =$words[3];
      $os =$words[4];
      $min =$words[5];
      $max =$words[6];
    }
    $i++;
  }
?>

<h1>Matches for <?= $nome ?></h1>

<?php
  foreach($righe as $line){
    $words =explode(",",$line);
    if($sesso != $words[1] and $min <= $words[2] and $max >= $words[2] and $os == $words[4]){
      $c =0;
      for($i =0; $i <4; $i++){
        if($words[3][$i] == $personalita[$i]){ $c++; }
      }
      if(0 < $c){
?>

<div class="match">
<p><img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/user.jpg"> <?=  $words[0] ?></p>
<ul>
    <li><strong>gender:</strong> <?= $words[1] ?></li>
    <li><strong>age:</strong> <?= $words[2] ?></li>
    <li><strong>type:</strong> <?= $words[3] ?></li>
    <li><strong>OS:</strong> <?= $words[4] ?></li>
</ul></div>

<?php
      }
    }
  }
?>

<?php include("bottom.html"); ?>