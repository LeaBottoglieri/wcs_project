<?php

namespace Models;

class Member extends Database
{
    public function getAllMembers()
    {
        $req = "SELECT * FROM members ORDER BY id ASC";
        return $this->findAll($req);
    }
    public function addNewMember($data) {
        $this->addOne('members', 'name', '?', $data);
    }
}
