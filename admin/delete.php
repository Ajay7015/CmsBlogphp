<?php 
$id = $_GET["id"];
if($id){
    include("../connection.php");
    $sqldel = "DELETE FROM posts where id = $id";
    if(mysqli_query($con, $sqldel)){
        header("Location:index.php");
    }
    else{
        echo "Post not deleted!";
    }
}
else{
    echo "post not found";
    }
?>