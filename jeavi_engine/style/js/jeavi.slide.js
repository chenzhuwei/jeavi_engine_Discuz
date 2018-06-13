var rolbtn;
var  nextPage,prevPage;
var _imgArray = new Array();
jQuery(document).ready(function(){
/*scroll*/

	if(jQuery("#maincontent").size() > 0){
		var scrollDistance = 566;
	} else{
		var scrollDistance = 0;
	}
	jQuery("#navcontainer").css("width", "100%");
	var IE6browser = (navigator.userAgent.indexOf("MSIE 6")>=0) ? true : false;
	
	if(!IE6browser){
		var _visiflag;
		setInterval(function(){
			if(scrollDistance < ___getPageScroll()[1]){
				if(!_visiflag){
					_visiflag = true;
					jQuery("#navcontainer").show();
				}
			}else{
				if(_visiflag){
					_visiflag = false;
					jQuery("#navcontainer").hide();
				}
			}
		},33);
		
		if(scrollDistance < ___getPageScroll()[1]){
			_visiflag = true;
			jQuery("#navcontainer").show();
		}else{
			_visiflag = false;
			jQuery("#navcontainer").hide();
		}
	}
	jQuery(".left,.right").VogueRollOver();
	
	
	var _preNum = 0;
	
	if(jQuery("#maincontent").size()){
		funcmaincontent();
	};
});

/*--------------
mainFUNCTION
--------------*/
function funcmaincontent(){
	
	jQuery("#maincontent").find(".main").css({
		"position":"absolute"
	});
	
	for(var i = 0 ; i < jQuery("#maincontent").find(".element").length ;i++){
		if(jQuery("#maincontent").find(".element").eq(i).find("img").attr("src")){
			_imgArray.push(jQuery("#maincontent").find(".element").eq(i).find("img").attr("src"));
		}
	}
	if(/*@cc_on!@*/false){
		//IE
		setTimeout(startslide,400);
	}
	else{
		//Non IE
		if(_imgArray.length){
			loopImageLoader(0);
		}
		else{
			setTimeout(startslide,400);
		}
	}
	//nextPage();
	
	function loopImageLoader(i){
	  var image1 = new Image();
	  image1.src = _imgArray[i];
	  image1.onload = function(){
		i++;
		if(_imgArray.length != i){
		  loopImageLoader(i);
		}else{
			startslide();
		}
	  }
	}
	
	
	var _maxpage = 0;
	var _currentpage = 0;
	
	function startslide(){
		jQuery("#maincontent").find(".element").css("display","inline-block");
		jQuery("#maincontent").find(".loading").css("display","none");
		_maxpage = jQuery("#maincontent").find(".pict").length;
		for(var i = 0 ; i < _maxpage ; i++){
			var _pos = Math.round(1000*(i-_currentpage)+jQuery(window).width()/2-500);
			var _opa = 0.5;
			if(i == _currentpage)_opa = 1;
			if(_pos > jQuery(window).width()){
			_pos -= _maxpage*1000
			}
			jQuery("#maincontent").stop().find(".pict").eq(i).css({
			left:_pos,
			opacity:_opa
			})
		}

		
		window.onresize = function(){
			for(var i = 0 ; i < _maxpage ; i++){
				var _pos = Math.round(1000*(i-_currentpage)+jQuery(window).width()/2-500);
				var _opa = 0.5;
				if(i == _currentpage)_opa = 1;
				if(_pos > jQuery(window).width()){
					_pos -= _maxpage*1000
				}
				jQuery("#maincontent").stop().find(".pict").eq(i).css({
					left:_pos,
					opacity:_opa
				})
			}
		}

		jQuery("#maincontent").find(".right").click(nextPage);
		jQuery("#maincontent").find(".left").click(prevPage);
		
		
		
		rolbtn = setInterval(nextPage,4500);//Execution time 4500
		jQuery("#maincontent").hover(
			function(){clearInterval(rolbtn)},function(){rolbtn = setInterval(nextPage,4500)}//Execution time 4500
		    );
	
		}

	
	 nextPage = function(){
		_currentpage++;
		if(_currentpage >  _maxpage-1)_currentpage = 0;
		jQuery("#maincontent").stop().find(".main").removeClass("main");
		jQuery("#maincontent").stop().find(".pict").eq(_currentpage).addClass("main").css({"position":"absolute"});;
		_pict = jQuery("#maincontent").find(".pict");
		for(var i = 0 ; i < _maxpage ; i++){
			var _pos = Math.round(1000*(i-_currentpage)+jQuery(window).width()/2-500);
			var _opa = 0.5;
			if(i == _currentpage)_opa = 1;
			if(_pos > jQuery(window).width()){
				_pos -= _maxpage*1000
			}else if(_pos < -1000*2){
				_pos += _maxpage*1000
			}
			_pict.eq(i)
			.stop()
			.css({
				left:_pos+1000
			})
			.animate({
				left:_pos,
				opacity:_opa
			},{
				duration:1400 ,
				easing:'easeOutQuint'
			})
		}
	}
	
	 prevPage = function(){
		_currentpage--;
		if(_currentpage< 0)_currentpage = _maxpage -1;
		jQuery("#maincontent").stop().find(".main").removeClass("main");
		jQuery("#maincontent").stop().find(".pict").eq(_currentpage).addClass("main").css({"position":"absolute"});;
		for(var i = 0 ; i < _maxpage ; i++){
			var _pos = Math.round(1000*(i-_currentpage)+jQuery(window).width()/2-500);
			var _opa = 0.5;
			if(i == _currentpage)_opa = 1;
			if(_pos < -1000){
				_pos += _maxpage*1000
			}else if(_pos > jQuery(window).width()+1000){
				_pos -= _maxpage*1000
			}
			jQuery("#maincontent").find(".pict").eq(i)
			.stop()
			.css({
				left:_pos-1000
			})
			.animate({
				left:_pos,
				opacity:_opa
			},{
				duration:700 ,
				easing:'easeOutQuint'
			})
		}
	}
	
}


