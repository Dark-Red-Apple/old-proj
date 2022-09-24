var pageUrl = window.location.href;
// var pageUrl='http://localhost/almaprojects/shopping_card_alma2/cat/32?message=1&close=2';
var strippedUrl = removeURLParameter(pageUrl, 'message');
// alert(strippedUrl);
// var strippedUrl= strippedUrl;
window.onload = function () {
    history.pushState({}, "", strippedUrl);
};

function removeURLParameter(url, parameter) {
    //prefer to use l.search if you have a location/link object
    var urlparts = url.split('?');
    //alert(urlparts);//for the example the result is: http://localhost/almaprojects/shopping_card_alma2/cat/32,message=1&close=2
    if (urlparts.length >= 2) {

        var prefix = encodeURIComponent(parameter) + '=';
        //alert(prefix);//for the example the result is: message=
        var pars = urlparts[1].split(/[&;]/g);
        //alert(pars);//for the example the result is an array holding: message=1,close=2

        //reverse iteration as may be destructive
        //this will find the prefix:message= in array message=1,close=2 and remove that item
        for (var i = pars.length; i-- > 0;) {
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {//lastIndexOf returns the position of value if exist (if not returns -1)
                // string.lastIndexOf(searchvalue, start)
                //searchvalue	Required. The string to search for
                //start	Optional. The position where to start the search (searching backwards). If omitted, the default value is the length of the string

                pars.splice(i, 1);// array.splice(index, howmany, item1, ....., itemX)
                // index	Required. An integer that specifies at what position to add/remove items, Use negative values to specify the position from the end of the array
                // howmany	Optional. The number of items to be removed. If set to 0, no items will be removed
                //item1, ..., itemX	Optional. The new item(s) to be added to the array
            }
        }

        url = urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : "");
        return url;
    } else {
        return url;
    }
}