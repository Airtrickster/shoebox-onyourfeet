let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
}

let profileItem = document.querySelector('.profile-items-container');

document.querySelector('#profile-btn').onclick = () =>{
    profileItem.classList.toggle('active');
    navbar.classList.remove('active');
    inboxItem.classList.remove('active');
   // searchForm.classList.remove('active');
}

let inboxItem = document.querySelector('.inbox-items-container');
document.querySelector('#inbox-btn').onclick = () =>{
    inboxItem.classList.toggle('active');
    profileItem.classList.remove('active');
    navbar.classList.remove('active');
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




   