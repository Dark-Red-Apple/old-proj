/**
 * Created by Alma on 7/12/2016.
 */
var maxZindex=4;
function changeZindex( clicked ){

    document.getElementById(clicked).style.zIndex=maxZindex +1;
    maxZindex=maxZindex+1;
}
