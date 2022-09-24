/**
 * Created by Alma on 10/17/2016.
 */

function showTab(number, selectedList) {
    // var i=0;
    reset();
    selectedList.children[0].style.transform = "scale(1)";
    document.getElementById("item-cont-main-" + number).style.opacity = "1";
    document.getElementById("item-cont-main-" + number).style.zIndex = "1";
    document.getElementById("item-cont-main-" + number).style.display = "block";
    document.getElementById("item-cont-main-" + number).style.position = "relative";
    if (document.getElementById("item-cont-" + number))document.getElementById("item-cont-" + number).style.zIndex = "1";
    selectedList.children[1].style.borderBottom = "2px solid black";
}
function reset() {
    for (i = 0; i < 3; i++) {
        document.getElementById('tabs-list-main').children[0].children[i].children[0].style.transform = "scale(0)";
        document.getElementById("item-cont-main-" + (i + 1)).style.opacity = "0";
        document.getElementById("item-cont-main-" + (i + 1)).style.position = "absolute";
        document.getElementById("item-cont-main-" + (i + 1)).style.display = "none";
        document.getElementById("item-cont-main-" + (i + 1)).style.zIndex = "0";
        if (document.getElementById("item-cont-" + (i + 1)))document.getElementById("item-cont-" + (i + 1)).style.zIndex = "1";
        document.getElementById('tabs-list-main').children[0].children[i].children[1].style.borderBottom = "none";
    }
}

function moveLeft(element) {
    var finalPosition = -250 + parseInt(document.getElementById(element).style.right);
    var currentPosition = parseInt(document.getElementById(element).style.right);
    // alert(finalPosition);
    if (currentPosition <= 0 && currentPosition > -500) {
        document.getElementById(element).style.right = finalPosition + "px";
    }
}
function moveRight(element) {
    var finalPosition = 250 + parseInt(document.getElementById(element).style.right);
    var currentPosition = parseInt(document.getElementById(element).style.right);
    // alert(finalPosition);
    if (currentPosition < 0) {
        document.getElementById(element).style.right = finalPosition + "px";
    }
}