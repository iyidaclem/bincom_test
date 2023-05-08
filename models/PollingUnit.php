<?php
require_once "./models/Connection.php";

class PollingUnit extends Connection
{
   
    public function getPollingUnit($id)
    {
        $sql = "SELECT * FROM polling_unit where polling_unit_id = " . $id;
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return ($result->fetch_assoc());
        } else {
            return array();
        }
    }

    public function getAll($ward_id)
    {
              
        $sql = "SELECT * FROM polling_unit where ward_id = ". $ward_id;
        $result = $this->connect()->query($sql);
        $pu = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc())
            {
                array_push($pu, $row);
            }
        } 
            return $pu;
        

    }
}
