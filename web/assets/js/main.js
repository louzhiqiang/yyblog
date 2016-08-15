$(function(){
	//阅读全文按钮
	$('.post-permalink .btn').click(function(){
		
	});
	//留言版－显示表情包
	$tog=true;
	$('.face-img').click(function(){
		if($tog){
			$('.exp-box').show();
		}else{
			$('.exp-box').hide();
		}
		$tog=!$tog;
	});
	//留言板－留言：转换表情
	$arr_face=[];
	$('.exp-box li').click(function(){
		$('#text').val($('#text').val()+'/'+$(this).find('img').attr('alt')+'/');
		//记录点击的表情
		$arr_face.push($(this).find('img').attr('src'));
	});
	//留言板－点击留言按钮
	$('.expression button').click(function(){
		$msgContent=$('#text').val();
		if($msgContent.indexOf(':')){
			$msgContent=$msgContent.substring($msgContent.indexOf(':')+1);
		}
		$.ajax(
			{
				url:'index.php?r=message/add',
				type:'post',
				dataType: "json",
				data:{
					content:$msgContent,
					toId  :$(":input[name='toId']").val(),
					articleId: $(":input[name='articleId']").val(),
				},
				success:function(str){
					if(str.code == 0){
						$(":input[name='toId']").val('');
						location.reload()
					}else{
						alert(str.msg);
						return false;
					}
				}
			}
		);
		$('.exp-box').hide();
		$tog=false;
		$('#text').val('');
		
	});
	//留言板－点击回复按钮
	$('.reply').click(function(){
		//获取回复的用户名
		$str=$(this).parent().parent().parent().find('a').eq(0).html();
		//截取用户名
		if($str.indexOf('<')!=-1){
			$str=$str.substring($str.indexOf(';')+1,$str.indexOf('<'));
		}else{
			$str=$str.substring($str.indexOf(';')+1);
		}
		$('#text').val('回复'+$str+':');
		$("input[name='toId']").val($(this).attr("toid"));
		$('#text').focus();
	});
	//留言板－点击"顶"按钮
	$('.acc').click(function(){
		$(this).css({
			'color':'#f4645f',
			'text-decoration':'none'
		});
		$idData = $(this).attr("messageid");
		$_this=$(this);
		
		$.ajax(
			{
				url:'index.php?r=message/acc',
				type:'post',
				dataType: "json",
				data:{
					id:$idData
				},
				success:function(str){
					if(str.code == 0){
						//顶值+1
						$accNum=$_this.html().replace(/\(\d+\)/,function(str2){
							str2=str2.substring(1,str2.length-1);
							str2++;
							return '('+str2+')';
						});
						//重新给顶-赋值
						$_this.html($accNum);
					}else{
						return false;
					}
				}
			}
		);
	});
	//留言板－点击“踩”按钮
	$('.ref').click(function(){
		$(this).css({
			'color':'#f4645f',
			'text-decoration':'none'
		});
		$idData = $(this).attr("messageid");
		$_this=$(this);
		
		$.ajax(
			{
				url:'index.php?r=message/ref',
				type:'post',
				dataType: "json",
				data:{
					id:$idData
				},
				success:function(str){
					if(str.code == 0){
						//顶值+1
						$accNum=$_this.html().replace(/\(\d+\)/,function(str2){
							str2=str2.substring(1,str2.length-1);
							str2++;
							return '('+str2+')';
						});
						//重新给顶-赋值
						$_this.html($accNum);
					}else{
						return false;
					}
				}
			}
		);
	});
});