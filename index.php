<?php

$title = "Election Result";
require "./header.php"
?>

<div class="container-fluid mt-5">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <h1>2011 Election Results</h1>
            <hr>
            <a href="pu_result.php">
                <button class="btn btn-primary">View PU Result</button>
            </a>
            <hr>
            <a href="lga_sum.php">
                <button class="btn btn-primary">LGA Results</button>
            </a>
            <hr>
            <a href="pu_result.php">
                <button class="btn btn-primary">Add Result</button>
                <hr>
            </a>
        </div>
    </div>
</div>


<?php
require "./footer.php"
?>