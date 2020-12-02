
    var jsObject=document.getElementsByTagName("script");
    var jsIndex=jsObject.length-1;
    var ItemDataScript=jsObject[jsIndex];
    var ItemDataScript_src=ItemDataScript.src;
    

    var ItemDataScript_split=ItemDataScript_src.split("/items.php");

    if(ItemDataScript_split.length ==1)
    var ItemDataScript_split=ItemDataScript_src.split("/js/");   
    
	var ItemDataScript_dir=ItemDataScript_split[0]+'/index.php?page=query/items';


    if(val_count_adunit === undefined) 
    var val_count_adunit=0;
    
    ItemDataScript_parameter=ItemDataScript_split[1].split("?");
    ItemDataScript_parameter_new=ItemDataScript_parameter[1];
    
    ItemDataScript_parameter_seperate=ItemDataScript_parameter_new.split("&");
  
    aduid=ItemDataScript_parameter_seperate[0];
    pid=ItemDataScript_parameter_seperate[1];
    width=ItemDataScript_parameter_seperate[2];
    height=ItemDataScript_parameter_seperate[3];

    if(ItemDataScript_parameter_seperate.length ==5)
    displaytype=ItemDataScript_parameter_seperate[4];
    else
    displaytype=0;
    
   
    var today = new Date();
    today.setTime( today.getTime() );
    today.setHours(today.getHours()+1);
    today.setMinutes(0);
    today.setSeconds(0);
    
    
   
   if(window.adquery)
   {
	   var adq=new adquery();
	   adq.displayads(aduid,pid,width,height);
   }
   else
   {
   
    

function adquery()
{
		this.displayads=displayads;
		val_count_adunit++;
		function displayads(aduid,pid,width,height)
		{
			if(window.top)
			{
				if(window.top.location)
				{
					if(!window.top.location.hostname)
					return;
				}
				else
					return;
			}
			else
				return;
			
			
			page_meta_data=document.getElementsByTagName('meta');
			page_title = document.title; 
			page_referrer=window.location.href;
			
				
			meta_description=""; 
			meta_keywords=""; 
			
			for(i=0; i<page_meta_data.length;i++)
			{
				if(page_meta_data[i].name.equalsIgnoreCase ('title') && (page_title.equalsIgnoreCase ("Untitled Document") || page_title==""))
				page_title=page_meta_data[i].content;
			
				if(page_meta_data[i].name.equalsIgnoreCase ('keywords'))
				meta_keywords=page_meta_data[i].content;
			
				if(page_meta_data[i].name.equalsIgnoreCase ('description'))
				meta_description=page_meta_data[i].content;
			}
			
			
			meta_keywords=meta_keywords.substr(0,400);
			search_keywords=meta_keywords;
			page_title=page_title.substr(0,200);
			meta_description=meta_description.substr(0,300);

			
			currently_rendered=0;
			currently_rendered_flag=0;
			if(window.currently_rendered_adunit)
			var currently_rendered_ids=window.currently_rendered_adunit;
			
			if(currently_rendered_ids)
			{
				var currently_rendered_idsarr=currently_rendered_ids.split(",");
				for(var i=0; i<currently_rendered_idsarr.length;i++)
				{
					if(currently_rendered_idsarr[i]==aduid)
					{
						currently_rendered=1;
						currently_rendered_flag=1;
						break;
					}
				}
				
				if(currently_rendered==0)
				currently_rendered_ids=currently_rendered_ids+aduid+',';
			}
			else
				currently_rendered_ids=aduid+',';

		
			window.currently_rendered_adunit=currently_rendered_ids;

			if(currently_rendered_flag==1)
			return;
			


			
			var url=ItemDataScript_dir;           
			url=url+"/&aduid="+aduid;	
			url=url+"&height="+height;	
			url=url+"&displaytype="+displaytype;	
            
            url=url+"&page_data=5411e633aaa233d5f42c8552c93882d0";
            url=url+"&time=1606639417";	            
            
            url=url+"&val_count_adunit="+val_count_adunit;
            url=url+"&deliver="+utf8_encode(window.location.hostname.replace('www.',''));
			url=url+"&search_keywords="+utf8_encode(search_keywords);
			url=url+"&page_referrer="+base64_encode(page_referrer);
			url=url+"&page_title="+utf8_encode(page_title);
			url=url+"&meta_description="+utf8_encode(meta_description);	
			

			iframe_src="";	

			
			if(displaytype ==9)
			{
				var pop_view=Get_Cookie('pop_delay_'+aduid);
				
				
				if(pop_view !=1)
				{
					var urlstring=url;

					    popintervalhome=window.setInterval(function(){ 
	
						var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
						var eventer = window[eventMethod];
						var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
						
						
						eventer(messageEvent, function (e) {
							
							
							var response=e.data;
							var urlindex=response.indexOf('popopen=');
							
							responsedata=response.split("=");
							
							if(urlindex ==0 && response !="")
                            {
								if(responsedata[0] =='popopen' && responsedata[1] == aduid)
								{
									exptime=responsedata[2]*1000*60; // For Converting Into Milliseconds
										
									if(exptime >0)
									Set_Cookie_Data('pop_delay_'+responsedata[1],1,exptime,"/") ;
										
									window.clearInterval(popintervalhome);	
								}
                            }
						}, false);  
					}, 1000);
					    
					    
				    iframe_src='<script type="text/javascript" src="'+url+'"></script>';     
			}
				
			   
		}			
		else
		iframe_src="<iframe id='id_"+aduid+"' name='id_"+aduid+"' frameborder='0' src='"+url+"' allowtransparency='true' style='height:"+height+"px;width:"+width+"px;' scrolling='no' ></iframe>";

			
			

			
			if(displaytype ==5)
			{
				var interstitial_view=Get_Cookie('int_view_'+aduid);
				
				
				if(interstitial_view !=1)
				{
				
					var urlstring=url;
					var skipintervalhome;
					var interstitial_container_id='xyz-interstitial-container-'+aduid;
					var interstitial_background_id='xyz-interstitial-background-'+aduid;
					
					
				
				if(!document.getElementById(interstitial_container_id))
				{
					
					var interstitialContainer=document.createElement('div');
					interstitialContainer.id=interstitial_container_id;
					interstitialContainer.style.height=height+'px';
					interstitialContainer.style.width=width+'px';
					interstitialContainer.style.position="fixed";
					interstitialContainer.style.zIndex=1000000001;
					interstitialContainer.style.display="none";
					
				
					document.body.appendChild(interstitialContainer);
				
					document.getElementById(interstitial_container_id).innerHTML=iframe_src;
				
					var interstitialBackGround=document.createElement('div');
					interstitialBackGround.id=interstitial_background_id;
					interstitialBackGround.style.height='100%';
					interstitialBackGround.style.width='100%';
					interstitialBackGround.style.zIndex=1000000000;
					interstitialBackGround.style.position="fixed";
					interstitialBackGround.style.top="0px";					
					interstitialBackGround.style.background='#CCCCCC';
					interstitialBackGround.style.opacity=0.7;
					interstitialBackGround.style.display="none";
				
					document.body.appendChild(interstitialBackGround);
					
				
				    skipintervalhome=window.setInterval(function(){ 

					var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
					var eventer = window[eventMethod];
					var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
					
					
					eventer(messageEvent, function (e) {
						
						var urlindex=urlstring.indexOf(e.origin);
						var response=e.data;

						try 
						{
							responsedata=JSON.parse(response);			
							
							if(responsedata !="")
							{
								
								if(urlindex ==0 && responsedata.operation =='close' && responsedata.auid == aduid)
								{
									var rmelement = document.getElementById('xyz-interstitial-container-'+responsedata.auid);
									
									if(rmelement != null)
									{
										rmelement.parentNode.removeChild(rmelement);
										
										var rmelement1 = document.getElementById('xyz-interstitial-background-'+responsedata.auid);
										
										if(rmelement1 != null)
										rmelement1.parentNode.removeChild(rmelement1);
									}
									
									
									exptime=responsedata.addelay*1000*60; // For Converting Into Milliseconds
									
									if(exptime >0)
									Set_Cookie_Data('int_view_'+responsedata.auid,1,exptime,"/") ;
									
									window.clearInterval(skipintervalhome);	
								}
								else if(urlindex ==0 && responsedata.operation =='open' && responsedata.auid == aduid)
								{
									document.getElementById('xyz-interstitial-background-'+responsedata.auid).style.display="block";
									document.getElementById('xyz-interstitial-container-'+responsedata.auid).style.display="block";
									
									
									var ie=document.all && !window.opera;
									var iebody=(document.compatMode=="CSS1Compat")? document.documentElement : document.body ;
	
									ht=(ie)? iebody.clientHeight: window.innerHeight ;
									wt=(ie)? iebody.clientWidth : window.innerWidth ;
	
									ofht=document.getElementById('xyz-interstitial-container-'+responsedata.auid).offsetHeight;
									ofwt=document.getElementById('xyz-interstitial-container-'+responsedata.auid).offsetWidth;
	
									ofht=parseFloat(ofht)-20;
	
									
									document.getElementById('xyz-interstitial-container-'+responsedata.auid).style.top=(ht/2)-parseFloat(ofht/2) +'px';
									document.getElementById('xyz-interstitial-container-'+responsedata.auid).style.left=(wt/2)-parseFloat(ofwt/2) +'px';
								}
							}
						
					} catch (e) {}
					
				}, false);  
					
			}, 1000);
		}
	}
								
				
						
				
				
			}
			else
			{
				document.open();
				document.write(iframe_src);
				document.close();
			}

		return;
	
		}
		
		


		
		
		
		
		String.prototype.equalsIgnoreCase=myEqualsIgnoreCase;
		String.prototype.equals=myEquals;	
		
		
		function	utf8_encode  (string) 
		{
			string = string.replace(/\r\n/g,"\n");
			var utftext = "";

			for (var n = 0; n < string.length; n++) 
			{

				var c = string.charCodeAt(n);

				if (c < 128) 
				{
					utftext += String.fromCharCode(c);
				}
				else if((c > 127) && (c < 2048)) 
				{
					utftext += String.fromCharCode((c >> 6) | 192);
					utftext += String.fromCharCode((c & 63) | 128);
				}
				else 
				{
					utftext += String.fromCharCode((c >> 12) | 224);
					utftext += String.fromCharCode(((c >> 6) & 63) | 128);
					utftext += String.fromCharCode((c & 63) | 128);
				}

			}

			return escape(utftext);
		}
		 
		 
		
		function Set_Cookie_Data(name,value,expires,path,domain,secure) 
		{	
		    var Daytoday = new Date();
			
			var expires_date = new Date(Daytoday.getTime()+(expires));
			document.cookie = name + "=" +escape(value) + ";expires=" + expires_date.toUTCString()  + ( ( path ) ? ";path=" + path : "" ) + ( ( domain ) ? ";domain=" + domain : "" ) + ( ( secure ) ? ";secure" : "" );
		}		
		
		
		
		
		
		
		function Get_Cookie( name )
		{
			var start = document.cookie.indexOf( name + "=" );
			var len = start + name.length + 1;
			if ( ( !start ) && ( name != document.cookie.substring( 0, name.length ) ) )
			{
				return null;
			}

			if ( start == -1 ) return null;
			var end = document.cookie.indexOf( ";", len );
			if ( end == -1 ) end = document.cookie.length;
			return unescape( document.cookie.substring( len, end ) );
		}

		function Set_Cookie( name, value, expires, path, domain, secure ) 
		{	
			if ( expires )
			{
				expires = expires * 1000 * 60 * 60 ;
			}
			var expires_date = new Date( today.getTime() + (expires) );
			document.cookie = name + "=" +escape( value ) + ";expires=" + expires_date.toUTCString()  + ( ( path ) ? ";path=" + path : "" ) + ( ( domain ) ? ";domain=" + domain : "" ) + ( ( secure ) ? ";secure" : "" );
		}

		
		function myEquals(arg)
		{
		        return (this.toString()==arg.toString());
		}

		function myEqualsIgnoreCase(arg)
		{               
		        return (new String(this.toLowerCase())==(new String(arg)).toLowerCase());
		}
		
		
		
		function base64_encode(data) 
		{
			  var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
			  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
			    ac = 0,
			    enc = "",
			    tmp_arr = [];

			  if (!data) {
			    return data;
			  }

			  do { // pack three octets into four hexets
			    o1 = data.charCodeAt(i++);
			    o2 = data.charCodeAt(i++);
			    o3 = data.charCodeAt(i++);

			    bits = o1 << 16 | o2 << 8 | o3;

			    h1 = bits >> 18 & 0x3f;
			    h2 = bits >> 12 & 0x3f;
			    h3 = bits >> 6 & 0x3f;
			    h4 = bits & 0x3f;

			    // use hexets to index into b64, and append result to encoded string
			    tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
			  } while (i < data.length);

			  enc = tmp_arr.join('');
			  var r = data.length % 3;

			  ret=(r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
			  ret=ret.replace('+',',');
			  ret=ret.replace('/','-');
			  
			  return ret;
		}

		
}

var adq=new adquery();
adq.displayads(aduid,pid,width,height);

}
