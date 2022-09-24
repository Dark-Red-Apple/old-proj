// el.addEventListener("click", function(){modifyText("four")}, false);
var navNotOpen=true;
function showSubmenu(){
    if(navNotOpen) {
        document.getElementsByClassName("nav-button")[0].style.WebkitAnimationName = "spinner";
        document.getElementsByClassName("nav-button")[0].style.animationName = "spinner";
        document.getElementsByClassName("nav-button")[0].style.animationName = "spinner";
        document.getElementsByClassName("menuli1")[0].style.right ="0";
        document.getElementsByClassName("menuli2")[0].style.right ="0";
        document.getElementsByClassName("menuli3")[0].style.right ="0";
        document.getElementsByClassName("menu-word")[0].innerHTML ="menu";
        document.getElementsByClassName("nav-container")[0].style.width ="650px";
        document.getElementsByClassName("nav-button")[0].style.right ="625px";
        document.getElementsByClassName("menu-word")[0].innerHTML ="close";
        navNotOpen=false;
    }
    else{

        document.getElementsByClassName("nav-button")[0].style.WebkitAnimationName = "spinner-reverse";
        document.getElementsByClassName("nav-button")[0].style.animationName = "spinner-reverse";
        document.getElementsByClassName("nav-button")[0].style.animationName = "spinner-reverse";
        document.getElementsByClassName("menuli1")[0].style.right ="-100px";
        document.getElementsByClassName("menuli2")[0].style.right ="-150px";
        document.getElementsByClassName("menuli3")[0].style.right ="-200px";
        document.getElementsByClassName("menu-word")[0].innerHTML ="menu";
        document.getElementsByClassName("nav-container")[0].style.width ="70px";
        document.getElementsByClassName("nav-button")[0].style.right ="45px";
        document.getElementsByClassName("menu-word")[0].innerHTML ="menu";
        navNotOpen=true;
    }
}

