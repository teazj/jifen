

					$(function(){
        			var default_key = '请输入相关关键字';
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
				


