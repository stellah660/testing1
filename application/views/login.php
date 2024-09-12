<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $title; ?></h1>
    <form action="<?php echo base_url(). "main_controller/login_validation"; ?>" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
            <span  class="text-danger"><?php echo form_error('username'); ?></span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span  class="text-danger"><?php echo form_error('password'); ?></span>
        </div>
        <div class="form-group">
            <button type="submit" name='Insert' value='Login' class="btn btn-primary">Login</button>
        </div>
    </form>
    <?php
    $this->session->flashdata('error');
    ?>
</body>
</html>