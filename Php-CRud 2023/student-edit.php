<?php
session_start();
require 'dbcon.php';
?>
<?php include('includes/header.php') ?>
  <div class="container mt-5">

        <?php include('message.php')?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit
                            <a href="index-php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                            if (isset($_GET['id']))
                            {
                                $students_id = mysqli_real_escape_string($con, $_GET['id']);
                                $query = "SELECT * FROM students WHERE id='$students_id' ";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) >0)
                                {
                                    $students = mysqli_fetch_array($query_run);
                                    ?>

                                    <form action="code.php" method="POST">

                                    <input type="hidden" name="students_id" value="<?=$students['id'] ?>">  
                                    <div class="mb-3">
                                            <label>Student Name</label>
                                            <input type="text" name="name" value="<?=$students['name']?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                            <label>Student Email</label>
                                            <input type="text" name="email" value="<?=$students['email']?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                            <label>Student Phone</label>
                                            <input type="text" name="phone"value="<?=$students['phone']?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                            <label>Student Course</label>
                                            <input type="text" name="course" value="<?=$students['course']?>" class="form-control">
                                    </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                        </div>

                                    </form>

                                <?php
                                }
                                else
                                {
                                    echo "<h4> No Such ID found </h4>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <?php include('includes/footer.php') ?>