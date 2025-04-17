<?php
if(isset($_GET["id"]))
{
    $id=$_GET["id"];


    $servername="localhost";
    $username="root";
    $password="";
    $database="book_manager";

    $connection=new mysqli($servername,$username,$password,$database);
    $sql="DELETE FROM books WHERE id=$id";
    $connection->query($sql);
}
header("location:/book_manager/index.php");
exit;
?>