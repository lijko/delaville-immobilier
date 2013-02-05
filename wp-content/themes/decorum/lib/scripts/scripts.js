jQuery(document).ready(function($) {

	/** DROPDOWN MENU */

	$("ul.sf-menu").supersubs({ 
        minWidth:    6,
        maxWidth:    27,
        extraWidth:  1
    }).superfish({ 
        delay:       500,
        animation:   {opacity:'show',height:'show'}, 
        speed:       'normal',
        autoArrows:  false,
        dropShadows: false
    });
    
    /** LIGHTBOX */
    
    $("a[rel^='prettyPhoto']").prettyPhoto({
    	opacity: 0.5,
    	show_title: false,
    	overlay_gallery: false,
    	deeplinking: false,
    	social_tools: false
    });
    
    // emtpy image title tag to display link title tag
    $('#ts-gallery img').attr('title', '');
    
    
    /** PROPERTY SEARCH DEFAULT */
    
    $('#search-text').each(function () {
		if ($(this).val() == '') {
			$(this).val($(this).attr('title'));
		}
	}).focus(function () {
		if ($(this).val() == $(this).attr('title')) {
			$(this).val('');
		}
	}).blur(function () {
		if ($(this).val() == '') {
			$(this).val($(this).attr('title'));
		}
	});
	
	$('#search-box form').submit(function () {
		if ($('#search-text').val() == $('#search-text').attr('title')) {
			$('#search-text').val('');
		}
		return true;		
	});
	
	
	/** ADVANCED SERACH */
	
	if ($.cookie('ts_advanced_search') == 'open') {
	    $('#advanced-search').show();
	    $('#advanced-search-btn').addClass('open');
	}
	
	$('#advanced-search-btn').click(function () {
	    if ($("#advanced-search").is(":visible")) {
	    	$.cookie('ts_advanced_search', 'closed',{ expires: 60, path: '/' });
	        $("#advanced-search div").animate(
	            {
	                opacity: "0"
	            },
	            150,
	            function(){	            	
	                $('#advanced-search-btn').removeClass('open');
	                $("#advanced-search").slideUp(150);
	            }
	        );
	    }
	    else {
	        $("#advanced-search").slideDown(150, function(){
	        	$.cookie('ts_advanced_search', 'open',{ expires: 60, path: '/' });
	            $("#advanced-search div").animate(
	                {
	                    opacity: "1"
	                },
	                150
	            );	            
	    		$('#advanced-search-btn').addClass('open');
	        });
	    }   
	});
    

	/** SEARCH FORM VALIDATION */
	
	$('form.searchform').submit(function () {
		var errors = 0;
		$(this).find('input').each(function () {
			if ($(this).hasClass('required') && $(this).val() == '') {
				$(this).addClass('fielderror');
				errors++;
			}
		});
		
		if (errors > 0) {
			return false;
		}
		return true;
		
	});
	
	
	/** COMMENT FORM VALIDATION */
	
	$('#commenterror').hide();
	
	$('#commentform form').submit(function () {
		var errors = 0;
		$(this).find('textarea, input').each(function () {
			if ($(this).hasClass('required') && $(this).val() == '') {
				$(this).parent().addClass('fielderror');
				$('#commenterror').fadeIn('fast', function() {
					setTimeout(function(){ jQuery('#commenterror').fadeOut('slow'); }, 2000);
				});
				errors++;
			}
		});		
		if (errors > 0) {
			return false;
		}
		return true;		
	});

	
	/** GENERAL FADE */
	
	IE='\v'=='v';
	if(IE==false) {

		var tofade = '#ts-social a';
		$(tofade).fadeTo("fast", 0.75);
		$(tofade).hover(function(){
		    $(this).stop().fadeTo("fast", 1);
		},function(){
		    $(this).stop().fadeTo("fast", 0.75);
		});
		
		$('#credit-wordpress').fadeTo("fast", 0.2);
		$('#credit-wordpress').hover(function(){
		    $(this).stop().fadeTo("fast", 0.4);
		},function(){
		    $(this).stop().fadeTo("fast", 0.2);
		});
		
		/** COMMENT REPLY FADE */
		
		$('.comment-reply').fadeTo("fast", 0);
		$('.comment-inner').hover(function(){
		    $(this).find('.comment-reply').stop().fadeTo("fast", 1);
		},function(){
		    $(this).find('.comment-reply').stop().fadeTo("fast", 0);
		});
		
		/** SLIDER OVERLAY FADE */
		
		$('.project-overlay').fadeTo("fast", 0);
		$('#slider, .archive-portfolio .portfolio, .archive-skills .portfolio').hover(function(){
		    $(this).find('.project-overlay').css('visibility', 'visible');
		    $(this).find('.project-overlay').stop().fadeTo("fast", 1);
		},function(){
		    $(this).find('.project-overlay').stop().fadeTo("fast", 0);
		});
		
	}
	
	/** SMOOTH SCROLL ANCHORS */
	
	$('a[href*=#]').click(function() {

      // skip SmoothScroll on links inside sliders or scroll boxes also using anchors
      if($(this).parents('#scrollable_box').length) return;

      // duration in ms
      var duration=500;

      // easing values: swing | linear
      var easing='swing';

      // get / set parameters
      var newHash=this.hash;
      var oldLocation=window.location.href.replace(window.location.hash, '');
      var newLocation=this;

      // make sure it's the same location      
      if(oldLocation+newHash==newLocation) {
   	      // get target
   	      var target=$(this.hash+', a[name='+this.hash.slice(1)+']').offset().top;
   	
   	      // adjust target for anchors near the bottom of the page
   	      if(target > $(document).height()-$(window).height()) target=$(document).height()-$(window).height();         
   	
   	      // set selector
   	      if($.browser.safari) var animationSelector='body:not(:animated)';
   	      else var animationSelector='html:not(:animated)';
   	
   	      // animate to target and set the hash to the window.location after the animation
   	      $(animationSelector).animate({ scrollTop: target }, duration, easing, function() {
   	
   	         // add new hash to the browser location
   	         window.location.href=newLocation;
   	      });
   	
   	      // cancel default click action
   	      return false;
   	   }
   	});
   	
	$("#totop").hide();
	
	$(function() {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#totop').fadeIn();
			} else {
				$('#totop').fadeOut();
			}
		});

		$('#totop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			});
			return false;
		});
		
		var timer;
		$(document).mousemove(function() {
		    if (timer) {
		        clearTimeout(timer);
		        timer = 0;
		    }
			if ($(this).scrollTop() > 100) {
		    	$('#totop:hidden').fadeIn();
		    }
		    timer = setTimeout(function() {
		        $('#totop').fadeOut()
		    }, 3000)
		});

	});

});

/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */

