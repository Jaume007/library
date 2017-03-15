<?php

class db
{
    private $conn = null;
    public $filter;

    private $servername = "localhost";
    private $username = "root";
    private $pwd = "784512";
    private $dbname = "Library";


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

    /**
     * Extra function to filter when only mysqli_real_escape_string is needed

     */
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


    /**
     * Normalize sanitized data for display (reverse $database->filter cleaning)

     */
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


    /**
     * Determine if common non-encapsulated fields are being used
     *
     * Example usage:
     * if( $database->db_common( $query ) )
     * {
     *      //Do something
     * }
     * Used by function exists
     *
     */
    public function db_common($value = '')
    {
        if (is_array($value)) {
            foreach ($value as $v) {
                if (preg_match('/AES_DECRYPT/i', $v) || preg_match('/AES_ENCRYPT/i', $v) || preg_match('/now()/i', $v)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            if (preg_match('/AES_DECRYPT/i', $value) || preg_match('/AES_ENCRYPT/i', $value) || preg_match('/now()/i', $value)) {
                return true;
            }
        }
    }


    /**
     * Perform queries
     * All following functions run through this function
     *
     *
     */
    public function query($query)
    {
        $full_query = $this->conn->query($query);
        if ($this->conn->error) {

            return false;
        } else {
            return true;
        }
    }




    /**
     * Run check to see if value exists, returns true or false
     *
     * Example Usage:
     * $check_user = array(
     *    'user_email' => 'someuser@gmail.com',
     *    'user_id' => 48
     * );
     * $exists = $database->exists( 'your_table', 'user_id', $check_user );
     *
     */
    public function exists($table = '', $check_val = '', $params = array())
    {
        self::$counter++;
        if (empty($table) || empty($check_val) || empty($params)) {
            return false;
        }
        $check = array();
        foreach ($params as $field => $value) {
            if (!empty($field) && !empty($value)) {
                //Check for frequently used mysql commands and prevent encapsulation of them
                if ($this->db_common($value)) {
                    $check[] = "$field = $value";
                } else {
                    $check[] = "$field = '$value'";
                }
            }
        }
        $check = implode(' AND ', $check);
        $rs_check = "SELECT $check_val FROM " . $table . " WHERE $check";
        $number = $this->num_rows($rs_check);
        if ($number === 0) {
            return false;
        } else {
            return true;
        }
    }


    /**
     * Return specific row based on db query
     *
     * Example usage:
     * list( $name, $email ) = $database->get_row( "SELECT name, email FROM users WHERE user_id = 44" );
     *
     */
    public function get_row($query)
    {

        $row = $this->conn->query($query);
        if ($this->conn->error) {

            return false;
        } else {
            $r =  $row->fetch_row() ;
            return $r;
        }
    }


    /**
     * Perform query to retrieve array of associated results
     *
     * Example usage:
     * $users = $database->get_results( "SELECT name, email FROM users ORDER BY name ASC" );
     * foreach( $users as $user )
     * {
     *      echo $user['name'] . ': '. $user['email'] .'<br />';
     * }
     *

     *
     */
    public function get_results($query)
    {

        $row = null;
        $results = $this->conn->query($query);
        if ($this->conn->error) {
            echo $this->conn->error;
            return false;
        } else {
            $row = array();
            while ($r =  $results->fetch_assoc()) {
                $row[] = $r;
            }
            return $row;
        }
    }


    /**
     * Insert data into database table
     *
     * Example usage:
     * $user_data = array(
     *      'name' => 'Bennett',
     *      'email' => 'email@address.com',
     *      'active' => 1
     * );
     * $database->insert( 'users_table', $user_data );
     *
     *
     */
    public function insert($table, $variables = array())
    {

        //Make sure the array isn't empty
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
        //echo $sql;
        $query = $this->conn->query($sql);

        if ($this->conn->error) {
            echo $this->conn->error;
            return false;
        } else {
            return true;
        }
    }






    /**
     * Insert multiple records in a single query into a database table
     *
     * Example usage:
     * $fields = array(
     *      'name',
     *      'email',
     *      'active'
     *  );
     *  $records = array(
     *     array(
     *          'Bennett', 'bennett@email.com', 1
     *      ),
     *      array(
     *          'Lori', 'lori@email.com', 0
     *      ),
     *      array(
     *          'Nick', 'nick@nick.com', 1, 'This will not be added'
     *      ),
     *      array(
     *          'Meghan', 'meghan@email.com', 1
     *      )
     * );
     *  $database->insert_multi( 'users_table', $fields, $records );
     *
     */
//    public function insert_multi($table, $columns = array(), $records = array())
//    {
//
//        //Make sure the arrays aren't empty
//        if (empty($columns) || empty($records)) {
//            return false;
//        }
//        //Count the number of fields to ensure insertion statements do not exceed the same num
//        $number_columns = count($columns);
//        //Start a counter for the rows
//        $added = 0;
//        //Start the query
//        $sql = "INSERT INTO " . $table;
//        $fields = array();
//        //Loop through the columns for insertion preparation
//        foreach ($columns as $field) {
//            $fields[] = '`' . $field . '`';
//        }
//        $fields = ' (' . implode(', ', $fields) . ')';
//        //Loop through the records to insert
//        $values = array();
//        foreach ($records as $record) {
//            //Only add a record if the values match the number of columns
//            if (count($record) == $number_columns) {
//                $values[] = '(\'' . implode('\', \'', array_values($record)) . '\')';
//                $added++;
//            }
//        }
//        $values = implode(', ', $values);
//        $sql .= $fields . ' VALUES ' . $values;
//        $query = $this->conn->query($sql);
//        if ($this->conn->error) {
//            $this->log_db_errors($this->conn->error, $sql);
//            return false;
//        } else {
//            return $added;
//        }
//    }


    /**
     * Update data in database table
     *
     * Example usage:
     * $update = array( 'name' => 'Not bennett', 'email' => 'someotheremail@email.com' );
     * $update_where = array( 'user_id' => 44, 'name' => 'Bennett' );
     * $database->update( 'users_table', $update, $update_where, 1 );
     *
     */
    public function update($table, $variables = array(), $where = array())
    {

        //Make sure the required data is passed before continuing
        //This does not include the $where variable as (though infrequently)
        //queries are designated to update entire tables
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
            return false;
        } else {
            return true;
        }
    }


    /**
     * Delete data from table
     *
     * Example usage:
     * $where = array( 'user_id' => 44, 'email' => 'someotheremail@email.com' );
     * $database->delete( 'users_table', $where, 1 );
     *
     */
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


    /**
     * Return the number of rows affected by a given query
     *
     * Example usage:
     * $database->insert( 'users_table', $user );
     * $database->affected()
     */
    public function affected()
    {
        return $this->conn->affected_rows;
    }


    /**
     * Disconnect from db server
     * Called automatically from __destruct function
     */
    public function disconnect()
    {
        $this->conn->close();
    }


}