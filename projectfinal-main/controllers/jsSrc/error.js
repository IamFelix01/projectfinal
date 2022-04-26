import { openPopUp } from "./toggleCnx.js";

function showError(){
  const errorContainer = document.querySelector('.error-msg');
const closeCnxBtn = document.querySelector('.container-close-error');
if(closeCnxBtn){
    closeCnxBtn.addEventListener('click',()=>{
    errorContainer.classList.remove('show');
})  
}

}

export default showError ; 