;(function($){
	$.fn.superfish = function(op){

		var sf = $.fn.superfish,
			c = sf.c,
			$arrow = $(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),
			over = function(){
				var $$ = $(this), menu = getMenu($$);
				clearTimeout(menu.sfTimer);
				$$.showSuperfishUl().siblings().hideSuperfishUl();
			},
			out = function(){
				var $$ = $(this), menu = getMenu($$), o = sf.op;
				clearTimeout(menu.sfTimer);
				menu.sfTimer=setTimeout(function(){
					o.retainPath=($.inArray($$[0],o.$path)>-1);
					$$.hideSuperfishUl();
					if (o.$path.length && $$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}
				},o.delay);	
			},
			getMenu = function($menu){
				var menu = $menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
				sf.op = sf.o[menu.serial];
				return menu;
			},
			addArrow = function($a){ $a.addClass(c.anchorClass).append($arrow.clone()); };
			
		return this.each(function() {
			var s = this.serial = sf.o.length;
			var o = $.extend({},sf.defaults,op);
			o.$path = $('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){
				$(this).addClass([o.hoverClass,c.bcClass].join(' '))
					.filter('li:has(ul)').removeClass(o.pathClass);
			});
			sf.o[s] = sf.op = o;
			
			$('li:has(ul)',this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent' : 'hover'](over,out).each(function() {
				if (o.autoArrows) addArrow( $('>a:first-child',this) );
			})
			.not('.'+c.bcClass)
				.hideSuperfishUl();
			
			var $a = $('a',this);
			$a.each(function(i){
				var $li = $a.eq(i).parents('li');
				$a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});
			});
			o.onInit.call(this);
			
		}).each(function() {
			var menuClasses = [c.menuClass];
			if (sf.op.dropShadows  && !($.browser.msie && $.browser.version < 7)) menuClasses.push(c.shadowClass);
			$(this).addClass(menuClasses.join(' '));
		});
	};

	var sf = $.fn.superfish;
	sf.o = [];
	sf.op = {};
	sf.IE7fix = function(){
		var o = sf.op;
		if ($.browser.msie && $.browser.version > 6 && o.dropShadows && o.animation.opacity!=undefined)
			this.toggleClass(sf.c.shadowClass+'-off');
		};
	sf.c = {
		bcClass     : 'sf-breadcrumb',
		menuClass   : 'sf-js-enabled',
		anchorClass : 'sf-with-ul',
		arrowClass  : 'sf-sub-indicator',
		shadowClass : 'sf-shadow'
	};
	sf.defaults = {
		hoverClass	: 'sfHover',
		pathClass	: 'overideThisToUse',
		pathLevels	: 1,
		delay		: 800,
		animation	: {opacity:'show'},
		speed		: 'normal',
		autoArrows	: true,
		dropShadows : true,
		disableHI	: false,		// true disables hoverIntent detection
		onInit		: function(){}, // callback functions
		onBeforeShow: function(){},
		onShow		: function(){},
		onHide		: function(){}
	};
	$.fn.extend({
		hideSuperfishUl : function(){
			var o = sf.op,
				not = (o.retainPath===true) ? o.$path : '';
			o.retainPath = false;
			var $ul = $(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
					.find('>ul').hide().css('visibility','hidden');
			o.onHide.call($ul);
			return this;
		},
		showSuperfishUl : function(){
			var o = sf.op,
				sh = sf.c.shadowClass+'-off',
				$ul = this.addClass(o.hoverClass)
					.find('>ul:hidden').css('visibility','visible');
			sf.IE7fix.call($ul);
			o.onBeforeShow.call($ul);
			$ul.animate(o.animation,o.speed,function(){ sf.IE7fix.call($ul); o.onShow.call($ul); });
			return this;
		}
	});

})(jQuery);

(function(a){a.fn.supersubs=function(b){var c=a.extend({},a.fn.supersubs.defaults,b);return this.each(function(){var d=a(this);var e=a.meta?a.extend({},c,d.data()):c;var f=a('<li id="menu-fontsize">&#8212;</li>').css({padding:0,position:"absolute",top:"-999em",width:"auto"}).appendTo(d).width();a("#menu-fontsize").remove();$ULs=d.find("ul");$ULs.each(function(l){var k=$ULs.eq(l);var j=k.children();var g=j.children("a");var m=j.css("white-space","nowrap").css("float");var h=k.add(j).add(g).css({"float":"none",width:"auto"}).end().end()[0].clientWidth/f;h+=e.extraWidth;if(h>e.maxWidth){h=e.maxWidth}else{if(h<e.minWidth){h=e.minWidth}}h+="em";k.css("width",h);j.css({"float":m,width:"100%","white-space":"normal"}).each(function(){var n=a(">ul",this);var i=n.css("left")!==undefined?"left":"right";n.css(i,h)})})})};a.fn.supersubs.defaults={minWidth:9,maxWidth:25,extraWidth:0}})(jQuery);

