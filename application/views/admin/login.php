<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->config->item('web_name')?> 后台管理系统</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/login.css" />
<body>
	<div id="container">
		<h1><?php echo $this->config->item('web_name')?> 后台管理系统</h1>
		<div id="box">
			<form action="<?php echo base_url()?>admin/index/login" method="post" onsubmit="check_login_form(this);return false;">
			<p class="main">
				<label>用户名: </label>
				<input type="text" name="username" class=".login" value="" /> 
				<label>密码: </label>
				<input type="password" name="password" class=".login" value="">	
				<label class=".label">验证码: </label>
				<input type="text" name="checkcode"  class=".login"/>
				<img style="height:25px;float:left;margin-left:50px;" title="登录成功或失败后代码会失效滴！请再点我一下重新获取！"  onclick="set_check_codes(this)"  src="<?php echo site_url('/vcode/index')?>" >
				<input type="submit" value="登录" class="login" />
			</p>
			</form>
		</div>
	</div>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
	var base_url = "<?php echo base_url()?>";
	function check_login_form (obj) {
        if(!obj.username.value) {
            alert('用户名不能为空！');
            obj.username.focus();
            return false;
        }
        if(!obj.password.value) {
        	alert('密码不能为空！');
            obj.password.focus();
            return false;
        }
        if(!obj.checkcode.value) {
        	alert('验证码不能为空！');
            obj.checkcode.focus();
            return false;
        }
   		$.ajax({
			url : base_url + "admin/index/login/",
			data : {username:obj.username.value,password:obj.password.value,checkcode:obj.checkcode.value},
			type : "post",
			dataType : "json",
			success : function (data) {
				if (data.errorcode) {
					window.location.href = base_url + "admin/index/";
				} else {
					alert(data.message);
				}
			}
		});
        return false;
	}
	var codeImg = "<?php echo site_url('/vcode/index')?>";
	function set_check_codes(obj)
	{
	    var d = new Date();
	    obj.src=codeImg+'/t/'+d.getTime();
	}
</script>
</body>
</html>