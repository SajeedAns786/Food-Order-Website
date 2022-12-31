<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage category</h1>
        <br />
        <br />
        <?php
        if (isset($_SESSION['add'])) { //Cheacking whether the session is set of not 
        
            echo $_SESSION['add']; //displaying session msg 
            unset($_SESSION['add']); // Removing session message
        }
        ?>
        <br />
        <br />

        <!-- Button to add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

        <br />
        <br />
        <br />

        <table class="tbl-full ">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Sajeed Ansari</td>
                <td>Sajeedans791</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sajeed Ansari</td>
                <td>Sajeedans791</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sajeed Ansari</td>
                <td>Sajeedans791</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
        </table>
    </div>

</div>

<?php
include('partials/footer.php');
?>