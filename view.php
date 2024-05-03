<!DOCTYPE html>
<html lang="en">
<head>
    <style>
.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 5px 0;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<header class=" bg-dark text-center d-flex justify-content-between align-items-center">
    <a href="index.php" class="p-2 text-light order-0 text-decoration-none" style="font-size: 35px;">&#8592;</a>
    <h1 class="text-light mx-auto">Blogs Project</h1>
</header>
<div class="post-tip mt-5">
    <div class="container">
    <?php
    $id = $_GET["id"];
    if($id){
        include("connection.php");
        $sqlfetch = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($con, $sqlfetch);
        while($data = mysqli_fetch_array($result)){
        ?>
            <div class="posts bg-light p-4 mt-5">
                <h1> <?php echo $data["title"]; ?></h1>
                <p style="font-family: 'Roboto', sans-serif;"> <?php echo $data["date"]; ?></p>
                <p> <?php echo $data["content"]; ?></p>

            </div>
        <?php
    }
    
    }else{
        echo "No Blogs Found!";
    }
    ?>
    </div>
    </div>
</div>
<div class="footer bg-dark mt-4">
    <a href="admin/index.php" class="text-light text-decoration-none">Admin</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>