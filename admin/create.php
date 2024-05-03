<?php
include("theme/header.php");
?>
        <div class="create-form w-100 mx-auto p-3" style="max-width:600px;">
            <form action="process.php" method="post">
                <div class="form-field mb-3">
                    <input type="text" class="form-control" name="title" id="" placeholder="Enter Title: ">
                </div>
                <div class="form-field mb-3">
                    <textarea name="summary" class="form-control" id="" cols="30" rows="9" placeholder="Enter Summary: "></textarea>
                </div>
                <div class="form-field mb-3">
                    <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Enter Content: "></textarea>
                </div>
                <input type="hidden" name="date" value= "<?php echo date('d/m/Y'); ?>">
                <div class="form-field mb-3">
                    <input type="submit" class=" sub btn btn-primary" name="create" value="submit"></input>
                </div>
            </form>
        </div>
        <?php
include("theme/footer.php");
?>
<script>
     document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.querySelector('[name="create"]');
    submitButton.addEventListener('click', function(event) {
        const title = document.querySelector('[name="title"]').value.trim();
        const summary = document.querySelector('[name="summary"]').value.trim();
        const content = document.querySelector('[name="content"]').value.trim();

        if (title === '' || summary === '' || content === '') {
            event.preventDefault(); 
            alert('Please fill in all fields before submitting.');
        } else {
            alert('Blog is created!');
        }
    });
});

</script>