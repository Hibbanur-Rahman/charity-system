//responsive ness
var hamburger=document.querySelector('.hamburger');
var sidebar=document.querySelector('.sidebar');
var navCount=0;
hamburger.addEventListener('click',()=>{
    if(navCount%2==0){
        sidebar.style.left='0%';
        sidebar.style.transition=' all 0.5s ease-in-out';
    }
    else{
        sidebar.style.left='-85%';
    }
    navCount++;
   
})

//request-donation
var requestDonation=document.querySelector('#request-donation');
requestDonation.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/request_donation.php",
        success:function(result){
            $('.main').html(result);
        },
    });
})

//add campaign
var addCampaign=document.querySelector('#add-campaign');
addCampaign.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/add_campaigns.php",
        success:function(result){
            $('.main').html(result);
        },
    });
})


//request status
var requestStatus=document.querySelector('#request-status');
requestStatus.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/request_status.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})

//donations
var donations=document.querySelector('#donations');
donations.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/donation.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})


//transaction
var transaction=document.querySelector('#transaction');
transaction.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/transaction.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})


//campaign
var campaign=document.querySelector('#campaign');
campaign.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/campaigns.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})

//edit profile
var editprofile=document.querySelector('#edit-profile');
editprofile.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/edit_profile.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})