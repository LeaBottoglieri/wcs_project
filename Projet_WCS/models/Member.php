<?php

namespace Models;

class Member extends \Models\AbstractModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'members';
    }
    public function addNewMember($data): void {
        $query = $this->db->prepare('INSERT INTO members (created_at, name) VALUES (CURRENT_TIMESTAMP, ?)');
        $query->execute($data);
        $query->closeCursor();
    }
}
