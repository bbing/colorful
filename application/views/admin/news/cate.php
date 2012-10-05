<div class="labelCss">
	<span id="mainMenuBut">
    	<div class="labels open"><img src="<?php echo base_url()?>images/add.gif"><?php echo anchor(base_url().'admin/cate/add/1/0','添加主类')?></div>
        <div class="labels open" style="float:right;">
          	<span onclick="window.location.reload();" ><img src="<?php echo base_url()?>images/refresh.png" />刷新</span>
        </div>
        <div class="labels open" style="float:right;">
          	<span onclick="window.history.back(-1);"><img src="<?php echo base_url()?>images/backward.png" />后退</span>
        </div>
    </span>
</div>
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th width="30">编号</th>
    <th>名称</th>
    <th  width="30">排序</th>
    <th>创建时间</th>
    <th>最后修改时间</th>
    <th  width="30">状态</th>
    <th>操作</th>
 </tr>
<?php 
if ($list):
foreach($list as $row): 
?>

<tr class="tr_bg" >
    <td><?php echo $row->id ?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo $row->order?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->create_time)?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->edit_time)?></td>
    <td><?php echo ($row->is_del==1)?'禁用':'启用' ?></td>

    <td align="center">
    <?php echo anchor(base_url().'admin/cate/add/1/'.$row->id,'添加')?>

    <?php echo anchor(base_url().'admin/cate/edit/'.$row->id,'修改')?> 

    <a href="javascript:void(0);" onclick="del('<?php echo $row->id;?>')">删除</a>
    <a href="<?php echo base_url()?>admin/news/addnews/<?php echo $row->id;?>" >添加新闻</a>
    </td>
 </tr>
<?php endforeach;endif; ?>

</table>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
	var del = function (id) {
		$.ajax({
			url : '/admin/menu/delete/'+id,
			type : 'get',
			success : function (){
				window.location.reload();
			}
		})
	};
</script>
