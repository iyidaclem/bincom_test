<?php
require_once "./models/Connection.php";

class LGAs extends Connection
{
   
    public function getLGA($id)
    {
        $sql = "SELECT * FROM lga where lga_id = " . $id;
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return ($result->fetch_assoc());
        } else {
            return array();
        }
    }

    public function getAll($state_id)
    {
        $sql = "SELECT * FROM lga where state_id = ". $state_id;
        $result = $this->connect()->query($sql);
        $lga = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc())
            {
                array_push($lga, $row);
            }
        } 

            return $lga;
        

    }
}
