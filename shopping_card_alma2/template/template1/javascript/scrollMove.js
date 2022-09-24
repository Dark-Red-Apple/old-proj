
//    function smoothScroll(eID) {
//        var startY = currentYPosition();
//        var stopY = elmYPosition(eID);
//        var distance = stopY > startY ? stopY - startY : startY - stopY;
//        if (distance < 100) {
//            scrollTo(0, stopY); return;
//        }
//        var speed = Math.round(distance / 100);
//        if (speed >= 20) speed = 20;
//        var step = Math.round(distance / 25);
//        var leapY = stopY > startY ? startY + step : startY - step;
//        var timer = 0;
//        if (stopY > startY) {
//            for ( var i=startY; i<stopY; i+=step ) {
//                setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
//                leapY += step; if (leapY > stopY) leapY = stopY; timer++;
//            } return;
//        }
//        for ( var i=startY; i>stopY; i-=step ) {
//            setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
//            leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
//        }
//    }
//    function currentYPosition() {
//        // Firefox, Chrome, Opera, Safari
//        if (self.pageYOffset) return self.pageYOffset;
//        // Internet Explorer 6 - standards mode
//        if (document.documentElement && document.documentElement.scrollTop)
//            return document.documentElement.scrollTop;
//        // Internet Explorer 6, 7 and 8
//        if (document.body.scrollTop) return document.body.scrollTop;
//        return 0;
//    }
//    function elmYPosition(eID) {
//        var elm = document.getElementById(eID);
//        var y = elm.offsetTop;
//        var node = elm;
//        while (node.offsetParent && node.offsetParent != document.body) {
//            node = node.offsetParent;
//            y += node.offsetTop;
//        } return y;
//    }/*! ScrollToAnchor.js v1,0 | Paul Browne | 2015 | GNU 2.0  */
//    initSmoothScrolling();
//
//    function initSmoothScrolling() {
//        if (isCssSmoothSCrollSupported()) {
//            document.getElementById('css-support-msg').className = 'supported';
//            return;
//        }
//
//        var duration = 600;
//
//        var pageUrl = location.hash ?
//            stripHash(location.href) :
//            location.href;
//
//        delegatedLinkHijacking();
//        //directLinkHijacking();
//
//        function delegatedLinkHijacking() {
//            document.body.addEventListener('click', onClick, false);
//
//            function onClick(e) {
//                if (!isInPageLink(e.target))
//                    return;
//
//                e.stopPropagation();
//                e.preventDefault();
//
//                jump(e.target.hash, {
//                    duration: duration,
//                    callback: function () {
//                        setFocus(e.target.hash);
//                    }
//                });
//            }
//        }
//
//        function directLinkHijacking() {
//            [].slice.call(document.querySelectorAll('a'))
//                .filter(isInPageLink)
//                .forEach(function (a) {
//                    a.addEventListener('click', onClick, false);
//                });
//
//            function onClick(e) {
//                e.stopPropagation();
//                e.preventDefault();
//
//                jump(e.target.hash, {
//                    duration: duration,
//                });
//            }
//
//        }
//
//        function isInPageLink(n) {
//            return n.tagName.toLowerCase() === 'a' &&
//                n.hash.length > 0 &&
//                stripHash(n.href) === pageUrl;
//        }
//
//        function stripHash(url) {
//            return url.slice(0, url.lastIndexOf('#'));
//        }
//
//        function isCssSmoothSCrollSupported() {
//            return 'scrollBehavior' in document.documentElement.style;
//        }
//
//        // Adapted from:
//        // https://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
//        function setFocus(hash) {
//            var element = document.getElementById(hash.substring(1));
//
//            if (element) {
//                if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
//                    element.tabIndex = -1;
//                }
//
//                element.focus();
//            }
//        }
//
//    }
//
//    function jump(target, options) {
//        var
//            start = window.pageYOffset,
//            opt = {
//                duration: options.duration,
//                offset: options.offset || 0,
//                callback: options.callback,
//                easing: options.easing || easeInOutQuad
//            },
//            distance = typeof target === 'string' ?
//            opt.offset + document.querySelector(target).getBoundingClientRect().top :
//                target,
//            duration = typeof opt.duration === 'function' ?
//                opt.duration(distance) :
//                opt.duration,
//            timeStart, timeElapsed;
//
//        requestAnimationFrame(function (time) {
//            timeStart = time;
//            loop(time);
//        });
//
//        function loop(time) {
//            timeElapsed = time - timeStart;
//
//            window.scrollTo(0, opt.easing(timeElapsed, start, distance, duration));
//
//            if (timeElapsed < duration)
//                requestAnimationFrame(loop)
//            else
//                end();
//        }
//
//        function end() {
//            window.scrollTo(0, start + distance);
//
//            if (typeof opt.callback === 'function')
//                opt.callback();
//        }
//
//        // Robert Penner's easeInOutQuad - http://robertpenner.com/easing/
//        function easeInOutQuad(t, b, c, d) {
//            t /= d / 2
//            if (t < 1) return c / 2 * t * t + b
//            t--
//            return -c / 2 * (t * (t - 2) - 1) + b
//        }
//
//    }

