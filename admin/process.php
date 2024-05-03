<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
  if(isset($_POST["create"])){
    include("../connection.php");
    $title = $_POST["title"];
    $summary = $_POST["summary"];
    $content = $_POST["content"];
    $date = $_POST["date"];

    $sqlinsert = "INSERT INTO posts (date,title, summary, content) VALUES ('$date', '$title', '$summary', '$content')";
    if(mysqli_query($con, $sqlinsert)){
      header("Location:index.php"); ?>
<?php
    }
    else{
        die("Error: " . mysqli_error($con));
  }
}
?>

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
  if(isset($_POST["update"])){
    include("../connection.php");
    $title = $_POST["title"];
    $summary = $_POST["summary"];
    $content = $_POST["content"];
    $date = $_POST["date"];
    $id = $_POST["id"];

    $sqlupdate ="UPDATE posts SET title = '$title', summary = '$summary', content = '$content', date = '$date' where id = $id";
    if(mysqli_query($con, $sqlupdate)){
        header("Location:index.php");
    }
    else{
        die("Error: " . mysqli_error($con));
  }
}
?>