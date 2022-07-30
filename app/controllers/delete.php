<?php
    require_once "../models/person.model.php";
    echo json_encode(Person::deletePersonByID($_POST['id'])); 