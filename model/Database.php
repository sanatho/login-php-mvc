<?php

require "../utility/DatabaseCredentials.php";

class Database{

    private $connection;
    private $stmt;

    /**
     * Initialize database connection
     */
    public function __construct(){
        $this->connection = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
    }

    /**
     * Initialize prepared statement
     * @param $query String Query to submit
     */
    public function query($query){
        $this->stmt = $this->connection->prepare($query);
    }


    public function bindValues($type, $values){
        $this->stmt->bind_param($type, ...$values);
    }

    public function getResult(){
        $this->stmt->execute();
        return $this->stmt->get_result();
    }
}