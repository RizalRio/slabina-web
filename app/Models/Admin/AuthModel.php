<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'admin_user';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function search($user)
    {
        $query =
        "SELECT 
            a.id,
            a.type_id,
            a.name,
            a.image,
            a.username,
            a.password,
            a.active,
            a.deleted
        FROM
            $this->table a
        WHERE
            a.username = '$user'
        ";
        $data = $this->db->query($query);

        return $data->getRowArray();
    }
}