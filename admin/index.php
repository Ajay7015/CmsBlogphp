<?php
include("theme/header.php");
$results_per_page = 10;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $results_per_page;

?>
<div class="post-list w-100 p-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:15%;">Publish Date</th>
                <th style="width:15%;">Title</th>
                <th style="width:45%;">Summary</th>
                <th style="width:25%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../connection.php");
            $sqlview = "SELECT * FROM posts LIMIT $start_from, $results_per_page";
            $result = mysqli_query($con, $sqlview);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $data["date"]; ?></td>
                    <td><?php echo $data["title"]; ?></td>
                    <td><?php
                        $content = $data["content"];
                        if (strlen($content) > 100) {
                            $shortened_content = substr($content, 0, 100) . "...";
                        } else {
                            $shortened_content = $content;
                        }
                        echo $shortened_content; ?></td>
                    <td>
                        <a class="btn btn-info" href="view.php?id=<?php echo $data["id"]; ?>">View</a>
                        <a class="btn btn-secondary" href="edit.php?id=<?php echo $data["id"]; ?>">Edit</a>
                        <a class="del btn btn-danger" href="delete.php?id=<?php echo $data["id"]; ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    $sql = "SELECT COUNT(id) AS total FROM posts";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $total_pages = ceil($row["total"] / $results_per_page);

    echo "<div class='text-center pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='index.php?page=$i' class='btn btn-outline-primary'>$i</a> ";
    }
    echo "</div>";
    ?>
</div>
<?php
include("theme/footer.php");
?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var deleteButtons = document.getElementsByClassName("del");
        for (var i = 0; i < deleteButtons.length; i++) {
            deleteButtons[i].addEventListener("click", function (event) {
                var confirmed = confirm("Are you sure?");
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        }
    });
</script>