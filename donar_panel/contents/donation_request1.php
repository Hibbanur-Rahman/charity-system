<?php
include_once "../../config/dbconnect.php";

session_start();
$donorid = $_SESSION['ActualdonorId'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reject'])) {
        $rowid = $_POST['rejectId'];
        $sql1 = "DELETE FROM `donation_request` WHERE Id='$rowid'";
        $qry1 = mysqli_query($conn, $sql1);
        if ($qry1) {
            echo "<script>alert('Successfully rejected')</script>";
            header("location: ../index.php");
        }
    }
}
?>
<div class="donation-request">
    <div class="content">
        <div class="head">
            <h1>Donation Request</h1>
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Charity Name</th>
                <th>Campaign Name</th>
                <th>Campaign Pic</th>
                <th>Amount Needed</th>
                <th>Status</th>
                <th>Requested Date & Time</th>
                <th>Action</th>
            </tr>
            <?php
            $donorid = $_SESSION['ActualdonorId'];
            $sql = "SELECT (`Id`, `charity name`, `campaign name`, `campaign pic`, `amount needed`, `status`, `requested date time`, `action`, `charity id`, `donor name`, `end date`, `donor id`) FROM `donation_request` WHERE `donor id`='$donorid'";
            $qry = mysqli_query($conn, $sql);
            if ($qry) {
                while ($row = mysqli_fetch_assoc($qry)) {
                    ?>
                    <tr>
                        <td>
                            <?= $row['Id'] ?>
                        </td>
                        <td>
                            <?= $row['charity name'] ?>
                        </td>
                        <td>
                            <?= $row['campaign name'] ?>
                        </td>
                        <td><img src="../images/campaign image/<?= $row['campaign pic'] ?>" alt=""></td>
                        <td>
                            <?= $row['amount needed'] ?>
                        </td>
                        <td>
                            <?= $row['status'] ?>
                        </td>
                        <td>
                            <?= $row['requested date time'] ?>
                        </td>
                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                <input type="hidden" name="hidden_variable" value="<?= $row['Id'] ?>">
                                <button type="submit" name="approve" id="approve">Approve</button>
                            </form>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                <input type="hidden" name="rejectId" value="<?= $row['Id'] ?>">
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

<!-- INSERT INTO `donation_request`(`Id`, `charity name`, `campaign name`, `campaign pic`, `amount needed`, `status`, `requested date time`, `action`) VALUES ('2','Raani','For Health','10112.jpg','11000','active','12-03-2025 12:13:1400','reject'); -->