/*----------------
ROLLOVER PLUG-IN
----------------*/

(function(jQuery){
  jQuery.fn.VogueRollOver = function() {
    var _imgArray = new Array();
    loopImageLoader(0);
    function loopImageLoader(i){
    }
    return this.hover(function(){
      var str = jQuery(this).find("img").attr("src");
      if(str.indexOf("_on")==-1 && str.indexOf("_nouse")==-1){
        str = str.replace(".png","_on.png");
		str = str.replace(".jpg","_on.jpg");
        jQuery(this).find("img").attr("src",str);
      }
	  	if (rolbtn !=null) //取消定时器
		{
			clearInterval(rolbtn);
			
			}
    },function(){
      var str = jQuery(this).find("img").attr("src");
      str = str.replace("_on.png",".png");
	  str = str.replace("_on.jpg",".jpg");
      jQuery(this).find("img").attr("src",str);
	 // rolbtn = setInterval(nextPage,3000);
    });
  };
})(jQuery);
jQuery.easing['jswing'] = jQuery.easing['swing'];

/*-----
EASING
------*/

jQuery.extend( jQuery.easing,{
	def: 'easeOutQuint',
	swing: function (x, t, b, c, d) {
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	}
});

document.write('<style type="text/css">div#maincontent div.main{display:none;}div#maincontent div.element{position:absolute !important;}</style>')


/**
 / THIRD FUNCTION
 * getPageSize() by quirksmode.com
 *
 * @return Array Return an array with page width, height and window width, height
 */
function ___getPageSize() {
	var xScroll, yScroll;
	if (window.innerHeight && window.scrollMaxY) {	
		xScroll = window.innerWidth + window.scrollMaxX;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}
	var windowWidth, windowHeight;
	if (self.innerHeight) {	// all except Explorer
		if(document.documentElement.clientWidth){
			windowWidth = document.documentElement.clientWidth; 
		} else {
			windowWidth = self.innerWidth;
		}
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) { // other Explorers
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}	
	// for small pages with total height less then height of the viewport
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else { 
		pageHeight = yScroll;
	}
	// for small pages with total width less then width of the viewport
	if(xScroll < windowWidth){	
		pageWidth = xScroll;		
	} else {
		pageWidth = windowWidth;
	}
	arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight);
	return arrayPageSize;
};
/**
 / THIRD FUNCTION
 * getPageScroll() by quirksmode.com
 *
 * @return Array Return an array with x,y page scroll values.
 */
function ___getPageScroll() {
	var xScroll, yScroll;
	if (self.pageYOffset) {
		yScroll = self.pageYOffset;
		xScroll = self.pageXOffset;
	} else if (document.documentElement && document.documentElement.scrollTop) {	 // Explorer 6 Strict
		yScroll = document.documentElement.scrollTop;
		xScroll = document.documentElement.scrollLeft;
	} else if (document.body) {// all other Explorers
		yScroll = document.body.scrollTop;
		xScroll = document.body.scrollLeft;	
	}
	arrayPageScroll = new Array(xScroll,yScroll);
	return arrayPageScroll;
};