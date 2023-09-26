var signup=document.querySelectorAll('#signup');
var login=document.querySelectorAll('#login');

var signupContainer=document.querySelectorAll('.signup');
var loginContainer=document.querySelectorAll('.login');

var headLogin=document.querySelectorAll('.head-login');
var headSignup=document.querySelectorAll('.head-signup');


signupContainer[0].style.display='none';
headSignup.forEach((element)=>{
    element.style.background='none';
})


signup.forEach((element)=>{
    element.addEventListener('click', ()=>{
        console.log(signup[0])
        signupContainer[0].style.display='flex';
        loginContainer[0].style.display='none';

        headLogin.forEach((element)=>{
            element.style.background='none';
            element.style.color='black';
            element.style.transition='all 0.4s ease-in-out';
        })

        headSignup.forEach((element)=>{
            element.style.background='-webkit-linear-gradient(left, rgb(254, 220, 28), rgb(251, 217, 29), rgba(255, 217, 0, 0.966))';
            element.style.color='white';
            element.style.transition='all 0.4s ease-in-out';
        })
    })
})

login.forEach((element)=>{
    element.addEventListener('click', ()=>{
        console.log(signup[0])
        signupContainer[0].style.display='none';
        loginContainer[0].style.display='flex';

        headLogin.forEach((element)=>{
            element.style.background='-webkit-linear-gradient(left, rgb(254, 220, 28), rgb(251, 217, 29), rgba(255, 217, 0, 0.966))';
            element.style.color='white';
            element.style.transition='all 0.4s ease-in-out';
        })

        headSignup.forEach((element)=>{
            element.style.background=' none';
            element.style.color='black';
            element.style.transition='all 0.4s ease-in-out';
        })
    })
})