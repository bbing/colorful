<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->config->item('web_name')?>后台管理系统</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>images/manage/skin.css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #1D3647;
}
-->
</style>
<body>
<table width="100%" height="166" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="42" valign="top">
    <table width="100%" height="42" border="0" cellpadding="0" cellspacing="0" class="login_top_bg">
      <tr>
        <td width="1%" height="21">&nbsp;</td>
        <td height="42">&nbsp;</td>
        <td width="17%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top">
    <table width="100%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg">
      <tr>
        <td width="49%" align="right"><table width="91%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg2">
            <tr>
              <td height="138" valign="top"><table width="89%" height="427" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="229">&nbsp;</td>
                </tr>
                
                <tr>
                  <td height="198" align="right" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="35%">&nbsp;</td>
                      <td height="25" colspan="2" class="left_txt"><font size="6"><?php echo $this->config->item('web_name')?></font></td>
                    </tr>
                    
                    <tr>
                      <td>&nbsp;</td>
                      <td width="30%" height="40" class="left_txt"><font size="6">后台管理系统</font></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
          </td>
            </tr>
            
        </table></td>
        
        <td width="1%" >&nbsp;</td>
        <td width="50%" valign="bottom"><table width="100%" height="59" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>&nbsp;</td>
              <td height="21"><table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table211" height="328">
                  <tr>
                    <td height="164" colspan="2" align="middle"><form action="<?php echo base_url()?>admin/index/login" method="post" onsubmit="check_login_form(this);return false;">
                        <table cellSpacing="0" cellPadding="0" width="100%" border="0" height="143" id="table212">
                          <tr>
                            <td width="13%" height="38" class="top_hui_text"><span class="login_txt">管理员：&nbsp;&nbsp; </span></td>
                            <td height="38" colspan="2" class="top_hui_text"><input name="username" class="editbox4" value="" size="20">                            </td>
                          </tr>
                          <tr>
                            <td width="13%" height="35" class="top_hui_text"><span class="login_txt"> 密 码： &nbsp;&nbsp; </span></td>
                            <td height="35" colspan="2" class="top_hui_text"><input class="editbox4" type="password" size="20" name="password">
                              <img src="<?php echo base_url()?>images/manage/luck.gif" width="19" height="18"> </td>
                          </tr>
                          <tr>
                            <td width="13%" height="35" ><span class="login_txt">验证码：</span></td>
                            <td height="35" colspan="2" class="top_hui_text"><input class="wenbenkuang" name="checkcode" type=text value="" maxLength=4 size=10>
                              <img  title="登录成功或失败后代码会失效滴！请再点我一下重新获取！"  onclick="set_check_codes(this)"  src="<?php echo site_url('/vcode/index')?>" ></td>
                          </tr>
                          <tr>
                            <td height="35" >&nbsp;</td>
                            <td width="20%" height="35" ><input name="Submit" type="submit" class="button" id="Submit" value="登 陆"> </td>
                            <td width="67%" class="top_hui_text">&nbsp;</td>
                          </tr>
                        </table>
                        <br>
                    </form></td>
                  </tr>
                  <tr>
                    <td width="433" height="164" align="right" valign="bottom"><img src="<?php echo base_url()?>images/manage/login-wel.gif" width="242" height="138"></td>
                    <td width="57" align="right" valign="bottom">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
          </table>
          </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="20"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="login-buttom-bg">
      <tr>
        <td align="center"><span class="login-buttom-txt">Copyright &copy; 2011-2012 <a href="http://www.colorstudio.cn" style="color:#FFF;">色彩网络工作室</a></span></td>
      </tr>
    </table></td>
  </tr>
</table>
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