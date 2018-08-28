(function(jQuery){

	$.fn.ideaboxNews = function(settings){
			var defaults={
					maxwidth		:'100%',
					newscount		:5,
					position		:'relative',
					openspeed		:'normal',
					headercolor		:'#FFFFFF',
					headerbgcolor	:'#9d5454',
					modulid			:'ideaboxNews',
					feed			:false,
					feedimage		:'img/in-rss-image.jpg',
					feedcount		:10,
					feedlink		:'self',
					feedupdatetimer	:0
				};
			var settings=$.extend(defaults,settings);
			
			return this.each(function(){
				settings.modulid=$(this);
				count=settings.modulid.children("ul").children("li").length;
				if (settings.feed!=false)
				{
					settings.modulid.children("ul").html("<li>Loading...</li>");
					getRSS();
					
					if (settings.feedupdatetimer!=0)
					{
						setInterval(function () {
							settings.modulid.children("ul").find("li").remove();
							settings.modulid.find("ul:first").mCustomScrollbar("destroy");
							getRSS();
						}, settings.feedupdatetimer);
					}
				}
				else
				{
					settings.modulid.find("ul:first").mCustomScrollbar({
						axis:"y",
						theme:"minimal-dark"
					});
					
					settings.modulid.children("ul").find("li").on("click",function() {
						settings.modulid=$(this).parents(".ideaboxNews");
						if ( settings.modulid.children("h3").text()!="" )
							settings.modulid.children(".in-viewer").css({"top":settings.modulid.find("h3").height()+40});
						else
							settings.modulid.children(".in-viewer").css({"top":0});
						readNews($(this));
					});
				}
				
				if (settings.openspeed=="fast")
					speed=0;
				else if (settings.openspeed=="slow")
					speed=600;
				else
					speed=300;
				
				if (settings.position=='rightfixed' ||settings.position=='leftfixed')
					settings.modulid.children("ul").css({"height":"100%"});
				else
					settings.modulid.children("ul").css({"height":settings.newscount*80});
					
				settings.modulid.css({"max-width":settings.maxwidth});
				settings.modulid.children("h3").css({"color":settings.headercolor,"background":settings.headerbgcolor});
				settings.modulid.addClass("in-"+settings.position);

				settings.modulid.children(".in-viewer").children(".in-viewer-close").on("click",function() {
					$(this).parent().fadeOut("fast",function(){
						settings.modulid=$(this).parent();
						closeNews();
					});
                });
				
				resizeEvent();
				$(window).on("resize",function(){
					resizeEvent();
				});
				
				
				//=================================================
				//FUNCTIONS========================================
				function readNews(obj)
				{
					mW=settings.modulid.width();
					settings.modulid.children(".in-viewer").find(".in-viewer-header img").attr("src",obj.find(".in-image img").attr("src"))
					settings.modulid.children(".in-viewer").find(".in-viewer-header div h2").html(obj.find(".in-content h2").html());
					settings.modulid.children(".in-viewer").find(".in-viewer-header div span").html(obj.find(".in-content span:first").html());
					settings.modulid.children(".in-viewer").find(".in-viewer-content").html(obj.find(".in-content div:first").html());
					settings.modulid.children("ul").find("li").each(function(index, element) {
						if (index<count-1)
							$(this).animate({left:-mW},speed+(index*20));
						else
							$(this).animate({left:-mW},speed+(index*20),function(){
								settings.modulid.children("ul").find("li").css({"display":"none"});
								settings.modulid.children(".in-viewer").fadeIn("normal",function (){
									settings.modulid.find(".in-viewer-content").mCustomScrollbar({
										axis:"y",
										theme:"minimal-dark"
									});
								});
							});
					});
				}
				
				function closeNews()
				{
					//alert(settings.modulid.attr("id"));
					settings.modulid.children("ul").find("li").css({"display":"block"});
					settings.modulid.children("ul").find("li").each(function(index, element) {
						$(this).animate({left:0},speed+(index*20));
						settings.modulid.find(".in-viewer-content").mCustomScrollbar("destroy");
					});
				}
				
				function resizeEvent()
				{
					if ( settings.modulid.children("h3").text()!="" )
						settings.modulid.children(".in-viewer").css({"top":settings.modulid.find("h3").height()+40});
					else
						settings.modulid.children(".in-viewer").css({"top":0});
				}
				
				
				/*RSS----------------------------*/
				function getRSSx(a,b,c)
				{
					c=new XMLHttpRequest;
					c.open('GET',a);
					c.onload=b;
					c.send()
				}
				
				function yql(a,b)
				{
					return 'http://query.yahooapis.com/v1/public/yql?q='+encodeURIComponent('select * from '+b+' where url=\"'+a+'\" limit '+settings.feedcount)+'&format=json';
				};
				
				function getRSS()
				{
					feeds=settings.feed.split(",");
					labels=settings.feedlabels.split(",");
					var colors=["in-red","in-blue","in-purple","in-yellow","in-green","in-orange","in-grey","in-darkblue","in-turquoise"];
					count=0;
					settings.modulid.children("ul").html("");
					xx=0;
					for (k=0; k<feeds.length; k++)
					{
						getRSSx(yql(feeds[k].trim(),'rss'),function()
						{ 
							var resultx=JSON.parse(this.response); 
							resultx=resultx.query.results.item;								
							var rand = Math.floor((Math.random()*9)+1);	
							
							$(resultx).each(function(index, element) {
								count++;
								if (settings.feedlink=="blank")
									datalink=' data-link="'+resultx[index].link+'" ';
								else
									datalink='';
								settings.modulid.children("ul").append('<li '+datalink+'>'+
									'<div class="in-image">'+
									'	<img src="'+settings.feedimage+'">'+
									'	<span class="'+colors[rand]+'"><h6>'+labels[xx]+'</h6></span>'+
									'</div>'+
									'<div class="in-content">'+
									'	<h2>'+resultx[index].title+'</h2>'+
									'	<span>'+resultx[index].pubDate+'</span>'+
									'	<div>'+resultx[index].description+'</div>'+
									'</div>'+
								'</li>');
							});
							//-----
							if (xx==feeds.length-1)
							{
								settings.modulid.find("ul:first").mCustomScrollbar({
									axis:"y",
									theme:"minimal-dark"
								});

								settings.modulid.children("ul").find("li").unbind().on("click",function() {
									if (settings.feedlink=="blank")
									{
										window.open($(this).attr("data-link"),'_blank');
									}
									else
									{
										settings.modulid=$(this).parents(".ideaboxNews");
										if ( settings.modulid.children("h3").text()!="" )
											settings.modulid.children(".in-viewer").css({"top":settings.modulid.find("h3").height()+40});
										else
											settings.modulid.children(".in-viewer").css({"top":0});
										readNews($(this));
									}
								});
							}
							xx++;
							//-----
							
						})
					}
					
				}
				//end rss
				//=======================================================
				
				
				
			});
			
		};
		
})(jQuery);