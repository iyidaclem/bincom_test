<?php
$title = "PU Results";
include "./header.php";
$state_id = $state =  isset($_GET['state']) ? $_GET['state'] : "25";
$lga_id = $lga =  isset($_GET['lga']) ? $_GET['lga'] : "0";
$ward_id = $ward =  isset($_GET['ward']) ? $_GET['ward'] : "0";
$pu_id = $pu =  isset($_GET['pu']) ? $_GET['pu'] : "0";
$res = array();
if ($pu) {
    $res = $party->getAll();
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
                if (true) {
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
                                <?php if($pu) { ?>
            <form action="save_result.php" method="post">
                <h1>Add new  polling unit result</h1>
                <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                              <label for="">Party: </label>  <select name="party_abbreviation" class="w-100 alert alert-primary">
                <?php
                foreach ($res as $r) {
                ?>
                <option value="<?php echo $r['partyid'] ?>"><?php echo $r['partyid'] ?></option>
                <?php
                }

                ?>
                                </select>
               <div class="col-12 text-center">
                <input type="number" name="party_score" class="alert alert-primary w-100" placeholder="Enter Score">
               <input type="hidden" name="puid" value="<?php echo $pu_id ?>">
               <input required type="text" name="entered_by_user" class="w-50 alert alert-primary w-100 " placeholder="Enter your name"> <br>
               <button class="btn btn-primary m-2 w-25 ">
                Save
               </button>
              </div>
               </div>
                        </div>
                    </div>
            </form>

            <?php } ?>
        </div>
    </div>
</div>


<script src="./js/pu_result.js"></script>
<?php
include "./footer.php"

?>