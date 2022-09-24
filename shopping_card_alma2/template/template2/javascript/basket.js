/**
 * Created by Alma on 3/15/2017.
 */

function showStage(selectedStage, stagecontent) {
    // var i=0;
    reset();
    // sessionStorage.setItem('stage', selectedStage);
    // sessionStorage.setItem('stageCont', stagecontent);
    document.getElementById('stage1').style.width = "400px";
    history.pushState({stageCont: stagecontent}, "", "?stage=" + stagecontent);
    document.getElementById(stagecontent).style.opacity = "1";
    document.getElementById(stagecontent).style.position = "relative";
    document.getElementById(stagecontent).style.zIndex = "1";
    document.getElementById(selectedStage).style.borderColor = "#A4FCCA";
    document.getElementById(selectedStage).style.color = "black";
    document.getElementById(selectedStage).style.borderColor = "#A4FCCA";
    document.getElementById(selectedStage).style.color = "black";
}
function reset() {
    for (i = 1; i < 4; i++) {
        document.getElementById('stage' + (1 + i)).style.opacity = "0";
        document.getElementById('stage' + (1 + i)).style.position = "absolute";
        document.getElementById('stage' + (1 + i)).style.zIndex = "0";
        document.getElementById('stage').children[i].style.borderColor = " #b1b1b1";
        document.getElementById('stage').children[i].style.color = " #b1b1b1";
    }
    document.getElementById('stage').children[0].style.borderColor = " #b1b1b1";
    document.getElementById('stage').children[0].style.color = " #b1b1b1";
}
window.onpopstate = function (event) {
    if (event.state) {
        showStage(event.state.stage, event.state.stageCont);
    }
};
// window.onpopstate = function (event) {
//     var stage=sessionStorage.getItem('stage');
//     var stageCont=sessionStorage.getItem('stageCont');
//     showStage(stage,stageCont);
// };
function stage1() {
    reset();
    document.getElementById('stage1').style.width = "900px";
    document.getElementById('select-stage-1').style.color = "black";
    document.getElementById('select-stage-1').style.borderColor = "#A4FCCA";
}
function changeAddressEntry(display) {
    document.getElementById('new-address-form').style.display = display;
}
function stage2Checker(isGuest) {

    if (isGuest == 0 && document.getElementById('address-choices').value != 'new') {
        flag = true;
    }
    else var flag = formCheckerOne();

    if (flag == true) {
        resetError();
        showStage('select-stage-3', 'stage3');
    }
    else {
        showStage('select-stage-2', 'stage2');
        document.getElementById('select-stage-2').style.color = "red";
    }
    return (flag);
}

function stage3Checker(isGuest, user) {

    if (!stage2Checker(isGuest)) {
        showStage('select-stage-2', 'stage2');
        document.getElementById('select-stage-2').style.color = "red";
    }
    else if (!formCheckerTwo()) {
        showStage('select-stage-3', 'stage3');
        document.getElementById('select-stage-3').style.color = "red";
    }
    else {
        stage4Compose(user);
        showStage('select-stage-4', 'stage4');
    }
}

function formCheckerOne() {
    var flag = true;
    if (document.getElementById('customer_email')) var customerEmail = document.getElementById('customer_email').value;
    var customerTitle = document.getElementById('customer_title').value;
    var customerFamily = document.getElementById('customer_family').value;
    var customerAddress = document.getElementById('customer_address').value;
    var customerTel = document.getElementById('customer_tel').value;
    var customerPostalCode = document.getElementById('customer_postal_code').value;
    if (typeof customerEmail !== 'undefined' && customerEmail == "") {
        document.getElementById('customer_email_err').innerHTML = "<p style='color:red';>*لطفا این قسمت را پر نمایید.</p>";
        flag = false;
    }
    if (customerTitle == "") {
        document.getElementById('customer_title_err').innerHTML = "<p style='color:red';>*لطفا این قسمت را پر نمایید.</p>";
        flag = false;
    }
    if (customerFamily == "") {
        document.getElementById('customer_family_err').innerHTML = "<p style='color:red';>*لطفا این قسمت را پر نمایید.</p>";
        flag = false;
    }
    if (customerAddress == "") {
        document.getElementById('customer_address_err').innerHTML = "<p style='color:red';>*لطفا این قسمت را پر نمایید.</p>";
        flag = false;
    }
    if (customerTel == "") {
        document.getElementById('customer_tel_err').innerHTML = "<p style='color:red';>*لطفا این قسمت را پر نمایید.</p>";
        flag = false;
    }
    if (customerPostalCode == "") {
        document.getElementById('customer_postal_code_err').innerHTML = "<p style='color:red';>*لطفا این قسمت را پر نمایید.</p>";
        flag = false;
    }
    return (flag);
}
function resetError() {
    if (document.getElementById('customer_email'))document.getElementById('customer_email_err').innerHTML = "";
    document.getElementById('customer_title_err').innerHTML = "";
    document.getElementById('customer_family_err').innerHTML = "";
    document.getElementById('customer_address_err').innerHTML = "";
    document.getElementById('customer_tel_err').innerHTML = "";
    document.getElementById('customer_postal_code_err').innerHTML = "";
}

function formCheckerTwo() {
    var flag = true;
    return (flag);
}
function stage4Compose(user) {
    document.getElementById('review-address').innerHTML = document.getElementById('customer_title').value + '-'
        + document.getElementById('customer_family').value + '-';
    if (document.getElementById('address-choices') && document.getElementById('address-choices').value == 'new')
        document.getElementById('review-address').innerHTML = document.getElementById('review-address').innerHTML
            + document.getElementById('customer_address').value + '-'
            + document.getElementById('customer_tel').value + '-'
            + document.getElementById('customer_postal_code').value;
    else document.getElementById('review-address').innerHTML = document.getElementById('review-address').innerHTML
        + document.getElementById('address-choices').value;

    if (document.getElementById('shipping-method1').checked) {
        alert('aa');
        var shippingMethod = document.getElementById('shipping-method1').value;
        var shipping = document.getElementById('shipping-method1').getElementsByTagName('label').innerHTML;
    }
    else {
        // alert('aa');
        shippingMethod = document.getElementById('shipping-method2').value;
        var shipping = document.getElementById('shipping-method2').getElementsByTagName('label').innerHTML;
    }

    if (document.getElementById('payment-method1').checked) {
        var paymentMethod = document.getElementById('payment-method1').value;
        var payment = document.getElementById('payment-method1').getElementsByTagName('label').innerHTML
    }
    else {
        paymentMethod = document.getElementById('payment-method2').value;
        var payment = document.getElementById('payment-method2').getElementsByTagName('label').innerHTML
    }
    var total = invoiceTotalPayment(shippingMethod, user);
    // document.getElementById('review-sum').innerHTML=total;
}