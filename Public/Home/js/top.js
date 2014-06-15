				//头部logo右边的搜索js
				$(function(){
                        var default_key = '输入你要搜索的内容';
                        var searchObj = $("#search_key");
                        searchObj.val(default_key);
                        searchObj.bind("focus",function(){
                        
                            if(searchObj.val() == default_key){
                                searchObj.val('');
                            }
                        })
                        
                        searchObj.bind("blur",function(){
                            if(searchObj.val() == ''){
                                searchObj.val(default_key);
                            }
                        })
                        
                    })
				
				
				
			//  头部选项卡滑动门js
					function sTabs(thisObj,Num){
					if(thisObj.className == "zc")return;
					var tabObj = thisObj.parentNode.id;
					var tabList = document.getElementById(tabObj).getElementsByTagName("li");
					for(i=0; i <tabList.length; i++)
					{
					  if (i == Num)
					  {
					   thisObj.className = "zc"; 
						  document.getElementById(tabObj+"_con"+i).style.display = "block";
					  }else{
					   tabList[i].className = "jg"; 
					   document.getElementById(tabObj+"_con"+i).style.display = "none";
					  }
					} 
					}
            
            
			function nTabs(thisObj,Num){
			if(thisObj.className == "active")return;
			var tabObj = thisObj.parentNode.id;
			var tabList = document.getElementById(tabObj).getElementsByTagName("li");
			for(i=0; i <tabList.length; i++)
			{
			  if (i == Num)
			  {
			   thisObj.className = "active"; 
				  document.getElementById(tabObj+"_Content"+i).style.display = "block";
			  }else{
			   tabList[i].className = "normal"; 
			   document.getElementById(tabObj+"_Content"+i).style.display = "none";
			  }
			} 
			}
			
            //  国家地区查询js
                $(function(){
                        var default_key = '请输入国家名或者地区名';
                        var searchObj = $("#country_key");
                        searchObj.val(default_key);
                        searchObj.bind("focus",function(){
                        
                            if(searchObj.val() == default_key){
                                searchObj.val('');
                            }
                        })
                        
                        searchObj.bind("blur",function(){
                            if(searchObj.val() == ''){
                                searchObj.val(default_key);
                            }
                        })
                        
                    })
            
            
            	//  进度查询js           
                $(function(){
                        var default_key = '请输入手机/邮箱/身份证/用户名';
                        var searchObj = $("#dd_key");
                        searchObj.val(default_key);
                        searchObj.bind("focus",function(){
                        
                            if(searchObj.val() == default_key){
                                searchObj.val('');
                            }
                        })
                        
                        searchObj.bind("blur",function(){
                            if(searchObj.val() == ''){
                                searchObj.val(default_key);
                            }
                        })
                        
                    })




				// information页面顶部的搜索框js
                $(function(){
                        var default_key = '输入你要搜索的文章内容';
                        var searchObj = $("#infor_key");
                        searchObj.val(default_key);
                        searchObj.bind("focus",function(){
                        
                            if(searchObj.val() == default_key){
                                searchObj.val('');
                            }
                        })
                        
                        searchObj.bind("blur",function(){
                            if(searchObj.val() == ''){
                                searchObj.val(default_key);
                            }
                        })
                        
                    })
				
				
				
				// Q_aut全部使馆签证页面顶部的搜索框js
                $(function(){
                        var default_key = '输入你要搜索的文章内容';
                        var searchObj = $("#Mc_search_key");
                        searchObj.val(default_key);
                        searchObj.bind("focus",function(){
                        
                            if(searchObj.val() == default_key){
                                searchObj.val('');
                            }
                        })
                        
                        searchObj.bind("blur",function(){
                            if(searchObj.val() == ''){
                                searchObj.val(default_key);
                            }
                        })
                        
                    })




