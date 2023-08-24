<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KonfigurasiModel extends Model
{
    protected $table            = 'configuration';
    protected $primaryKey       = 'id';
    protected $id               = 1;

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function get_data()
    {
        $query = 
        "SELECT 
            *
        FROM
            $this->table a
        WHERE
            a.id = $this->id
        ";

        $result = $this->db->query($query);

        return $result->getRowArray();
    }

    public function update_data($data, $id = 1)
    {
        $this->builder->where('id', $id);
        $this->builder->update($data);
    }
}
