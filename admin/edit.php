<?php
include("theme/header.php");
include("../connection.php");
$id = $_GET["id"];
$sqledit = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($con, $sqledit);
?>
        <div class="create-form w-100 mx-auto p-3" style="max-width:600px;">
            <form action="process.php" method="post">
            <?php
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <div class="form-field mb-3">
                <input type="text" class="form-control" name="title" id="" placeholder="Enter Title: " value="<?php echo $data["title"]; ?>">
                </div>
                    <div class="form-field mb-3">
                        <textarea name="summary" class="form-control" id="" cols="30" rows="9" placeholder="Enter Summary:"><?php echo $data["summary"]; ?></textarea>
                    </div>
                    <div class="form-field mb-3">
                        <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Enter Content:"><?php echo $data["content"]; ?></textarea>
                    </div>
                    <input type="hidden" name="date" value="<?php echo date('d/m/Y'); ?>">
                    <div class="form-field mb-3">
                        <input type="submit" class="btn btn-primary" name="update" value="update"></input>
                    </div>
                    <input type="hidden" name="id" value = "<?php echo $id; ?>">
                <?php
                }
                ?>
            </form>
        </div>
        <?php
include("theme/footer.php");
?>
<script>
      document.addEventListener('DOMContentLoaded', function() {
            const submitButton = document.querySelector('[name="update"]');
            submitButton.addEventListener('click', function() {
                alert('Blog is updated!');
            });
      });
</script>