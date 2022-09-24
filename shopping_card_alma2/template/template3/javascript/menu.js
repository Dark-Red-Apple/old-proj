var isFixed = false;//a flag to keep the state and prevent executing unnecessary codes. i.e what is inside the ifs.
var isResized = false;//a flag to keep the state of resize and prevent executing unnecessary codes. i.e what is inside the ifs.
var navMain = document.getElementById("nav-logo-main");
var nav = document.getElementById("nav");
var logo = document.getElementById("logo");
var menuIcons = document.getElementById("menu-icons");
var offTop = document.getElementById("nav-logo-main").offsetTop;
var offBottom = offTop + document.getElementById("nav-logo-main").offsetHeight;
// window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0 it gives some
document.onscroll = function() {
    if (window.pageYOffset > offTop && !isFixed) {

        navMain.style.position = 'fixed';
        navMain.style.top = '0';
        navMain.style.left = '0';
        navMain.style.right = '0';
        // navMain.children[0].style.height="100px";
        isFixed = true;
    }
   if (window.pageYOffset > offBottom && !isResized ) {
        navMain.style.height = "60px";
        navMain.style.width = 'auto';
        navMain.children[0].style.height = "60px";
        nav.style.marginTop = "0px";
        logo.style.marginTop = "5px";
        logo.style.width = "100px";
        logo.style.height = "50px";
        menuIcons.style.marginTop = "0px";
        menuIcons.style.marginLeft = "40px";
        isResized = true;
    }
    if (window.pageYOffset < offBottom && isResized ) {
        navMain.children[0].style.height="120px";
        navMain.style.height="120px";
        nav.style.marginTop="30px";
        logo.style.width="100px";
        logo.style.height="70px";
        logo.style.marginTop="25px";
        menuIcons.style.marginTop="30px";
        menuIcons.style.marginLeft="40px";
        isResized = false;
    }
    else if (window.pageYOffset <= offTop && isFixed)
    {
        navMain.children[0].style.height="120px";
        navMain.style.height="120px";
        navMain.style.position='relative';
        nav.style.marginTop="30px";
        logo.style.width="100px";
        logo.style.height="70px";
        logo.style.marginTop="25px";
        menuIcons.style.marginTop="30px";
        menuIcons.style.marginLeft="40px";
        isFixed = false;
        isResized = false;
    }
}