					
					//  头部选项卡滑动门js
					function sTabs(thisObj,Num){
					if(thisObj.className == "ac")return;
					var tabObj = thisObj.parentNode.id;
					var tabList = document.getElementById(tabObj).getElementsByTagName("li");
					for(i=0; i <tabList.length; i++)
					{
					  if (i == Num)
					  {
					   thisObj.className = "ac"; 
						  document.getElementById(tabObj+"_cont"+i).style.display = "block";
					  }else{
					   tabList[i].className = "wg"; 
					   document.getElementById(tabObj+"_cont"+i).style.display = "none";
					  }
					} 
					}
