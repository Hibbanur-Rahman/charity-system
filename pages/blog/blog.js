//responsive ness

var hamburger=document.querySelector('.hamburger');
var navRight=document.querySelector('#nav-right');
var navCount=0;
hamburger.addEventListener('click',()=>{
    if(navCount%2==0){
        navRight.style.top='8vh';
        navRight.style.transition=' all 0.5s ease-in-out';
    }
    else{
        navRight.style.top='-100vh';
    }
    navCount++;
   
})