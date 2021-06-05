<?php

namespace App\Models;

use CodeIgniter\Model;
$db = \Config\Database::connect();

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['uuid', 'firstname', 'lastname', 'email', 'country', 'password', 'status', 'document', 'subscription', 'address', 'phone', 'username', 'bonus', 'withdrawal', 'invested', 'wallet_bal'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getOne($array){
        $builder = $this->db->table('users');
        $builder->where($array);
        $result = $builder->get();
        return $result->getRow();
    }

    public function updateUser($user_id, $data){
        $builder = $this->db->table('users');
        $builder->where('uuid', $user_id);
        // $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    }

    #update user by email
    public function updateUserByEmail($email, $data){
        $builder = $this->db->table('users');
        $builder->where('email', $email);
        // var_dump($data); die;
        // $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        // var_dump($result); die;
        return $result->getRow();
    }

    #get users
    public function getUsers(){
        $builder = $this->db->table('users');
        $builder->where('userType', 'user');
        $result = $builder->get();
        return $result->getResult();
    }

    #get verified user
    public function getVerifiedUsers(){
        $builder = $this->db->table('users');
        $builder->where('userType', 'user');
        $builder->where('account_status', 'verified');
        $builder->where('status', 1);
        $result = $builder->get();
        return $result->getResult();
    }

    #get deactivated
    public function deactivated(){
        $builder = $this->db->table('users');
        $builder->where('userType', 'user');
        $builder->where('account_status', 'suspended');
        $builder->where('status', 1);
        $result = $builder->get();
        return $result->getResult();
    }

    #get admin
    public function getAdmin(){
        $builder = $this->db->table('users');
        $builder->where('userType', 'admin');
        $result = $builder->get();
        return $result->getResult();
    }

     #get pending account
     public function getPendingAcct(){
        $builder = $this->db->table('users');
        $builder->where('account_status', 'pending');
        $result = $builder->get();
        return $result->getResult();
    }
    
}