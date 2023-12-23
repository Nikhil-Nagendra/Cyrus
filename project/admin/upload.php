<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="alert alert-secondary" role="alert">
        <h4 class="text-center">UPLOAD DOCUMENTS</h4>
    </div>
    <div class="container col-12 m-5">
        <div class="col-6 m-auto">

            <?php
            if (isset($_POST['btn_img'])) {
                $con = mysqli_connect("localhost", "root", "", "course_db");

                $filename = $_FILES["choosefile"]["name"];
                $tempfile = $_FILES["choosefile"]["tmp_name"];
                $folder = "notes/" . $filename;
                $sql = "INSERT INTO `images`(`image`)VALUES('$filename')";
                if ($filename == "") {
                    echo
                    "
            <div class='alert alert-danger' role='alert'>
                <h4 class='text-center'>Blank not Allowed</h4>
            </div>
            ";
                } else {
                    $result = mysqli_query($con, $sql);
                    move_uploaded_file($tempfile, $folder);
                    echo
                    "
            <div class='alert alert-success' role='alert'>
                <h4 class='text-center'>Image uploaded</h4>
            </div>
            ";
                }
            }


            ?>
            <form action="upload.php" method="post" class="form-control" enctype="multipart/form-data">
                <input type="file" class="form-control" name="choosefile" id="">
                <div class="col-6 m-auto ">
                    <button type="submit" name="btn_img" class="btn btn-outline-success m-4">
                        Submit
                    </button>

                    <div class="container ml-2">
                        <!-- Button to go back to the dashboard -->
                        <a href="http://localhost/project/admin/dashboard.php" class="btn btn-primary">Back</a>
                    </div>

                </div>
            </form>



        </div>
    </div>
</body>

</html>