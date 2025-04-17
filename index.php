<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Books</title>
</head>
<body>
    <div class="container my-5">
        <h2>List of books</h2>
        <a class="btn btn-primary" href="/book_manager/create.php" role="button">New Book</a><br>
        <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published_year</th>
                <th>Genere</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="book_manager";

                //create connection
                $connection=new mysqli($servername,$username,$password,$database);
                // check connection
                if($connection->connect_error)
                {
                    die("connection failed :" .$connection->connect_error);
                }
                $sql="SELECT * FROM books";
                $result=$connection->query($sql);
                if(!$result)
                {
                    die("invaliad query :" .$connection->error);
                }
                while($row=$result->fetch_assoc())
                {
                    echo "
                     <tr>
                    <td>$row[id]</td>
                    <td>$row[title]</td>
                    <td>$row[author]</td>
                    <td>$row[published_year]</td>
                    <td>$row[genre]</td>
                    <td>
                        <a class='btn btn-danger btn-sm' href='/book_manager/delete.php?id=$row[id]'>Delete</a>
                    </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>