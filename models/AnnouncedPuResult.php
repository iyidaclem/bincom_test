<?php
require_once "./models/Connection.php";

class AnnouncedPuResult extends Connection
{

    public function getAnnountPuResult($id)
    {
        $sql = "SELECT * FROM announced_pu_results where polling_unit_uniqueid = " . $id;
        $result = $this->connect()->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($res, $row);
            };
        }
        return $res;
    }

    public function getAll($lga_id)
    {
        $sql = "SELECT * FROM ward where lga_id = " . $lga_id;
        $result = $this->connect()->query($sql);
        $ward = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($ward, $row);
            }
        }
        return $ward;
    }

    public function getLgaSum($lga_id)
    {
        
        $sql = "SELECT announced_pu_results.party_abbreviation as party, 
        sum(announced_pu_results.party_score) as score FROM announced_pu_results 
        inner join polling_unit on polling_unit.uniqueid = 
        announced_pu_results.polling_unit_uniqueid inner join ward on ward.ward_id 
        = polling_unit.ward_id inner join lga on lga.lga_id = ward.lga_id where lga.lga_id 
        = $lga_id GROUP BY announced_pu_results.party_abbreviation";

        $result = $this->connect()->query($sql);
        $lgaSum = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($lgaSum, $row);
            }
        }
        return $lgaSum;
    }

    public function addResult($result){

       
        $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`, `date_entered`, `user_ip_address`) VALUES
        ('{$result["puid"]}', '{$result["party_abbreviation"]}', {$result['party_score']}, '{$result['entered_by_user']}', '{now()}', '{$_SERVER['REMOTE_ADDR']}')";
        if ($this->connect()->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $this->connect()->error;
          }
    }
}