<?php
$title = "PU Results";
include "./header.php";
$state_id = $state =  isset($_GET['state']) ? $_GET['state'] : "25";
$lga_id = $lga =  isset($_GET['lga']) ? $_GET['lga'] : "0";
$ward_id = $ward =  isset($_GET['ward']) ? $_GET['ward'] : "0";
$pu_id = $pu =  isset($_GET['pu']) ? $_GET['pu'] : "0";
$res = array();
if ($lga_id) {
    $res = $pur->getLgaSum($lga_id);
}

?>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            <h1>Total Result per LGA</h1>
            <form action="">

                <br> <label for="">State: </label> <select name="state" id="state" class="alert alert-primary w-50">
                    <?php
                    echo $state ? "<option value='.$state.'>" . $states->getState($state)['state_name'] . "</option>" :
                        "<option value=''>Select  State</option>";
                    foreach ($states->getAll() as $state) {
                        echo  " <option value=" . $state['state_id'] . ">" . $state['state_name'] . "</option>";
                    }
                    ?>
                </select>

                <?php
                if ($state_id && count($lgas->getAll($state_id)) > 0) {
                ?>
                    <br> <label for="">LGA: </label> <select name="lga" id="lga" class="alert alert-primary w-50">
                        <?php
                        echo count($lgas->getAll($state_id)) > 0 ? "<option value='.$lga_id.'>" . $lgas->getLGA($lga_id)['lga_name'] . "</option>" :
                            "<option value=''>Select  LGA</option>";
                        foreach ($lgas->getAll($state_id) as $lga) {
                            echo  " <option value=" . $lga['lga_id'] . ">" . $lga['lga_name'] . "</option>";
                        }
                        ?>
                    <?php } ?>
                    </select>



            </form>
            <table class="table">
                <thead>
                    <tr>
                        <td colspan="4" class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Party</th>
                        <th scope="col">Score</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $id = 1;
                        $total = 0;
                        foreach ($res as $r) {
                            $total += $r['score'];
                        ?>
                            <th scope="row"><?php echo $id++ ?></th>
                            <td><?php echo $r['party'] ?></td>
                            <td><?php echo $r['score'] ?></td>
                    </tr>
                <?php }

                        if (count($res) == 0) {
                ?>

                    <tr colspan="4">

                        <td>No Result for this polling unit</td>
                    </tr>

                <?php } else { ?>
                    <td colspan="3"><h1>Total votes: <?php echo $total ?></h1></td>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="./js/pu_result.js"></script>
<?php
include "./footer.php"

?>