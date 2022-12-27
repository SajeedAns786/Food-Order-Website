<?php 
include('partials/menu.php');
?>



    <!-- Main Section Starts -->

    <div class="main-content">
    <div class="wrapper">
       <h1>Manage Admin</h1>
        <br/>
        
        <?php
        if(isset($_SESSION['add'])){
            
            echo $_SESSION['add']; //displaying session msg 
            unset($_SESSION['add']); // Removing session message
        }
        ?>
         <br/><br/>
       <!-- Button to add admin -->
       <a href="add-admin.php" class="btn-primary">Add Admin</a>

       <br/>
       <br/>
       <br/>
       
       <table class = "tbl-full ">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php
            //query to get all the admin
            $sql = "SELECT * FROM tbl_admin";
            // Execute the query
            $res = mysqli_query($conn ,$sql);
            // Cheack whether the query is executed or not 
            if($res==TRUE){
                // counts rows to cheack whether we have data in databse or not 
                $count = mysqli_num_rows($res);
                    $sn = 1 ; 

                // cheack the number of rows
                if($count>0){

                    while($rows = mysqli_fetch_assoc($res) ){
                        //using while loop to get all the data from database ;
                        //this loop run as long as data in databases 
                        //Get individuals data 
                        $id = $rows['id'];
                        $full_name =$rows['full_name'];
                        $username = $rows['username'];
                        //Display the values in the table 
                        ?>
                <tr>
                <td><?php echo $sn++ ; ?></td>
                <td><?php echo $full_name ; ?></td>
                <td><?php echo $username ;?></td>
                <td>
                   <a href="#" class="btn-secondary">Update Admin</a>
                   <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>


                        <?php

                    }

                }else{
                    //we dont have data in db
                }
            }
            ?>
            
            
        </table>
       
      
       </div>
    </div>
    <!-- Main Section End -->
        
       
       
    <?php 
include('partials/footer.php');
?>


