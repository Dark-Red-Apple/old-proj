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
function addCart(count, pid, user, div) {

    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById(div).innerHTML = xhttp.responseText;
        }
        else {
            // document.getElementById('loading-div').style.backgroundImage="url('../template/template1/image/loading1.gif')";
            // document.getElementById('loading-div').style.backgroundColor='#666';
            // document.getElementById('loading-div').style.zIndex='1000000000';
        }
    };
    xhttp.open("POST", "/almaprojects/shopping_card_alma2/user/basket_functions.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("function=addToBasket" + "&quantity=" + count + "&product_id=" + pid + "&customer_id=" + user);
}

function loadProducts(pageNumber, category, filters) {

    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('products-main').innerHTML = xhttp.responseText;
            history.pushState({page: xhttp.responseText}, "", "?page_number=" + pageNumber);
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
    xhttp.open("GET", "/almaprojects/shopping_card_alma2/user/load_product.php?pageNumber=" + pageNumber + "&category=" + category + "&filters=" + filters, true);
    xhttp.send();

}
function searchProductsLoad(pageNumber, searchItem, filters) {

    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('products-main').innerHTML = xhttp.responseText;
            history.pushState({page: xhttp.responseText}, "", "?page_number=" + pageNumber + "&search_item=" + searchItem);
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
    xhttp.open("GET", "/almaprojects/shopping_card_alma2/user/search_load_product.php?pageNumber=" + pageNumber + "&search_item=" + searchItem + "&filters=" + filters, true);
    xhttp.send();

}
function changeQuantity(count, pid, user, div) {

    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
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
    xhttp.open("POST", "/almaprojects/shopping_card_alma2/user/basket_functions.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("function=changeQuantity" + "&quantity=" + count + "&product_id=" + pid + "&customer_id=" + user);

}
window.onpopstate = function (event) {
    if (event.state) {
        document.getElementById("products-main").innerHTML = event.state.page;
    }
};

function invoiceTotalPayment(shippingMethod, user) {

    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('review-sum').innerHTML = xhttp.responseText;
        }
        else {
            // document.getElementById('loading-div').style.backgroundImage="url('../template/template1/image/loading1.gif')";
            // document.getElementById('loading-div').style.backgroundColor='#666';
            // document.getElementById('loading-div').style.zIndex='1000000000';
        }
    };
    xhttp.open("POST", "/almaprojects/shopping_card_alma2/user/invoice_total_payment.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("shipping_method=" + shippingMethod + "&customer_id=" + user);
}

function valueReturen() {

}
