<?php
error_reporting(0);
session_start();
$user = $_SESSION["user"];

// trim function 
function input_field($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!doctype html>
<html lang="en">

<!-- head -->
<?php include("includes/head.php"); ?>

<body class="body">
    <?php
    if (empty($user)) {
        include("includes/navbar.php");
    ?>
        <div class="page_section px-5 m-5">
            <div class="page">
                <?php
                switch ($_GET["p"]) {
                    case "home":
                        include("includes/welcome.php");
                        break;
                    case "login":
                        include("includes/login.php");
                        break;
                    case "feedback":
                        include("includes/login.php");
                        break;
                    default:
                        include("includes/welcome.php");
                }
                ?>
            </div>
        </div>
    <?php
    } else {
    ?>
        <section class="">
            <section class="vertical-nav bg-dark text-light shadow p-0" id="sidebar">
                <div class="text-center py-5 mt-4" id="sidebar">
                    <img src="media/user.png" width="125px" height="125px" class=" my-3 rounded-circle img-thumbnail shadow-sm" alt="">
                    <p class="text-warning lead font-weight-bold text-lowercase"><?php echo $user; ?></p>
                    <div class="my-4">
                        <table class="mx-auto text-left" cellpadding="10">
                            <tr>
                                <td><i class="bi bi-person-circle"></i></td>
                                <td><a class="text-white" href="">Edit Profile</a></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-gear-fill"></i></td>
                                <td><a class="text-white" href="">Settings</a></td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-file-earmark-text-fill"></i></i></td>
                                <td><a class="text-white" href="?p=feedback">Feedback</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="page_content" id="content">
                <!-- navbar -->
                <?php include("includes/navbar.php"); ?>
                <div class="page_section">
                    <div class="page">
                        <?php
                        switch ($_GET["p"]) {
                            case "home":
                                include("includes/welcome.php");
                                break;
                            case "login":
                                include("includes/login.php");
                                break;
                            case "feedback":
                                include("includes/steps/step1.php");
                                break;
                            case "step2":
                                include("includes/steps/step2.php");
                                break;
                            case "step3":
                                include("includes/steps/step3.php");
                                break;
                            case "review":
                                include("includes/steps/review.php");
                                break;
                            default:
                                include("includes/welcome.php");
                        }
                        ?>
                    </div>
                </div>
            </section>
        <?php
    }
        ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->

        <script>
            $(() => {

                $("#sidebarCollapse").on("click", () => {
                    $("#sidebar, #content").toggleClass("active");
                });

                $("#agreeBtn").on('click', function() {
                    $("#agree").prop("checked", true);
                });

                $("#status").change(function() {
                    $("#hidden-status").val($("#status").val());
                });

            });
        </script>

</body>

</html>