let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active'); 
}

let searchForm = document.querySelector('.search-form');

// Code removed due to an error since search function is removed
//document.querySelector('#search-btn').onclick = () =>{
//    searchForm.classList.toggle('active');
//    navbar.classList.remove('active');
//    cartItem.classList.remove('active');
//}

let cartItem = document.querySelector('.cart-items-container');
document.querySelector('#cart-btn').onclick = () =>{
    cartItem.classList.toggle('active');
    profileItem.classList.remove('active');
    favItem.classList.remove('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

let favItem = document.querySelector('.fav-items-container');

document.querySelector('#fav-btn').onclick = () =>{
    favItem.classList.toggle('active');
    profileItem.classList.remove('active');
    cartItem.classList.remove('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

let profileItem = document.querySelector('.profile-items-container');

document.querySelector('#profile-btn').onclick = () =>{
    profileItem.classList.toggle('active');
    favItem.classList.remove('active');
    cartItem.classList.remove('active');
    navbar.classList.remove('active');
   // searchForm.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    //searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

const headerEl = document.querySelector('.header');

window.addEventListener('scroll', ( )=> {
    if(window.scrollY > 50){
        headerEl.classList.add('header-scrolled');
    } else if(window.scrollY <= 50){
        headerEl.classList.remove('header-scrolled');
    }
})

$("#show").click(function () {
  $("#hide").show("slow", function () {});
});

$("#hider").click(function () {
  $("#hide").hide("slow", function () {});
});




   