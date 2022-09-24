// function login() {
//     var user=document.getElementById('user').value;
//     var pass=getElementById('pass').value;
//     if (window.XMLHttpRequest) {
//         xhttp = new XMLHttpRequest();
//     } else {
//         // code for IE6, IE5
//         xhttp = new ActiveXObject("Microsoft.XMLHTTP");
//     }
//
//     xhttp.onreadystatechange = function () {
//         if (xhttp.readyState == 4 && xhttp.status == 200) {
//             document.getElementById('login-err').innerHTML = xhttp.responseText;
//         }
//         else {
//             // document.getElementById('loading-div').style.backgroundImage="url('../template/template1/image/loading1.gif')";
//             // document.getElementById('loading-div').style.backgroundColor='#666';
//             // document.getElementById('loading-div').style.zIndex='1000000000';
//         }
//     };
//     xhttp.open("POST", "/almaprojects/shopping_card_alma2/user/login.php", true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     if (document.loginForm.remember[0].checked) {
//         xhttp.send("function=login"+"user=" + user + "&pass=" + pass);
//     }
//     else {
//         var remmeber=document.loginForm.remember[0].value;
//         xhttp.send("function=login"+"user=" + user + "&pass=" + pass + "&remmember" + remmeber);
//     }
// }
function addCart(count, pid, customer, div) {

    if (window.XMLHttpRequest) {
        xhttp1 = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp1.onreadystatechange = function () {
        if (xhttp1.readyState == 4 && xhttp1.status == 200) {
            document.getElementById(div).innerHTML = xhttp1.responseText;
        }
        else {
            // document.getElementById('loading-div').style.backgroundImage="url('../template/template1/image/loading1.gif')";
            // document.getElementById('loading-div').style.backgroundColor='#666';
            // document.getElementById('loading-div').style.zIndex='1000000000';
        }
    };
    xhttp1.open("POST", "/almaprojects/shopping_card_alma2/user/basket_functions.php", true);
    xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp1.send("function=addToBasket" + "&quantity=" + count + "&product_id=" + pid + "&customer_id=" + customer);
}

function loadProducts(pageNumber, category, filters) {

    if (window.XMLHttpRequest) {
        xhttp2 = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp2.onreadystatechange = function () {
        if (xhttp2.readyState == 4 && xhttp2.status == 200) {
            document.getElementById('products-main').innerHTML = xhttp2.responseText;
            history.pushState({page: xhttp2.responseText}, "", "?page_number=" + pageNumber);
        }
        else {
        }
    };
    xhttp2.open("GET", "/almaprojects/shopping_card_alma2/user/load_product.php?pageNumber=" + pageNumber + "&category=" + category + "&filters=" + filters, true);
    xhttp2.send();

}
function deleteItems(customer,order,div) {

    if (window.XMLHttpRequest) {
        xhttp3 = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp3.onreadystatechange = function () {
        if (xhttp3.readyState == 4 && xhttp3.status == 200) {
            // alert(xhttp3.responseText);
            if(xhttp3.responseText<=0){
                location.reload();
            }
            stage3Compose(customer);
            showBasketItems(customer,div);
            document.getElementById('basket-item-numbers').innerHTML = "";
            document.getElementById('basket-item-numbers').innerHTML = xhttp3.responseText;
        }
        else {
        }
    };
    xhttp3.open("POST", "/almaprojects/shopping_card_alma2/user/basket_functions.php", true);
    xhttp3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp3.send("function=deleteItems" +"&order_id="+ order);
}
function showBasketItems(customer,div) {

    if (window.XMLHttpRequest) {
        xhttp4 = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp4 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp4.onreadystatechange = function () {
        if (xhttp4.readyState == 4 && xhttp4.status == 200) {
            // document.getElementById(div).innerHTML = "";
            document.getElementById(div).innerHTML = xhttp4.responseText;
            return('ok');
        }
        else {
        }
    };
    xhttp4.open("POST", "/almaprojects/shopping_card_alma2/user/basket_items.php", true);
    xhttp4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp4.send("customer_id=" + customer);
}
function searchProductsLoad(pageNumber, searchItem, filters) {

    if (window.XMLHttpRequest) {
        xhttp5 = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp5 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp5.onreadystatechange = function () {
        if (xhttp5.readyState == 4 && xhttp5.status == 200) {
            document.getElementById('products-main').innerHTML = xhttp5.responseText;
            history.pushState({page: xhttp.responseText}, "", "?page_number=" + pageNumber + "&search_item=" + searchItem);
        }
        else {
        }
    };
    xhttp5.open("GET", "/almaprojects/shopping_card_alma2/user/search_load_product.php?pageNumber=" + pageNumber + "&search_item=" + searchItem + "&filters=" + filters, true);
    xhttp5.send();

}
function invoiceTotalPayment(shippingMethod, customer) {

    if (window.XMLHttpRequest) {
        xhttp6 = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp6 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp6.onreadystatechange = function () {
        if (xhttp6.readyState == 4 && xhttp6.status == 200) {
            document.getElementById('complete').innerHTML = xhttp6.responseText;
            return;
        }
        else {
            // document.getElementById('loading-div').style.backgroundImage="url('../template/template1/image/loading1.gif')";
            // document.getElementById('loading-div').style.backgroundColor='#666';
            // document.getElementById('loading-div').style.zIndex='1000000000';
        }
    };
    xhttp6.open("POST", "/almaprojects/shopping_card_alma2/user/invoice_total_payment.php", true);
    xhttp6.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp6.send("shipping_method=" + shippingMethod + "&customer_id=" + customer);
}
function changeQuantity(count, pid, customer, div) {

    if (window.XMLHttpRequest) {
        xhttp7 = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp7 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp7.onreadystatechange = function () {
        if (xhttp7.readyState == 4 && xhttp7.status == 200) {
            if (div != null) {
                document.getElementById(div).children[4].innerHTML = count * (document.getElementById(div).children[2].innerHTML);
            }
        }
        else {
            // document.getElementById('loading-div').style.backgroundImage="url('../template/template1/image/loading1.gif')";
            // document.getElementById('loading-div').style.backgroundColor='#666';
            // document.getElementById('loading-div').style.zIndex='1000000000';
        }
    };
    xhttp7.open("POST", "/almaprojects/shopping_card_alma2/user/basket_functions.php", true);
    xhttp7.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp7.send("function=changeQuantity" + "&quantity=" + count + "&product_id=" + pid + "&customer_id=" + customer);

}
window.onpopstate = function (event) {
    if (event.state) {
        document.getElementById("products-main").innerHTML = event.state.page;
    }
};



function valueReturen() {

}
