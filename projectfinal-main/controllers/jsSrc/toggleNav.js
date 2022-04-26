const toggleNav = document.querySelectorAll('.toggle-nav-container button'); 
toggleNav.forEach((Element)=>{
    Element.addEventListener('click',()=>{
        const popUp = document.querySelector('.pop-up-menu');
        popUp.classList.toggle('open');
        const listLinks = document.querySelector('.pop-up-menu .list-links');
        listLinks.addEventListener('click',(e)=>{
            if(e.target.classList.contains('list-links')){
                popUp.classList.remove('open');
            }
        }) 
    })
})


