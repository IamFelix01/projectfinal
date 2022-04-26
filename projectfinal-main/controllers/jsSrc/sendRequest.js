function sendRequest (request){; 
   /* const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
        if(xhr.readyState===4 && xhr.status===200){
            console.log(xhr.responseText);
            fetch(`./src/execute-request.php?request=${request}`)
            .then((response)=>{
                console.log(response.text());   
            })
        }      
    }
    xhr.open('GET',`./src/execute-request.php?request=${request}`);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send();*/
    fetch(`./src/execute-request.php?request=${request}`)
            .then((response)=>{
                console.log(response.text());   
            })
}


export  default sendRequest ; 