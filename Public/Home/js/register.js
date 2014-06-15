//以下JS代码用来通过Ajax进行表单验证
$(function(){

	/*------------------------------表单中账号的验证-------------------------------------*/
	//定义一个空数组,用来存放结果
	var res=new Array();
	//成为焦点时
	$("input[name='user']").focus(function(){
		//显示隐藏的div并输出提示信息
		$(".tip:first").css('display','block').html('用户名由8-16位的数字,字母及下划线组成!').css('color','');
		//失去焦点时
	}).blur(function(){
		//获取用户输入的内容
		var username=$("input[name='user']").val();
		//通过Ajax进行验证,并将处理后的值返回给data
		$.get('../CheckForm/check_username',{'username':username},function(data){
			//根据data的不同数值进行判断
			switch(data){
				case '0':$('.tip:first').html('<b>该账号已经被注册啦,换一个吧,亲!</b>').css('color','red');break;
				case '-1':$('.tip:first').html('<b>亲..这个账号貌似不太符合要求哦!..</b>').css('color','red');break;
				case '1':$('.tip:first').html('<b>好棒!这个账号非常适合!!...</b>').css('color','blue');
						 res['username']=1;
						 break;
				case 'null':$('.tip:first').css('display','');
			}
		})
	})

	/*------------------------------表单中密码的验证-------------------------------------*/

	//成为焦点时
	$("input[name='passwd']").focus(function(){
		//显示隐藏的div并输出提示信息
		$(".tip:eq(1)").css('display','block').html('密码由8-16位的数字,字母及下划线组成!').css('color','');
		//失去焦点时
	}).blur(function(){
		password=null;
		//获取用户输入的内容
		password=$("input[name='passwd']").val();
		//通过Ajax进行验证,并将处理后的值返回给data
		$.get('../CheckForm/check_password',{'password':password},function(data){
			switch(data){
				case '1':$('.tip:eq(1)').html('<b>可以使用此密码,请妥善保管!</b>').css('color','blue');
						 res['password']=1;
						 break;
				case '-1':$('.tip:eq(1)').html('<b>亲..这个密码貌似不太符合要求哦!..</b>').css('color','red');break;
				case 'null':$(".tip:eq(1)").css('display','');
			}
		})
	})

	/*------------------------------表单中重复密码的验证--------------------------------*/

	//成为焦点时
	$("input[name='passwd2']").focus(function(){
		//显示隐藏的div并输出提示信息
		$(".tip:eq(2)").css('display','block').html('两次输入的密码必须一致!').css('color','');
	}).blur(function(){
		//获取用户输入的重复密码
		var password2=$("input[name='passwd2']").val();
		//把用户输入的密码通过Ajax进行传送,处理后的结果传给data
		$.get('../CheckForm/check_password2',{'password2':password2},function(data){
			//alert(data);
			if(data===password){
				$(".tip:eq(2)").html('<b>太棒啦!输入的很正确嘛...</b>').css('color','blue');
				res['password2']=1;
			}else if(data=='-1'){
				$(".tip:eq(2)").html('<b>貌似...出了点小问题..先检查一下..</b>').css('color','red');
			}else{
				$(".tip:eq(2)").html('<b>貌似...出了点小问题..先检查一下..</b>').css('color','red');
				$(".tip:eq(2)").css('display','');
			}
		})
	})

	/*------------------------------表单中验证码的验证--------------------------------*/

	//点击提交按钮事件
	$("input.regBtn").click(function(){
		//获取验证码的内容
		var code=$("input[name='code']").val();
		//使用Ajax把用户输入的验证码进行传送,处理结果交给data
		$.get('../CheckForm/check_code',{'code':code},function(data){
			if(data==1){
				if(res['username']==1 && res['password']==1 && res['password2']==1){
					$("form[name='regform']").submit();
				}
			}else{
				return false;
			}
		})
	})
})