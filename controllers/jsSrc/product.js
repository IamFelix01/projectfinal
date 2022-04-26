import { getStorage } from "./storageItem.js";
import './toggleCart.js';
import './toggleNav.js';
import {addToCart} from './setupCart.js'; 
import { openCart } from "./toggleCart.js";
import  './setupCart.js';
document.addEventListener('DOMContentLoaded',()=>{
    const id = document.location.search.slice(4);
    let products = getStorage('products');
    const titlePageDOM = document.querySelector('.location.center .container');
    const imgDOM = document.querySelector('.single-product-img');
    const titleDOM = document.querySelector('.single-product-title');
    const companyDOM = document.querySelector('.single-product-company');
    const priceDOM = document.querySelector('.single-product-price');
    const descriptionDOM = document.querySelector('.single-product-desc');
    const addToCartBtn = document.querySelector('.addToCartBtn');
    products.forEach(element => {
        if(element.idproduct==id){
            const {idproduct,name,price,url,company,description} = element; 
            titlePageDOM.textContent = `Home / ${name}`;
            document.title = `COMFY | ${name}` ;
            imgDOM.src = `Admin_Manager/${url}`;
            titleDOM.textContent = name ; 
            companyDOM.textContent = `by ${company}`; 
            priceDOM.textContent = `$${price}`; 
            descriptionDOM.textContent = description ; 
            addToCartBtn.setAttribute('data-id',`${id}`);
        }
    }); 
        addToCartBtn.addEventListener('click', ()=>{
            openCart();
            addToCart(addToCartBtn.getAttribute('data-id'));
        });
   
    
})