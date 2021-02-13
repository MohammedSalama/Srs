<?php
session_start();
?>

<?php include("inc/header.php"); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-sm">
            <?php include("errors/errors.php");  ?>
            <form method="POST" action="handlers/handle-index.php">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" <?php if(isset($_SESSION['name'])) { ?>
                        value="<?= $_SESSION['name']?>" <?php } ?>class="form-control">
                </div>


                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" <?php if(isset($_SESSION['email'])) { ?>
                        value="<?= $_SESSION['email']?>" <?php }?> class="form-control">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" <?php if(isset($_SESSION['phone'])) { ?>
                        value="<?= $_SESSION['phone']?>" <?php }?>class="form-control">
                </div>

                <div class="form-group">
                    <label>Faculty</label>
                    <input type="text" name="spec" <?php if(isset($_SESSION['spec'])) { ?>
                        value="<?= $_SESSION['spec']?>" <?php }?>class="form-control">
                </div>
                <div class="form-group">
                    <label>Academic Year</label>
                    <select class="form-control" name="year">
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                        <option value="5">5th</option>
                    </select>
                </div>
                <button type="submit" name="submit" class=" btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm">

        </div>

        <div class="col-sm">

        </div>
    </div>
</div>

<?php include("inc/footer.php"); ?>