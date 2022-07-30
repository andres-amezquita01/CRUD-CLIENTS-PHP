<?php
    require_once "../models/person.model.php";

    echo json_encode(Person::listPersons());