<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 14/12/16
 * Time: 10:03
 */
class user
{
    private $id;
    private $user;
    private $password;
    private $name;
    private $surname;
    private $IDcard;
    private $telephone;
    private $email;
    private $photo;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getIDcard()
    {
        return $this->IDcard;
    }

    /**
     * @param mixed $IDcard
     */
    public function setIDcard($IDcard)
    {
        $this->IDcard = $IDcard;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    private $adress;
    private $type;

    public function __construct($id,$user,$password,$name,$surname,$IDcard,$telephone,$email,$adress,$type,$photo=0)
    {
        $this->id=$id;
        $this->user=$user;
        $this->password=$password;
        $this->name=$name;
        $this->surname=$surname;
        $this->IDcard=$IDcard;
        $this->telephone=$telephone;
        $this->email=$email;
        $this->adress=$adress;
        $this->type=$type;
        if($photo==0) $this->photo="img/noprofile.jpg";
        else $this->photo=$photo;
    }


}