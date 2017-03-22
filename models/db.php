<?php

class db
{
    private $conn = null;
    public $filter;

    private $servername = "pytxy.ddns.net";
    private $username = "jaume";
    private $pwd = "fb5FHeZj7r9j";
    private $dbname = "jaume";


    public function __construct()
    {
        mb_internal_encoding('UTF-8');
        mb_regex_encoding('UTF-8');
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->pwd, $this->dbname);
            $this->conn->set_charset("utf8");
        } catch (Exception $e) {
            die('Unable to connect to database');
        }
    }

    public function __destruct()
    {
        if ($this->conn) {
            $this->disconnect();
        }
    }


    public function escape($data)
    {
        if (!is_array($data)) {
            $data = $this->conn->real_escape_string($data);
        } else {
            //Self call function to sanitize array data
            $data = array_map(array($this, 'escape'), $data);
        }
        return $data;
    }


    public function clean($data)
    {
        if (!is_array($data)) {
            $data = stripslashes($data);
            $data = html_entity_decode($data, ENT_QUOTES, 'UTF-8');
            $data = nl2br($data);
            $data = urldecode($data);

        } else {
            $data = array_map(array($this, 'clean'), $data);
        }

        return $data;
    }


    public function query($query)
    {
        $full_query = $this->conn->query($query);
        if ($this->conn->error) {

            return false;
        } else {
            return true;
        }
    }


    public function get_results($query)
    {

        $row = null;
        $results = $this->conn->query($query);
        if ($this->conn->error) {
            echo $this->conn->error;
            return false;
        } else {
            $row = array();
            while ($r = $results->fetch_assoc()) {
                $row[] = $r;
            }
            return $row;
        }
    }


    public function insert($table, $variables = array())
    {


        if (empty($variables)) {
            return false;
        }

        $sql = "INSERT INTO " . $table;
        $fields = array();
        $values = array();
        foreach ($variables as $field => $value) {
            $fields[] = $field;
            $values[] = "'" . $value . "'";
        }
        $fields = ' (' . implode(', ', $fields) . ')';
        $values = '(' . implode(', ', $values) . ')';

        $sql .= $fields . ' VALUES ' . $values;
        $query = $this->conn->query($sql);

        if ($this->conn->error) {
            echo $this->conn->error;
            return false;
        } else {
            return true;
        }
    }


    public function update($table, $variables = array(), $where = array())
    {


        if (empty($variables)) {
            return false;
        }
        $sql = "UPDATE " . $table . " SET ";
        foreach ($variables as $field => $value) {

            $updates[] = "`$field` = '$value'";
        }
        $sql .= implode(', ', $updates);

        //Add the $where clauses as needed
        if (!empty($where)) {
            foreach ($where as $field => $value) {
                $value = $value;
                $clause[] = "$field = '$value'";
            }
            $sql .= ' WHERE ' . implode(' AND ', $clause);
        }


        $query = $this->conn->query($sql);
        if ($this->conn->error) {
            return $this->conn->error;
        } else {
            return true;
        }
    }


    public function delete($table, $where = array())
    {

        //Delete clauses require a where param, otherwise use "truncate"
        if (empty($where)) {
            return false;
        }

        $sql = "DELETE FROM " . $table;
        foreach ($where as $field => $value) {
            $value = $value;
            $clause[] = "$field = '$value'";
        }
        $sql .= " WHERE " . implode(' AND ', $clause);


        $query = $this->conn->query($sql);
        if ($this->conn->error) {
            //return false; //
            return false;
        } else {
            return true;
        }
    }


    public function disconnect()
    {
        $this->conn->close();
    }


}