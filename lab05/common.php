<?php

/*Questa funzione crea una tabella con i risultati di una query, aspettandosi un PDOstatement con righe nel formato (id,titolo,anno).*/
function show_content($results){
?>
<table>
<tr>
    <th>#</th>
    <th>Title</th>
    <th>Year</th>
</tr>
<?php
    foreach($results as $row){
?>
<tr>
    <td><?= $row[0] ?></td>
    <td><?= $row[1] ?></td>
    <td><?= $row[2] ?></td>
</tr>
<?php
    }
?>
</table>
<?php
}

/*Questa funzione cerca, nel database connesso all'oggetto PDO $db, per una data coppia ($firstname,$lastname), l'id dell'attore con cognome $lastname e con nome che comincia con $firstname, che risulti recitare in più film (è coinvolto più volte nell'associazione roles).
Restituisce l'id nel esista tale attore, altrimenti NULL. */
function get_best_result($db,$firstname,$lastname){
    $firstname=$db->quote($firstname  .  "%");
    $lastname =$db->quote($lastname);
    $subquery ="SELECT actor_id, count(*) as howManyMovies
                                                             FROM roles
                                                             WHERE actor_id in 
                                                                               (SELECT id 
                                                                                 FROM actors
                                                                                 WHERE first_name LIKE $firstname
                                                                                                   and last_name = $lastname)
                                                            GROUP BY actor_id";

    $results =$db->query("SELECT actor_id
                                                       FROM ($subquery) as sub1
                                                       WHERE howManyMovies = 
                                                                         (SELECT MAX(howManyMovies)
                                                                           FROM ($subquery) as sub2)");

    $row =$results->fetch();

    return $row[0];
}
?>