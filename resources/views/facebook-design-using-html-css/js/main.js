/* ------------------------------------sticky header-------------------------- */
const header = document.querySelector('.header-2');

window.onscroll = ()=>{
   if(window.pageYOffset > 110){
       header.classList.add('sticky')
   }
   else{
       header.classList.remove('sticky')
   }
   inputForm.classList.remove('active')
}
/* --------------------------------search box-------------------------- */
const search = document.querySelector('#search-box');
const inputGroup = document.querySelector('.input-group');
/* 
search.onclick = ()=>{
    inputGroup.classList.toggle('active')
} */