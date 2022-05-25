<?php

namespace Models;

class Database
{
    protected $bdd;

    // Elle se connecte à la bdd
    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=localhost;dbname=wcs_project;charset=utf8','root','root');
    }

    protected function addOne(string $table, string $columns, string $values, $data)
    {
        $query = $this->bdd->prepare('INSERT INTO ' . $table . '(' . $columns . ') values (' . $values . ')');
        $query->execute($data);
        $query->closeCursor();
    }

    protected function findAll($req, $params = [])
    {
        $query = $this->bdd->prepare($req);
        $query->execute($params);
        return $query->fetchAll(); // Récupérer les enregistrements
    }
}