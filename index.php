<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 5px 0;
        z-index: 1;
    }

    .pagination {
        margin-bottom: 60px;
    }
    </style>
</head>
<body>
    <header class="p-2 bg-dark text-center">
        <h1 class="text-light">Blogs Project</h1>
    </header>
    <div class="post-tip mt-5">
        <div class="container">
            <?php
            include("connection.php");
            $results_per_page = 10;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }
            $start_from = ($page - 1) * $results_per_page;
            $sqlfetch = "SELECT * FROM posts LIMIT $start_from, $results_per_page";
            $result = mysqli_query($con, $sqlfetch);
            while($data = mysqli_fetch_array($result)){
                ?>
                <div class="row mb-4 p-4 bg-light">
                    <div class="col-sm-2">
                        <?php echo $data["date"]; ?>
                    </div>
                    <div class="col-sm-3">
                        <h4><?php echo $data["title"]; ?></h4>
                    </div>
                    <div class="col-sm-5">
                    <?php 
                        $content = $data["content"];
                        if (strlen($content) > 100) {
                            $shortened_content = substr($content, 0, 100) . "...";
                        } else {
                            $shortened_content = $content;
                        }
                        echo $shortened_content;
                    ?>
                    </div>
                    <div class="col-sm-2">
                        <a href="view.php?id=<?php echo $data["id"]; ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <?php
            }
            echo "<div class='text-center pagination'>";
            $sql = "SELECT COUNT(id) AS total FROM posts";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $total_pages = ceil($row["total"] / $results_per_page);

            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='index.php?page=$i' class='btn btn-outline-primary'>$i</a> ";
            }
            echo "</div>";
            ?>
        </div>
    </div>
    <div class="footer bg-dark mt-4">
        <a href="admin/index.php" class="text-light text-decoration-none">Admin</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>