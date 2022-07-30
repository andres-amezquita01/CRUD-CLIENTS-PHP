<?php 
class Connection{
    public $host = '104.154.211.11';
    public $dbname = 'testing';
    public $port = '3306';
    public $user = 'root';
    public $password = '12345';
    public $driver = 'mysql';
    public $connect;

    public static function getConnection(){
        try {
            $connection = new Connection();
            $connection->connect = new PDO("{$connection->driver}:host={$connection->host};port={$connection->port};
            dbname={$connection->dbname}",$connection->user, $connection->password);
            $connection->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           // echo "connection success";
            //echo $connection->connect->pgsqlGetPid();
            return $connection->connect;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

}

Connection::getConnection();
?>