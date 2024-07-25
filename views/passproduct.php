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

        <h5 class="mb-4">Passed product</h5>
        <h6 class="mb-4">Approved towards CPRI for further testing process</h6>



        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Product code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../controller/getpassprod.php';
                    $sno = 0;
                    while ($record = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ++$sno ?></th>
                            <td><?php echo $record["name"] ?></td>
                            <td><?php echo $record["pcode"] ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
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


    


    function barcode(record) {
        document.getElementById('barcode').innerHTML = record.testingid;
        document.getElementById('barcodetext').innerHTML = record.testingid;
    }
</script>


<?php
include "./components/footer.php";
?>