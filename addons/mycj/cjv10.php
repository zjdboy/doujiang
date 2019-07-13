<?php 
header("Content-Type: text/html;charset=utf-8");
if(!@$_SERVER['HTTP_REFERER']||!$_COOKIE["admin_name"]) header('location:/');
require('inc.php');
if (PHP_VERSION < '5.6' || PHP_VERSION >= '7.2.0'){
    exit('您当前的php版本为：' . PHP_VERSION . '，不符合插件要求，请调整php版本，选用PHP5.6以上，php7.2以下的环境');
}
if(empty($my['site']['install_dir'])){exit('插件配置读取失败，请联系客服QQ：209910539反馈！');}
?>
<!DOCTYPE html>
<html>
<head>
<title>萌芽采集资源</title>
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $my['site']['install_dir']; ?>static/layui/css/layui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var my = {'name':'<?php echo $_COOKIE["admin_name"];?>',mac_version:'v10'};var is_vip = false;</script>
<script src="<?php echo $my['site']['install_dir']; ?>static/js/jquery.js?v=<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $my['site']['install_dir']; ?>static/layui/layui.js?v=<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<script src="//caiji-api.oss-cn-shanghai.aliyuncs.com/v10.2.3/xmlutf_2019.js?v=<?php echo time(); ?>"></script>
<script src="//caiji-api.oss-cn-shanghai.aliyuncs.com/v10.2.3/collectv10.js?v=<?php echo time(); ?>" class="collect"></script>
</head>

<body>
<form class="layui-form layui-form-pane">
    <div class="layui-tab layui-form-item">
	<blockquote class="layui-elem-quote" class="navbar-brand">
    &nbsp;插件信息摘要 【当前插件版本：<font color="#ff0000" id="ver"></font>&nbsp;&nbsp;最新版本：<span id="version"></span>】
    </blockquote>
	</div>

	<div class="layui-tab layui-form-item">
		<label class="layui-form-label">全网资源</label>
		<div class="layui-input-inline">
			<select name="collect" lay-verify="required">
				<option value="m3u8" selected>切片资源专区</option>
				<option value="down">下载资源专区</option>
				<option value="disk">网盘资源专区</option>
				<option value="bigs">视频网站专区</option>
				<option value="offi">视频独立采集</option>				
				<option value="play">云播资源专区</option>
				<option value="comp">综合资源专区</option>
				<option value="fuck">叉站资源专区</option>			
			</select>
		</div>
		<div class="layui-input-inline">
			<input type="text" required lay-verify="required" placeholder="请输入关键字" autocomplete="off" class="layui-input layui-input-search">
		</div>
		<div class="layui-input-inline">
			<button type="button" class="layui-btn searchs">立即搜索</button>
			<input type="text" required lay-verify="required" placeholder="搜索间隔" autocomplete="off" class="layui-input interval" value="3" style="width:38px;display:inline-block">
			<span>秒间隔</span>
		</div>	
        <div class="layui-btn-group">
			<a id="alljx" class="layui-btn layui-btn-normal"><i class="layui-icon"></i>批量修改解析接口</a>
			<a href="javascript:;" id="help" class="layui-btn layui-btn-normal"><i class="layui-icon"></i>视频教程</a>
        </div>		
		
	</div>	
</form>
<div class="layui-tab layui-collect"></div>
<script type="text/javascript" src="tip.js"></script>
</body>
</html>