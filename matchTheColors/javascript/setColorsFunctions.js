	var error=0;
	var matchedColors=0;
	var timer1=0;
	var timer2=0;
	var countDown=6;
	var color;
/////////////////////////////////////////////////////
	function disableClick(){

		var nodes = document.getElementById('main').childNodes;
		for(var i=0; i<nodes.length; i++) {
    			if (nodes[i].nodeName.toLowerCase() == 'div') {
         		//nodes[i].style.display = "none";
			nodes[i].style.pointerEvents = 'none';

			}
		
		}
	}
////////////////////////////////////////////////////
	function enableClick(){

		var nodes = document.getElementById('main').childNodes;
		for(var i=0; i<nodes.length; i++) {
    			if (nodes[i].nodeName.toLowerCase() == 'div') {
         		nodes[i].style.pointerEvents = 'auto';

			}
		}
	}
//////////////////////////////////////////////////////
	function setColors(){
		matchedColors=0;
		error=0;
		countDown=6;
		enableClick();
		clearTimeout(timer2);
		clearInterval(timer1);

		var randomNum1 = Math.floor((Math.random()*16)+1);
		var randomDiv1="div" + randomNum1;//elhagh
		var randomNum2 = Math.floor((Math.random()*16)+1);
			
			while(randomNum1==randomNum2){
			randomNum2 = Math.floor((Math.random()*16)+1);}
		var randomDiv2="div" + randomNum2;//elhagh

		var randomNum3 = Math.floor((Math.random()*16)+1);

			while(randomNum1==randomNum3){
			randomNum3 = Math.floor((Math.random()*16)+1);}


			while(randomNum2==randomNum3){
			randomNum3 = Math.floor((Math.random()*16)+1);}

		var randomDiv3="div" + randomNum3;//elhagh

		/////give all the divs random colors
		var nodes = document.getElementById('main').childNodes;
		for(var i=0; i<nodes.length; i++) {
    			if (nodes[i].nodeName.toLowerCase() == 'div') {
         		nodes[i].style.backgroundColor = getRandomColor();
			nodes[i].style.WebkitAnimationName ="resetAnimation";
			nodes[i].style.animationName ="resetAnimation";
			nodes[i].style.backgroundImage="none";	
     			}
		}
		///give chosen divs chosen color
		color=getRandomColor();
		document.getElementById(randomDiv1).style.backgroundColor=color;
		document.getElementById(randomDiv2).style.backgroundColor=color;
		document.getElementById(randomDiv3).style.backgroundColor=color;
		warningDivs();
	

		timer1 = setInterval("timerOut()", 1000);
	}
///////////////////////////////////////////////////////////////////////	
	function warningDivs(){
		document.getElementById('lets-play').style.display="none";
		document.getElementById('timer').style.display="block";
		document.getElementById('win-lose').style.display="block";
		document.getElementById('error').style.display="block";
		document.getElementById('error').style.backgroundColor=color;		
		document.getElementById('timer').style.backgroundColor=color;
		document.getElementById('win-lose').style.backgroundColor=color;
		document.getElementById('timer').innerHTML="timer  ="+ countDown;
		document.getElementById('error').innerHTML="error  ="+error;
		document.body.style.backgroundColor=getRandomColor();
	}
//////////////////////////////////////////////////////////////////////to complete the transition
	function fixAnimationTime(){
	clearTimeout(timer2);
	clearInterval(timer1);
	disableClick();
	timer2 = setTimeout("setColors()", 1000);
	}
//////////////////////////////////////////////////////////////////////	
	function timerOut(){
		countDown--;
		document.getElementById('timer').innerHTML="timer  ="+countDown;
		if (countDown==0){
		document.getElementById('win-lose').innerHTML="you lose";
		clearInterval(timer1);
		fixAnimationTime()
		}
	}
////////////////////////////////////////////////////
	function matchTheColors(divId){
		var colorHex=rgbToHex(document.getElementById(divId).style.backgroundColor);
                document.getElementById(divId).style.WebkitAnimationName =" spinner";
		document.getElementById(divId).style.animationName ="spinner";

		if(colorHex==color)
		{ 
			document.getElementById(divId).style.backgroundImage="url(images/smile.png)";
			if (matchedColors + 1==3){
			document.getElementById('win-lose').innerHTML="you win";
			clearTimeout(timer1);
			fixAnimationTime();
			}
			else {
			matchedColors+=1;
			}
		}

		else{
			if (error+1==2){
			error+=1;
			document.getElementById(divId).style.backgroundImage="url(images/sad.png)";
			document.getElementById('error').innerHTML="error  ="+error;
			document.getElementById('win-lose').innerHTML="you lose";
			fixAnimationTime();
			}
			else {
			error+=1;
			document.getElementById('error').innerHTML="error  ="+error;
			document.getElementById(divId).style.backgroundImage="url(images/sad.png)";
			}
		}


	}