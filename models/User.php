<?php

class User extends BaseModel {

    protected $table = 'users';
    protected $pk = 'user_id';

    public $user_id = 0;
    public $username;
    public $email;
    public $tel;
    public $password;

    private function getUserByEmail( string $email) {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `email` = :email';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':email' => $email ] );

        return $pdo_statement->fetchObject();
    }
    public function getUser( string $search ) {
        global $db;
        $sql = 'SELECT * FROM `users` WHERE `username` LIKE :search';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([
            ':search' => '%' . $search . '%'
        ]);
        return $pdo_statement->fetchAll();
    }

}