/*
* Slides, A Slideshow Plugin for jQuery
* Intructions: http://slidesjs.com
* By: Nathan Searles, http://nathansearles.com
* Version: 1.1.6
* Updated: March 23th, 2011
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/

(function($){$.fn.slides=function(g){g=$.extend({},$.fn.slides.option,g);return this.each(function(){$('.'+g.container,$(this)).children().wrapAll('<div class="slides_control"/>');var d=$(this),control=$('.slides_control',d),total=control.children().size(),width=control.children().outerWidth(),height=control.children().outerHeight(),start=g.start-1,effect=g.effect.indexOf(',')<0?g.effect:g.effect.replace(' ','').split(',')[0],paginationEffect=g.effect.indexOf(',')<0?effect:g.effect.replace(' ','').split(',')[1],next=0,prev=0,number=0,current=0,loaded,active,clicked,position,direction,imageParent,pauseTimeout,playInterval;function animate(a,b,c){if(!active&&loaded){active=true;g.animationStart(current+1);switch(a){case'next':prev=current;next=current+1;next=total===next?0:next;position=width*2;a=-width*2;current=next;break;case'prev':prev=current;next=current-1;next=next===-1?total-1:next;position=0;a=0;current=next;break;case'pagination':next=parseInt(c,10);prev=$('.'+g.paginationClass+' li.current a',d).attr('href').match('[^#/]+$');if(next>prev){position=width*2;a=-width*2}else{position=0;a=0}current=next;break}if(b==='fade'){if(g.crossfade){control.children(':eq('+next+')',d).css({zIndex:10}).fadeIn(g.fadeSpeed,g.fadeEasing,function(){if(g.autoHeight){control.animate({height:control.children(':eq('+next+')',d).outerHeight()},g.autoHeightSpeed,function(){control.children(':eq('+prev+')',d).css({display:'none',zIndex:0});control.children(':eq('+next+')',d).css({zIndex:0});g.animationComplete(next+1);active=false})}else{control.children(':eq('+prev+')',d).css({display:'none',zIndex:0});control.children(':eq('+next+')',d).css({zIndex:0});g.animationComplete(next+1);active=false}})}else{control.children(':eq('+prev+')',d).fadeOut(g.fadeSpeed,g.fadeEasing,function(){if(g.autoHeight){control.animate({height:control.children(':eq('+next+')',d).outerHeight()},g.autoHeightSpeed,function(){control.children(':eq('+next+')',d).fadeIn(g.fadeSpeed,g.fadeEasing)})}else{control.children(':eq('+next+')',d).fadeIn(g.fadeSpeed,g.fadeEasing,function(){if($.browser.msie){$(this).get(0).style.removeAttribute('filter')}})}g.animationComplete(next+1);active=false})}}else{control.children(':eq('+next+')').css({left:position,display:'block'});if(g.autoHeight){control.animate({left:a,height:control.children(':eq('+next+')').outerHeight()},g.slideSpeed,g.slideEasing,function(){control.css({left:-width});control.children(':eq('+next+')').css({left:width,zIndex:5});control.children(':eq('+prev+')').css({left:width,display:'none',zIndex:0});g.animationComplete(next+1);active=false})}else{control.animate({left:a},g.slideSpeed,g.slideEasing,function(){control.css({left:-width});control.children(':eq('+next+')').css({left:width,zIndex:5});control.children(':eq('+prev+')').css({left:width,display:'none',zIndex:0});g.animationComplete(next+1);active=false})}}if(g.pagination){$('.'+g.paginationClass+' li.current',d).removeClass('current');$('.'+g.paginationClass+' li:eq('+next+')',d).addClass('current')}}}function stop(){clearInterval(d.data('interval'))}function pause(){if(g.pause){clearTimeout(d.data('pause'));clearInterval(d.data('interval'));pauseTimeout=setTimeout(function(){clearTimeout(d.data('pause'));playInterval=setInterval(function(){animate("next",effect)},g.play);d.data('interval',playInterval)},g.pause);d.data('pause',pauseTimeout)}else{stop()}}if(total<2){return}if(start<0){start=0}if(start>total){start=total-1}if(g.start){current=start}if(g.randomize){control.randomize()}$('.'+g.container,d).css({overflow:'hidden',position:'relative'});control.children().css({position:'absolute',top:0,left:control.children().outerWidth(),zIndex:0,display:'none'});control.css({position:'relative',width:(width*3),height:height,left:-width});$('.'+g.container,d).css({display:'block'});if(g.autoHeight){control.children().css({height:'auto'});control.animate({height:control.children(':eq('+start+')').outerHeight()},g.autoHeightSpeed)}if(g.preload&&control.find('img').length){$('.'+g.container,d).css({background:'url('+g.preloadImage+') no-repeat 50% 50%'});var f=control.find('img:eq('+start+')').attr('src')+'?'+(new Date()).getTime();if($('img',d).parent().attr('class')!='slides_control'){imageParent=control.children(':eq(0)')[0].tagName.toLowerCase()}else{imageParent=control.find('img:eq('+start+')')}control.find('img:eq('+start+')').attr('src',f).load(function(){control.find(imageParent+':eq('+start+')').fadeIn(g.fadeSpeed,g.fadeEasing,function(){$(this).css({zIndex:5});$('.'+g.container,d).css({background:''});loaded=true;g.slidesLoaded()})})}else{control.children(':eq('+start+')').fadeIn(g.fadeSpeed,g.fadeEasing,function(){loaded=true;g.slidesLoaded()})}if(g.bigTarget){control.children().css({cursor:'pointer'});control.children().click(function(){animate('next',effect);return false})}if(g.hoverPause&&g.play){control.bind('mouseover',function(){stop()});control.bind('mouseleave',function(){pause()})}if(g.generateNextPrev){$('.'+g.container,d).after('<a href="#" class="'+g.prev+'">Prev</a>');$('.'+g.prev,d).after('<a href="#" class="'+g.next+'">Next</a>')}$('.'+g.next,d).click(function(e){e.preventDefault();if(g.play){pause()}animate('next',effect)});$('.'+g.prev,d).click(function(e){e.preventDefault();if(g.play){pause()}animate('prev',effect)});if(g.generatePagination){d.append('<ul class='+g.paginationClass+'></ul>');control.children().each(function(){$('.'+g.paginationClass,d).append('<li><a href="#'+number+'">'+(number+1)+'</a></li>');number++})}else{$('.'+g.paginationClass+' li a',d).each(function(){$(this).attr('href','#'+number);number++})}$('.'+g.paginationClass+' li:eq('+start+')',d).addClass('current');$('.'+g.paginationClass+' li a',d).click(function(){if(g.play){pause()}clicked=$(this).attr('href').match('[^#/]+$');if(current!=clicked){animate('pagination',paginationEffect,clicked)}return false});$('a.link',d).click(function(){if(g.play){pause()}clicked=$(this).attr('href').match('[^#/]+$')-1;if(current!=clicked){animate('pagination',paginationEffect,clicked)}return false});if(g.play){playInterval=setInterval(function(){animate('next',effect)},g.play);d.data('interval',playInterval)}})};$.fn.slides.option={preload:false,preloadImage:'/img/loading.gif',container:'slides_container',generateNextPrev:false,next:'next',prev:'prev',pagination:true,generatePagination:true,paginationClass:'pagination',fadeSpeed:350,fadeEasing:'',slideSpeed:350,slideEasing:'',start:1,effect:'slide',crossfade:false,randomize:false,play:0,pause:0,hoverPause:false,autoHeight:false,autoHeightSpeed:350,bigTarget:false,animationStart:function(){},animationComplete:function(){},slidesLoaded:function(){}};$.fn.randomize=function(c){function randomizeOrder(){return(Math.round(Math.random())-0.5)}return($(this).each(function(){var $this=$(this);var $children=$this.children();var a=$children.length;if(a>1){$children.hide();var b=[];for(i=0;i<a;i++){b[b.length]=i}b=b.sort(randomizeOrder);$.each(b,function(j,k){var $child=$children.eq(k);var $clone=$child.clone(true);$clone.show().appendTo($this);if(c!==undefined){c($child,$clone)}$child.remove()})}}))}})(jQuery);

/*
 *  GMAP3 Plugin for JQuery 
 *  Version   : 4.0
 *  Date      : 2011-08-23
 *  Licence   : GPL v3 : http://www.gnu.org/licenses/gpl.html  
 *  Author    : DEMONTE Jean-Baptiste
 *  Contact   : jbdemonte@gmail.com
 *  Web site  : http://gmap3.net
 *   
 *  Copyright (c) 2010-2011 Jean-Baptiste DEMONTE
 *  All rights reserved.
 *   
 * Redistribution and use in source and binary forms, with or without 
 * modification, are permitted provided that the following conditions are met:
 * 
 *   - Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *   - Redistributions in binary form must reproduce the above 
 *     copyright notice, this list of conditions and the following 
 *     disclaimer in the documentation and/or other materials provided 
 *     with the distribution.
 *   - Neither the name of the author nor the names of its contributors 
 *     may be used to endorse or promote products derived from this 
 *     software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" 
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE 
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE 
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE 
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR 
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF 
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN 
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) 
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
 * POSSIBILITY OF SUCH DAMAGE.
 */
 
 (function(c){function q(){var D=[];this.empty=function(){for(var E=0;E<D.length;E++){if(D[E]){return false}}return true};this.add=function(E){D.push(E)};this.addNext=function(F){var H=[],G,E=0;for(G=0;G<D.length;G++){if(!D[G]){continue}if(E==1){H.push(F)}H.push(D[G]);E++}if(E<2){H.push(F)}D=H};this.get=function(){for(var E=0;E<D.length;E++){if(D[E]){return D[E]}}return false};this.ack=function(){for(var E=0;E<D.length;E++){if(D[E]){delete D[E];break}}if(this.empty()){D=[]}}}function o(){var D={};this.add=function(F,G,E){F=F.toLowerCase();if(!D[F]){D[F]=[]}D[F].push({obj:G,tag:s(E,"tag")});return F+"-"+(D[F].length-1)};this.get=function(G,I,F){var H,E,J;G=G.toLowerCase();if(!D[G]||!D[G].length){return null}E=I?D[G].length:-1;J=I?-1:1;for(H=0;H<D[G].length;H++){E+=J;if(D[G][E]){if(F!==undefined){if((D[G][E].tag===undefined)||(c.inArray(D[G][E].tag,F)<0)){continue}}return D[G][E].obj}}return null};this.all=function(G,F){var H,E=[];G=G.toLowerCase();if(!D[G]||!D[G].length){return E}for(H=0;H<D[G].length;H++){if(!D[G][H]){continue}if((F!==undefined)&&((D[G][H].tag===undefined)||(c.inArray(D[G][H].tag,F)<0))){continue}E.push(D[G][H].obj)}return E};this.names=function(){var F,E=[];for(F in D){E.push(F)}return E};this.refToObj=function(E){E=E.split("-");if((E.length==2)&&D[E[0]]&&D[E[0]][E[1]]){return D[E[0]][E[1]].obj}return null};this.rm=function(H,F,G){var E,J,I;H=H.toLowerCase();if(!D[H]){return false}if(F!==undefined){if(G){for(E=D[H].length-1;E>=0;E--){if((D[H][E]!==undefined)&&(D[H][E].tag!==undefined)&&(c.inArray(D[H][E].tag,F)>=0)){break}}}else{for(E=0;E<D[H].length;E++){if((D[H][E]!==undefined)&&(D[H][E].tag!==undefined)&&(c.inArray(D[H][E].tag,F)>=0)){break}}}}else{E=G?D[H].length-1:0}if(!(E in D[H])){return false}if(typeof(D[H][E].obj.setMap)==="function"){D[H][E].obj.setMap(null)}if(typeof(D[H][E].obj.remove)==="function"){D[H][E].obj.remove()}if(typeof(D[H][E].obj.free)==="function"){D[H][E].obj.free()}delete D[H][E].obj;if(F!==undefined){I=[];for(J=0;J<D[H].length;J++){if(J!==E){I.push(D[H][J])}}D[H]=I}else{if(G){D[H].pop()}else{D[H].shift()}}return true};this.clear=function(J,I,K,E){var F,H,G;if(!J||!J.length){J=[];for(F in D){J.push(F)}}else{J=g(J)}for(H=0;H<J.length;H++){if(J[H]){G=J[H].toLowerCase();if(!D[G]){continue}if(I){this.rm(G,E,true)}else{if(K){this.rm(G,E,false)}else{while(this.rm(G,E,false)){}}}}}}}function z(){var H=[],E=[],F=[],D=[],G=false,I;this.events=function(){for(var J=0;J<arguments.length;J++){E.push(arguments[J])}};this.startRedraw=function(){if(!G){G=true;return true}return false};this.endRedraw=function(){G=false};this.redraw=function(){var K,J=[],L=this;for(K=0;K<arguments.length;K++){J.push(arguments[K])}if(this.startRedraw){I.apply(L,J);this.endRedraw()}else{setTimeout(function(){L.redraw.apply(L,J)},50)}};this.setRedraw=function(J){I=J};this.store=function(J,K,L){F.push({data:J,obj:K,shadow:L})};this.free=function(){for(var J=0;J<E.length;J++){google.maps.event.removeListener(E[J])}E=[];this.freeAll()};this.freeIndex=function(J){if(typeof(F[J].obj.setMap)==="function"){F[J].obj.setMap(null)}if(typeof(F[J].obj.remove)==="function"){F[J].obj.remove()}if(F[J].shadow){if(typeof(F[J].shadow.remove)==="function"){F[J].obj.remove()}if(typeof(F[J].shadow.setMap)==="function"){F[J].shadow.setMap(null)}delete F[J].shadow}delete F[J].obj;delete F[J].data;delete F[J]};this.freeAll=function(){var J;for(J=0;J<F.length;J++){if(F[J]){this.freeIndex(J)}}F=[]};this.freeDiff=function(M){var L,K,N={},J=[];for(L=0;L<M.length;L++){J.push(M[L].idx.join("-"))}for(L=0;L<F.length;L++){if(!F[L]){continue}K=c.inArray(F[L].data.idx.join("-"),J);if(K>=0){N[K]=true}else{this.freeIndex(L)}}return N};this.add=function(K,J){H.push({latLng:K,marker:J})};this.get=function(J){return H[J]};this.clusters=function(ag,L,K){var M=ag.getProjection(),X=M.fromLatLngToPoint(new google.maps.LatLng(ag.getBounds().getNorthEast().lat(),ag.getBounds().getSouthWest().lng())),ac,aa,J,W,U,T,Y,R,S=ag.getZoom(),O={},af={},ab={},Q=[],ad,ae,N,ah,V,Z,P=ag.getBounds();Z=0;V={};for(ac=0;ac<H.length;ac++){if(!P.contains(H[ac].latLng)){continue}W=M.fromLatLngToPoint(H[ac].latLng);O[ac]=[Math.floor((W.x-X.x)*Math.pow(2,S)),Math.floor((W.y-X.y)*Math.pow(2,S))];V[ac]=true;Z++}if(!K){for(Y=0;Y<D.length;Y++){if(Y in V){Z--}else{break}}if(!Z){return false}}D=V;V=[];for(ac in O){U=O[ac][0];T=O[ac][1];if(!(U in af)){af[U]={}}if(!(T in af[U])){af[U][T]=ac;ab[ac]={};V.push(ac)}ab[af[U][T]][ac]=true}L=Math.pow(L,2);delete (af);Y=0;while(1){while((Y<V.length)&&!(V[Y] in ab)){Y++}if(Y==V.length){break}ac=V[Y];N=O[ac][0];ah=O[ac][1];af=null;do{ad={lat:0,lng:0,idx:[]};for(R=Y;R<V.length;R++){if(!(V[R] in ab)){continue}aa=V[R];if(Math.pow(N-O[aa][0],2)+Math.pow(ah-O[aa][1],2)<=L){for(J in ab[aa]){ad.lat+=H[J].latLng.lat();ad.lng+=H[J].latLng.lng();ad.idx.push(J)}}}ad.lat/=ad.idx.length;ad.lng/=ad.idx.length;if(!af){ae=ad.idx.length>1;af=ad}else{ae=ad.idx.length>af.idx.length;if(ae){af=ad}}if(ae){W=M.fromLatLngToPoint(new google.maps.LatLng(af.lat,af.lng));N=Math.floor((W.x-X.x)*Math.pow(2,S));ah=Math.floor((W.y-X.y)*Math.pow(2,S))}}while(ae);for(R=0;R<af.idx.length;R++){if(af.idx[R] in ab){delete (ab[af.idx[R]])}}Q.push(af)}return Q};this.getBounds=function(){var J,K=new google.maps.LatLngBounds();for(J=0;J<H.length;J++){K.extend(H[J].latLng)}return K}}var e={verbose:false,queryLimit:{attempt:5,delay:250,random:250},init:{mapTypeId:google.maps.MapTypeId.ROADMAP,center:[46.578498,2.457275],zoom:2},classes:{Map:google.maps.Map,Marker:google.maps.Marker,InfoWindow:google.maps.InfoWindow,Circle:google.maps.Circle,Rectangle:google.maps.Rectangle,OverlayView:google.maps.OverlayView,StreetViewPanorama:google.maps.StreetViewPanorama,KmlLayer:google.maps.KmlLayer,TrafficLayer:google.maps.TrafficLayer,BicyclingLayer:google.maps.BicyclingLayer,GroundOverlay:google.maps.GroundOverlay,StyledMapType:google.maps.StyledMapType}},v=["events","onces","options","apply","callback","data","tag"],i=["init","geolatlng","getlatlng","getroute","getelevation","getdistance","addstyledmap","setdefault","destroy"],p=["get"],m=directionsService=elevationService=maxZoomService=distanceMatrixService=null;function B(E){for(var D in E){if(typeof(e[D])==="object"){e[D]=c.extend({},e[D],E[D])}else{e[D]=E[D]}}}function u(E){if(!E){return true}for(var D=0;D<i.length;D++){if(i[D]===E){return false}}return true}function n(D){var F=s(D,"action");for(var E=0;E<p.length;E++){if(p[E]===F){return true}}return false}function t(E,F){if(F.toLowerCase){F=F.toLowerCase();for(var D in E){if(D.toLowerCase&&(D.toLowerCase()==F)){return D}}}return false}function s(E,F,G){var D=t(E,F);return D?E[D]:G}function C(E,F){var G,D;if(!E||!F){return false}F=g(F);for(G in E){if(G.toLowerCase){G=G.toLowerCase();for(D in F){if(G==F[D]){return true}}}}return false}function h(F,E,D){if(C(F,v)||C(F,E)){var H,G;for(H=0;H<v.length;H++){G=t(F,v[H]);D[v[H]]=G?F[G]:{}}if(E&&E.length){for(H=0;H<E.length;H++){if(G=t(F,E[H])){D[E[H]]=F[G]}}}return D}else{D.options={};for(G in F){if(G!=="action"){D.options[G]=F[G]}}return D}}function A(H,F,E,G){var K=t(F,H),I,D={},J=["map"];D.callback=s(F,"callback");E=g(E);G=g(G);if(K){return h(F[K],E,D)}if(G&&G.length){for(I=0;I<G.length;I++){J.push(G[I])}}if(!C(F,J)){D=h(F,E,D)}for(I=0;I<v.length;I++){if(v[I] in D){continue}D[v[I]]={}}return D}function l(){if(!m){m=new google.maps.Geocoder()}return m}function a(){if(!directionsService){directionsService=new google.maps.DirectionsService()}return directionsService}function r(){if(!elevationService){elevationService=new google.maps.ElevationService()}return elevationService}function x(){if(!maxZoomService){maxZoomService=new google.maps.MaxZoomService()}return maxZoomService}function b(){if(!distanceMatrixService){distanceMatrixService=new google.maps.DistanceMatrixService()}return distanceMatrixService}function d(D){return(typeof(D)==="number"||typeof(D)==="string")&&D!==""&&!isNaN(D)}function g(F){var E,D=[];if(F!==undefined){if(typeof(F)==="object"){if(typeof(F.length)==="number"){D=F}else{for(E in F){D.push(F[E])}}}else{D.push(F)}}return D}function f(E,G,D){var F=G?E:null;if(!E||(typeof(E)==="string")){return F}if(E.latLng){return f(E.latLng)}if(typeof(E.lat)==="function"){return E}else{if(d(E.lat)){return new google.maps.LatLng(E.lat,E.lng)}else{if(!D&&E.length){if(!d(E[0])||!d(E[1])){return F}return new google.maps.LatLng(E[0],E[1])}}}return F}function j(E,F,I){var H,D,G;if(!E){return null}G=I?E:null;if(typeof(E.getCenter)==="function"){return E}if(E.length){if(E.length==2){H=f(E[0]);D=f(E[1])}else{if(E.length==4){H=f([E[0],E[1]]);D=f([E[2],E[3]])}}}else{if(("ne" in E)&&("sw" in E)){H=f(E.ne);D=f(E.sw)}else{if(("n" in E)&&("e" in E)&&("s" in E)&&("w" in E)){H=f([E.n,E.e]);D=f([E.s,E.w])}}}if(H&&D){return new google.maps.LatLngBounds(D,H)}return G}function w(I){var D=new q(),F=new o(),H=null,G={},E=false;this._plan=function(K){for(var J=0;J<K.length;J++){D.add(K[J])}this._run()};this._planNext=function(J){D.addNext(J)};this._direct=function(J){var K=s(J,"action");return this[K](c.extend({},K in e?e[K]:{},J.args?J.args:J))};this._end=function(){E=false;D.ack();this._run()},this._run=function(){if(E){return}var J=D.get();if(!J){return}E=true;this._proceed(J)};this._proceed=function(J){J=J||{};var O=s(J,"action")||"init",N=O.toLowerCase(),M=true,P=s(J,"target"),L=s(J,"args"),K;if(!H&&u(N)){this.init(c.extend({},e.init,J.args&&J.args.map?J.args.map:J.map?J.map:{}),true)}if(!P&&!L&&(N in this)&&(typeof(this[N])==="function")){this[N](c.extend({},N in e?e[N]:{},J.args?J.args:J))}else{if(P&&(typeof(P)==="object")){if(M=(typeof(P[O])==="function")){K=P[O].apply(P,J.args?J.args:[])}}else{if(H){if(M=(typeof(H[O])==="function")){K=H[O].apply(H,J.args?J.args:[])}}}if(!M&&e.verbose){alert("unknown action : "+O)}this._callback(K,J);this._end()}};this._resolveLatLng=function(J,P,M,L){var K=s(J,"address"),O,N=this;if(K){if(!L){L=0}if(typeof(K)==="object"){O=K}else{O={address:K}}l().geocode(O,function(R,Q){if(Q===google.maps.GeocoderStatus.OK){N[P](J,M?R:R[0].geometry.location)}else{if((Q===google.maps.GeocoderStatus.OVER_QUERY_LIMIT)&&(L<e.queryLimit.attempt)){setTimeout(function(){N._resolveLatLng(J,P,M,L+1)},e.queryLimit.delay+Math.floor(Math.random()*e.queryLimit.random))}else{if(e.verbose){alert("Geocode error : "+Q)}N[P](J,false)}}})}else{N[P](J,f(J,false,true))}},this._call=function(){var K,L=arguments[0],J=[];if(!arguments.length||!H||(typeof(H[L])!=="function")){return}for(K=1;K<arguments.length;K++){J.push(arguments[K])}return H[L].apply(H,J)};this._subcall=function(J,L){var K={};if(!J.map){return}if(!L){L=s(J.map,"latlng")}if(!H){if(L){K={center:L}}this.init(c.extend({},J.map,K),true)}else{if(J.map.center&&L){this._call("setCenter",L)}if(J.map.zoom!==undefined){this._call("setZoom",J.map.zoom)}if(J.map.mapTypeId!==undefined){this._call("setMapTypeId",J.map.mapTypeId)}}};this._attachEvent=function(K,J,N,M,L){google.maps.event["addListener"+(L?"Once":"")](K,J,function(O){N.apply(I,[K,O,M])})};this._attachEvents=function(L,J){var K;if(!J){return}if(J.events){for(K in J.events){if(typeof(J.events[K])==="function"){this._attachEvent(L,K,J.events[K],J.data,false)}}}if(J.onces){for(K in J.onces){if(typeof(J.onces[K])==="function"){this._attachEvent(L,K,J.onces[K],J.data,true)}}}};this._callback=function(K,J){if(typeof(J.callback)==="function"){J.callback.apply(I,[K])}else{if(typeof(J.callback)==="object"){for(var L=0;L<J.callback.length;L++){if(typeof(J.callback[L])==="function"){J.callback[k].apply(I,[K])}}}}};this._manageEnd=function(K,J,L){var N,M;if(K&&(typeof(K)==="object")){this._attachEvents(K,J);if(J.apply&&J.apply.length){for(N=0;N<J.apply.length;N++){M=J.apply[N];if(!M.action||(typeof(K[M.action])!=="function")){continue}if(M.args){K[M.action].apply(K,M.args)}else{K[M.action]()}}}}if(!L){this._callback(K,J);this._end()}};this.destroy=function(J){var K;F.clear();I.empty();for(K in G){delete G[K]}G={};if(H){delete H}this._callback(I,null,J);this._end()};this.init=function(J,K){var M,L;if(H){return this._end()}M=A("map",J);if((typeof(M.options.center)==="boolean")&&M.options.center){return false}opts=c.extend({},e.init,M.options);if(!opts.center){opts.center=[e.init.center.lat,e.init.center.lng]}opts.center=f(opts.center);H=new e.classes.Map(I.get(0),opts);for(L in G){H.mapTypes.set(L,G[L])}this._manageEnd(H,M,K);return true};this.getlatlng=function(J){this._resolveLatLng(J,"_getLatLng",true)},this._getLatLng=function(J,K){this._manageEnd(K,J)},this.getaddress=function(J){var L=f(J,false,true),K=s(J,"address"),M=L?{latLng:L}:(K?(typeof(K)==="string"?{address:K}:K):null),N=s(J,"callback");if(M&&typeof(N)==="function"){l().geocode(M,function(Q,O){var P=O===google.maps.GeocoderStatus.OK?Q:false;N.apply(I,[P,O])})}this._end()};this.getroute=function(J){var K=s(J,"callback");if((typeof(K)==="function")&&J.options){J.options.origin=f(J.options.origin,true);J.options.destination=f(J.options.destination,true);a().route(J.options,function(N,L){var M=L==google.maps.DirectionsStatus.OK?N:false;K.apply(I,[M,L])})}this._end()};this.getelevation=function(K){var P,N,O,L,M,J=[],Q=s(K,"callback"),N=s(K,"latlng");if(typeof(Q)==="function"){P=function(T,R){var S=R===google.maps.ElevationStatus.OK?T:false;Q.apply(I,[S,R])};if(N){J.push(f(N))}else{J=s(K,"locations")||[];if(J){J=g(J);for(M=0;M<J.length;M++){J[M]=f(J[M])}}}if(J.length){r().getElevationForLocations({locations:J},P)}else{O=s(K,"path");L=s(K,"samples");if(O&&L){for(M=0;M<O.length;M++){J.push(f(O[M]))}if(J.length){r().getElevationAlongPath({path:J,samples:L},P)}}}}this._end()};this.getdistance=function(J){var K,L=s(J,"callback");if((typeof(L)==="function")&&J.options&&J.options.origins&&J.options.destinations){J.options.origins=g(J.options.origins);for(K=0;K<J.options.origins.length;K++){J.options.origins[K]=f(J.options.origins[K],true)}J.options.destinations=g(J.options.destinations);for(K=0;K<J.options.destinations.length;K++){J.options.destinations[K]=f(J.options.destinations[K],true)}b().getDistanceMatrix(J.options,function(O,M){var N=M==google.maps.DistanceMatrixStatus.OK?O:false;L.apply(I,[N,M])})}};this.addmarker=function(J){this._resolveLatLng(J,"_addMarker")};this._addMarker=function(K,N,L){var J,M,P,O=A("marker",K,"to");if(!L){if(!N){this._manageEnd(false,O);return}this._subcall(K,N)}else{if(!N){return}}if(O.to){P=F.refToObj(O.to);J=P&&(typeof(P.add)==="function");if(J){P.add(N,K);if(typeof(P.redraw)==="function"){P.redraw()}}if(!L){this._manageEnd(J,O)}}else{O.options.position=N;O.options.map=H;J=new e.classes.Marker(O.options);if(C(K,"infowindow")){M=A("infowindow",K.infowindow,"open");if((M.open===undefined)||M.open){M.apply=g(M.apply);M.apply.unshift({action:"open",args:[H,J]})}M.action="addinfowindow";this._planNext(M)}if(!L){F.add("marker",J,O);this._manageEnd(J,O)}}return J};this.addmarkers=function(J){if(s(J,"clusters")){this._addclusteredmarkers(J)}else{this._addmarkers(J)}};this._addmarkers=function(L){var S,J,N,K,P,R={},O,Q,M=s(L,"markers");this._subcall(L);if(typeof(M)!=="object"){return this._end()}J=A("marker",L,["to","markers"]);if(J.to){Q=F.refToObj(J.to);S=Q&&(typeof(Q.add)==="function");if(S){for(N=0;N<M.length;N++){if(K=f(M[N])){Q.add(K,M[N])}}if(typeof(Q.redraw)==="function"){Q.redraw()}}this._manageEnd(S,J)}else{c.extend(true,R,J.options);R.map=H;S=[];for(N=0;N<M.length;N++){if(K=f(M[N])){if(M[N].options){O={};c.extend(true,O,R,M[N].options);J.options=O}else{J.options=R}J.options.position=K;P=new e.classes.Marker(J.options);S.push(P);J.data=M[N].data;J.tag=M[N].tag;F.add("marker",P,J);this._manageEnd(P,J,true)}}J.options=R;this._callback(S,L);this._end()}};this._addclusteredmarkers=function(K){var N,M,J,Q,O=this,P=s(K,"radius"),L=s(K,"markers"),R=s(K,"clusters");if(!H.getBounds()){google.maps.event.addListenerOnce(H,"bounds_changed",function(){O._addclusteredmarkers(K)});return}if(typeof(P)==="number"){N=new z();for(M=0;M<L.length;M++){J=f(L[M]);N.add(J,L[M])}Q=this._initClusters(K,N,P,R)}this._callback(Q,K);this._end()};this._initClusters=function(K,L,J,N){var M=this;L.setRedraw(function(P){var Q,O=L.clusters(H,J,P);if(O){Q=L.freeDiff(O);M._displayClusters(K,L,O,Q,N)}});L.events(google.maps.event.addListener(H,"zoom_changed",function(){L.redraw(true)}),google.maps.event.addListener(H,"bounds_changed",function(){L.redraw()}));L.redraw();return F.add("cluster",L,K)};this._displayClusters=function(N,Y,M,X,O){var W,Z,R,V,T,S,L,aa,J,ac,Q,ab,K,P=C(N,"cluster")?A("",s(N,"cluster")):{},U=C(N,"marker")?A("",s(N,"marker")):{};for(Z=0;Z<M.length;Z++){if(Z in X){continue}aa=M[Z];T=false;if(aa.idx.length>1){V=0;for(W in O){if((W>V)&&(W<=aa.idx.length)){V=W}}if(O[V]){Q=s(O[V],"width");ab=s(O[V],"height");K={};c.extend(true,K,P,{options:{pane:"overlayLayer",content:O[V].content.replace("CLUSTER_COUNT",aa.idx.length),offset:{x:-Q/2,y:-ab/2}}});S=this._addOverlay(K,f(aa),true);K.options.pane="floatShadow";K.options.content=c("<div></div>");K.options.content.width(Q);K.options.content.height(ab);L=this._addOverlay(K,f(aa),true);P.data={latLng:f(aa),markers:[]};for(R=0;R<aa.idx.length;R++){P.data.markers.push(Y.get(aa.idx[R]).marker)}this._attachEvents(L,P);Y.store(aa,S,L);T=true}}if(!T){J={};c.extend(true,J,U.options);for(R=0;R<aa.idx.length;R++){V=Y.get(aa.idx[R]);U.latLng=V.latLng;U.data=V.marker.data;U.tag=V.marker.tag;if(V.marker.options){ac={};c.extend(true,ac,J,V.marker.options);U.options=ac}else{U.options=J}S=this._addMarker(U,U.latLng,true);this._attachEvents(S,U);Y.store(aa,S)}U.options=J}}};this.addinfowindow=function(J){this._resolveLatLng(J,"_addInfoWindow")};this._addInfoWindow=function(J,L){var N,M,K=[];this._subcall(J,L);N=A("infowindow",J,["open","anchor"]);if(L){N.options.position=L}M=new e.classes.InfoWindow(N.options);if((N.open===undefined)||N.open){N.apply=g(N.apply);K.push(H);if(N.anchor){K.push(N.anchor)}N.apply.unshift({action:"open",args:K})}F.add("infowindow",M,N);this._manageEnd(M,N)};this.addpolyline=function(J){this._addPoly(J,"Polyline","path")};this.addpolygon=function(J){this._addPoly(J,"Polygon","paths")};this._addPoly=function(J,M,O){var K,N,L,P=A(M.toLowerCase(),J,O);if(P[O]){P.options[O]=[];for(K=0;K<P[O].length;K++){if(L=f(P[O][K])){P.options[O].push(L)}}}N=new google.maps[M](P.options);N.setMap(H);F.add(M.toLowerCase(),N,P);this._manageEnd(N,P)};this.addcircle=function(J){this._resolveLatLng(J,"_addCircle")};this._addCircle=function(J,K){var M,L=A("circle",J);if(!K){K=f(L.options.center)}if(!K){return this._manageEnd(false,L)}this._subcall(J,K);L.options.center=K;L.options.map=H;M=new e.classes.Circle(L.options);F.add("circle",M,L);this._manageEnd(M,L)};this.addrectangle=function(J){this._resolveLatLng(J,"_addRectangle")};this._addRectangle=function(J,L){var K,M=A("rectangle",J);M.options.bounds=j(M.options.bounds,true);if(!M.options.bounds){return this._manageEnd(false,M)}this._subcall(J,M.options.bounds.getCenter());M.options.map=H;K=new e.classes.Rectangle(M.options);F.add("rectangle",K,M);this._manageEnd(K,M)};this.addoverlay=function(J){this._resolveLatLng(J,"_addOverlay")};this._addOverlay=function(N,L,O){var M,K=A("overlay",N),J=c.extend({pane:"floatPane",content:"",offset:{x:0,y:0}},K.options),R=c("<div></div>"),Q=[];R.css("border","none").css("borderWidth","0px").css("position","absolute");R.append(J.content);function P(){e.classes.OverlayView.call(this);this.setMap(H)}P.prototype=new e.classes.OverlayView();P.prototype.onAdd=function(){var S=this.getPanes();if(J.pane in S){c(S[J.pane]).append(R)}};P.prototype.draw=function(){var S=this.getProjection(),U=S.fromLatLngToDivPixel(L),T=this;R.css("left",(U.x+J.offset.x)+"px").css("top",(U.y+J.offset.y)+"px");c.each(("dblclick click mouseover mousemove mouseout mouseup mousedown").split(" "),function(W,V){Q.push(google.maps.event.addDomListener(R[0],V,function(X){google.maps.event.trigger(T,V)}))});Q.push(google.maps.event.addDomListener(R[0],"contextmenu",function(V){google.maps.event.trigger(T,"rightclick")}))};P.prototype.onRemove=function(){for(var S=0;S<Q.length;S++){google.maps.event.removeListener(Q[S])}R.remove()};P.prototype.hide=function(){R.hide()};P.prototype.show=function(){R.show()};P.prototype.toggle=function(){if(R){if(R.is(":visible")){this.show()}else{this.hide()}}};P.prototype.toggleDOM=function(){if(this.getMap()){this.setMap(null)}else{this.setMap(H)}};P.prototype.getDOMElement=function(){return R[0]};M=new P();if(!O){F.add("overlay",M,K);this._manageEnd(M,K)}return M};this.addfixpanel=function(K){var N=A("fixpanel",K),J=y=0,M,L;if(N.options.content){M=c(N.options.content);if(N.options.left!==undefined){J=N.options.left}else{if(N.options.right!==undefined){J=I.width()-M.width()-N.options.right}else{if(N.options.center){J=(I.width()-M.width())/2}}}if(N.options.top!==undefined){y=N.options.top}else{if(N.options.bottom!==undefined){y=I.height()-M.height()-N.options.bottom}else{if(N.options.middle){y=(I.height()-M.height())/2}}}L=c("<div></div>").css("position","absolute").css("top",y+"px").css("left",J+"px").css("z-index","1000").append(M);I.first().prepend(L);this._attachEvents(H,N);F.add("fixpanel",L,N);this._callback(L,N)}this._end()};this.adddirectionsrenderer=function(J,K){var L,M=A("directionrenderer",J,"panelId");F.rm("directionrenderer");M.options.map=H;L=new google.maps.DirectionsRenderer(M.options);if(M.panelId){L.setPanel(document.getElementById(M.panelId))}F.add("directionrenderer",L,M);this._manageEnd(L,M,K);return L};this.setdirectionspanel=function(J){var K=F.get("directionrenderer"),L=A("directionpanel",J,"id");if(K&&L.id){K.setPanel(document.getElementById(L.id))}this._manageEnd(K,L)};this.setdirections=function(J){var K=F.get("directionrenderer"),L=A("directions",J);if(J){L.options.directions=J.directions?J.directions:(J.options&&J.options.directions?J.options.directions:null)}if(L.options.directions){if(!K){K=this.adddirectionsrenderer(L,true)}else{K.setDirections(L.options.directions)}}this._manageEnd(K,L)};this.setstreetview=function(J){var K,L=A("streetview",J,"id");if(L.options.position){L.options.position=f(L.options.position)}K=new e.classes.StreetViewPanorama(document.getElementById(L.id),L.options);if(K){H.setStreetView(K)}this._manageEnd(K,L)};this.addkmllayer=function(K){var J,L=A("kmllayer",K,"url");L.options.map=H;if(typeof(L.url)==="string"){J=new e.classes.KmlLayer(L.url,L.options)}F.add("kmllayer",J,L);this._manageEnd(J,L)};this.addtrafficlayer=function(J){var L=A("trafficlayer",J),K=F.get("trafficlayer");if(!K){K=new e.classes.TrafficLayer();K.setMap(H);F.add("trafficlayer",K,L)}this._manageEnd(K,L)};this.addbicyclinglayer=function(J){var K=A("bicyclinglayer",J),L=F.get("bicyclinglayer");if(!L){L=new e.classes.BicyclingLayer();L.setMap(H);F.add("bicyclinglayer",L,K)}this._manageEnd(L,K)};this.addgroundoverlay=function(J){var K,L=A("groundoverlay",J,["bounds","url"]);L.bounds=j(L.bounds);if(L.bounds&&(typeof(L.url)==="string")){K=new e.classes.GroundOverlay(L.url,L.bounds);K.setMap(H);F.add("groundoverlay",K,L)}this._manageEnd(K,L)};this.geolatlng=function(J){var K=s(J,"callback");if(typeof(K)==="function"){if(navigator.geolocation){navigator.geolocation.getCurrentPosition(function(L){var M=new google.maps.LatLng(L.coords.latitude,L.coords.longitude);K.apply(I,[M])},function(){var L=false;K.apply(I,[L])})}else{if(google.gears){google.gears.factory.create("beta.geolocation").getCurrentPosition(function(L){var M=new google.maps.LatLng(L.latitude,L.longitude);K.apply(I,[M])},function(){out=false;K.apply(I,[out])})}else{K.apply(I,[false])}}}this._end()};this.addstyledmap=function(J,K){var L=A("styledmap",J,["id","style"]);if(L.style&&L.id&&!G[L.id]){G[L.id]=new e.classes.StyledMapType(L.style,L.options);if(H){H.mapTypes.set(L.id,G[L.id])}}this._manageEnd(G[L.id],L,K)};this.setstyledmap=function(J){var K=A("styledmap",J,["id","style"]);if(K.id){this.addstyledmap(K,true);if(G[K.id]){H.setMapTypeId(K.id);this._callback(G[K.id],J)}}this._manageEnd(G[K.id],K)};this.clear=function(K){var M=g(s(K,"list")||s(K,"name")),L=s(K,"last",false),N=s(K,"first",false),J=s(K,"tag");if(J!==undefined){J=g(J)}F.clear(M,L,N,J);this._end()};this.get=function(K){var L=s(K,"name")||"map",N=s(K,"first"),M=s(K,"all"),J=s(K,"tag");L=L.toLowerCase();if(L==="map"){return H}if(J!==undefined){J=g(J)}if(N){return F.get(L,false,J)}else{if(M){return F.all(L,J)}else{return F.get(L,true,J)}}};this.getmaxzoom=function(J){this._resolveLatLng(J,"_getMaxZoom")};this._getMaxZoom=function(J,K){var L=s(J,"callback");if(L&&typeof(L)==="function"){x().getMaxZoomAtLatLng(K,function(M){var N=M.status===google.maps.MaxZoomStatus.OK?M.zoom:false;L.apply(I,[N,M.status])})}this._end()};this.setdefault=function(J){B(J);this._end()};this.autofit=function(K,O){var R,Q,M,N,L,P=true,J=new google.maps.LatLngBounds();R=F.names();for(N=0;N<R.length;N++){Q=F.all(R[N]);for(L=0;L<Q.length;L++){M=Q[L];if(M.getPosition){J.extend(M.getPosition());P=false}else{if(M.getBounds){J.extend(M.getBounds().getNorthEast());J.extend(M.getBounds().getSouthWest());P=false}else{if(M.getPaths){M.getPaths().forEach(function(S){S.forEach(function(T){J.extend(T);P=false})})}else{if(M.getPath){M.getPath().forEach(function(S){J.extend(S);P=false})}else{if(M.getCenter){J.extend(M.getCenter());P=false}}}}}}}if(!P){H.fitBounds(J)}if(!O){this._manageEnd(P?false:J,K,O)}}}c.fn.gmap3=function(){var F,D,H=[],G=true,E=[];for(F=0;F<arguments.length;F++){D=arguments[F]||{};if(typeof(D)==="string"){D={action:D}}H.push(D)}if(!H.length){H.push({})}c.each(this,function(){var I=c(this),J=I.data("gmap3");G=false;if(!J){J=new w(I);I.data("gmap3",J)}if((H.length==1)&&(n(H[0]))){E.push(J._direct(H[0]))}else{J._plan(H)}});if(E.length){if(E.length===1){return E[0]}else{return E}}if(G&&(arguments.length==2)&&(typeof(arguments[0])==="string")&&(arguments[0].toLowerCase()==="setdefault")){B(arguments[1])}return this}}(jQuery));

