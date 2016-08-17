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
		$('#text').focus();
	});
	//留言板－点击"顶"按钮
	$('.acc').click(function(){
		$(this).css({
			'color':'#f4645f',
			'text-decoration':'none'
		});
	});
	//留言板－点击“踩”按钮
	$('.ref').click(function(){
		$(this).css({
			'color':'#f4645f',
			'text-decoration':'none'
		});
	});
	//标签云
	$('.tag-cloud a').click(function(){
		$(this).addClass('active');
	});
	$('.tag-cloud a i').click(function(){
		$(this).parent().removeClass('active');
		return false;
	});
});