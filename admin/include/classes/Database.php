<?php

class Database
{
    //Connection data
    private $ip, $db, $username, $password;

    //Connection Object
    private $conn;

    //Construct Database class with database info
    function __construct($ip, $db, $username, $password)
    {
        $this->ip = $ip;
        $this->db = $db;
        $this->username = $username;
        $this->password = $password;
    }

    //Connect to database with database info set in construct
    function connect(){
        try {
            $this->conn = new PDO("mysql:host=".$this->ip.";dbname=".$this->db, $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    //Query that can send data back
    function selectQuery($query, $data){
        try{
            $dbh = $this->conn->prepare($query);
            $dbh->execute($data);
            $return = $dbh->fetchAll();
        }catch(PDOException $e){
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $return;
    }
    //simple insert query's
    function Query($query, $data = null){
        try{
            $dbh = $this->conn->prepare($query);
            $dbh->execute($data);
        }catch(PDOException $e){
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return true;
    }
    //get last insert id function
    function getLastId(){
        $dbh = $this->conn->lastInsertId();
        return $dbh;
    }
}