<?php
include_once "../../config/dbconnect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['reject'])){
        $rowid=$_POST['rejectId'];
        $sql1="DELETE FROM `donation_request` WHERE Id='$rowid'";
        $qry1=mysqli_query($conn,$sql1);
        if($qry1){
            echo "<script>alert('Successfully rejected')</script>";
            header("location: ../index.php");
        }
    }
}
?>

<div class="charity-details">
    <div class="content">
        <div class="head">
            <h1>Charity Details</h1>
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Charity Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Registered Date & Time</th>
                <th>Action</th>
            </tr>
            <?php
                $sql="SELECT `id`,`charity name`, `email id`, `phone`, `address`,`status`,`registered date and time` FROM `charity_details`";
                $qry=mysqli_query($conn,$sql);
                $count=1;
                if($qry){
                    while($row=mysqli_fetch_assoc($qry)){
            ?>
            <tr>
                <td><p><?=$count++?></p></td>
                <td><p><?=$row['charity name']?></p></td>
                <td><p><?=$row['email id']?></p></td>
                <td><p><?=$row['phone']?></p></td>
                <td><p><?=$row['address']?></p></td>
                <td><p><?=$row['status']?></p></td>
                <td><p><?=$row['registered date and time']?></p></td>  
                <td>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <input type="hidden" name="hidden_variable" value="<?=$row['id']?>">
                        <button type="submit" name="approve" id="approve">Approve</button>
                    </form>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <input type="hidden" name="rejectId" value="<?=$row['id']?>">
                        <button type="submit" name="reject" id="reject">Reject</button>
                    </form>
                </td>
            </tr>

            <?php
                    }
                }
            ?>
           

        </table>
    </div>
</div>