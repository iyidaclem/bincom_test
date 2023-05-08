<?php 
require_once "./models/AgentName.php";
require_once "./models/Connection.php";
require_once "./models/States.php";
require_once "./models/Lga.php";
require_once "./models/Ward.php";
require_once "./models/PollingUnit.php";
require_once "./models/AnnouncedPuResult.php";
require_once "./models/Party.php";


$agent = new AgentName();
$states = new States();
$lgas = new LGAs();
$wards = new Ward();
$pus = new PollingUnit();
$pur = new AnnouncedPuResult();
$party = new Party()
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">2011 Election</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="">Home</a>
        <a class="nav-link" href="pu_result.php">PU Result</a>
        <a class="nav-link" href="lga_sum.php">LGA Summed Total</a>
        <a class="nav-link" href="add_result.php">Add Result</a>
      </div>
    </div>
  </div>
</nav>