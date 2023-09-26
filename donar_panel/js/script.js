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



//ajax work
var main=document.querySelector('.main');


var donate=document.querySelector('#donate');
donate.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/donate.php",
        success: function(result){
            $('.main').html(result);
        }
    });
})


var donationRequest=document.querySelector('#donation-request');
donationRequest.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/donation_request.php",
        success: function(result){
            $('.main').html(result);
        }
    });
})


var trackDonation=document.querySelector('#track-donation');
trackDonation.addEventListener('click',()=>{
    console.log("hello");
    $.ajax({
        url:"./contents/track_donation.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})

var transaction=document.querySelector("#transaction");
transaction.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/transaction.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})


var editProfile=document.querySelector('#edit-profile');
editProfile.addEventListener('click',()=>{
    $.ajax({
        url:"./contents/edit_profile.php",
        success:function(result){
            $('.main').html(result);
        }
    });
})


// var donateBtn=document.querySelector('#donate-btn');
// donateBtn.addEventListener('click',()=>{
    
// })



