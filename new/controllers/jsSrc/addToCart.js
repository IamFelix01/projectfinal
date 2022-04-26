
const cartItemsDOM = document.querySelector('.cart-items');
const addToCartDOM = ({ idproduct, name, price, url, amount }) => {
  const article = document.createElement('article');
  article.classList.add('cart-item');
  article.setAttribute('data-id', idproduct);
  article.innerHTML = `
    <img src="Admin_Manager/${url}"
              class="cart-item-img"
              alt="${name}"
            />  
            <div>
              <h4 class="cart-item-name">${name}</h4>
              <p class="cart-item-price">$${parseFloat(price)}</p>
              <button class="cart-item-remove-btn" data-id="${idproduct}">remove</button>
            </div>
          
            <div>
              <button class="cart-item-increase-btn" data-id="${idproduct}">
                <i class="fas fa-chevron-up"></i>
              </button>
              <p class="cart-item-amount" data-id="${idproduct}">${amount}</p>
              <button class="cart-item-decrease-btn" data-id="${idproduct}">
                <i class="fas fa-chevron-down"></i>
              </button>
            </div>
  `;
  cartItemsDOM.appendChild(article);
};

export default addToCartDOM;
