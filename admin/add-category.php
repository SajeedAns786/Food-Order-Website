<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br> <br>
        <form action="" method="POST">
            <table class="tbl-50">
                <tr>
                    <td>
                        Title:
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>
                        Featured:
                    </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        Active:
                    </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>

                    <td colspan="2">
                        <input type="sumbit" name="submit" value="Add Category" class="btn-secondary">

                    </td>
                </tr>


            </table>
        </form>
        <?php
        if(isset($_s))
        ?>

    </div>
</div>


<?php
include('partials/footer.php');
?>