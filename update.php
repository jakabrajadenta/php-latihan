<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Employee Management</title>
</head>
<body>
    
    <div class="container"> 
        <div class="row">
            <div class="col-md-12 mt-5">
            <h1 class="text-center">PHP OOP CRUD TUTORIAL - EDIT RECORD</h1>
            <hr style="height: 1px;color: black;background-color: black;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
            <?php

                include 'model.php';
                $model = new Model();
                $id = $_REQUEST['id'];
                $row = $model->readOne($id);

                if (isset($_POST['update'])) {
                    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['address'])) {
                    if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address']) ) {
                        
                        $data['id'] = $id;
                        $data['name'] = $_POST['name'];
                        $data['phone'] = $_POST['phone'];
                        $data['address'] = $_POST['address'];

                        $update = $model->update($data);

                        if($update){
                        echo "<script>alert('employee update successfully');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                        }else{
                        echo "<script>alert('employee update failed');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                        }

                    }else{
                        echo "<script>alert('empty');</script>";
                        header("Location: update.php?id=$id");
                    }
                    }
                }

            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address" id="" cols="" rows="3" class="form-control"><?php echo $row['address']; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>
</html>