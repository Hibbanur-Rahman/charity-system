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


//donor details
var donorDetails=document.querySelector('#donor-details');
donorDetails.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/donor_details.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})


//charity Details
var charityDetails=document.querySelector('#charity-details');
charityDetails.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/charity_details.php",
        success:function(result){
            $('.main').html(result);
        },
    });
})


//donations
var donations=document.querySelector('#donations');
donations.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/donations.php",
        success:function(result){
            $('.main').html(result);
        },
    });
})


//Transactions
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

//Edit Profile
var editProfile=document.querySelector('#edit-profile');
editProfile.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/edit_profile.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})
