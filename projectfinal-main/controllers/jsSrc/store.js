import './toggleNav.js'; 
import './setupCart.js'
import fetchingData from './fetchingData.js';
import displayProducts from './displayProducts.js';
import './filter.js' ; 
import'./sendRequest.js';
import './toggleCart.js';
import './setupFilterAside.js';
import { openCart } from './toggleCart.js';
import './setupCart.js'
import {addToCart} from './setupCart.js';
const btnShowMenuFilter = document.querySelector(".btn-show-filter-menu"); 
const boxMenu = document.querySelector(".box-filter-menu"); 
const containerMenu = document.querySelector('.container-filter-menu')
 
btnShowMenuFilter.addEventListener("click",()=>{
    const filterMenu = document.querySelector('.filter-menu'); 
    const height = boxMenu.getBoundingClientRect().height ; 
    filterMenu.classList.toggle('open');
    if(filterMenu.classList.contains('open')){
        containerMenu.style.height = `${height +30}px` ; 
    }
    else{
        containerMenu.style.height = `0px` ;
    }
}); 

document.addEventListener('DOMContentLoaded',async()=>{
    const data = await fetchingData('../controllers/phpSrc/test.php');
    displayProducts(data);
    const addTocartBtn = [...document.querySelectorAll('.add-to-cart-btn')];
    console.log(addTocartBtn);
    addTocartBtn.forEach((btn)=>{
        btn.addEventListener('click', ()=>{
            openCart();
            addToCart(btn.getAttribute('data-id'));
        });
    })
})
