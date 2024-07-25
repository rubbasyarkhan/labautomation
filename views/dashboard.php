<?php
include '../middleware/getAuth.php';



include "./components/header.php";

?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <?php
        if ($userrole === 'Admin' || $userrole === 'Boss') { ?>
            <div class="col-sm-6 col-xl-3">
                <a href="Category.php">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-layer-group fa-3x text-primary"></i>
                        <div class="ms-3">
                            <H5 class="mb-2">CATEGORY</H5>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <?php
        if ($userrole === 'Admin' || $userrole === 'Boss') { ?>
            <div class="col-sm-6 col-xl-3">
                <a href="product.php">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 ">
                        <i class="fa-brands fa-product-hunt fa-3x text-primary"></i>
                        <div class="ms-3">
                            <H5 class="mb-2">PRODUCTS</H5>
                            <H6 class="mb-2"> <?php include "../controller/countprod.php"; ?> </H6>
                        </div>

                    </div>
                </a>
            </div>
        <?php } ?>

        <?php
        if ($userrole === 'Admin' || $userrole === 'Boss') { ?>
            <div class="col-sm-6 col-xl-3">
                <a href="user.php">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-users fa-3x text-primary"></i>
                        <div class="ms-3">
                            <H5 class="mb-2">EMPLOYES</H5>
                            <H6 class="mb-2"><?php include "../controller/countuser.php"; ?></H6>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <?php
        if ($userrole === 'Admin' || $userrole === 'Boss' || $userrole === 'tester') { ?>
            <div class="col-sm-6 col-xl-3">
                <a href="test.php">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class=" fa-solid fa-clipboard-list  fa-3x text-primary"></i>
                        <div class="ms-3">
                            <H5 class="mb-2">TESTS</H5>
                            <H6 class="mb-2"><?php include "../controller/countuser.php"; ?></H>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>

    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <?php
        if ($userrole === 'Admin' || $userrole === 'Boss' || $userrole === 'tester') { ?>
            <div class="col-sm-6 col-xl-3">
                <a href="passtest.php">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-circle-check fa-3x text-primary"></i>
                        <div class="ms-3">
                            <H5 class="mb-2">PASSED</H5>
                            <H6 class="mb-2"><?php include "../controller/countpassedprod.php"; ?></H6>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <?php
        if ($userrole === 'Admin' || $userrole === 'Boss' || $userrole === 'tester') { ?>
            <div class="col-sm-6 col-xl-3">
                <a href="failedproducts.php">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-circle-xmark  fa-3x text-primary"></i>
                        <div class="ms-3">
                            <H5 class="mb-2">FAILED</H5>
                            <H6 class="mb-2"><?php include "../controller/countfailed.php"; ?></H6>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <?php
        if ($userrole === 'Admin' || $userrole === 'Boss' || $userrole === 'tester') { ?>
            <div class="col-sm-6 col-xl-3">
                <a href="assignedtest.php">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-clipboard fa-3x text-primary"></i>
                        <div class="ms-3">
                            <H5 class="mb-2">ASSIGNED </H5>
                            <H6 class="mb-2"><?php include "../controller/countassignedtest.php"; ?></H6>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>

        <?php
        if ($userrole === 'Admin' || $userrole === 'Boss' || $userrole === 'tester') { ?>
            <div class="col-sm-6 col-xl-3">
                <a href="#.php">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-clipboard-check fa-3x text-primary"></i>
                        <div class="ms-3">
                            <H5 class="mb-2">PERFORMED</H5>
                            <H6 class="mb-2"><?php include "../controller/counttestdone.php"; ?></H6>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>

    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
include "./components/footer.php"
?>