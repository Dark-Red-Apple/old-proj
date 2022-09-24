/**
 * Created by Alma on 3/15/2017.
 */
var checkedStage=1;
var currentStage='stage1';
function showStage(selectedStage, stagecontent) {
    // var i=0;
    reset();
    // sessionStorage.setItem('stage', selectedStage);
    // sessionStorage.setItem('stageCont', stagecontent);
    document.getElementById(stagecontent).opacity = "1";
    document.getElementById(stagecontent).className = "stage-enabled";
    history.pushState({stageCont: stagecontent}, "", "?stage=" + stagecontent);
    document.getElementById(selectedStage).style.borderColor = "#A4FCCA";
    document.getElementById(selectedStage).style.color = "black";
    currentStage=stagecontent;
}
function reset() {
    for (i = 0; i < 3; i++) {
        document.getElementById('stage' + (1 + i)).opacity = ".15";
        document.getElementById('stage' + (1 + i)).className = "stage-disabled";
        document.getElementById('stage').children[i].style.borderColor = " #b1b1b1";
        document.getElementById('stage').children[i].style.color = " #b1b1b1";
    }
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

function changeAddressEntry(display) {
    document.getElementById('new-info').style.display = display;
}
function stage1Checker(isGuest) {

    if (isGuest == 0 && document.getElementById('address_choices').value != 'new') {
        flag = true;
    }
    else var flag = formCheckerOne();
    if (flag==false){
        showStage('select-stage-1', 'stage1');
        document.getElementById('select-stage-1').style.color = "red";
    }
    else{
        resetError();
        showStage('select-stage-2', 'stage2');
        checkedStage = 2;
    }
}

function stage2Checker(isGuest, user) {

    if (currentStage=='stage1') {
        stage1Checker(isGuest);
    }
    else if (!formCheckerTwo()) {
        showStage('select-stage-2', 'stage2');
        document.getElementById('select-stage-2').style.color = "red";
    }
    else {
        stage3Compose(user);
        showStage('select-stage-3', 'stage3');
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
function stage3Compose(user) {

    if (document.getElementById('shipping-method1').checked) {
        var shippingMethod = document.getElementById('shipping-method1').value;
    }
    else {
        // alert('aa');
        var shippingMethod = document.getElementById('shipping-method2').value;
    }
    if (document.getElementById('payment-method1').checked) {
        var paymentMethod = document.getElementById('payment-method1').value;
    }
    else {
        var paymentMethod = document.getElementById('payment-method2').value;
    }
    var total = invoiceTotalPayment(shippingMethod, user);
    // document.getElementById('review-sum').innerHTML=total;
}