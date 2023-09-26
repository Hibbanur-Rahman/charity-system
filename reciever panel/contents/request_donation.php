<?php
include_once "../../config/dbconnect.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $selectedOption = $_POST['SelectedSubmitData'];
    $donorid=$_POST['selectedDonorId'];
    $donorname = $_POST['selectedDonorName'];
    $charityname = $_SESSION['RecieverId'];
    $charityId = $_SESSION['charity id'];

    // Define the SQL query to fetch campaign data
    $sqlFetchData = "SELECT `charity id`, `charity name`, `campaign name`, `campaign description`, `campaign pic`, `amount`, `end date`, `registered date and time`, `status` FROM `campaigns` WHERE `charity id`='$charityId' and `campaign name`='$selectedOption'";
    
    // Execute the query
    $qryFetchData = mysqli_query($conn, $sqlFetchData);

    if ($qryFetchData) {
        while ($rowFetchData = mysqli_fetch_assoc($qryFetchData)) {
            $campaignPic = $rowFetchData['campaign pic'];
            $amountneeded = $rowFetchData['amount'];
            $endDate = $rowFetchData['end date'];

            // You can use single quotes to wrap JavaScript variables
            // echo "<script>alert('$campaignPic' + '$amountneeded' + '$endDate')</script>";

            // Define the SQL query for donation request
            $sqlDonationRequest = "INSERT INTO `donation_request` (`charity name`, `campaign name`, `campaign pic`, `amount needed`, `status`, `requested date time`, `charity id`, `donor name`, `end date`,`donor id`) VALUES ('$charityname', '$selectedOption', '$campaignPic', '$amountneeded', 'waiting', NOW(), '$charityId', '$donorname', '$endDate','$donorid')";
            
            // Execute the donation request query
            $qryDonationRequest = mysqli_query($conn, $sqlDonationRequest);
            
            if (!$qryDonationRequest) {
                echo "<script>alert('There was an issue with the query')</script>";
                exit();
            } else {
                echo "<script>alert('Donation request added successfully'); window.location.href = '../index.php';</script>";
            }
        }
    } else {
        echo "<script>alert('There was an issue with the outer query for donation request')</script>";
        echo mysqli_errno($conn);
    }
}
?>

<div class="request-donation">
    <div class="content">
        <div class="head">
            <h1>Request Donation</h1>
        </div>
        <div class="head">
            <p>Donor Details</p>
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Donor Id</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Select campaign</th>
                <th>Action</th>
            </tr>
            <?php
                $sql = "SELECT `username`, `email`, `mobile`,`donor id` FROM `donor_info_login`";
                $qry = mysqli_query($conn, $sql);
                $count = 1;
                if ($qry) {
                    while ($row = mysqli_fetch_assoc($qry)) {
                        ?>
                        <tr>
                            <td>
                                <?= $count++ ?>
                            </td>
                            <td id="donorname-row<?=$count-1?>" value="<?= $row['username'] ?>">
                                <?= $row['username'] ?>
                            </td>
                            <td id="donorid<?=$count-1?>">
                                <?=$row['donor id']?>
                            </td>
                            <td>
                                <?= $row['email'] ?>
                            </td>
                            <td>
                                <?= $row['mobile'] ?>
                            </td>
                            <td>
                                <select name="campaignList" id="campaignList<?=$count-1?>">
                                    <option value="">Select the campaigns</option>
                                    <?php
                                    $charityId = $_SESSION['charity id'];
                                    $sql1 = "SELECT `campaign name`,`charity id` FROM `campaigns` WHERE `charity id`='$charityId'";
                                    $qry1 = mysqli_query($conn, $sql1);
                                    if ($qry1) {
                                        while ($row1 = mysqli_fetch_assoc($qry1)) {
                                            ?>
                                            <option value="<?= $row1['campaign name']?>">
                                                <?= $row1['campaign name'] ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name="request" id="requestForm<?=$count-1?>">
                                    <input type="hidden" name="selectedDonorId" value="" id="selectedDonorId<?=$count-1?>">
                                    <input type="hidden" name="selectedDonorName" value="" id="selectedDonorName<?=$count-1?>">
                                    <input type="hidden" name="SelectedSubmitData" value="" id="SelectedSubmitData<?=$count-1?>">
                                    <!-- <button type="submit" name="request" id="request">Request</button> -->
                                </form>
                                <button type="button" onclick="updateHiddenField(<?=$count-1?>)" name="request" id="request">Request</button>
                            </td>
                        </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>
<script>
    function updateHiddenField(count){
        //campaign list name
        var campaignList=document.querySelector(`#campaignList${count}`);
        var selectedValue=campaignList.value;
        
        //donor name
        var donornameRow=document.querySelector(`#donorname-row${count}`);
        var selectedDonorNameValue=donornameRow.innerHTML;

        //donor Id
        var donorIdrow=document.querySelector(`#donorid${count}`);
        var selectedDonorIdvalue=donorIdrow.innerHTML;
        
        //update the form data
        var hiddenFeild=document.querySelector(`#SelectedSubmitData${count}`);
        hiddenFeild.value=selectedValue;

        var selectedDonorName=document.querySelector(`#selectedDonorName${count}`);
        selectedDonorName.value=selectedDonorNameValue;

        var selectedDonorId=document.querySelector(`#selectedDonorId${count}`);
        selectedDonorId.value=selectedDonorIdvalue;

        console.log(selectedDonorName,campaignList,selectedValue);
        var form=document.querySelector(`#requestForm${count}`);
        form.submit();
        
    }
</script>