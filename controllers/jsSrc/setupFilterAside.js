import fetchingData from "./fetchingData.js";
function setupContainer(className , array){
    const container = document.querySelector(className); 
    container.innerHTML+= array.map(element => {
        return ` <div class="container-filter">

        <button class="btn-filter">
            <input type="checkbox" value="${element}">
        </button>
        <span>${element}</span>
    </div>`
    }).join('');
}

const setupFilterAside =async ()=>{
    const data = await fetchingData('../controllers/phpSrc/filterAside.php'); 
    const {companies , categories , price } = data[0]; 
    const priceFilter = document.querySelector('.price-filter');
    const priceValueDOM = document.querySelector('.price-value'); 
    setupContainer('.categories',categories);
    setupContainer('.companies',companies);
    for (const key in price) {
       priceFilter.setAttribute(key,price[key]);
    }
    priceValueDOM.textContent =`price is : $${parseFloat(priceFilter.getAttribute('max'))}`;

}

setupFilterAside();
