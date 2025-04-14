<?php
include_once "model.php";

class BlogModel extends Model
{

    protected $table = 'blogs'; // Table name

    protected $TIMESTAMP = [ // 
        'status' => true,
        'CREATED_AT' => 'created_at',
        'UPDATE_AT' => 'updated_at',
    ];

    public function __construct()
    {
    }

    public function first($condition)
    {
        return Model::DB()->first($this->table, $condition);
    }

    public function all()
    {
        return Model::DB()->all($this->table);
    }

    public function get(array $conditions = [], int $limit = null, int $offset = null)
    {
        return Model::DB()->get($this->table, $conditions, $limit, $offset);
    }

    public function create($data)
    {

        return Model::DB()->create($this->table, $data, $this->TIMESTAMP);
    }

    public function update($data, $condition)
    {
        return Model::DB()->update($this->table, $data, $condition);
    }

    public function delete($condition)
    {
        return Model::DB()->delete($this->table, $condition);
    }
}
