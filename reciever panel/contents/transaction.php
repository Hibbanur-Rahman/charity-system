<?php
    include_once "../../config//dbconnect.php";
?>
<div class="transaction">
    <div class="content">
        <div class="head">
            <h1>Transactions Details</h1>
        </div>
        <table>
            <tr>
                <th>Transaction Id</th>
                <th>Donor Name</th>
                <th>Charity Name</th>
                <th>Charity Id</th>
                <th>Campaign Name</th>
                <th>Payment Mode</th>
                <th>Donation Amount</th>
                <th>Paid On</th>
            </tr>
            <?php
                $sql="SELECT `transaction id`, `charity name`, `campaign name`, `payment mode`, `donation amount`, `paid on`, `donor id`, `charity id`, `donor name`  FROM  `donor_transaction` ";
                $qry=mysqli_query($conn,$sql);
                if($qry){
                    while($row=mysqli_fetch_assoc($qry)){
            ?>
            <tr>
                <td><?=$row['transaction id']?></td>
                <td><?=$row['donor name']?></td>
                <td><?=$row['charity name']?></td>
                <td><?=$row['charity id']?></td>
                <td><?=$row['campaign name']?></td>
                <td><?=$row['payment mode']?></td>
                <td><?=$row['donation amount']?></td>
                <td><?=$row['paid on']?></td>
            </tr>

            <?php
                    }
                }
            ?>
        </table>
    </div>
</div>