<?php


include '../middleware/getAuth.php';

if ($userrole === 'tester' || $userrole === 'Admin' || $userrole === 'Boss') {
    // Show the page
} else {
    header('Location: ../views/dashboard.php');
    exit();
}
include "./components/header.php";

?>
<link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>
<div class="col-12 ">
    <div class="bg-light rounded h-100 p-4">
        <br>
        <div class="container mt-4">
            <div class="d-flex justify-content-end">
                <form class="d-none d-md-flex ms-4 search-container" method="GET">
                    <input class="form-control border-0" type="search" name="search" placeholder="Search">
                    <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center p-2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>

                </form>
            </div>
        </div>

        <h5 class="mb-4">Testing</h5>
        <h6 class="mb-4">Failed tests . Products are damaged.</h6>



        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Product code</th>
                        <th scope="col">Testing code</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Testing Date</th>
                        <th scope="col">Result</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Tester</th>
                        <th scope="col">Barcode</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../controller/getfailedprod.php';
                    $sno = 0;
                    while ($record = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ++$sno ?></th>
                            <td><?php echo $record["pname"] ?></td>
                            <td><?php echo $record["pcode"] ?></td>
                            <td><?php echo $record["testingid"] == null ? "Not Assigned" : $record["testingid"] ?></td>
                            <td><?php echo $record["tname"] ?></td>
                            <td><?php echo $record["testperformdate"] == null ? "Not Assigned" : $record["testperformdate"]  ?></td>
                            <td><?php echo $record["result"] == null ? "Not Assigned" : $record["result"] ?></td>
                            <td><?php echo $record["remarks"] == null ? "Not Assigned" : $record["remarks"] ?></td>
                            <td><?php echo $record["tester"] == null ? "Not Assigned" : $record["tester"] ?></td>

                          

                               
                            <td>
                                <!-- qr  -->
                                <?php if ($userrole === 'tester' || $userrole === 'Boss') {   ?>
                                    <button class="btn fs-5 " data-bs-toggle="modal" data-bs-target="#qrmodal" onclick='barcode(<?php echo json_encode($record); ?>)'><i class="fa-solid fa-qrcode"></i></button>
                                <?php } ?>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Product testing</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../controller/edittesting.php">
                    <input type="hidden" name="id" id="showid">
                    <div class="mb-3">
                        <label for="showtdate" class="form-label">testing date</label>
                        <input type="date" id="showtdate" class="form-control" name="tdate" required>
                    </div>

                    <div class="mb-3">
                        <label for="showtresult" class="form-label">Result</label>
                        <select name="tresult" id="showtresult" class="form-control" required>

                            <option value="fail">fail</option>
                            <option value="pass">pass</option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="showtremark" class="form-label">Remarks</label>
                        <input type="text" id="showtremark" class="form-control" name="tremark" required>
                    </div>

                    <div class="mb-3">
                        <label for="showtester" class="form-label">Tester</label>
                        <input type="text" id="showtester" class="form-control" name="tester" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="qrmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Product testing</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- <p style="font-family: 'Libre Barcode 39';font-size: 50px">1000010</p> -->
            <P style="font-family: 'Libre Barcode 39';font-size: 50px" class="  d-flex justify-content-center align-items-center" id="barcode"> </P>

            <td>
                <p id="barcodetext" class=" d-flex justify-content-center align-items-center"> </p>
            </td>

        </div>
    </div>
</div>


<script>
    // Get today's date
    var today = new Date();

    // Add one day to the current date to restrict the input to future dates only
    today.setDate(today.getDate() + 1);

    // Format the date to yyyy-mm-dd
    var yyyy = today.getFullYear();
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var dd = String(today.getDate()).padStart(2, '0');
    var minDate = yyyy + '-' + mm + '-' + dd;

    // Set the min attribute of the date input
    document.getElementById('showtdate').setAttribute('min', minDate);


    function editmodel(record) {
        document.getElementById('showid').value = record.id;
        document.getElementById('showdate').value = record.tdate;
        document.getElementById('showtresult').value = record.tresult;
        document.getElementById('showtremark').value = record.tremark;
        document.getElementById('showtester').value = record.tester;
    }


    function barcode(record) {
        document.getElementById('barcode').innerHTML = record.testingid;
        document.getElementById('barcodetext').innerHTML = record.testingid;
    }
</script>


<?php
include "./components/footer.php";
?>