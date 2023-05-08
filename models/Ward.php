<?php
require_once "./models/Connection.php";

class Ward extends Connection
{
   
    public function getWard($id)
    {
        $sql = "SELECT * FROM ward where ward_id = " . $id;
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return ($result->fetch_assoc());
        } else {
            return array();
        }
    }

    public function getAll($lga_id)
    {
        $sql = "SELECT * FROM ward where lga_id = ". $lga_id;
        $result = $this->connect()->query($sql);
        $ward = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc())
            {
                array_push($ward, $row);
            }
        } 
            return $ward;
        

    }
}
