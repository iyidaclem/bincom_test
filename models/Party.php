<?php
require_once "./models/Connection.php";

class Party extends Connection
{
   
    public function getParty($id)
    {
        $sql = "SELECT * FROM party where partyid = " . $id;
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return ($result->fetch_assoc());
        } else {
            return array();
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM party";
        $result = $this->connect()->query($sql);
        $party = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc())
            {
                array_push($party, $row);
            }
        } 

            return $party;
        

    }
}
