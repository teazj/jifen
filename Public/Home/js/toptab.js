					
					//  选项卡js
					function wTabs(thisObj,Num){
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
