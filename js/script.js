var leftArr = document.querySelector('.left-arr');
var rightArr = document.querySelector('.right-arr');
var slides = document.querySelectorAll('.slides');
var homeSlider = document.querySelector('.homeSlider');
var innerRadio=document.querySelectorAll('.inner-radio');
var radio=document.querySelectorAll('.radio');
slides[1].style.display = 'none';
slides[2].style.display = 'none';
innerRadio[1].style.display='none';
innerRadio[2].style.display='none';

var slidecount = 0;
leftArr.addEventListener('click', () => {
    switch (slidecount) {
        case 0:
            slides[0].style.display = 'none';
            slides[1].style.display = 'flex';
            slides[2].style.display = 'none';

            innerRadio[0].style.display='none';
            innerRadio[1].style.display='block';
            innerRadio[2].style.display='none';         
            break;
        case 1:
            slides[0].style.display = 'none';
            slides[1].style.display = 'none';
            slides[2].style.display = 'flex';

            innerRadio[0].style.display='none';
            innerRadio[1].style.display='none';
            innerRadio[2].style.display='block'; 
            break;
        case 2:
            slides[0].style.display = 'flex';
            slides[1].style.display = 'none';
            slides[2].style.display = 'none';

            innerRadio[0].style.display='block';
            innerRadio[1].style.display='none';
            innerRadio[2].style.display='none'; 
            break;
    }
    slidecount++;
    if (slidecount > 2) {
        slidecount = 0;
    }
})
rightArr.addEventListener('click', () => {
    switch (slidecount) {
        case 0:
            slides[0].style.display = 'none';
            slides[1].style.display = 'none';
            slides[2].style.display = 'flex';

            innerRadio[0].style.display='none';
            innerRadio[1].style.display='none';
            innerRadio[2].style.display='block'; 
            break;
        case 1:
            slides[0].style.display = 'flex';
            slides[1].style.display = 'none';
            slides[2].style.display = 'none';

            innerRadio[0].style.display='block';
            innerRadio[1].style.display='none';
            innerRadio[2].style.display='none'; 
            break;
        case 2:
            slides[0].style.display = 'none';
            slides[1].style.display = 'flex';
            slides[2].style.display = 'none';

            innerRadio[0].style.display='none';
            innerRadio[1].style.display='block';
            innerRadio[2].style.display='none';  
            break;
    }
    slidecount--;
    if(slidecount<0){
        slidecount=2;
    }
})

var i=0;
radio.forEach((element)=>{
    element.id=i;
    i++;
    element.addEventListener('click',()=>{
        console.log(element.id)
        switch(element.id){
            case '0':
                console.log(element.id)
                slides[0].style.display = 'flex';
                slides[1].style.display = 'none';
                slides[2].style.display = 'none';

                innerRadio[0].style.display='block';
                innerRadio[1].style.display='none';
                innerRadio[2].style.display='none'; 

                slidecount=0;
                break;

            case '1':
                console.log(element.id)
                slides[0].style.display = 'none';
                slides[1].style.display = 'flex';
                slides[2].style.display = 'none';

                innerRadio[0].style.display='none';
                innerRadio[1].style.display='block';
                innerRadio[2].style.display='none';  

                slidecount=1;
                break;
            case '2':
                console.log(element.id)
                slides[0].style.display = 'none';
                slides[1].style.display = 'none';
                slides[2].style.display = 'flex';

                innerRadio[0].style.display='none';
                innerRadio[1].style.display='none';
                innerRadio[2].style.display='block'; 

                slidecount=2;
                break;
        }
    })
})



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