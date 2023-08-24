<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SlideModel extends Model
{
    protected $table            = 'slide';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

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
			a.name LIKE '%$keyword%'	
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
    ) {
        $sql =
            "SELECT
			a.id,
			a.name
		FROM
			$this->table a
		WHERE
			a.name LIKE '%$search_value%'
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
            a.name,
            a.description,
            a.image
        FROM 
            $this->table a
        WHERE
            a.id = $id
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

    public function get_slide()
    {
        $query =
            "SELECT 
            a.name,
            a.description,
            a.image
        FROM 
            $this->table a
        WHERE
            a.active = 1
        ";

        $result = $this->db->query($query);

        return $result->getResultArray();
    }
}
