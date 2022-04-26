const getStorage = (key)=>{
    const data = localStorage.getItem(key)?JSON.parse(localStorage.getItem(key)):[] ;
    return data ; 
}
const setStorage = (key, value)=>{
    localStorage.setItem(key,JSON.stringify(value));
}

export {getStorage,setStorage} ; 