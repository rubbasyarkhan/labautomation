<?php
include '../middleware/getAuth.php';

if ($userrole === 'Admin' || $userrole  === 'tester' || $userrole === 'Boss') {
    // Show the page
} else {
    header('Location: ../views/dashboard.php');
    exit();
}
include "./components/header.php";

?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h5 class="mb-4">PRODUCTS</h5>
        <div class="container mt-2">
        <?php if ($userrole === 'Admin' || $userrole === 'Boss') { ?>

            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#productmodal">
                <i class="fas fa-plus"></i> ADD NEW
            </button>
            <?php  } ?>

        </div>
        <br>

        <div class="modal fade" id="productmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">PRODUCTS</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="../controller/addproduct.php">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="productName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">CATEGORY</label>
                                <select name="catid" class="form-control" required>
                                    <?php
                                    include '../controller/getcategory.php';
                                    while ($res = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $res['id'] ?>"><?php echo $res['name'] ?></option>
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
                        <th scope="col">Product Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../controller/getproduct.php';
                    $sno = 0;
                    while ($record = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ++$sno ?></th>
                            <td><?php echo $record["pcode"] ?></td>
                            <td><?php echo $record["name"] ?></td>
                            <td><?php echo $record["catename"] ?></td>
                            <td><?php echo $record["created_at"] ?></td>
                            <td>


                                <!-- edit button -->
                                <?php if ($userrole === 'Admin' || $userrole === 'Boss') { ?>

                                <button class="btn fs-4" data-bs-toggle="modal" data-bs-target="#modaledit" onclick='editmodel(<?php echo json_encode($record); ?>)'><i class="fa-solid fa-pen-to-square"></i></button>
                                <?php  } ?>

                                <!-- testin button -->
                                <?php if ($userrole === 'Admin' || $userrole === 'tester' || $userrole === 'Boss') { ?>

                                    <button onclick="window.location.href=`testacccategory.php?cid=<?php echo $record['cid'] ?>&pid=<?php echo $record['id'] ?>`" class="btn fs-4"><i class="fa-regular fa-clipboard"></i></button>

                                <?php  } ?>
                                <!-- delete button -->

                                <button class="btn fs-6 btn-danger" onclick="deletetodo(<?php echo $record['id']; ?>)"><i class="fa-solid fa-trash"></i></button>
                                <!-- result button -->
                                <?php if ($userrole === 'Admin' || $userrole === 'tester' || $userrole === 'Boss') { ?>

                                    <button onclick="window.location.href=`passproduct.php?pid=<?php echo $record['id'] ?>`" class="btn fs-3"><i class="fa-solid fa-square-poll-vertical"></i></button>

                                <?php  } ?>
                            </td>
                        </tr>
                    <?php
                    };
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../controller/editproduct.php">
                    <input type="hidden" name="id" id="editid">
                    <div class="mb-3">
                        <label for="editname" class="form-label">Name</label>
                        <input type="text" id="editname" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editcatid" class="form-label">Category</label>
                        <select name="catid" id="editcatid" class="form-control" required>
                            <?php
                            include '../controller/getcategory.php';
                            while ($res = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $res['id'] ?>"><?php echo $res['name'] ?></option>
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
<!-- Edit Modal End -->





<script>
    function deletetodo(id) {
        if (confirm("Are you sure you want to delete this product?")) {
            window.location.href = `../controller/deleteproduct.php?id=${id}`;
        }
    }

    function editmodel(record) {
        document.getElementById('editid').value = record.id;
        document.getElementById('editname').value = record.name;
        document.getElementById('editcatid').value = record.catid;
    }
</script>
<?php
include "./components/footer.php";
?>