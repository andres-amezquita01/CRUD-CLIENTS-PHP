<?php
    require_once "../models/person.model.php";
    $arrayName = array('person_name' => $_POST['nombres'],
                       'person_email' => $_POST['email'],
                       'person_age' => $_POST['edad'],
                       'person_id' => $_POST['id'],);
    echo json_encode(Person::updatePerson($arrayName));