<?php
$servername="localhost";
$username="root";
$password="";
$database="book_manager";

//create connection
$connection=new mysqli($servername,$username,$password,$database);



$title="";
$author="";
$published_year="";
$genre="";

$successMessage="";
$errorMessage="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $title=$_POST["title"];
    $author=$_POST["author"];
    $published_year=$_POST["published_year"];
    $genre=$_POST["genre"];

    do{
        if(empty($title)||empty($author)||empty($published_year)||empty($genre))
        {
            $errorMessage="All the fields are required";
            break;
        }

        //add new book
        $sql="INSERT INTO books(title,author,published_year,genre)"."
        VALUES ('$title','$author','$published_year','$genre')";
        $result=$connection->query($sql);
        if(!$result)
        {
            $errorMessage="Invalid Query".$connection->error;
            break; 
        }

        $title="";
        $author="";
        $published_year="";
        $genre="";

        $successMessage="Book added Succefuly";
        header("location:/book_manager/index.php");
        exit;
    }
    while(false);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Books</title>
</head>
<body>
    <div class="container my-5">
        <h2>New Book</h2>
        <?php
        if(!empty($errorMessage))
        {
            echo"
            <div class='alert alert-warning alert-dismissible fade show ' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='close'></button>
            </div>
            ";

        }
        ?>


        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-lable">Title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title" value="<?php echo$title;?>">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-lable">Author</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="author" value="<?php echo$author;?>">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-lable">Published_year</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="published_year" value="<?php echo$published_year;?>">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-lable">Genere</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="genre" value="<?php echo$genre;?>">
            </div>
            </div>

            <?php
            if(!empty($successMessage))
            {
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-3'>
                        <div class='alert alert-success alert-dismissible fade show ' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='close'></button>
                        </div>
                    </div>
                </div>
                ";
    
            }
            ?>
            <div class="row mb-3 ">
                <div class="offset-mb-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                <div class="col-sm-3">
                    <a href="/book-manager/index.php" class="btn btn-outline-primary" role="button" >Cancel</a>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>