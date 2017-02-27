<?php

class UserModel extends BaseModel
{
    public static $tableName = 'user';
    public $name = Null;
    public $email = Null;
    public $location = Null;


    public function __construct ($name, $email, $location) {
    	parent::__construct();
    	$this->name = $name;
    	$this->email = $email;
    	$this->location = $location;

    }

    public function findByEmail() {
    	$sql = "SELECT * FROM ".self::$tableName." WHERE email = :email";
    	$sth = $this->pdo->prepare($sql);
    	$arr = array('email' => $this->email);
    	$sth->execute($arr);
    	$res = $sth->fetch();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function save() {
    	$sql = "INSERT INTO ".self::$tableName." SET
            name = :name,
            email = :email,
            territory = :location";
        $arr = [
            'name' => $this->name,
            'email' => $this->email,
            'location' => $this->location
        ];
        $res = $this->pdo->prepare($sql);
        try {
            $res->execute($arr);
            $lastId = $this->pdo->lastInsertId();
            return $lastId;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return FALSE;
        }
    }
}