<?php 

class Connection{
private $servername = "localhost";
private $username = "root";
private $password = "";
private $db = "bincomphptest";

public function connect()
{
    // Create connection
$conn = new mysqli($this->servername, $this->username, $this->password, $this->db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
return $conn;
}

}
