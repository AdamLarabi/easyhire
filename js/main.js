//total
//create product
//save localstorage
//clear input
//count
//delete-update-search
let title = document.getElementById("title");
let price = document.getElementById("price");
let taxes = document.getElementById("taxes");
let ads = document.getElementById("ads");
let discount = document.getElementById("discount");
let total = document.getElementById("total");
let count = document.getElementById("count");
let category = document.getElementById("category");
let submit = document.getElementById("submit");
let mood = 'create';
let tmp;
function gettotal(){
    if(parseFloat(competance.value)>=10 ||(parseFloat(anne.value)>=10)||(parseFloat(anne.value)>=10)||(parseFloat(diplom.value)>=10)){
        let result = (+comptance.value + +diplom.value + +certificat.value + +anne.value);
    total.innerHTML = 'les champes doit etre inf a 10'
    total.style.background = "red"
    }
    else{
        total.innerHTML = result;
        total.style.background ="green"; 
    }
}
let datapro;
if(localStorage.product != null){
    datapro = JSON.parse(localStorage.product);
}
else{
    datapro = [];
}

submit.onclick = function(){
    let newpro ={
        title:title.value.toLowerCase(),
        price:price.value,
        taxes:taxes.value,
        ads:ads.value,
        discount:discount.value,
        total:total.innerHTML,
        count:count.value,
        category:category.value.toLowerCase(),
    }
if(mood == 'create'){
    if(newpro.count > 1){
        for(let i=0;i<newpro.count;i++){
            datapro.push(newpro);
        }
    }else{
    datapro.push(newpro);
}
}else{
    datapro[tmp] = newpro;
   
    submit.innerHTML="create";
    count.style.display="block";
}
    localStorage.setItem('product',JSON.stringify(datapro));
    cleardata()
    showdata()
}
function cleardata(){
 title.value = '';
 price.value = '';
 taxes.value = '';
 ads.value = '';
 discount.value = '';
 total.innerHTML = '';
 count.value = '';
 category.value = '';
 
}
function showdata(){
let table = '';
for(let i = 0; i<datapro.length;i++){
    table +=`<tr>
    <td>${i}</td>
    <td>${datapro[i].title}</td>
    <td>${datapro[i].price}</td>
    <td>${datapro[i].taxes}</td>
    <td>${datapro[i].ads}</td>
    <td>${datapro[i].discount}</td>
    <td>${datapro[i].total}</td>
    <td>${datapro[i].category}</td>
    
    <td><button onclick="updatedata(${i})">update</button></td>
    <td><button onclick="deletdata(${i})">delete</button></td>
    </tr>`;
}
document.getElementById("tbdy").innerHTML = table;
let btndelet=document.getElementById("deleteall");
if(datapro.length > 0){
    btndelet.innerHTML=`<button onclick="deleteall()">delete all(${datapro.length})</button>`;
    
}else{
    btndelet.innerHTML='';
}
}
showdata()
function deletdata(i){
    datapro.splice(i,1);
    localStorage.product = JSON.stringify(datapro);
    showdata();

}
function deleteall(){
    localStorage.clear();
    datapro.splice(0);
    showdata();
}
function updatedata(i){
title.value=datapro[i].title;
price.value=datapro[i].price;
taxes.value=datapro[i].taxes;
ads.value=datapro[i].ads;
discount.value=datapro[i].discount;
gettotal()
count.style.display="none";
category.value=datapro[i].category;
submit.innerHTML="update";
mood ='update';
tmp = i;
scroll({
    top:0,
    behavior:"smooth",
})
}
let searchmood ="title";
function getsearchmood(id){
    let search = document.getElementById("search");
    if(id == "searchtitle"){
        searchmood ="title";
        search.placeholder = "search by title";
    }else{
        searchmood ="category";
        search.placeholder = "search by category";
    }
    search.focus()
}
function searchdata(value){
    let table='';
    if(searchmood="title"){
for(let i=0; i<datapro.length;i++){
    if(datapro[i].title.includes(value.toLowerCase())){
        table +=`<tr>
        <td>${i}</td>
        <td>${datapro[i].title}</td>
        <td>${datapro[i].price}</td>
        <td>${datapro[i].taxes}</td>
        <td>${datapro[i].ads}</td>
        <td>${datapro[i].discount}</td>
        <td>${datapro[i].total}</td>
        <td>${datapro[i].category}</td>
        
        <td><button onclick="updatedata(${i})">update</button></td>
        <td><button onclick="deletdata(${i})">delete</button></td>
        </tr>`;
    
    }
}


    }else{
        for(let i=0; i<datapro.length;i++){
            if(datapro[i].category.includes(value.toLowerCase())){
                table +=`<tr>
                <td>${i}</td>
                <td>${datapro[i].title}</td>
                <td>${datapro[i].price}</td>
                <td>${datapro[i].taxes}</td>
                <td>${datapro[i].ads}</td>
                <td>${datapro[i].discount}</td>
                <td>${datapro[i].total}</td>
                <td>${datapro[i].category}</td>
                
                <td><button onclick="updatedata(${i})">update</button></td>
                <td><button onclick="deletdata(${i})">delete</button></td>
                </tr>`;
            
            }
        }

    }
    document.getElementById("tbdy").innerHTML = table;
}

