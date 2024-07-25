<?php
include '../middleware/getAuth.php';

if ($userrole === 'Admin' || $userrole === 'Boss') {
    // Show the page
} else {
    header('Location: ../views/dashboard.php');
    exit();
}
include "./components/header.php";
?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h5 class="mb-4">Category Name</h5>
        <div class="container mt-2">
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal1">
                <i class="fas fa-plus"></i> ADD NEW
            </button>
        </div>
        <br>

        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="../controller/category_add.php">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="categoryName" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- table start -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../controller/getcategory.php';
                    $sno = 0;
                    while ($record = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ++$sno ?></th>
                            <td><?php echo $record["name"] ?></td>
                            <!-- buttons -->
                            <td>
                                <!-- edit button -->
                                <button class="btn fs-5" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $record['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                <!-- edit modal -->
                                <div class="modal fade" id="modaledit<?php echo $record['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../controller/updatecategory.php">
                                                    <div class="mb-3">
                                                        <label for="categoryName" class="form-label">Category Name</label>
                                                        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                                                        <input type="text" class="form-control" name="categoryName" value="<?php echo $record['name']; ?>" required>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-primary">Save
                                                        Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- edit modal end -->

                                <!--delete button -->
                                <button class="btn fs-5 btn btn-danger" onclick="deletetodo(<?php echo $record['id']; ?>)"><i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            <!-- buttons -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- table end -->
    </div>
</div>

<script>
    function deletetodo(id) {
        window.location.href = `../controller/delcategory.php?id=${id}`;
    }
</script>

<?php
include "./components/footer.php";
?>