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

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h5 class="mb-4">Assigned Test</h5>
        <div class="container mt-2">
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#productmodal">
                <i class="fas fa-plus"></i> ADD NEW
            </button>
        </div>
        <br>

        <div class="modal fade" id="productmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Assign Tests</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="../controller/addasstest.php">
                            <div class="mb-3">
                                <label class="form-label">tests</label>
                                <select name="tid" class="form-control">
                                    <?php

                                    include '../controller/gettest.php';
                                    while ($res = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $res['id'] ?>"><?php echo $res['name'] ?>
                                        </option>
                                    <?php
                                    };

                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">CATEGORIE</label>
                                <select name="cid" class="form-control">
                                    <?php

                                    include '../controller/getcategory.php';
                                    while ($res = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $res['id'] ?>"><?php echo $res['name'] ?>
                                        </option>
                                    <?php
                                    };

                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Test</th>
                        <th scope="col">Category</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    include '../controller/getasstest.php';
                    $sno = 0;
                    while ($record = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ++$sno ?></th>
                            <td><?php echo $record["testname"] ?></td>
                            <td><?php echo $record["catename"] ?></td>

                            <!-- buttons -->
                            <td>
                                <!-- edit button -->
                                <button class="btn fs-5" data-bs-toggle="modal" data-bs-target="#modaledit" onclick='editmodel(<?php echo json_encode($record); ?>)'><i class="fa-solid fa-pen-to-square"></i></button>


                                <!--delete button -->
                                <button class="btn fs-5 btn btn-danger" onclick="deletetodo(<?php echo $record['tid'] . ',' . $record['cid'] ?>)"><i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            <!-- buttons -->
                        </tr>
                    <?php
                    };

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../controller/">


                    <div class="mb-3">
                        <label class="form-label">tests</label>
                        <select name="tid" id="edittid" class="form-control">
                            <?php

                            include '../controller/gettest.php';
                            while ($res = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $res['id'] ?>"><?php echo $res['name'] ?>
                                </option>
                            <?php
                            };

                            ?>
                        </select>
                    </div>

                    <input type="hidden" name="id" id="editid">
                    <div class="mb-3">
                        <label for="editcatid" class="form-label">Category</label>
                        <select name="cid" id="editcatid" class="form-control">
                            <?php
                            include '../controller/getcategory.php';
                            while ($res = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $res['id'] ?>"><?php echo $res['name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>


                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit modal end -->



<script>
    function deletetodo(tid, cid) {
        window.location.href = `../controller/deleteasstest.php?tid=${tid}&cid=${cid}`;
    }


    function editmodel(record) {
        // Ensure the record object has all necessary properties
        const {
            id,
            cid,
            tid
        } = record;

        // Set form field values

        document.getElementById('edittid').value = tid;
        document.getElementById('editcid').value = cid;
    }
</script>

<?php
include "./components/footer.php"
?>