/**
 * Created by student on 12/6/2015.
 */
var i1;
var slideNumber=1;
//var slidermouseOver=document.getElementById("slide1");
window.document.addEventListener("load", play());
//slidermouseOver.addEventListener("mouseover", pauseImage());
//document.getElementById(slider).addEventListener("onmouseout", StopPause());
function play(){
    i1=setInterval(forward, 3000);
}

function forward(){
    slideNumber++;
    if(slideNumber>=5) slideNumber=1;
    slideId="slide"+slideNumber;
    zIndexReset();
    opacityReset();
    setColor();
    document.getElementById(slideId+"thumbNail").style.opacity=1;
    document.getElementById(slideId+"thumbNail").style.backgroundColor="rgba(230,230,230,1)";
    document.getElementById(slideId+"thumbNail").style.color="#973d2b";
    document.getElementById(slideId).style.opacity=1;
    document.getElementById(slideId).style.zIndex=1;

}

function opacityReset(){
    for(n=1;n<=4;n++){
        var slideName="slide"+n;
        document.getElementById(slideName).style.opacity=0;
    }
}

function setColor(){

    for(n=1;n<=4;n++){
        var slideName="slide"+n;
        document.getElementById(slideName+"thumbNail").style.backgroundColor="rgba(151,61,43,0.9)";
	document.getElementById(slideName+"thumbNail").style.color="white";
    }
}
function zIndexReset(){

    for(n=1;n<=4;n++){
        var slideName="slide"+n;
        document.getElementById(slideName).style.zIndex=0;
    }
}
function selectThumbNail(SelectedDivId){
        clearInterval(i1);
	var selectedDivNumber=SelectedDivId.replace('slide', '');;
	selectedDivNumber=selectedDivNumber.replace('thumbNail', '');
	slideNumber=selectedDivNumber-1;
	forward();
}
function thumbNailOut(){
play();
}
function previousButton(){
    clearInterval(i1);
    slideNumber--;
    if(slideNumber<=0) slideNumber=4;
    slideId="slide"+slideNumber;
    zIndexReset();
    opacityReset();
    setColor();
    document.getElementById(slideId+"thumbNail").style.opacity=1;
    document.getElementById(slideId+"thumbNail").style.backgroundColor="rgba(230,230,230,1)";
    document.getElementById(slideId+"thumbNail").style.color="black";
    document.getElementById(slideId).style.opacity=1;
    document.getElementById(slideId).style.zIndex=1;
    play();	
}

function nextButton(){
    clearInterval(i1);
    forward();
    play();
}
function pauseImage(){
    clearInterval(i1);
}
function StopPause(){
    play();
}