/////////////////////////////////////////////////////////////////////////////////////////
//    (function() {
//        let d = document;
//
//        function init() {
//            //Links
//            let anchor1Link  = d.getElementById('go-to-sc-top');
//
//            //Anchors
//            let anchor1      = d.getElementById('sc-top');
//
//
////            anchor1Link.addEventListener('click', (e) => { scrollTo(anchor1.offsetTop, e) }, false);
//
//            document.getElementById('go-to-sc-top').onclick = function() { scrollTo(anchor1.offsetTop,e,20000); }
//            // anchor2Link2.onclick = function() { scrollToSimple(document.documentElement, 0, 3000); }
////            anchor3Link.addEventListener('click', (e) => { scrollTo(anchor3, e) }, false);
////            anchor3Link2.addEventListener('click', (e) => { scrollTo(anchor3, e) }, false);
////            anchor4Link.addEventListener('click', (e) => { scrollTo(anchor4.offsetTop, e) }, false);
////            anchor4Link2.addEventListener('click', (e) => { scrollTo(anchor4.offsetTop, e) }, false);
//
////            console.log(anchor2); //DEBUG
////            console.log('anchor1: '+scrollTopValue(anchor1)+' / '+offsetTopValue(anchor1)); //DEBUG
////            console.log('anchor2: '+scrollTopValue(anchor2)+' / '+offsetTopValue(anchor2)); //DEBUG
////            console.log('anchor3: '+scrollTopValue(anchor3)+' / '+offsetTopValue(anchor3)); //DEBUG
////            console.log('anchor4: '+scrollTopValue(anchor4)+' / '+offsetTopValue(anchor4)); //DEBUG
//            // d.addEventListener('scroll', (e) => { console.log(e) }, false); //DEBUG
//
//            console.log('App loaded. Have fun!');
//        }
//
//        function scrollTopValue(domElement) { //DEBUG
//            return 'scrollTopValue:', domElement.scrollTop;
//        }
//        function offsetTopValue(domElement) { //DEBUG
//            return 'offsetTopValue:', domElement.offsetTop;
//        }
//
//        /*function scrollToSimple(element, to, duration) { //FIXME finish this
//         if (duration < 0) return;
//         var difference = to - element.offsetTop;
//         var perTick = difference / duration * 10;
//         console.log('perTick', perTick); //DEBUG
//
//         setTimeout(function() {
//         console.log('element.scrollTop:', element.scrollTop); //DEBUG
//         element.scrollTop += perTick;
//         console.log('element.scrollTop:', element.scrollTop); //DEBUG
//         scrollTo(element, to, duration - 10);
//         }, 10);
//         }*/
//
//        //cf. https://gist.github.com/james2doyle/5694700
//        // requestAnimationFrame for Smart Animating http://goo.gl/sx5sts
//        var requestAnimFrame = (function() {
//            return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function(callback) {
//                    window.setTimeout(callback, 1000 / 60);
//                };
//        })();
//
//        function scrollTo(to, callback, duration = 1500) { //FIXME this always starts from '0', instead of the clicked element offsetTop -> This is because the position is calculated for the main <html> element, not the <iframe>'s <html> tag
//            /*console.log('from:', from); //DEBUG
//             // console.log('from.clientY:', from.clientY); //DEBUG
//             // console.log('from.target.offsetTop:', from.target.offsetTop); //DEBUG
//
//             // console.log('position():', document.documentElement.offsetTop || document.body.parentNode.offsetTop || document.body.offsetTop); //DEBUG
//             // console.log('document.documentElement:', document.documentElement); //DEBUG
//             // console.log('document.body:', document.body); //DEBUG
//             let start;
//
//             if (isMouseEvent(from)) { //FIXME : the scroll starts at the link, not where the screen really is : fix that
//             // start = from.target.offsetTop;
//             start = from.pageY; //FIXME
//             }
//             else {
//             start = from;
//             }*/
//
//            if (isDomElement(to)) {
//                // console.log('this is an element:', to); //DEBUG
//                to = to.offsetTop;
//            }
//            /*else {
//             // console.log('this is NOT an element:', to); //DEBUG
//             }*/
//
//            // because it's so fucking difficult to detect the scrolling element, just move them all
//            function move(amount) {
//                // document.scrollingElement.scrollTop = amount; //FIXME Test that
//                document.documentElement.scrollTop = amount;
//                document.body.parentNode.scrollTop = amount;
//                document.body.scrollTop = amount;
//            }
//
//            function position() {
//                return document.documentElement.offsetTop || document.body.parentNode.offsetTop || document.body.offsetTop;
//            }
//
//            var start = position(),
//                change = to - start,
//                currentTime = 0,
//                increment = 20;
//            console.log('start:', start); //DEBUG
//            console.log('to:', to); //DEBUG
//            console.log('change:', change); //DEBUG
//
//            var animateScroll = function() {
//                // increment the time
//                currentTime += increment;
//                // find the value with the quadratic in-out easing function
//                var val = Math.easeInOutQuad(currentTime, start, change, duration);
//                // move the document.body
//                move(val);
//                // do the animation unless its over
//                if (currentTime < duration) {
//                    requestAnimFrame(animateScroll);
//                }
//                else {
//                    if (callback && typeof(callback) === 'function') {
//                        // the animation is done so lets callback
//                        callback();
//                    }
//                }
//            };
//
//            animateScroll();
//        }
//
//        init();
//    })();
//
//    //-------------------- Unimportant js functions --------------------
//    // easing functions http://goo.gl/5HLl8
//    //t = current time
//    //b = start value
//    //c = change in value
//    //d = duration
//    Math.easeInOutQuad = function(t, b, c, d) {
//        t /= d / 2;
//        if (t < 1) {
//            return c / 2 * t * t + b
//        }
//        t--;
//        return -c / 2 * (t * (t - 2) - 1) + b;
//    };
//
//    Math.easeInCubic = function(t, b, c, d) {
//        var tc = (t /= d) * t * t;
//        return b + c * (tc);
//    };
//
//    Math.inOutQuintic = function(t, b, c, d) {
//        var ts = (t /= d) * t,
//            tc = ts * t;
//        return b + c * (6 * tc * ts + -15 * ts * ts + 10 * tc);
//    };
//
//    function isDomElement(obj) {
//        return obj instanceof Element;
//    }
//
//    function isMouseEvent(obj) {
//        return obj instanceof MouseEvent;
//    }
//
//    function findScrollingElement(element) { //FIXME Test this too
//        do {
//            if (element.clientHeight < element.scrollHeight || element.clientWidth < element.scrollWidth) {
//                return element;
//            }
//        } while (element = element.parentNode);
//    }

