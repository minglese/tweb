<?php
    include("top.html");
    include("common.php");
    $db =new PDO("mysql:dbname=imdb;host=localhost","root","xampp");
    $firstname =trim($_GET["firstname"]);
    $lastname =trim($_GET["lastname"]);
    $actor_id =get_best_result($db,$firstname,$lastname);
    $results =$db->query("SELECT movies.id, movies.name, movies.year
                                                       FROM movies join roles on movies.id = roles.movie_id WHERE actor_id = $actor_id ORDER BY year DESC, name");

?>
    <h1>Results for <?= trim($_GET["firstname"]) ?> <?= trim($_GET["lastname"]) ?></h1>
<?php
    if($actor_id != NULL){
?>
    <span id="sub">All films</span>
<?php

    show_content($results);
    }
   else{
?>
    <span id="sub-no-result">We don't know <?= trim($_GET["firstname"]) ?> <?= trim($_GET["lastname"]) ?></span>
<?php
    }
    include("bottom.html");
?>