<?php

namespace App\Models;

use CodeIgniter\Model;
$db = \Config\Database::connect();

class InvestedModel extends Model
{
    protected $table      = 'invested';
    protected $primaryKey = 'invested_id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['uuid', 'amount','plan','method','snapshot', 'type', 'status', 'date'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // public function __construct(ConnectionInterface &$db)
    // {
    //     $this->db = &$db;
    // }


    public function getOne($array){
        $builder = $this->db->table('invested');
        $builder->where($array);
        $result = $builder->get();
        return $result->getRow();
    }

    public function getAll(){
        $builder = $this->db->table('invested');
        $result = $builder->get();
        return $result->getResult();
    }

    #get all user transaction
    public function getUser($limit = null, $array){
        $builder = $this->db->table('invested');
        $builder->where($array);
        $builder->orderBy('invested_id', 'DESC');
        $builder->limit($limit);
        $result = $builder->get();
        return $result->getResult();
    }

    #update user data
    public function updateOne($user_id, $data){
        $builder = $this->db->table('invested');
        $builder->where('invested_id', $user_id);
        // $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    }

    #get pending deposit
    public function getPendingDeposit(){
            $builder = $this->db->table('invested');
            $builder->select('invested.*, users.email, users.uuid');
            $builder->join('users', 'users.uuid = invested.uuid');
            $builder->where('invested.type', 'deposit');
            $builder->where('invested.status', 'pending');
            $result = $builder->get();
            return $result->getResult();
    }

    #get approved deposit
    public function getApprovedDeposit(){
        $builder = $this->db->table('invested');
        $builder->select('invested.*, users.email, users.uuid');
        $builder->join('users', 'users.uuid = invested.uuid');
        $builder->where('invested.type', 'deposit');
        $builder->where('invested.status', 'approved');
        $result = $builder->get();
        return $result->getResult();
    }

    #get declined deposit
    public function getDeclinedDeposit(){
        $builder = $this->db->table('invested');
        $builder->select('invested.*, users.email, users.uuid');
        $builder->join('users', 'users.uuid = invested.uuid');
        $builder->where('invested.type', 'deposit');
        $builder->where('invested.status', 'declined');
        $result = $builder->get();
        return $result->getResult();
    }

    #get pending withdrawal
    public function getPendingWithdrawal(){
        $builder = $this->db->table('invested');
        $builder->select('invested.*, users.email, users.uuid');
        $builder->join('users', 'users.uuid = invested.uuid');
        $builder->where('invested.type', 'withdrawal');
        $builder->where('invested.status', 'pending');
        $result = $builder->get();
        return $result->getResult();
    }

    #get approved withdrawal
    public function getApprovedWithdrawal(){
        $builder = $this->db->table('invested');
        $builder->select('invested.*, users.email, users.uuid');
        $builder->join('users', 'users.uuid = invested.uuid');
        $builder->where('invested.type', 'withdrawal');
        $builder->where('invested.status', 'approved');
        $result = $builder->get();
        return $result->getResult();
    }

    #get declined withdrawal
    public function getDeclinedWithdrawal(){
        $builder = $this->db->table('invested');
        $builder->select('invested.*, users.email, users.uuid');
        $builder->join('users', 'users.uuid = invested.uuid');
        $builder->where('invested.type', 'withdrawal');
        $builder->where('invested.status', 'declined');
        $result = $builder->get();
        return $result->getResult();
    }

    #users transaction
    public function getUsersTrans($limit = null){
        $builder = $this->db->table('invested');
        $builder->select('invested.*, users.email');
        $builder->join('users', 'users.uuid = invested.uuid');
        $builder->orderBy('invested_id', 'DESC');
        $builder->limit($limit);
        $result = $builder->get();
        return $result->getResult();
    }
    
}