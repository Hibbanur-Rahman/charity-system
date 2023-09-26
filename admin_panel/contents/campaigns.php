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

<div class="campaigns">
    <div class="content">
        <div class="head">
            <h1>Campaign Details</h1>
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Charity Id</th>
                <th>Charity Name</th>
                <th>Campaign Name</th>
                <th>Campaign Description</th>
                <th>Campaign Pic</th>
                <th>Amount</th>
                <th>End Date</th>
                <th>Registered Date & Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
                $sql="SELECT `id`, `charity id`, `charity name`, `campaign name`, `campaign description`, `campaign pic`, `amount`, `end date`, `registered date and time`, `status` FROM `campaigns`";
                $qry=mysqli_query($conn,$sql);
                $count=1;
                if($qry){
                    while($row=mysqli_fetch_assoc($qry)){
            ?>
            <tr>
                <td><p><?=$row['id']?></p></td>
                <td><p><?=$row['charity id']?></p></td>
                <td><p><?=$row['charity name']?></p></td>
                <td><p><?=$row['campaign name']?></p></td>
                <td><p><?=$row['campaign description']?></p></td>
                <td><img src="../images/campaign image/<?=$row['campaign pic']?>"/></td>
                <td><p><?=$row['amount']?></p></td>
                <td><p><?=$row['end date']?></p></td>
                <td><p><?=$row['registered date and time']?></p></td>  
                <td><p><?=$row['status']?></p></td>
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