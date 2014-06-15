$(".info-con").mouseover(function(){
    $(this).addClass("info-con-hover");
}).mouseleave(function(){
    $(this).removeClass("info-con-hover");
});         

$("input[type=checkbox][name != 'checkAllCart']").click(function(){     
    var rel        = $(this).attr("rel");
    var merchantId = 0;
    if ($(this).is(":checked")){        
        $("input[name=submitCart]").attr("disabled", false);        
        if ('forshop' == rel){
            merchantId = $(this).val();
            $("input[rel=foritem]").each(function(){
                if (merchantId == $(this).attr('merchantId')){
                    $(this).get(0).checked = true;
                }
            });
        }
        
        if ('foritem' == rel){
            merchantId = $(this).attr('merchantId');
            var merchantflag = true;
            $("input[rel=foritem]").each(function(){
                if (merchantId == $(this).attr('merchantId')){
                    if (!$(this).is(":checked")){
                        merchantflag = false;
                    }
                }
            });
            
            if (merchantflag){                
                $("input[rel=forshop]").each(function(){
                    if (merchantId == $(this).val()){
                        $(this).get(0).checked = true;
                    }
                });
            }
        }       
        $.getCartInfo();
    }else{
        if ('forshop' == rel){
            merchantId = $(this).val();
            $("input[rel=foritem]").each(function(){
                if (merchantId == $(this).attr('merchantId')){
                    $(this).get(0).checked = false;
                }
            });
        }   
        if ('foritem' == rel){
            merchantId = $(this).attr('merchantId');            
            $("input[rel=forshop]").each(function(){                
                if (merchantId == $(this).val()){
                    $(this).get(0).checked = false;
                }
            });
        }    
        $.getCartInfo();
    }

});
 
// 全选

$("input[name=checkAllCart]").click(function(){
    var cartIdArr = new Array();
    if ($(this).is(":checked")){
        $("input[type=checkbox]").each(function(){
            if (!$(this).is(":checked")){
                $(this).get(0).checked = true;
            }
            if ('item' == $(this).attr("item")){
                cartId = parseInt($(this).val());
                if (cartId){
                    cartIdArr.push(cartId);
                }
            }
        });        
        $.getCartInfo();
    }else{
        $("input[type=checkbox]").each(function(){
            if ($(this).is(":checked")){
                $(this).get(0).checked = false;
            }
        });  
       // $(".total-cart-price").html("0.00");
        $("input[name=submitCart]").attr("disabled", "true");        
    }
    
});

// 显示更多链接
$("#show_more_link").toggle(function(){
        $(".cbsi_zh > p").show();
        $(this).html("收起").attr("class", "more_hov");
}, function(){
        $(".cbsi_zh > p:gt(0)").hide();
        $(this).html("更多").attr("class", "more");		
});

