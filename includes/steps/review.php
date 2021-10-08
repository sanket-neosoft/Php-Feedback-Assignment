<?php
if (empty($_SESSION["status"]) && empty($_SESSION["employee_name"])) {
    header("location: ?p=feedback");
    exit();
}

if (empty($_SESSION["overall_rating"]) && empty($_SESSION["employee_status"] && $_SESSION["job_title"]) && empty($_SESSION["review_headline"] && $_SESSION["pros"]) && empty($_SESSION["cons"] && $_SESSION["advice_management"])) {
    header("location: ?p=step2");
    exit();
}

if (empty($_SESSION["proof_name"])){
    header("location: ?p=step3");
    exit();
}

if (isset($_POST["sub"])) {
    session_unset();
    $_SESSION["user"] = $user;
    header("location: index.php");
}
if (isset($_POST["chg"])) {
    header("location: ?p=feedback");
}
?>
<div class="container my-5 pt-5 px-5">
    <h3 class="text-warning mb-4">Review Details:</h3>
    <table class="table table-bordered border border-warning table-striped">
        <tbody>
            <tr>
                <th>Are you a current or former employee?</th>
                <td><?php echo $_SESSION["status"]; ?></td>
            </tr>
            <tr>
                <th>Employer's Name</th>
                <td><?php echo $_SESSION["employee_name"]; ?></td>
            </tr>
            <tr>
                <th>Overall Rating </th>
                <td><?php echo $_SESSION["overall_rating"]; ?></td>
            </tr>
            <tr>
                <th>Employment Status</th>
                <td><?php echo $_SESSION["employee_status"]; ?></td>
            </tr>
            <tr>
                <th>Job Title</th>
                <td><?php echo $_SESSION["job_title"]; ?></td>
            </tr>
            <tr>
                <th>Reviprosew Headline</th>
                <td><?php echo $_SESSION["review_headline"]; ?></td>
            </tr>
            <tr>
                <th>Pros</th>
                <td><?php echo $_SESSION["pros"]; ?></td>
            </tr>
            <tr>
                <th>Cons</th>
                <td><?php echo $_SESSION["cons"]; ?></td>
            </tr>
            <tr>
                <th>Advice Management</th>
                <td><?php echo $_SESSION["advice_management"]; ?></td>
            </tr>
            <tr>
                <th>Submit Proof</th>
                <td><?php echo $_SESSION["proof_name"]; ?> <a href="<?php echo "uploads/".$_SESSION["file_path"];?>" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a></td>
            </tr>
        </tbody>
    </table>
    <form action="" method="POST">
        <div class="row my-5">
            <div class="col-sm mb-2">
                <button class="btn btn-dark btn-block " type="submit" name="chg">Change Data</button>
            </div>
            <div class="col-sm mb-2">
                <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#exampleModal" type="button" name="">Submit</button>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please review all the details before submitting.</p>
                    <p>Once submitted the it cannot be updated.</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="POST">
                        <button type="sumbit" name="sub" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>