<?php
include "./components/header.php";
?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h5 class="mb-4">USERS</h5>
        <div class="container mt-2">
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#usermodal">
                <i class="fas fa-plus"></i> ADD NEW
            </button>
        </div>
        <br>

        <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">USERS</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="userform" action="../controller/adduser.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Phone number</label>
                                <input type="number" max="999999999999" class="form-control" id="contact" name="contact" required>
                                <p id="error-message" style="color: red;"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">CATEGORIE</label>
                                <select name="roleid" class="form-control" required>
                                    <?php
                                    include '../controller/getroles.php';
                                    while ($res = mysqli_fetch_array($resultrole)) {
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../controller/getuser.php';
                    $sno = 0;
                    while ($record = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ++$sno ?></th>
                            <td><?php echo $record["name"] ?></td>
                            <td><?php echo $record["email"] ?></td>
                            <td><?php echo $record["contact"] ?></td>
                            <!-- buttons -->
                            <td>
                                <!-- edit button -->
                                <button class="btn fs-5" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $record['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                <!-- edit modal -->
                                <div class="modal fade" id="modaledit<?php echo $record['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../controller/edituser.php">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                                                        <input type="text" class="form-control" name="name" value="<?php echo $record['name']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="contact" class="form-label">Contact Number</label>
                                                        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                                                        <input type="text" class="form-control" name="contact" value="<?php echo $record['contact']; ?>" required>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- edit modal end -->

                                <!-- delete button -->
                                <button class="btn fs-5 btn btn-danger" onclick="deletetodo(<?php echo $record['id']; ?>)"><i class="fa-solid fa-trash"></i></button>
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

<script>


  

    function deletetodo(id) {
        window.location.href = `../controller/deleteuser.php?id=${id}`;
    }
</script>
<?php
include "./components/footer.php";
?>