////////////////////////////////////////////////////////////////
// easing functions http://goo.gl/5HLl8
   Math.easeInOutQuad = function (t, b, c, d) {
       t /= d/2;
       if (t < 1) {
           return c/2*t*t + b
       }
       t--;
       return -c/2 * (t*(t-2) - 1) + b;
   };

   Math.easeInCubic = function(t, b, c, d) {
       var tc = (t/=d)*t*t;
       return b+c*(tc);
   };

   Math.inOutQuintic = function(t, b, c, d) {
       var ts = (t/=d)*t,
           tc = ts*t;
       return b+c*(6*tc*ts + -15*ts*ts + 10*tc);
   };

   // requestAnimationFrame for Smart Animating http://goo.gl/sx5sts
   var requestAnimFrame = (function(){
       return  window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function( callback ){ window.setTimeout(callback, 1000 / 60); };
   })();

   function scrollTo(to, callback, duration) {
       // because it's so fucking difficult to detect the scrolling element, just move them all
       function move(amount) {
           document.documentElement.scrollTop = amount;
           document.body.parentNode.scrollTop = amount;
           document.body.scrollTop = amount;
       }
       function position() {
           return document.documentElement.scrollTop || document.body.parentNode.scrollTop || document.body.scrollTop || window.pageYOffset|| window.document.body.parentNode.scrollTop || window.document.body.scrollTop;
       }
       var start = position(),
           change = to - start,
           currentTime = 0,
           increment = 20;
       duration = (typeof(duration) === 'undefined') ? 500 : duration;
       var animateScroll = function() {
           // increment the time
           currentTime += increment;
           // find the value with the quadratic in-out easing function
           var val = Math.easeInOutQuad(currentTime, start, change, duration);
           // move the document.body
           move(val);
           // do the animation unless its over
           if (currentTime < duration) {
               requestAnimFrame(animateScroll);
           } else {
               if (callback && typeof(callback) === 'function') {
                   // the animation is done so lets callback
                   callback();
               }
           }
       };
       animateScroll();
   }