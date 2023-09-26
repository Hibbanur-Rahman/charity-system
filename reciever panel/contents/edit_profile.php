<?php
    
?>
<div class="edit-profile">
    <div class="head">
        <h1>Edit Profile</h1>
    </div>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="addCampaign"
            enctype="multipart/form-data">
            <div class="edit-img">
                <div class="profile-img" id="profile-img">
                    <img src="./images/aese hi.jpg" alt="" id="profileImage">
                </div>
                <label for="">Change Picture</label>
                <input type="file" name="profileImg" placeholder="Change Picture" id="newPhoto">
            </div>
            <div class="input-feild">
                <label for="">User Name</label>
                <input type="text" placeholder="Hibbanur Rahman" name="username">
            </div>
            <div class="input-feild">
                <label for="">Email</label>
                <input type="text" placeholder="hibbanrahmanhyt@gmail.com" name="email">
            </div>
            <div class="input-feild">
                <label for="">Address</label>
                <input type="text" placeholder="GachhiBowli,Hyderabad" name="Address">
            </div>
            <div class="input-feild">
                <label for="">Contact Number</label>
                <input type="text" placeholder="+91-9973152523" name="phone">
            </div>
            <div class="input-feild">
                <label for="">Password</label>
                <input type="text" placeholder="Rahman@1234" name="password">
            </div>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</div>
<script>
    //change profile image
    var profileImage = document.querySelector('#profileImage');
    var newPhoto = document.querySelector('#newPhoto');

    newPhoto.addEventListener('change', (event) => {
        var selectedFile = event.target.files[0];
        console.log(event.target.files[0].name);

        if (selectedFile) {
            const reader = new FileReader();
            reader.onload = (e) => {
                profileImage.src = e.target.result;
            }
            reader.readAsDataURL(selectedFile);
        }
    })  
</script>