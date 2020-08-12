<?php
include_once 'db.php';

if ($_POST['op'] == 'updAss') {
    $query = "
            UPDATE assistencias SET data_i=:start, data_i_end=:end,
                tecnico=(SELECT id FROM users WHERE username = :tecnico) 
                WHERE id=:id;
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':start' => $_POST["start"],
            ':end' => $_POST["end"],
            ':tecnico' => $_POST["tecnico"],
        )
    );
}

if ($_POST['op'] == 'updVis') {
    $query = "
            UPDATE visitas SET ult_vis=:start, ult_vis_end=:end WHERE id=:id
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':start' => $_POST["start"],
            ':end' => $_POST["end"],
        )
    );
}