
	function componentToHex(c) {

   	 var hex = c.toString(16);
   	 return hex.length == 1 ? "0" + hex : hex;
	}


	function rgbToHex(rgbColor) {

	rgbColor=rgbColor.replace('rgb', '');
	rgbColor=rgbColor.replace('(', '');
	rgbColor=rgbColor.replace(')', '');
	var str_array = rgbColor.split(',');
	//convert to int
	var r=str_array[0];
	var g=str_array[1];
	var b=str_array[2];
 	r=parseInt(r);
	g=parseInt(g);
	b=parseInt(b);
	
   	return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
	}