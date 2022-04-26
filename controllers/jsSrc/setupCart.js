import addToCartDOM from "./addToCart.js";
import fetchingData from "./fetchingData.js";
import { getStorage , setStorage } from "./storageItem.js";
import {openCart} from './toggleCart.js';

if(window.location.search.slice(8)==='succes'){
  setStorage('cart',[]);
}
let cart = getStorage('cart'); 

const cartItemCountDOM = document.querySelector('.cart-item-count');
const cartItemsDOM = document.querySelector('.cart-items');
const cartTotalDOM = document.querySelector('.cart-total');

 export const addToCart = (id)=>{
   console.log(id);
   let store = getStorage('products');
    let cartItem = cart.find(element =>{
      if(element.idproduct == id){
        return element ; 
      }
    }); 
    if(!cartItem){
      let product = store.find(element=>{
        if(element.idproduct== id){
          return element ; 
        }
      });
      addToCartDOM({...product,amount:1});
      cart = [...cart , {...product,amount:1} ]
      
    }
    else{
       let newAmount =  increaseAmount(id);
       console.log(newAmount);
       const amount = document.querySelectorAll('.cart-item-amount'); 
       amount.forEach(element=>{
         if(element.dataset.id == id) element.textContent = newAmount; 
       })
    }
    setStorage('cart',cart);
    displayCartTotal();
    displayCartItemCount();
 }

 function increaseAmount(id){
  let newAmount;
  cart = cart.map((cartItem) => {
    if (cartItem.idproduct == id) {
      newAmount = cartItem.amount + 1;
      cartItem = { ...cartItem, amount: newAmount };
    }
    return cartItem;
  });
  return newAmount;
 }
 function decreaseAmount(id) {
  let newAmount;
  cart = cart.map((cartItem) => {
    if (cartItem.idproduct == id) {
      newAmount = cartItem.amount - 1;
      cartItem = { ...cartItem, amount: newAmount };
    }
    return cartItem;
  });
  return newAmount;
}

 function displayCartItemsDOM() {
  cart.forEach((cartItem) => {
    addToCartDOM(cartItem);
  });
}
function displayCartTotal() {
  let total = cart.reduce((total, cartItem) => {
    return (total += cartItem.price * cartItem.amount);
  }, 0);
  cartTotalDOM.textContent = `Total : $${(total)} `;
}
function displayCartItemCount() {
  const amount = cart.reduce((total, cartItem) => {
    return (total += cartItem.amount);
  }, 0);
  cartItemCountDOM.textContent = amount;
}
function removeItem(id) {
  cart = cart.filter((cartItem) => cartItem.idproduct != id);
}
function setupCartFunctionality() {
  cartItemsDOM.addEventListener('click', function (e) {
    const element = e.target;
    const parent = e.target.parentElement;
    const id = e.target.dataset.id;
    const parentID = e.target.parentElement.dataset.id;
    // remove
    if (element.classList.contains('cart-item-remove-btn')) {
      removeItem(id);
      // parent.parentElement.remove();
      element.parentElement.parentElement.remove();
    }
    // increase
    if (parent.classList.contains('cart-item-increase-btn')) {
      const newAmount = increaseAmount(parentID);
      parent.nextElementSibling.textContent = newAmount;
    }
    // decrease
    if (parent.classList.contains('cart-item-decrease-btn')) {
      const newAmount = decreaseAmount(parentID);
      if (newAmount === 0) {
        removeItem(parentID);
        parent.parentElement.parentElement.remove();
      } else {
        parent.previousElementSibling.textContent = newAmount;
      }
    }
    displayCartItemCount();
    displayCartTotal();
    setStorage('cart', cart);
  });
}
const init = ()=>{
  displayCartItemsDOM();
  displayCartTotal();
  displayCartItemCount();
  setupCartFunctionality();
}
init();


const validCommand = document.querySelector('.cart-checkout'); 
validCommand.addEventListener('click',async()=>{
 validCommand.setAttribute('href',`../controllers/phpSrc/valid.php?command=${localStorage.getItem('cart')}`);

})

