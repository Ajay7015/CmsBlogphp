<?php
include("theme/header.php");
?>
<div class="post w-100 bg-light p-5">
    <?php 
    $id = $_GET["id"];
    if($id){
        include("../connection.php");
        $sqlopen = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($con, $sqlopen);
        while($data = mysqli_fetch_array($result)){
    ?>
        <h1><?php echo $data["title"]; ?></h1>
        <p>Published Date- <?php echo $data["date"]; ?></p>
        <p><?php echo $data["content"]; ?></p>
    <?php
        }
    }
    else{
        echo "No posts to display!";
    }
    ?>
</div>
<?php
include("theme/footer.php");
?>