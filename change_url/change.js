
function change(pageNumber) {
    pageNumber=parseInt(pageNumber)+1;
    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            // state= document.getElementById("click").innerHTML;
            // var stateObj = { foo: "bar" };
            document.getElementById('click').innerHTML = xhttp.responseText;
            history.pushState( {page:pageNumber}, "", "page"+pageNumber);

        }
        else {
            // document.getElementById('loading-div').style.backgroundImage="url('../template/template1/image/loading1.gif')";
            // document.getElementById('loading-div').style.backgroundColor='#666';
            // document.getElementById('loading-div').style.zIndex='1000000000';
        }
    };
    // xhttp.open("GET", "user/load_product.php", true);
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xhttp.send("pageNumber=" + pageNumber + "&category=" + category + "&filters=" + filters);
    xhttp.open("GET",  "target.php?pageNumber=" + pageNumber);
    xhttp.send();

}
// function processAjaxData(response, urlPath){
//     document.getElementById("content").innerHTML = response.html;
//     document.title = response.pageTitle;
//     window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
// }
//
    window.onpopstate = function(event){
        if(event.state){
            document.getElementById("click").innerHTML = event.state.page;
            document.title = event.state.pageTitle;
        }
    };