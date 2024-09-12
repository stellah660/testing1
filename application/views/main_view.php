<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
    <h3 <i class="fa fa-align-center" aria-hidden="true"></i>Enter your credentials in the form below</h3>
    <form action="<?php echo base_url(). "main_controller/form_validation"; ?>" method="post">

    <?php if($this->uri->segment(2) == 'Inserted'){
        echo'Data Inserted successfully';
    }
    ?>
    <?php
    if(isset($user_data)){
        foreach($user_data->result() as $row){?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $row->username;?> " class="form-control">
                <span  class="text-danger"><?php echo form_error('username'); ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $row->password;?>" class="form-control">
                <span  class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group">
                <input type="hidden" name="hidden_id" value="<?php echo $row-> id;?>">
                <button type="submit" name="update" value="Update" class="btn btn-primary">Submit</button>
            </div>
    <?php


        }
    }
    else{
    
    ?>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <?php
    }
    ?>
    <div class="table">
        <table class="styled-table">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Password</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>
            <?php
            if(!is_null($fetch_data)&& $fetch_data->num_rows()>0){
            foreach($fetch_data->result() as $row): 
            ?>
            <tr>
                <td><?php echo $row->id;?></td>
                <td><?php echo $row-> username;?></td>
                <td><?php echo $row-> password;?></td>
                <td><a href="<?php echo base_url().'main_controller/update_data/' ;?> <?php echo $row->id; ?> ">Edit</a></td>
                <td><a href="#" class="delete" id="<?php echo $row->id;?>">Delete</a></td>
            </tr>
            <?php 
            endforeach;
        }  
            ?>               
        </table>

    </div>
    <script>
    $(document).ready(function(){
        $(".delete").click(function(){
            var id = $(this).attr("id");

            if(confirm("Are you sure you want to delete this data?")){
                window.location = "<?php echo base_url() ?>main_controller/delete/" + id;                     
            } else {
                return false; 
            }
        }); 
    });
</script>
</body>
</html>