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
            
            
				//  订单号查询js
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