/**
 * Cookie plugin
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

/**
 * Create a cookie with the given name and value and other optional parameters.
 *
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Set the value of a cookie.
 * @example $.cookie('the_cookie', 'the_value', { expires: 7, path: '/', domain: 'jquery.com', secure: true });
 * @desc Create a cookie with all available options.
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Create a session cookie.
 * @example $.cookie('the_cookie', null);
 * @desc Delete a cookie by passing null as value. Keep in mind that you have to use the same path and domain
 *       used when the cookie was set.
 *
 * @param String name The name of the cookie.
 * @param String value The value of the cookie.
 * @param Object options An object literal containing key/value pairs to provide optional cookie attributes.
 * @option Number|Date expires Either an integer specifying the expiration date from now on in days or a Date object.
 *                             If a negative value is specified (e.g. a date in the past), the cookie will be deleted.
 *                             If set to null or omitted, the cookie will be a session cookie and will not be retained
 *                             when the the browser exits.
 * @option String path The value of the path atribute of the cookie (default: path of page that created the cookie).
 * @option String domain The value of the domain attribute of the cookie (default: domain of page that created the cookie).
 * @option Boolean secure If true, the secure attribute of the cookie will be set and the cookie transmission will
 *                        require a secure protocol (like HTTPS).
 * @type undefined
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */

/**
 * Get the value of a cookie with the given name.
 *
 * @example $.cookie('the_cookie');
 * @desc Get the value of a cookie.
 *
 * @param String name The name of the cookie.
 * @return The value of the cookie.
 * @type String
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};