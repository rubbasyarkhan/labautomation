<?php
include '../middleware/getAuth.php';

if ($userrole === 'tester' ||    $userrole === 'Boss') {
    // Show the page
} else {
    header('Location: ../views/dashboard.php');
    exit();
}
include "./components/header.php"; ?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h5 class="mb-4">Test</h5>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Test</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="../controller/addtest.php">

                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="email" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Description</label>
                                <input type="text" class="form-control" id="contact" name="description">
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
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    include '../controller/gettest.php';
                    $sno = 0;
                    while ($record = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ++$sno ?></th>
                            <td><?php echo $record["name"] ?></td>
                            <td><?php echo $record["description"] ?></td>


                            <!-- buttons -->
                            <td>
                                <!-- edit button -->
                                <button class="btn fs-5" data-bs-toggle="modal" data-bs-target="#modaledit" onclick='editmodel(<?php echo json_encode($record); ?>)'><i class="fa-solid fa-pen-to-square"></i></button>

                                <!--delete button -->
                                <button class="btn fs-5 btn btn-danger" onclick="deletetodo(<?php echo $record['id']; ?>)"><i class="fa-solid fa-trash"></i>
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
                <form method="POST" action="../controller/edittest.php">
                    <input type="hidden" name="id" id="editid">
                    <div class="mb-3">
                        <label for="editname" class="form-label">Name</label>
                        <input type="text" id="editname" class="form-control" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="editdescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="editdescription" name="description" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit modal end -->



<script>
    function deletetodo(id) {
        window.location.href = `../controller/deletetest.php?id=${id}`;
    }


    function editmodel(record) {
        const {
            id,
            name,
            description,
        } = record;

        // Set form field values
        document.getElementById('editid').value = id;
        document.getElementById('editname').value = name;
        document.getElementById('editdescription').value = description;
    }
</script>

<?php
include "./components/footer.php"
?>