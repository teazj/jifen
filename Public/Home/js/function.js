

					// $(function(){
        			// var default_key = '请输入相关关键字';
        			// var searchObj = $("#search_key");
        			// searchObj.val(default_key);
        			// searchObj.bind("focus",function(){
//         			
        				// if(searchObj.val() == default_key){
        					// searchObj.val('');
        				// }
        			// })
//         			
        			// searchObj.bind("blur",function(){
        				// if(searchObj.val() == ''){
        					// searchObj.val(default_key);
        				// }
        			// })
//         			
        		// })
				


			var lock = 1;	//默认显示
        	var list_show_in = {'arr1':'main-one-pic','arr2':'main-two-pic','arr3':'main-thr-pic'};
        	$(function(){
        		$(".type_once").each(function(){
        			var son_left = $(this).offset().left + 242;
        			var son_top = $(this).offset().top;
        			$(this).children(".type_son").offset({left:son_left,top:son_top})
        		})
        	
        	
        		$(".type_lock").bind("click",function(){
        			if(lock == 1){
        				$(".type_list").slideUp("slow",function(){
        					lock = 0; //关闭状态
        					//需要处理子分类
        				})
        			}else{
        				$(".type_list").slideDown("slow",function(){
        					lock = 1; //关闭状态
        					//需要处理子分类
        				})
        			}
        		})
        		
        		$(".type_once").bind("mouseover",function(){
        			//关闭其他元素 打开选中元素
        			$(".type_son").stop();
        			$(".type_son").css("display","none");
        			$(this).children(".type_son").fadeIn("slow");
        		})
        		
        		$(".ban_left").bind("mouseout",function(){
        			$(".type_son").stop();
        			$(".type_son").css("display","none");
        		})
        		
        		
        		for(k in list_show_in){
            		
            			$("."+list_show_in[k]).children("dl").bind("mouseover",function(){
            				$(this).css("border-color","red");
            			})
            		
            			$("."+list_show_in[k]).children("dl").bind("mouseout",function(){
            				$(this).css("border-color","#cbc9c9");
            			})
            		
            	}
        		
        	})
			
			
			
			// $(function(){
        			// var default_key = '输入你要搜索的产品';
        			// var searchObj = $("#sea_key");
        			// searchObj.val(default_key);
        			// searchObj.bind("focus",function(){
//         			
        				// if(searchObj.val() == default_key){
        					// searchObj.val('');
        				// }
        			// })
//         			
        			// searchObj.bind("blur",function(){
        				// if(searchObj.val() == ''){
        					// searchObj.val(default_key);
        				// }
        			// })
//         			
        		// })