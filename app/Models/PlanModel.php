<?php

namespace App\Models;

use CodeIgniter\Model;
$db = \Config\Database::connect();

class PlanModel extends Model
{
    protected $table      = 'plans';
    protected $primaryKey = 'plan_id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['plan_name', 'invest', 'withdraw'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // public function __construct(ConnectionInterface &$db)
    // {
    //     $this->db = &$db;
    // }

    public function getOne($array){
        $builder = $this->db->table('plans');
        $builder->where($array);
        $result = $builder->get();
        return $result->getRow();
    }

    public function getAll(){
        $builder = $this->db->table('plans');
        $result = $builder->get();
        return $result->getResult();
    }

    public function updateUser($user_id, $data){
        $builder = $this->db->table('users');
        $builder->where('uuid', $user_id);
        // $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    }

    
}