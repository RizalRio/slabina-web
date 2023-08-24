<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PenggunaModel extends Model
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

    public function countTable($keyword = null, $deleted = 0)
    {
        $sql =
        "SELECT
	        COUNT(*) AS count
		FROM
            $this->table a
		WHERE
			a.deleted = $deleted
			AND (
			    a.name LIKE '%$keyword%'
                OR a.username LIKE '%$keyword%'
				)
        ORDER BY
			a.id DESC";

        $query_result = $this->db->query($sql);
        return $query_result->getRow()->count;
    }

    public function getTable(
        $search_value,
        $pagination_start,
        $pagination_length,
        $order_direction,
        $order_column_name,
        $deleted = 0
    ){
        $sql =
        "SELECT
			a.id,
            a.type_id,
			a.name,
            a.image,
			a.username,
			a.active
		FROM
			$this->table a
		WHERE
			a.deleted = $deleted
			AND (
			    a.name LIKE '%$search_value%'
                OR a.username LIKE '%$search_value%'
				)
		ORDER BY
			{$order_column_name} {$order_direction}
		LIMIT
			$pagination_start, $pagination_length";

        $query_result = $this->db->query($sql);
        return $query_result->getResult();
    }

    public function insert_data($data = null)
    {
        $this->builder->insert($data);
    }

    public function get_data($id)
    {
        $query = 
        "SELECT 
            a.type_id,
            a.name,
            a.image,
            a.username,
            a.active
        FROM 
            $this->table a
        WHERE
            a.deleted = 0
            AND a.id = $id
        ";

        $result = $this->db->query($query);

        return $result->getRowArray();
    }

    public function update_data($id, $data)
    {
        $this->builder->where('id', $id);
        $this->builder->update($data);
    }

    public function delete_data($id)
    {
        $this->builder->delete(['id' => $id]);
    }
}
