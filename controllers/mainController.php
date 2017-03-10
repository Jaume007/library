<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 10/03/17
 * Time: 9:22
 */
class mainController
{
    private $user;
    private $type;
    private $id;

    /**
     * mainController constructor.
     */
    public function __construct()
    {
        $this->user=$_SESSION['user'];
        $this->type=$_SESSION['type'];
        $this->id=$_SESSION['id'];
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
}