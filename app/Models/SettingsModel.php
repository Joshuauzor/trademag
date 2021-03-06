<?php

namespace App\Models;

use CodeIgniter\Model;
$db = \Config\Database::connect();

class SettingsModel extends Model
{
    protected $table      = 'master';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'email', 'phone','address','btc_id','snapshot', 'type', 'status', 'edited_by'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // public function __construct(ConnectionInterface &$db)
    // {
    //     $this->db = &$db;
    // }


    public function getOne($array){
        $builder = $this->db->table('master');
        $builder->where($array);
        $result = $builder->get();
        return $result->getRow();
    }

    public function getAll(){
        $builder = $this->db->table('master');
        $result = $builder->get();
        return $result->getResult();
    }

    #update user data
    public function updateOne($id, $data){
        $builder = $this->db->table('master');
        $builder->where('id', $id);
        // $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    } 
}