const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

//show SIdebar
menuBtn.addEventListener('click' , () => {
    sideMenu.style.display = 'block' ;
})


//close SIdebar
closeBtn.addEventListener('click' , () => {
    sideMenu.style.display = 'none' ;
})

// change color 

themeToggler.addEventListener('click' , () => {
    document.body.classList.toggle('dark-theme-variables');
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})


document.addEventListener('DOMContentLoaded',()=>{
   const job =window.location.search.slice(5) ; 
   console.log(job);
    if(job === 'manager'){
        console.log("hello");
       hideProfile('.admin');
    }
    else if(job==='admin'){
        console.log("hello");
        hideProfile('.manager');
    }
})

function hideProfile(className){
    
     const Sections = document.querySelectorAll(className);
        Sections.forEach(section=>{
            console.log(section);
            section.classList.add('none');
        })
}

const links = document.querySelectorAll('.sidebar a.link'); 
links.forEach(link=>{
    console.log(link);
    link.addEventListener('click',(e)=>{
        e.preventDefault();
        links.forEach(link=>{
            link.classList.remove('active');
        })
        link.classList.add('active');
        const idSection = link.getAttribute('href'); 
       hideProfile('section');
       const sectionShowed = document.querySelector(idSection);
       sectionShowed.classList.remove('none');
    })
})