$(".agio-limit").mouseover(function(){
    $(this).children("div").show();
}).mouseleave(function(){
    $(this).children("div").hide();
})
$(function($){
    $.extend({
        getCartInfo:function(){
            var cartIdArr = new Array();
            var cartIdStr = '';
            var cartId    = 0; 
            var rel       = '';
            $("input[type=checkbox]").each(function(){     
                rel = $(this).attr("rel");
                if (('foritem' == rel) && $(this).is(":checked")){
                    cartId = parseInt($(this).val());
                    if (cartId){
                        cartIdArr.push(cartId);
                    }                    
                }
            });  
            if (cartIdArr.length){
                 cartIdStr = cartIdArr.join(",");
            }
            var url = "index.php?c=Ajax_ShopCart&a=UpdateCartNumber&callback=?&t="+Math.random();
             $.getJSON(
                url,
                {cartIdStr:cartIdStr, goodsNumber:0, operate:0},            
                function(data){
                    if (data.flag){
                        $(".total-cart-price").html(data.totalCartPrice);                    
                        $("input[name=submitCart]").attr("disabled", false);
                    }
                }
             );              
        }
    });
    
    $.extend({
       // 修改购物车数量 
       updateCartnumber:function(options){
        var defaults = {    
           cartId     : 0,    
           merchantId : 0,
           maxNumber  : 0,
           costNumber : 0,
           updateType : 'plus'           
         };            
         var options     = $.extend(defaults, options);
         var cartId      = defaults.cartId;
         var merchantId  = defaults.merchantId;
         var costNumber  = defaults.costNumber;
         var maxNumber   = defaults.maxNumber;
         var updateType  = defaults.updateType;         
         var goodsNumber = $("#cartNumber_"+cartId).val();
             goodsNumber = parseInt(goodsNumber);
        if ((isNaN(goodsNumber))||(goodsNumber <= 0)){
            $("#cartNumber_"+cartId).val(costNumber);                 
            return false;
        }        
        
             
         // 更新商品类型
         switch(updateType){
             case 'plus':
                 goodsNumber++
                 break;
             case 'minus':
                 goodsNumber-- 
                 break;             
         }
                 
         if (!goodsNumber){
             goodsNumber = 1;
         }                 
         if ((1 == costNumber) && (1 == goodsNumber)){
             //return false;
         }
         if (goodsNumber > maxNumber){
             goodsNumber = maxNumber;             
             $("#tips_"+cartId).html("最多只能购买" + maxNumber + "件").show();
         }else{
             $("#tips_"+cartId).hide();
         }                  
         $("#cartNumber_"+cartId).val(goodsNumber);         
         
        var cartIdStr = "";        
        var cartIdArr = new Array();
        $("input[item=item]").each(function(){                      
            if (this.checked){
                cartIdArr.push($(this).val());
            }
        });
        if (cartIdArr.length){
            cartIdStr = cartIdArr.join(",");
        }   
        var noChecked = false;
        if ('' == cartIdStr){
            noChecked = true;
        }
        var url = "index.php?c=Ajax_ShopCart&a=UpdateCartNumber&callback=?&t="+Math.random();
         $.getJSON(
            url,
            {cartIdStr:cartIdStr, goodsNumber:goodsNumber, operate:cartId},            
            function(data){
                if (data.flag){
                    if (!noChecked){
                        $(".total-cart-price").html(data.totalCartPrice);
                    }
                                        
                    $("#cartGoodsPcie_"+cartId).html(data.totalGoodsPrice);
                }else{
                    alert(data.msg);
                }
            }
         );
       } 
    });
    
    // 删除购物
    $.extend({
        deleteCart:function(options){
            var defaults = {    
               cartId     : 0,                   
               deleteType : ''           
            };             
            var options     = $.extend(defaults, options);
            var cartId     = defaults.cartId;            
            var deleteType = defaults.deleteType;
            var cartIdStr  = '';
//            var conf = confirm("您确实要删除该商品吗?");
//            if (!conf){
//                return false;
//            }
            if ('' == deleteType){
                $("#zp-cart-"+cartId).show();
                return false;                
            }

            var cartIdArr  = new Array();
            $("input[item=item]").each(function(){            
                if (this.checked){
                    cartIdArr.push($(this).val());
                }
            });              
            cartIdStr = cartIdArr.join(",");
            var url = "index.php?c=Ajax_DeleteCart&a=DeleteCart&callback=?&t="+Math.random();
            $.getJSON(
                url,
                {cartIdStr:cartIdStr, operate:cartId, deleteType:deleteType},
                function(data){
                    if (data.flag){                             
                        if (!data.isDelAll){
                            window.location.reload();
                            return false;
                        }else{
                            if (data.isDelMer){
                                $("#merchant_"+data.merchantId).remove();
                            }                               
                        }
                      
                        if ('collect' == deleteType){
                           alert("收藏成功"); 
                        }
                        
                        if (data.isUpdate){
                            $(".total-cart-price").html(data.totalCartPrice);                            
                        }
                        
                        $("#cart_"+cartId).remove();                        
                    }else{
                        alert(data.msg);
                    }
                }
            );
             
        }
    });
    
    $.extend({
        closeDeleteCart:function(options){
            var defaults = {    
               cartId : 0                                  
            };             
            var options = $.extend(defaults, options);
            var cartId  = defaults.cartId;               
            $("#zp-cart-"+cartId).hide();             
        }
    });
    
    // 批量删除商品    
    $.extend({
        deleteAll : function(){
            var cartIdStr  = '';
            var cartIdArr  = new Array();
            $("input[item=item]").each(function(){            
                if (this.checked){
                    cartIdArr.push($(this).val());
                }
            });       
            cartIdStr = cartIdArr.join(",");
            if ('' == cartIdStr){
                alert("请选择商品");
                return false;
            }
            var conf = confirm("确认要删除选中的商品吗？");
            if (!conf){                
                return false;
            }            
            var url = "index.php?c=Ajax_DeleteCart&a=DeleteAll&callback=?&t="+Math.random();
            $.getJSON(
                url,
                {cartIdStr:cartIdStr},
                function(data){
                    if (data.flag){
                        window.location.reload();
                    }else{
                        alert(data.msg);
                    }
                }
            );
        }
    });
})  

     