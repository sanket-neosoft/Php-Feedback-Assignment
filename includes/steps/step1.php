<?php
if (isset($_POST["sub"])) {

    $statusErr = $nameErr = "";
    $_SESSION["status"] = input_field($_POST["status"]);
    $_SESSION["employee_name"] = $employee_name = input_field($_POST["name"]);

    if (empty($_SESSION["status"])) {
        $statusErr = "Please Select one option.";
    }

    if (empty($_SESSION["employee_name"])) {
        $nameErr = "Please Enter your name";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $_SESSION["employee_name"])) {
        $nameErr = "Only characters and  white spaces \" \" are allowed";
    }

    if ($statusErr === "" && $nameErr === "") {
        header("location: ?p=step2");
    }
}
?>
<div class="container my-5 pt-5">
    <form action="" method="POST" class="form-si p-4 bg-white border rounded shadow">
        <h3 class="text-warning mb-4">Step 1:</h3>
        <div class="form-group">
            <label for="">Are you a current or former employee?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="current" value="Current" <?php
                                                                                                        if ($_SESSION["status"] === "Current") {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?>>
                <label class="form-check-label" for="current">Current</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="former" value="Former" <?php
                                                                                                        if ($_SESSION["status"] === "Former") {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?>>
                <label class="form-check-label" for="former">Former</label>
            </div>
            <small id="employee_status" class="form-text text-danger"><?php echo $statusErr; ?></small>
        </div>
        <div class="form-group">
            <label for="name">Employee's Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php echo $_SESSION["employee_name"]; ?>">
            <small id="employee_status" class="form-text text-danger"><?php echo $nameErr; ?></small>
        </div>
        <div class="row">
            <div class="col-sm mb-2">

            </div>
            <div class="col-sm mb-2">
                <button type="submit" class="btn btn-warning btn-block" name="sub">Next</button>
            </div>
        </div>
    </form>
</div>