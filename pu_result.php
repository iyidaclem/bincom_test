<?php
$title = "PU Results";
include "./header.php";
$state_id = $state =  isset($_GET['state']) ? $_GET['state'] : "25";
$lga_id = $lga =  isset($_GET['lga']) ? $_GET['lga'] : "0";
$ward_id = $ward =  isset($_GET['ward']) ? $_GET['ward'] : "0";
$pu_id = $pu =  isset($_GET['pu']) ? $_GET['pu'] : "0";
$res = array();
if ($pu)
{
    $res = $pur->getAnnountPuResult($pu_id);
}

?>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            <h1>View Polling Unit results</h1>
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

                    <?php
                    if (count($lgas->getAll($state_id)) > 0 && count($wards->getAll($lga_id)) > 0) {
                    ?>
                        <br> <label for="">Ward: </label> <select name="ward" id="ward" class="alert alert-primary w-50">
                            <?php
                            echo count($wards->getAll($lga_id)) > 0 ? "<option value='.$ward_id.'>" . $wards->getWard($ward_id)['ward_name'] . "</option>" :
                                "<option value=''>Select  ward</option>";
                            foreach ($wards->getAll($lga_id) as $ward) {
                                echo  " <option value=" . $ward['ward_id'] . ">" . $ward['ward_name'] . "</option>";
                            }
                            ?>
                        <?php } ?>
                        </select>


                        <?php
                        if (count($wards->getAll($lga_id)) > 0) {
                        ?>
                            <br> <label for="">PU: </label> <select name="pu" id="pu" class="alert alert-primary w-50">
                                <?php
                                echo count($pus->getAll($ward_id)) > 0 ? "<option value='.$pu_id.'>" . $pus->getPollingUnit($pu_id)['polling_unit_name'] . "</option>" :
                                    "<option value=''>Select  pu</option>";
                                foreach ($pus->getAll($ward_id) as $pu) {
                                    echo  " <option value=" . $pu['polling_unit_id'] . ">" . $pu['polling_unit_name'] . "</option>";
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
                        <th scope="col">Enter By</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        foreach ($res as $r) {
                        ?>
                            <th scope="row"><?php echo $r['result_id'] ?></th>
                            <td><?php echo $r['party_abbreviation'] ?></td>
                            <td><?php echo $r['party_score'] ?></td>
                            <td><?php echo $r['entered_by_user'] ?></td>
                    </tr>
                <?php } 
                
                if(count($res) == 0)
                {
                ?>

                <tr colspan="4" >

                <td>No Result for this polling unit</td>
                </tr>

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