<?php
include '../middleware/getAuth.php';

if ($userrole === 'tester' || $userrole === 'Admin' || $userrole === 'Boss') {
    // Show the page
} else {
    header('Location: ../views/dashboard.php');
    exit();
}
include "./components/header.php"; ?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h5 class="mb-4">Testing acc category</h5>

        <br>

        <div>

            <form method="POST" action="../controller/addtestacccategory.php">

                <div class="mb-3">
                    <input type="text" hidden value="<?php echo $_GET["pid"] ?>" class="form-control" name="pid" />
                    <label for="showname" class="form-label">Test</label>
                    <select class="form-control" name="tid" required>

                        <?php
                        include '../controller/gettestacccategory.php';
                        while ($item = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $item["tid"] ?>"><?php echo $item["testname"] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Assigne Test</button>
            </form>
        </div>
        <br>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Product code</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Testing Date</th>
                        <th scope="col">Result</th>
                        <th scope="col">Remarks</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../controller/getassigntest.php';
                    $sno = 0;
                    while ($record = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ++$sno ?></th>
                            <td><?php echo $record["pname"] ?></td>
                            <td><?php echo $record["pcode"] ?></td>
                            <td><?php echo $record["tname"] ?></td>
                            <td><?php echo $record["testperformdate"] == null ? "Not Assigned" : $record["testperformdate"]  ?></td>
                            <td><?php echo $record["result"] == null ? "Not Assigned" : $record["result"] ?></td>
                            <td><?php echo $record["remarks"] == null ? "Not Assigned" : $record["remarks "] ?></td>
                            <td>


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


<?php
include "./components/footer.php";
?>