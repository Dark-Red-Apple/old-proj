/**
 * Created by Alma on 10/17/2016.
 */

function showTab(number,selectedList) {
    // var i=0;
	reset();
    selectedList.children[0].style.transform="scale(1)";
    document.getElementById("item-cont-"+number).style.opacity="1";
    document.getElementById("item-cont-"+number).style.zIndex="1";
    selectedList.children[1].style.borderBottom="2px solid black";

}
function reset() {
    for (i=0;i<3;i++) {
        document.getElementById('tabs-list-main').children[0].children[i].children[0].style.transform = "scale(0)";
        document.getElementById("item-cont-"+(i+1)).style.opacity="0";
        document.getElementById("item-cont-"+(i+1)).style.zIndex="0";
        document.getElementById('tabs-list-main').children[0].children[i].children[1].style.borderBottom="none";
    }
	
}