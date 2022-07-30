<?php
    require_once "../models/person.model.php";
    $arrayName = array('person_name' => $_POST['nombres'],
                       'person_email' => $_POST['email'],
                       'person_age' => $_POST['edad'],);
    echo json_encode(Person::savePerson($arrayName));