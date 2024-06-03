var menuIcon = document.getElementsByClassName("menuIcon")[0];

function displayNav() {
    var nav = document.getElementsByTagName("nav")[0];
    nav.classList.toggle('displayNav');
}

menuIcon.addEventListener("click", displayNav);

var MobileLogin = document.getElementById("mobileFormLogin");

function displayNav() {
    var nav = document.getElementsByTagName("nav")[0];
    nav.classList.toggle('displayNav');
}

MobileLogin.addEventListener("click", displayNav);

var MobileSignin = document.getElementById("mobileFormSignin");

function displayNav() {
    var nav = document.getElementsByTagName("nav")[0];
    nav.classList.toggle('displayNav');
}

MobileSignin.addEventListener("click", displayNav);

var MobileRandomArticle = document.getElementById("swichMobileForm");
function displayNav() {
    var nav = document.getElementsByTagName("nav")[0];
    nav.classList.toggle('displayNav');
}

MobileRandomArticle.addEventListener("click", displayNav);

// var MobileSearchForm = document.getElementById("mobileSearchForm");

function getSearchForm() {
    var form = document.getElementsByClassName("form")[0];
    form.classList.toggle('displaySearch');
}

// MobileSearchForm.addEventListener("click", getSearchForm);
