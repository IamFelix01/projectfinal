

const openCartBtn = document.querySelector(".cart-icon-btn"); 
const openCart = ()=>{
    const cart = document.querySelector(".cart-overlay");
    cart.classList.add('show');
}
openCartBtn.addEventListener("click",()=>{
   openCart();
});
const closeCartBtn = document.querySelector('.cart-close');
closeCartBtn.addEventListener('click',()=>{
    const cart = document.querySelector(".cart-overlay");
    cart.classList.remove('show');
})

export  {openCart} ; 