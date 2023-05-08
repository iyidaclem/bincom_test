<?php
require_once "./models/Connection.php";

class AgentName extends Connection
{
    public $name_id;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $pollingunit_uniqueid;


    public function getAgent($id)
    {
        $sql = "SELECT * FROM agentname where name_id = " . $id;
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return ($result->fetch_assoc());
        } else {
            return array();
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM agentname";
        $result = $this->connect()->query($sql);
        $agents = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc())
            {
                array_push($agents, $row);
            }
        } 

            return $agents;
        

    }
}
