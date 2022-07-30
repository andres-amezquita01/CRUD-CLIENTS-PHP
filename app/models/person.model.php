<?php
    require_once "../config/connection.php";

    class Person extends Connection{

        
        public static function listPersons(){
            try {
                $sql = "SELECT * FROM person";
                $stmt = Connection::getConnection()->prepare($sql);//preparamos la sentencia
                $stmt->execute();//ejecutamos la sentencia
                $result = $stmt->fetchAll();   
                return $result;

            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }

        public static function getPersonByID($id){
            try {
                $sql = "SELECT * FROM person WHERE person_id = :id";
                $stmt = Connection::getConnection()->prepare($sql);//preparamos la sentencia
                $stmt->bindParam(':id', $id);
                $stmt->execute();//ejecutamos la sentencia
                $result = $stmt->fetch();   
                return $result;

            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }

        public static function savePerson($person){
            try {
                $sql = "INSERT INTO person (person_name, person_email, person_age) VALUES (:person_name, :person_email, :person_age)";
                $stmt = Connection::getConnection()->prepare($sql);//preparamos la sentencia
                $stmt->bindParam(':person_name', $person['person_name']);
                $stmt->bindParam(':person_email', $person['person_email']);
                $stmt->bindParam(':person_age', $person['person_age']);

                $stmt->execute();//ejecutamos la sentencia
                return true;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }

        public static function updatePerson($person){
            try {
                $sql = "UPDATE person SET person_name = :person_name, person_email = :person_email, person_age = :person_age WHERE person_id = :person_id";
                $stmt = Connection::getConnection()->prepare($sql);//preparamos la sentencia
                $stmt->bindParam(':person_name', $person['person_name']);
                $stmt->bindParam(':person_email', $person['person_email']);
                $stmt->bindParam(':person_age', $person['person_age']);
                $stmt->bindParam(':person_id', $person['person_id']);

                $stmt->execute();//ejecutamos la sentencia
                return true;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }

        public static function deletePersonByID($id){
            try {
                $sql = "DELETE FROM person WHERE person_id = :id";
                $stmt = Connection::getConnection()->prepare($sql);//preparamos la sentencia
                $stmt->bindParam(':id', $id);
                $stmt->execute();//ejecutamos la sentencia
                   
                return true;

            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }
    