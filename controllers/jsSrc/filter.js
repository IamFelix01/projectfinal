
import displayProducts from "./displayProducts.js";
import fetchingData from "./fetchingData.js";
const containerFilterMenu = document.querySelector('.container-filter-menu');
const priceFilter = document.querySelector('.price-filter'); 
containerFilterMenu.addEventListener('click', async (e)=>{
    const element = e.target.parentElement
    if(element.classList.contains('btn-filter')){
        if(e.target.value!=='all' && e.target.tagName.toLowerCase()==='input'){
            if(e.target.type.toLowerCase()==='checkbox'){
                const filter = element.parentElement.parentElement ; 
                const inputs = filter.querySelectorAll('input'); 
                inputs[0].checked = false ; 
            } 
        }
      await  generateFinalRequest();
        
 
}}); 
priceFilter.addEventListener('input',(e)=>{
    generateFinalRequest();
    const priceValueDOM = document.querySelector('.price-value'); 
    priceValueDOM.textContent = `price is : $${parseFloat(document.querySelector('.price-filter').value)}`;
})
function generateFilterObject(){
        let companiesArray = [];
        let categoriesArray = [] ; 
        const searchvalue = document.querySelector('.search-input').value;
        const priceValue = parseFloat( document.querySelector('.price-filter').value); 
        const companiesInput = document.querySelectorAll('.companies input');
        const categoriesInput = document.querySelectorAll('.categories input');
        companiesInput.forEach((Element)=>{
            if(Element.checked) companiesArray.push(Element.value);
        });
        if(companiesArray.includes('all')){
           companiesArray = [] ;  
           companiesInput.forEach((element)=>{
               element.checked = false ; 
           })
           companiesInput[0].checked = true ; 
        } 
        categoriesInput.forEach((Element)=>{
            if(Element.checked) categoriesArray.push(Element.value);
        });
        if(categoriesArray.includes('all')){
            categoriesInput.forEach((element)=>{
                element.checked = false ; 
            })
            categoriesArray = [] ;
            categoriesInput[0].checked = true ; 
        }
        ;
        return ({company:companiesArray,category:categoriesArray,name:searchvalue,price:priceValue});
}
function generateRequest(array,request,key){
    array.forEach((element, index)=>{
        request+=`'${element}'` 
         if(index < array.length -1){
             request+=',';
         }
         else{
             request+=')';
             if(key==='category') request+=' )';
         }
     } );
     return request ; 

}
async function generateFinalRequest(){
    const res = generateFilterObject(); 
        console.log(res);
        let check = false ;
        let request = 'select * from products' ;
        for (const key in res) {
            if(Array.isArray(res[key])){
                if(res[key].length > 0){
                    // adding where or and 
                    if(!check){
                        request += ' where ';
                        check = true ;
                    }
                    else{
                        request += ' and '
                    }
                    if(key==='category'){
                        request+= `idcategory in (select idcategory from categories where namecateg in (`;
                    }
                    else{
                            request+=`${key} in (`
                            
                    }
                    request = generateRequest(res[key],request,key);
                }
            }
            else if(res[key]){
                if(!check){
                    request += ' where ';
                    check = true ;
                }
                else{
                    request += ' and '
                }
                request+=`${key}${key==='price'? ` <= ${res[key]}` : ` = '${res[key]}'`} `; 
                
            }
        }
        console.log(request);
        const data = await fetchingData(`../controllers/phpSrc/execute-request.php?request=${request}`);
        console.log(data);
        displayProducts(data);

}


