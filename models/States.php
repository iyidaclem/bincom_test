<?php
require_once "./models/Connection.php";

class States extends Connection
{
   
    public function getState($id)
    {
        $sql = "SELECT * FROM states where state_id = " . $id;
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return ($result->fetch_assoc());
        } else {
            return array();
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM states";
        $result = $this->connect()->query($sql);
        $states = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc())
            {
                array_push($states, $row);
            }
        } 

            return $states;
        

    }
}
