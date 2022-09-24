/**
 * Created by Alma on 6/17/2017.
 */
/**
 * Created by student on 12/6/2015.
 */

var i1;
var t1;
var t2;
var t3;
var t4;
var d=document;
var sliderMain=d.getElementById('slider-main');
var currentSlide=d.getElementById('slider-main').children[0];
var previousSlide;
var length=d.getElementById('slider-main').children.length;
var lastChild=d.getElementById('slider-main').lastElementChild;
var firstChild=d.getElementById('slider-main').firstElementChild;
// if(i1!=null)  clearInterval(i1);
// if(t1!=null)  clearTimeout(t1);

sliderMain.addEventListener("mouseover", function(){
    pauseImage();
});
sliderMain.addEventListener("mouseout", function(){
    play();
});
window.setTimeout(infoFall,100);
window.document.addEventListener("load",function () {
    setTimeout(infoFall,100);
});
window.document.addEventListener("load",play());
// window.document.addEventListener("load",infoFall(),true);
function play(){
    t1=setTimeout(function () {
        forward();

    }, 1000);//first slide is slower because of transition times

}
function forward(){
    // animate();
    // reset();
    previousSlide=currentSlide;
    currentSlide=currentSlide.nextElementSibling;
    if(currentSlide==null) currentSlide=firstChild;

    currentSlide.className = currentSlide.className.replace( /(?:^|\s)make-hidden(?!\S)/g , '' );
    currentSlide.className = currentSlide.className+" make-visible";

    currentSlide.className = currentSlide.className.replace( /(?:^|\s)prev-slide-move(?!\S)/g , '' );
    currentSlide.className = currentSlide.className+" current-slide-move";

    previousSlide.className = previousSlide.className.replace( /(?:^|\s)current-slide-move(?!\S)/g , '' );
    previousSlide.className = previousSlide.className+" prev-slide-move";

    previousSlide.className = previousSlide.className.replace( /(?:^|\s)make-visible{(?!\S)/g , '' );
    previousSlide.className = previousSlide.className+" make-hidden";
    i1=setTimeout(forward,1000);
}

// function animate(){
//     currentSlide.style.right="100%";
//     t3=setTimeout(infoFall, 1000);
// }
// function reset(){
//     if(currentSlide.previousElementSibling==null) previousSlide=lastChild;
//     else previousSlide=currentSlide.previousElementSibling;
//     previousSlide.style.visibility="hidden";
//     previousSlide.style.right="-100%";
//     }
// function infoFall(){
//     // currentSlide;
//     // if(currentSlide==null) currentSlide=firstChild;
//     var currentSlideSpans=currentSlide.getElementsByTagName('span');
//     // alert(currentSlideSpans);
//     for(var i=0;i<currentSlideSpans.length;i++){
//         currentSlideSpans[i].style.bottom="50%";
//     }
// }
// function infoReset(){
//     if(currentSlide.previousElementSibling==null) previousSlide=lastChild;
//     else previousSlide=currentSlide.previousElementSibling;
//     var preSlideSpans=previousSlide.getElementsByTagName('span');
//     for(var i=0;i<preSlideSpans.length;i++){
//         preSlideSpans[i].style.bottom="100%";
//     }
// }
// function previousButton(){
//     clearInterval(i1);
//     if(currentSlide.previousElementSibling==null) previousSlide=lastChild;
//     else previousSlide=currentSlide.previousElementSibling;
//     if(slideNumber<=0) slideNumber=4;
//     slideId="slide"+slideNumber;
//     zIndexReset();
//     opacityReset();
//     setColor();
//     document.getElementById(slideId+"thumbNail").style.opacity=1;
//     document.getElementById(slideId+"thumbNail").style.backgroundColor="rgba(230,230,230,1)";
//     document.getElementById(slideId+"thumbNail").style.color="black";
//     document.getElementById(slideId).style.opacity=1;
//     document.getElementById(slideId).style.zIndex=1;
//     play();
// }
//
// function nextButton(){
//     clearInterval(i1);
//     forward();
//     play();
// }

function pauseImage(){
    clearInterval(i1);
    clearTimeout(t1);
    clearTimeout(t2);
    clearTimeout(t3);

}
function StopPause(){
    play();
}
