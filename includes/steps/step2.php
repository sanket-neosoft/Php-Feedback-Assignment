<?php

if (empty($_SESSION["status"]) && empty($_SESSION["employee_name"])) {
    header("location: ?p=feedback");
    exit();
}
if (isset($_POST["pre"])) {
    header("location: ?p=feedback");
    exit();
}

if (isset($_POST["sub"])) {
    $overall_ratingErr = $employee_statusErr = $job_titleErr = $review_headlineErr = $prosErr = $consErr = $advice_managementErr = "";

    $_SESSION["overall_rating"] = input_field($_POST["overall_rating"]);
    $_SESSION["employee_status"] = input_field($_POST["employee_status"]);
    $_SESSION["job_title"] = input_field($_POST["job_title"]);
    $_SESSION["review_headline"] = input_field($_POST["review_headline"]);
    $_SESSION["pros"] = input_field($_POST["pros"]);
    $_SESSION["cons"] = input_field($_POST["cons"]);
    $_SESSION["advice_management"] = input_field($_POST["advice_management"]);

    if (empty($_SESSION["overall_rating"])) {
        $overall_ratingErr = "Please give rating.";
    }

    if (empty($_SESSION["employee_status"])) {
        $employee_statusErr = "Please select one option.";
    }

    if (empty($_SESSION["job_title"])) {
        $job_titleErr = "Please enter Job Title.";
    }

    if (empty($_SESSION["review_headline"])) {
        $review_headlineErr = "Please enter Headline.";
    }

    if (empty($_SESSION["pros"])) {
        $prosErr = "Please enter Pros.";
    } else if (strlen($_SESSION["pros"]) < 15 || strlen($_SESSION["pros"]) > 200) {
        $prosErr = "Length must be between 15 to 200 characters.";
    }

    if (empty($_SESSION["cons"])) {
        $consErr = "Please enter Cons.";
    } else if (strlen($_SESSION["cons"]) < 15 || strlen($_SESSION["cons"]) > 200) {
        $consErr = "Length must be between 15 to 200 characters.";
    }

    if (empty($_SESSION["advice_management"])) {
        $advice_managementErr = "Please give Advice Management.";
    } else if (strlen($_SESSION["advice_management"]) < 15 || strlen($_SESSION["advice_management"]) > 200) {
        $advice_managementErr = "Length must be between 15 to 200 characters.";
    }

    if ($overall_ratingErr === "" && $employee_statusErr === "" && $job_titleErr === "" && $review_headlineErr === "" && $prosErr === "" && $consErr === "" && $advice_managementErr === "") {
        header("location: ?p=step3");
    }
}
?>
<div class="container my-5 pt-5">
    <form action="" method="POST" class="form-si p-4 bg-white border rounded shadow">
        <h3 class="text-warning mb-4">Step 2:</h3>
        <div class="form-group">
            <label for="overall_rating">Overall Rating: </label>
            <input type="hidden" class="form-control" id="overall_rating" name="overall_rating" value="<?php echo $_SESSION["overall_rating"]; ?>">
            <p id="rateMe">
                <i class="fas fa-star py-2 px-1 rate-popover text-muted"></i>
                <i class="fas fa-star py-2 px-1 rate-popover text-muted"></i>
                <i class="fas fa-star py-2 px-1 rate-popover text-muted"></i>
                <i class="fas fa-star py-2 px-1 rate-popover text-muted"></i>
                <i class="fas fa-star py-2 px-1 rate-popover text-muted"></i>
            </p>

            <small id="employee_status" class="form-text text-danger"><?php echo $overall_ratingErr; ?></small>
        </div>
        <div class="form-group">
            <label for="status">Employee Status</label>
            <select class="form-control" id="status">
                <option value="" 
                <?php 
                if (empty($_SESSION["employee_status"])) {
                    echo "selected";
                } 
                ?>
                disabled>Select one option</option>
                <option value="Full Time"
                <?php 
                if ($_SESSION["employee_status"] === "Full Time") {
                    echo "selected";
                } 
                ?>
                >Full Time</option>
                <option value="Part Time"
                <?php 
                if ($_SESSION["employee_status"] === "Part Time") {
                    echo "selected";
                } 
                ?>
                >Part Time</option>
                <option value="Contract"
                <?php 
                if ($_SESSION["employee_status"] === "Contract") {
                    echo "selected";
                } 
                ?>
                >Contract</option>
                <option value="Intern"
                <?php 
                if ($_SESSION["employee_status"] === "Intern") {
                    echo "selected";
                } 
                ?>
                >Intern</option>
            </select>
            <input type="hidden" value="<?php echo $_SESSION["employee_status"]; ?>" id="hidden-status" name="employee_status">
            <small id="employee_status" class="form-text text-danger"><?php echo $employee_statusErr; ?></small>
        </div>
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Enter Job Title" value="<?php echo $_SESSION["job_title"]; ?>">
            <small id="employee_status" class="form-text text-danger"><?php echo $job_titleErr; ?></small>
        </div>
        <div class="form-group">
            <label for="review_headline">Review Headline</label>
            <input type="text" class="form-control" id="review_headline" name="review_headline" placeholder="Enter Headline" value="<?php echo $_SESSION["review_headline"]; ?>">
            <small id="employee_status" class="form-text text-danger"><?php echo $review_headlineErr; ?></small>
        </div>
        <div class="form-group">
            <label for="pros">Pros</label>
            <textarea class="form-control" id="pros" placeholder="Enter Pros" name="pros" rows="3"><?php echo $_SESSION["cons"]; ?></textarea>
            <small id="employee_status" class="form-text text-danger"><?php echo $prosErr; ?></small>
        </div>
        <div class="form-group">
            <label for="cons">Cons</label>
            <textarea class="form-control" id="cons" placeholder="Enter Cons" name="cons" rows="3"><?php echo $_SESSION["cons"]; ?></textarea>
            <small id="employee_status" class="form-text text-danger"><?php echo $consErr; ?></small>
        </div>
        <div class="form-group">
            <label for="advice_management">Advice Management</label>
            <textarea class="form-control" id="advice_management" name="advice_management" placeholder="Enter Advice Management" rows="3"><?php echo $_SESSION["advice_management"]; ?></textarea>
            <small id="employee_status" class="form-text text-danger"><?php echo $advice_managementErr; ?></small>
        </div>
        <div class="row">
            <div class="col-sm mb-2">
                <button type="submit" class="btn btn-dark btn-block" name="pre">Previous</button>
            </div>
            <div class="col-sm mb-2">
                <button type="submit" class="btn btn-warning btn-block" name="sub">Next</button>
            </div>
        </div>
    </form>
</div>

<script>
    const stars = document.querySelectorAll(".fas");
    const ratings = document.getElementById("overall_rating");
    const select = document.getElementById("status");
    const selectValue = select.options[select.selectedIndex].value;


    for (let i = 0; i < stars.length; i++) {
        stars[i].starValue = i + 1;
        stars[i].addEventListener("click", showrating);
    }

    function showrating(e) {
        let type = e.type;
        let starValue = this.starValue;

        stars.forEach(function(e, i) {
            if (type === "click") {
                if (i < starValue) {
                    e.classList.add("yellow");
                    e.classList.remove("text-muted");
                } else {
                    e.classList.remove("yellow");
                    e.classList.add("text-muted");
                }
                ratings.value = starValue;
            }
        });
    }

    if (ratings.value != 0) {
        stars.forEach(function(e, i) {
            if (i < ratings.value) {
                e.classList.add("yellow");
                e.classList.remove("text-muted")
            }
        });
    }
</script>