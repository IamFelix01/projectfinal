const registerBtn = document.querySelectorAll('.Register'); 
const popUpCnx = document.querySelector('.connexion-pop-up');
const closeCnxBtn = document.querySelector('.container-close-cnx');
registerBtn.forEach(btn=>{
    btn.addEventListener('click',()=>{
    openPopUp();
});
});


export const openPopUp = ()=>{
    popUpCnx.classList.add('show');
    closeCnxBtn.addEventListener('click',()=>{
        popUpCnx.classList.remove('show');
    })
}