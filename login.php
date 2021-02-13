<?php

session_start();
?>
<?php include("inc/header.php");?>

<div class="container my-5">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <?php include("errors/errors.php");  ?>
                <form action="handlers/handle-login.php" method="POST">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class=" form-control">
                    </div>
                    <button type="submit" name="submit" class=" btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php"); ?>