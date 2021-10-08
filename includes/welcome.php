<?php
if (!empty($user)) {
?>
    <section class="container form-si pt-5 mt-5 mx-auto">
        <aside class="row">
            <div class="col col-sm col-md my-auto text-center border rounded shadow ">
                <div class="my-5 text-center">
                    <img src="https://uilogos.co/img/logotype/hexa.png" class="logo wel-logo img-fluid" alt="">
                    <p class='lead'>Your are logged in as: <b><?php echo $user; ?></b></p>
                    <p class="lead mb-4">Click here on below button for giving feedback</p>
                    <a href="?p=feedback" class="btn btn-warning btn-lg">Feedback</a>
                </div>
            </div>
        </aside>
    </section>
<?php
} else {
?>
    <section class="container content">
        <aside class="row">
            <div class="col col-sm col-md my-auto text-center border rounded shadow ">
                <div class="my-5 text-center">
                    <p class="lead mb-4">Click here on below button for giving feedback</p>
                    <a href="?p=feedback" class="btn btn-warning btn-lg">Feedback</a>
                </div>
            </div>

            <div class="col col-sm col-md my-auto text-center">
                <img src="https://uilogos.co/img/logotype/hexa.png" class="logo wel-logo img-fluid" alt="">
                <h5 class="font-weight-light font-italic mx-5 mb-3 fb">We would love to hear your thoughts, suggestions, concerns or problems with anything so we can improve!</h5>
                <p class="my-5 text-muted text-center font-italic">&copy; 2017-<?php echo date("Y"); ?></p>
            </div>

        </aside>
    </section>
<?php
}
?>