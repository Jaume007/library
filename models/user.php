<?php
require_once "models/db.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 9:01
 */
class user extends db
{
    function __construct()
    {
        parent::__construct();
    }
    public function newUser($data){
        $data=$this->escape($data);
        return $this->insert("users",$data);
    }
    public function deleteUser($user){
        $user=$this->escape($user);
        return $this->delete('users',$user);
    }
    public function listUsers($type){
        $sql='select * from users where type<'.$type;
        $data=$this->get_results($sql);
        return $data;
    }
}