function addCart(count, id, user, div, row) {

    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById(div).innerHTML = xhttp.responseText;
            if (row!=null) {
                document.getElementById(row).children[4].innerHTML = count * (document.getElementById(row).children[2].innerHTML);
            }
        }
        else{
            // document.getElementById('loading-div').style.backgroundImage="url('../template/template1/image/loading1.gif')";
            // document.getElementById('loading-div').style.backgroundColor='#666';
            // document.getElementById('loading-div').style.zIndex='1000000000';
        }
    };
    xhttp.open("POST", "add_to_basket.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("order_count="+count+"&product_id="+id+"&customer_id="+user);

}