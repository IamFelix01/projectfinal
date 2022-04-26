
const displayProducts = (array)=>{
    const containerProducts = document.querySelector('.container-products');
    if(array.length <1){
        containerProducts.innerHTML = `<h2 class="exception">Sorry there is no products </h2>`; 
    }
    else{
        containerProducts.innerHTML = array.map((element)=>{
            const {name,price,url,idproduct} = element ; 
            return `<article class="product center">
            <div class="container-img-product">
                <img src="Admin_Manager/${url}" alt="${name}">
                <div class="container-buttons center">
                    <a href="./product.html?id=${idproduct}" class="btn"><i class="fas fa-search"></i></a>
                    <button class="product-cart-button btn add-to-cart-btn" data-id="${idproduct}"><i class="fas fa-shopping-cart"></i></button>
                </div>
            
            </div>
            <h3 class="product-name">${name}</h3>
            <span class="product-price">$${parseFloat(price)}</span>
        </article>`
        }).join('');
    }
}

export default displayProducts ; 