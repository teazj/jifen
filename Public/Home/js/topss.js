
				// 页面顶部的搜索框js
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






				// M_caut常见使馆认证页面的搜索框js
                $(function(){
                        var default_key = '国家名称 缩简的用户名';
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
                    
                    
                    



