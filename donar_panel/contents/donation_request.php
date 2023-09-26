<?php
// Include the database connection file
include_once "../../config/dbconnect.php";

// Start a session
session_start();

// Check if the donor is logged in
if (!isset($_SESSION['ActualdonorId'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Get the donor ID from the session
$donorid = $_SESSION['ActualdonorId'];

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reject'])) {
        // Handle rejection
        $rowid = $_POST['rejectId'];
        $sql1 = "DELETE FROM donation_request WHERE Id = ?";
        
        // Use prepared statements to prevent SQL injection
        $stmt1 = mysqli_prepare($conn, $sql1);
        mysqli_stmt_bind_param($stmt1, "i", $rowid);
        
        if (mysqli_stmt_execute($stmt1)) {
            echo "<script>alert('Successfully rejected')</script>";
            header("Location: ../index.php");
            exit();
        }
    }
}

// Fetch and display donation requests for the donor
$sql = "SELECT `Id`, `charity name`, `campaign name`, `campaign pic`, `amount needed`, `status`, `requested date time`, `action`, `charity id`, `donor name`, `end date`, `donor id` FROM donation_request WHERE `donor id` = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $donorid);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
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
            if (!empty($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $row['Id'] ?></td>
                        <td><?= $row['charity name'] ?></td>
                        <td><?= $row['campaign name'] ?></td>
                        <td><img src="../images/campaign image/<?= $row['campaign pic'] ?>" alt=""></td>
                        <td><?= $row['amount needed'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['requested date time'] ?></td>
                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                <input type="hidden" name="rejectId" value="<?= $row['Id'] ?>">
                                <button type="submit" name="reject" id="reject">Reject</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='8'>No donation requests found.</td></tr>";
            }
            ?>
        </table>
    </div>
</div>
