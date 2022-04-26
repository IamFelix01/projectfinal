import './toggleNav.js'; 
import './toggleCart.js';
import fetchingData from './fetchingData.js'
import displayProducts from './displayProducts.js';
import {setStorage} from './storageItem.js' ; 
import './setupCart.js';    
import { openCart } from './toggleCart.js';
import './setupCart.js';
import { addToCart } from './setupCart.js';
import './toggleCnx.js';
import './error.js';
import showError from './error.js';
window.addEventListener('DOMContentLoaded',async()=>{
    const search = window.location.search ; 
        if(search === '?status=1'){
            alert("you are logged succefully");
        }
    const data = await fetchingData('../controllers/phpSrc/test.php');
    setStorage('products',data);
    displayProducts(data);
    const addTocartBtn = [...document.querySelectorAll('.add-to-cart-btn')];
    addTocartBtn.forEach((btn)=>{
        btn.addEventListener('click', ()=>{
            openCart();
            addToCart(btn.getAttribute('data-id'));
        });
    })
    showError();
});
