<div class="labelCss">
	<span id="mainMenuBut">
        <div class="labels open" style="float:right;">
          	<span onclick="window.location.reload();" ><img src="<?php echo base_url()?>images/refresh.png" />刷新</span>
        </div>
        <div class="labels open" style="float:right;">
          	<span onclick="window.history.back(-1);"><img src="<?php echo base_url()?>images/backward.png" />后退</span>
        </div>
    </span>
</div>
<form method="POST" action="<?php echo base_url() ?>admin/news/add" onsubmit="return check_form(this);">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr >
    <th colspan="2">添加新闻</th>
 </tr> 
    <input type="hidden" name="typeid" value="<?php echo $typeid ?>" >
<tr class="tr_bg" >
    <td>新闻名称</td>
    <td><input type="text" name="title" value=""></td>
</tr>
 <tr class="tr_bg" >
    <td>内容</td>
    <td><textarea name="content" cols="100" rows="20" id="content"></textarea></td>
</tr>
<tr class="tr_bg">
    <td>排序</td>
    <td><input type="text" name="order" value="0"><input type="hidden" name="pic" id="pic" value="0"></td>
</tr> 
<tr class="tr_bg">
    <td>是否启用</td>
    <td><input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用</td>
</tr>
<tr class="tr_bg">
    <td></td>
    <td>
    <input type="submit" value="保存" ></td>
</tr>

</table>
</form>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/xheditor-1.1.14-zh-cn.min.js"></script>
<script type="text/javascript">
function check_form(obj)
{
	if(!obj.title.value) {
        alert('名称不能为空！');
        obj.title.focus();
        return false;
    }
    return true;
}

$('#content').xheditor({upLinkUrl:"upload.php",upLinkExt:"zip,rar,txt",upImgUrl:"/admin/upload",upImgExt:"jpg,jpeg,gif,png",onUpload:insertUpload});
function insertUpload(arrMsg)
{
	var i,msg;
	for(i=0;i<arrMsg.length;i++)
	{
		msg=arrMsg[i];
		$("#pic").val(msg.url);
	}
}
</script>