<?php

namespace Database;

class PDOMySQL
{

    public static function getPdo():\PDO
    {

        $adresseServeurMySQL = "localhost";
        $nomDeDatabase = "recette";
        $username = "Bloggy";
        $password = "MRnYZjv3gyhZY7z";

        $pdo = new \PDO("mysql:host=$adresseServeurMySQL;dbname=$nomDeDatabase",
            $username,
            $password,
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
            ]
        );

        return $pdo;
    }









}