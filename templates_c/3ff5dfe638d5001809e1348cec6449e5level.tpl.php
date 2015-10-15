<?php 
/**
 * Author:@author
 * Date:2015年9月21日
 */
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
<title>main</title>
<script type="text/javascript" src="../js/admin_level.js"></script>
</head>
<body id="main">
<div class="map">
    管理首页&gt;&gt;等级管理&gt;&gt;<strong id="title"><?php echo $this->_vars['title'] ?></strong>
 <ol>
    <li><a href="level.php?action=show" class="selected">等级列表</a></li>
    <li><a href="level.php?action=add">新增等级</a></li>
    <?php if($this->_vars['update']){ ?>
    <li><a href="level.php?action=update&id=<?php echo $this->_vars['id'] ?>">修改等级</a></li>
    <?php } ?>
 </ol>
</div>
<?php if($this->_vars['show']){ ?>
<table cellspacing="0">
    <tr><th>编号</th><th>等级名称</th><th>等级描述</th><th>操作</th></tr>
    <?php foreach($this->_vars['AllLevel'] as $key=>$value){?>
    <tr>
        <td><?php echo $value->id?></td>
        <td><?php echo $value->level_name?></td>
        <td><?php echo $value->level_info?></td>
        <td><a href="level.php?action=update&id=<?php echo $value->id?>">修改</a> | <a href="level.php?action=delete&id=<?php echo $value->id?> " onclick="return confirm('你真的要删除这个等级吗？') ? true : false">删除</a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>

<?php if($this->_vars['add']){ ?>
<form method="post" name="add">
	<table cellspacing="0" class="left">
		<tr><td>等级名称：<input type="text" name="level_name" class="text" /> （* 等级名称2-20位）</td></tr>
        <tr><td><textarea name="level_info"></textarea> （* 等级描述不得大于200位）</td></tr> 
		<tr><td><input type="submit" name="send" value="新增等级" onclick="return checkForm();" class="submit level" /> [ <a href="level.php?action=show">返回列表</a> ]</td></tr>
	</table>
</form>
<?php } ?>
<?php if($this->_vars['update']){ ?>
<form method="post" name="add">
    <input type="hidden" name="id" value="<?php echo $this->_vars['id'] ?>" />
	<table cellspacing="0" class="left">
		<tr><td>等级名称：<input type="text" name="level_name" class="text" value="<?php echo $this->_vars['level_name'] ?>" /> （* 等级名称2-20位）</td></tr>
        <tr><td><textarea name="level_info"><?php echo $this->_vars['level_info'] ?></textarea> （* 等级描述不得大于200位）</td></tr>
		<tr><td><input type="submit" name="send" value="修改等级" onclick="return checkForm();"  class="submit level" /> [ <a href="level.php?action=show">返回列表</a> ]</td></tr>
	</table>
</form>
<?php } ?>
<?php if($this->_vars['delete']){ ?>
删除页面
<?php } ?>

</body>
</html>