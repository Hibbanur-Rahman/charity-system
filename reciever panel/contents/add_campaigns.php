
<?php
include_once "../../config/dbconnect.php";

session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addCampaign'])) {
        //image transfer from input field to images folder of main page 
        $filename = $_FILES['campaignPic']['name'];
        $tempname = $_FILES['campaignPic']["tmp_name"];
        $folder = "../../images/campaign image/" . $filename;

        move_uploaded_file($tempname, $folder);

        //input variables
        $charityId = $_SESSION['charity id'];
        $charityName = $_SESSION['RecieverId'];
        $campaignName = $_POST['campaignName'];
        $campaignPic = $filename;
        $charityDescription = $_POST['description'];
        $amount = $_POST['amount'];
        $EndDate = $_POST['EndDate'];



        //sql query
        $sql = "INSERT INTO `campaigns` (`charity id`, `charity name`, `campaign name`, `campaign description`, `campaign pic`, `amount`, `end date`, `registered date and time`, `status`) VALUES ('$charityId','$charityName','$campaignName','$charityDescription','$campaignPic','$amount','$EndDate',NOW(),'inactive') ";
        $qry = mysqli_query($conn, $sql);
        if (!$qry) {
            echo "<script>alert('the query is wrong')</script>";
            exit();
        } else {
            echo "<script>alert('Campaign added successfull');
            window.location.href = '../index.php';</script>";
        }
    }
}
?>
<div class="add-campaign">
    <div class="head">
        <h1>Add Campaign</h1>
    </div>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="addCampaign"  enctype="multipart/form-data">
            <input type="text" name="campaignName" placeholder="campaign Name" required>
            <input type="file" name="campaignPic" required>
            <textarea type="text" name="description" placeholder="description" required></textarea>
            <input type="text" name="amount" placeholder="Amount" required>
            <input type="date" name="EndDate" placeholder="End Date" required>
            <button type="submit" name="addCampaign">Add</button>
        </form>
    </div>
</div>