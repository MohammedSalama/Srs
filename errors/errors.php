<?php if(isset($_SESSION['errors'])) {?>
<div class="alert alert-danger">
    <?php foreach($_SESSION['errors'] as $error) {?>
    <p><?= $error; ?></p>
    <?php } ?>
</div>
<?php } unset($_SESSION['errors']); ?>