<?php if (!defined('THINK_PATH')) exit(); /*a:20:{s:38:"template/default_pc/html/vod/type.html";i:1544280516;s:65:"/usr/local/var/www/yg/template/default_pc/html/public/header.html";i:1562816454;s:66:"/usr/local/var/www/yg/template/default_pc/html/public/include.html";i:1553340842;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/seokey.html";i:1544281904;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/styles.html";i:1544281908;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/themes.html";i:1544281914;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/banner.html";i:1562589756;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/mobile.html";i:1544281958;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/images.html";i:1562588892;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/paging.html";i:1544281924;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/screen.html";i:1544282030;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/latest.html";i:1544282038;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/leadup.html";i:1562589884;s:66:"/usr/local/var/www/yg/template/default_pc/html/module/listing.html";i:1562588892;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/titles.html";i:1544282104;s:65:"/usr/local/var/www/yg/template/default_pc/html/public/footer.html";i:1544325116;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/colors.html";i:1544282080;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/global.html";i:1544282084;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/langon.html";i:1544282740;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/quicks.html";i:1544282762;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Cache-Control" content="max-age=60" />
<meta name="renderer" content="webkit" />
<meta name="force-rendering" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php if($maccms['aid']==1): ?>
<title><?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $maccms['site_keywords']; ?>" />
<meta name="description" content="<?php echo $maccms['site_description']; ?>" />
<?php elseif($maccms['aid']==2): ?>
<title>最近更新 - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="最近更新,<?php echo $maccms['site_keywords']; ?>" />
<meta name="description" content="<?php echo $maccms['site_description']; ?>" />
<?php elseif($maccms['aid']==4): ?>
<title>留言板 - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="留言板,<?php echo $maccms['site_keywords']; ?>" />
<meta name="description" content="<?php echo $maccms['site_description']; ?>" />
<?php elseif($maccms['aid']==6): ?>
<title>个人中心 - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="个人中心,<?php echo $maccms['site_keywords']; ?>" />
<meta name="description" content="<?php echo $maccms['site_description']; ?>" />
<?php elseif($maccms['aid']==10): ?>
<title><?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $maccms['site_keywords']; ?>" />
<meta name="description" content="<?php echo $maccms['site_description']; ?>" />
<?php elseif($maccms['aid']==11): ?>
<title><?php echo mac_default($obj['type_title'],$obj['type_name']); ?> - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $obj['type_name']; ?>,<?php echo mac_default($obj['type_key'],$maccms['site_keywords']); ?>,<?php echo $maccms['site_name']; ?>" />
<meta name="description" content="<?php echo mac_default($obj['type_des'],$maccms['site_description']); ?>" />
<?php elseif($maccms['aid']==12): ?>
<title><?php echo $param['year']; ?><?php echo $param['area']; ?><?php echo $obj['type_name']; ?><?php echo $param['lang']; ?> - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $param['year']; ?>,<?php echo $param['area']; ?>,<?php echo $obj['type_name']; ?>,<?php echo $param['lang']; ?>,<?php echo mac_default($obj['type_key'],$maccms['site_keywords']); ?>,<?php echo $maccms['site_name']; ?>" />
<meta name="description" content="<?php echo mac_default($obj['type_des'],$maccms['site_description']); ?>" />
<?php elseif($maccms['aid']==13): ?>
<title><?php echo $param['wd']; ?><?php echo $param['actor']; ?><?php echo $param['director']; ?><?php echo $param['area']; ?><?php echo $param['lang']; ?><?php echo $param['year']; ?>_搜索结果 - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $param['wd']; ?>,<?php echo $param['actor']; ?>,<?php echo $param['director']; ?>,<?php echo $param['area']; ?>,<?php echo $param['lang']; ?>,<?php echo $param['year']; ?>,<?php echo $maccms['site_name']; ?>" />
<meta name="description" content="<?php echo $maccms['site_description']; ?>" />
<?php elseif($maccms['aid']==14): ?>
<title><?php echo mac_default($obj['vod_name'],'404'); ?>_影片详情_<?php echo $obj['type']['type_name']; ?> - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $obj['vod_actor']; ?>,<?php echo $obj['vod_director']; ?>,<?php echo $obj['vod_name']; ?>,<?php echo mac_default($obj['vod_tag'],$maccms['site_keywords']); ?>,<?php echo $obj['type']['type_name']; ?>,<?php echo $maccms['site_name']; ?>" />
<meta name="description" content="<?php echo mac_substring(mac_filter_html($obj['vod_content']),110); ?>">
<?php elseif($maccms['aid']==15): ?>
<title><?php echo mac_default($obj['vod_name'],'404'); ?><?php echo $obj['vod_play_list'][$param['sid']]['urls'][$param['nid']]['name']; ?>高清在线播放_<?php echo $obj['vod_play_list'][$param['sid']]['player_info']['show']; ?>_<?php echo $obj['type']['type_name']; ?> - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $obj['vod_actor']; ?>,<?php echo $obj['vod_director']; ?>,<?php echo $obj['vod_name']; ?>,<?php echo mac_default($obj['vod_tag'],$maccms['site_keywords']); ?>,<?php echo $obj['type']['type_name']; ?>,<?php echo $maccms['site_name']; ?>" />
<meta name="description" content="<?php echo mac_substring(mac_filter_html($obj['vod_content']),110); ?>" />
<?php elseif($maccms['aid']==16): ?>
<title><?php echo mac_default($obj['vod_name'],'404'); ?>_<?php echo $obj['vod_down_list'][$param['sid']]['player_info']['show']; ?>_<?php echo $obj['type']['type_name']; ?> - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $obj['vod_actor']; ?>,<?php echo $obj['vod_director']; ?>,<?php echo $obj['vod_name']; ?>,<?php echo mac_default($obj['vod_tag'],$maccms['site_keywords']); ?>,<?php echo $obj['type']['type_name']; ?>,<?php echo $maccms['site_name']; ?>" />
<meta name="description" content="<?php echo mac_substring(mac_filter_html($obj['vod_content']),110); ?>" />
<?php elseif($maccms['aid']==20): ?>
<title>资讯首页 - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="资讯首页,<?php echo $maccms['site_keywords']; ?>" />
<meta name="description" content="<?php echo $maccms['site_description']; ?>" />
<?php elseif($maccms['aid']==21): ?>
<title><?php echo mac_default($obj['type_name'],'404'); ?> - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $obj['type_name']; ?>,<?php echo mac_default($obj['type_key'],$maccms['site_keywords']); ?>,<?php echo $maccms['site_name']; ?>" />
<meta name="description" content="<?php echo mac_default($obj['type_des'],$maccms['site_description']); ?>" />
<?php elseif($maccms['aid']==24): ?>
<title><?php echo mac_default($obj['art_name'],'404'); ?>_文章详情_<?php echo $obj['type']['type_name']; ?> - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $obj['type']['type_name']; ?>,<?php echo mac_default($obj['art_tag'],$maccms['site_keywords']); ?>,<?php echo $maccms['site_name']; ?>" />
<meta name="description" content="<?php echo mac_substring(mac_filter_html($obj['art_content']),110); ?>" />
<?php elseif($maccms['aid']==30): ?>
<title>专题首页 - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="电影专题,电视剧专题,动漫专题,综艺专题,<?php echo $maccms['site_keywords']; ?>" />
<meta name="description" content="<?php echo $maccms['site_description']; ?>" />
<?php elseif($maccms['aid']==34): ?>
<title><?php echo mac_default($obj['topic_name'],'404'); ?>_专题 - <?php echo $maccms['site_name']; ?></title>
<meta name="keywords" content="<?php echo $obj['topic_name']; ?>,<?php echo mac_default($obj['topic_key'],$maccms['site_keywords']); ?>,<?php echo $maccms['site_name']; ?>" />
<meta name="description" content="<?php echo mac_default($obj['topic_des'],$maccms['site_description']); ?>" />
<?php endif; ?>
<meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta name="apple-mobile-web-app-title" content="<?php echo $maccms['site_name']; ?>" />
<link href="<?php echo $maccms['path_tpl']; ?>asset/img/favicon.png" rel="apple-touch-icon-precomposed" />
<link href="<?php echo $maccms['path_tpl']; ?>asset/img/favicon.ico" rel="shortcut icon" type="image/ico" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo mac_url('rss/index'); ?>">
<link href="<?php echo $maccms['path_tpl']; ?>asset/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $maccms['path_tpl']; ?>js/player.js"></script>
<link id="color" href="<?php echo $maccms['path_tpl']; ?>asset/css/golds.css" rel="stylesheet" type="text/css" /><script type="text/javascript">
var arr = document.cookie.match(new RegExp('(^| )fed_color=([^;]*)(;|$)'));
if(arr != null) {
	if(document.getElementById('color')) document.getElementById('color').href = '<?php echo $maccms['path_tpl']; ?>asset/css/' + unescape(arr[2]) + '.css';
	else {
		var style = document.createElement('link');
		style.id = 'color';
		style.href = '<?php echo $maccms['path_tpl']; ?>asset/css/' + unescape(arr[2]) + '.css';
		style.rel = 'stylesheet';
		style.type = 'text/css';
		document.getElementsByTagName('head').item(0).appendChild(style);
	}
}
</script>

</head>
<body class="fed-min-width">
<div class="fed-head-info fed-back-whits fed-min-width fed-box-shadow">
	<div class="fed-part-case">
		<div class="fed-navs-left">
			<a class="fed-navs-logo" href="<?php echo $maccms['path']; ?>">
				<font size="20">豆浆</font>
				<!-- <img style="width:120px; height:41px;" alt="<?php echo $maccms['site_name']; ?>" src="<?php echo $maccms['path_tpl']; ?>asset/img/logo_golden.png" > -->
			</a>
			<a class="fed-navs-title fed-font-xvi<?php if($maccms['aid']==1): ?> fed-text-green<?php endif; ?> fed-hide-xs fed-hide-sm fed-show-md-block" href="<?php echo $maccms['path']; ?>">首页</a>
			<?php $__TAG__ = '{"ids":"parent","order":"asc","by":"sort","num":"4","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
			<a class="fed-navs-title fed-font-xvi<?php if($vo['type_id']==$obj['type_id']||$vo['type_id']==$obj['type_1']['type_id']||$vo['type_id']==$obj['parent']['type_id']): ?> fed-text-green<?php endif; ?> fed-hide-xs fed-hide-sm fed-show-md-block" href="<?php echo mac_url_type($vo); ?>"><?php echo $vo['type_name']; ?></a>
			<?php endforeach; endif; else: echo "" ;endif; $vfedcc = require ('application/extra/maccms.php'); if($vfedcc['gbook']['status']=='1') { ?>
			<!--
			<a class="fed-navs-title fed-font-xvi<?php if($maccms['aid']==30): ?> fed-text-green<?php endif; ?> fed-hide-xs fed-hide-sm fed-show-md-block" href="<?php echo mac_url('topic/index'); ?>">专题</a>
			<a class="fed-navs-title fed-font-xvi<?php if($maccms['aid']==4): ?> fed-text-green<?php endif; ?> fed-hide-xs fed-hide-sm fed-show-md-block" href="<?php echo mac_url('gbook/index'); ?>">求片</a>
			-->

			<?php } else { ?>
			<!--<?php if((mac_data_count(0,'all','art'))!=''): ?>
			<a class="fed-navs-title fed-font-xvi<?php if($maccms['aid']==20): ?> fed-text-green<?php endif; ?> fed-hide-xs fed-hide-sm fed-show-md-block" href="<?php echo mac_url('art/index'); ?>">资讯</a>
			<?php endif; ?>-->
			<?php } ?>
			<a class="fed-navs-title fed-font-xvi fed-navs-navbar fed-event fed-hide-xs" href="javascript:;">导航<span class="fed-part-move fed-edge-info fed-edge-bottom"></span></a>

		</div>
		<div class="fed-navs-search fed-back-whits fed-hidden fed-conceal fed-show-sm-block">
			<a class="fed-navs-close fed-conceal fed-hide-sm" href="javascript:;">取消</a>
			<form class="fed-navs-form" data-vod="<?php echo mac_url('vod/search'); ?>" data-art="<?php echo mac_url('art/search'); ?>" data-key="<?php echo $maccms['search_hot']; ?>" autocomplete="off" onkeydown="if(event.keyCode==13){return false}">
				<?php if($vfedcc['app']['search']=='1') { ?>
				<input class="fed-navs-input fed-back-ashen fed-event" type="search" placeholder="<?php if($maccms['aid']==13): ?><?php echo $param['wd']; else: ?>请输入关键字<?php endif; ?>" />
				<a class="fed-navs-submit fed-back-ashen"><i class="fed-icon-font fed-icon-sousuo"></i></a>
				<?php } else echo '<a class="fed-text-linex fed-padding fed-visible"> </a>'; ?>
			</form>
		</div>
		<div class="fed-navs-right">
			<?php if($vfedcc['app']['search']=='1') { ?>
			<a class="fed-navs-button fed-text-black fed-event fed-hide-sm fed-icon-font fed-icon-sousuo" href="javascript:;"></a>
		    <?php } ?>
		    <a class="fed-navs-record fed-text-black fed-event fed-hide-xs fed-show-sm-block" href="javascript:;">看过<span class="fed-part-move fed-edge-info fed-edge-bottom"></span></a>
			<?php if($vfedcc['user']['status']=='1') { if($user['user_id']==0): ?>
			<a class="<?php if($maccms['aid']!=6): ?>fed-navs-login <?php endif; ?>fed-text-black fed-hide-xs fed-show-sm-block" href="<?php if($maccms['aid']!=6): ?>javascript:;<?php else: ?><?php echo mac_url('user/login'); endif; ?>">登录</a>
			<?php else: ?>
			<a class="fed-navs-user fed-text-black fed-event fed-hide-xs fed-show-sm-block" href="javascript:;">我的<span class="fed-part-move fed-edge-info fed-edge-bottom"></span></a>
			<?php endif; } ?>
			<a class="fed-navs-record fed-text-black fed-event fed-hide-sm fed-icon-font fed-icon-lishi" href="javascript:;"></a>
			<?php $__TAG__ = '{"num":"1","type":"all","order":"desc","by":"time","level":"3","id":"vo","key":"key"}';$__LIST__ = model("Art")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
			<a class="<?php if($vo['art_jumpurl']==''): ?>fed-navs-code <?php endif; ?>fed-text-black fed-event" href="<?php echo mac_default($vo['art_jumpurl'],'javascript:;'); ?>"<?php if($vo['art_jumpurl']): ?> target="_blank"<?php endif; ?>><?php echo $vo['art_name']; ?></a>
			<?php endforeach; endif; else: echo "" ;endif; ?>

		</div>

		<div class="fed-pops-navbar fed-box-shadow fed-min-width fed-hidden fed-conceal fed-anim">
			<div class="fed-pops-channel fed-back-whits fed-part-rows fed-line-top fed-hidden">选择栏目</div>
		       <!-- <a class="fed-pops-btn fed-back-whits fed-text-black fed-text-center fed-event fed-hide-sm fed-icon-font fed-icon-fenlei" href="javascript:;"></a>-->
			<ul class="fed-pops-list fed-font-size fed-back-whits fed-part-rows">
				<li class="fed-col-sm2<?php if($maccms['aid']==1): ?> fed-this<?php endif; ?> fed-hide-md"><a class="fed-part-eone" href="<?php echo $maccms['path']; ?>">首页</a></li>

				<?php $__TAG__ = '{"num":"1","type":"all","order":"desc","by":"time","level":"1","id":"vo","key":"key"}';$__LIST__ = model("Art")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
				<li class="fed-col-sm2<?php if($vo['art_id']==$obj['art_id']): ?> fed-this<?php endif; ?>"><a class="fed-part-eone" href="<?php echo mac_default($vo['art_jumpurl'],mac_url_art_detail($vo)); ?>"><?php echo $vo['art_name']; ?></a></li>
				<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"num":"1","type":"all","order":"desc","by":"time","level":"1","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
				<li class="fed-col-sm2<?php if($vo['vod_id']==$obj['vod_id']): ?> fed-this<?php endif; ?>"><a class="fed-part-eone" href="<?php echo mac_default($vo['vod_jumpurl'],mac_url_vod_detail($vo)); ?>"><?php echo $vo['vod_name']; ?></a></li>
				<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"ids":"parent","order":"asc","by":"sort","flag":"vod","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
				<li class="fed-col-sm2<?php if($vo['type_id']==$obj['type_id']||$vo['type_id']==$obj['type_1']['type_id']||$vo['type_id']==$obj['parent']['type_id']): ?> fed-this<?php endif; ?>"><a class="fed-part-eone" href="<?php echo mac_url_type($vo); ?>"><?php echo $vo['type_name']; ?></a></li>
				<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"ids":"parent","order":"asc","by":"sort","flag":"art","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
				<li class="fed-col-sm2<?php if($vo['type_id']==$obj['type_id']||$vo['type_id']==$obj['type_1']['type_id']||$vo['type_id']==$obj['parent']['type_id']): ?> fed-this<?php endif; ?>"><a class="fed-part-eone" href="<?php echo mac_url_type($vo); ?>"><?php echo $vo['type_name']; ?></a></li>
				<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"num":"1","id":"vo","key":"key"}';$__LIST__ = model("Topic")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
				<li class="fed-col-sm2<?php if($maccms['aid']==30): ?> fed-this<?php endif; ?>"><a class="fed-part-eone" href="<?php echo mac_url_topic_index(); ?>">专题</a></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>

				<li class="fed-col-sm2<?php if($maccms['aid']==7): ?> fed-this<?php endif; ?>"><a class="fed-part-eone" href="<?php echo mac_url('map/index'); ?>">最近更新</a></li>

				<?php if($vfedcc['gbook']['status']=='1') { ?>
				<li class="fed-col-sm2<?php if($maccms['aid']==4): ?> fed-this<?php endif; ?>"><a class="fed-part-eone" href="<?php echo mac_url('gbook/index'); ?>">求片</a></li>
				<?php } ?>
			</ul>
		</div>

		<div class="fed-pops-search fed-hidden fed-conceal fed-anim fed-anim-upbit">
			<div class="fed-pops-case fed-back-ashen fed-box-shadow">
				<div class="fed-pops-key">
				</div>
				<div class="fed-pops-box">
				</div>
			</div>
		</div>
		<div class="fed-pops-record fed-box-shadow fed-hidden fed-conceal fed-anim fed-anim-upbit">
		</div>
		<?php $__TAG__ = '{"num":"1","type":"all","order":"desc","by":"time","level":"3","id":"vo","key":"key"}';$__LIST__ = model("Art")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
		<div class="fed-pops-code fed-back-whits fed-box-shadow fed-hidden fed-conceal fed-anim fed-anim-upbit">
			<div class="fed-pops-cont">
				<?php echo $vo['art_content']; ?>
			</div>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; if($user['user_id']!=0): ?>
		<div class="fed-pops-user fed-box-shadow fed-back-whits fed-hidden fed-conceal fed-anim fed-anim-upbit">
			<ul class="fed-pops-list fed-font-size fed-back-whits">
				<li><a href="<?php echo mac_url('user/index'); ?>"><?php echo $user['user_name']; ?></a></li>
				<li><a href="<?php echo mac_url('user/info'); ?>">修改资料</a></li>
				<li><a href="<?php echo mac_url('user/favs'); ?>">我的收藏</a></li>
				<li><a href="<?php echo mac_url('user/plays'); ?>">播放记录</a></li>
				<li><a href="<?php echo mac_url('user/downs'); ?>">下载记录</a></li>
				<li><a href="<?php echo mac_url('user/buy'); ?>">充值中心</a></li>
				<li><a href="<?php echo mac_url('user/upgrade'); ?>">升级会员</a></li>
				<li><a href="<?php echo mac_url('user/logout'); ?>">退出登录</a></li>
			</ul>
	    </div>
	    <?php endif; ?>
	</div>
</div>
<div class="fed-tabr-info fed-back-whits fed-min-width fed-line-top fed-hide-sm">
	<ul class="fed-part-rows">
		<li class="fed-text-center"><a<?php if($maccms['aid']==1): ?> class="fed-text-green"<?php endif; ?> href="<?php echo $maccms['path']; ?>"><i class="fed-icon-font fed-icon-shouye"></i><span class="fed-font-xii">首页</span></a></li>
		<?php if((mac_data_count(0,'all','art'))!=''): ?>
		<li class="fed-text-center"><a<?php if($maccms['aid']==20): ?> class="fed-text-green"<?php endif; ?> href="<?php echo mac_url('art/index'); ?>"><i class="fed-icon-font fed-icon-zixun"></i><span class="fed-font-xii">影讯</span></a></li>
		<?php endif; if($vfedcc['gbook']['status']=='1') { ?>
		<li class="fed-text-center"><a<?php if($maccms['aid']==4): ?> class="fed-text-green"<?php endif; ?> href="<?php echo mac_url('gbook/index'); ?>"><i class="fed-icon-font fed-icon-liuyan"></i><span class="fed-font-xii">求片</span></a></li>
		<?php } $__TAG__ = '{"num":"1","id":"vo","key":"key"}';$__LIST__ = model("Topic")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
		<li class="fed-text-center"><a<?php if($maccms['aid']==30): ?> class="fed-text-green"<?php endif; ?> href="<?php echo mac_url_topic_index(); ?>"><i class="fed-icon-font fed-icon-zhuanti"></i><span class="fed-font-xii">专题</span></a></li>
		<?php endforeach; endif; else: echo "" ;endif; if($vfedcc['user']['status']=='1') { ?>
		<li class="fed-text-center"><a<?php if($maccms['aid']==6): ?> class="fed-text-green"<?php endif; ?> href="<?php if($user['user_id']!=''): ?><?php echo mac_url('user/index'); else: ?><?php echo mac_url('user/login'); endif; ?>"><i class="fed-icon-font fed-icon-yonghu"></i><span class="fed-font-xii">我的</span></a></li>
		<?php } ?>
	</ul>
</div>
<div class="fed-main-info fed-min-width">
<div class="fed-part-case">

<div class="fed-back-whits fed-box-shadow<?php if($maccms['aid']==10): $__TAG__ = '{"num":"1","type":"pic","id":"vo","key":"key"}';$__LIST__ = model("Link")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?> fed-margin-top<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"num":"1","type":"current","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?> fed-margin-top<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"num":"1","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Topic")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?> fed-margin-top<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"num":"1","type":"current","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Art")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?> fed-margin-top<?php endforeach; endif; else: echo "" ;endif; elseif($maccms['aid']==11): $__TAG__ = '{"num":"1","type":"current","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?> fed-margin-top<?php endforeach; endif; else: echo "" ;endif; elseif($maccms['aid']==20||$maccms['aid']==21): $__TAG__ = '{"num":"1","type":"current","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Art")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?> fed-margin-top<?php endforeach; endif; else: echo "" ;endif; endif; ?>">
<div class="fed-swip-container fed-part-rows">
<ul class="fed-swip-wrapper fed-font-size">
    <?php if($maccms['aid']==1): elseif($maccms['aid']==10): $__TAG__ = '{"num":"2","order":"asc","by":"sort","type":"pic","id":"vo","key":"key"}';$__LIST__ = model("Link")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-swip-slide">
<a class="fed-list-pics fed-part-5by2 fed-swip-lazy" href="<?php echo $vo['link_url']; ?>" data-background="<?php echo $vo['link_logo']; ?>" target="_blank">
<div class="fed-swip-title fed-text-white fed-part-eone">
<span class="fed-part-eone fed-font-xviii fed-swip-head"><?php echo $vo['link_name']; ?></span>
<span class="fed-part-eone fed-font-xii">推荐</span>
</div>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"num":"5","type":"current","order":"desc","by":"time","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-swip-slide">
<a class="fed-list-pics fed-part-5by2 fed-swip-lazy" href="<?php echo mac_url_vod_detail($vo); ?>" data-background="http://static.yg.cn/<?php echo mac_url_img(mac_default($vo['vod_pic_slide'],$vo['vod_pic'])); ?>">
<div class="fed-swip-title fed-text-white fed-part-eone">
<span class="fed-part-eone fed-font-xviii fed-swip-head"><?php echo $vo['vod_name']; ?></span>
<span class="fed-part-eone fed-font-xii"><?php echo mac_default($vo['vod_remarks'],'内详'); ?></span>
</div>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"num":"2","order":"desc","by":"time","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Topic")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-swip-slide">
<a class="fed-list-pics fed-part-5by2 fed-swip-lazy" href="<?php echo mac_url_topic_detail($vo); ?>" data-background="http://static.yg.cn/<?php echo mac_url_img(mac_default($vo['topic_pic_slide'],$vo['topic_pic'])); ?>">
<div class="fed-swip-title fed-text-white fed-part-eone">
<span class="fed-part-eone fed-font-xviii fed-swip-head"><?php echo $vo['topic_name']; ?></span>
<span class="fed-part-eone fed-font-xii"><?php echo mac_default($vo['topic_remarks'],'内详'); ?></span>
</div>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; $__TAG__ = '{"num":"2","type":"current","order":"desc","by":"time","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Art")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-swip-slide">
<a class="fed-list-pics fed-part-5by2 fed-swip-lazy" href="<?php echo mac_url_art_detail($vo); ?>" data-background="http://static.yg.cn/<?php echo mac_url_img(mac_default($vo['art_pic_slide'],$vo['art_pic'])); ?>">
<div class="fed-swip-title fed-text-white fed-part-eone">
<span class="fed-part-eone fed-font-xviii fed-swip-head"><?php echo $vo['art_name']; ?></span>
<span class="fed-part-eone fed-font-xii"><?php echo mac_default($vo['art_remarks'],'内详'); ?></span>
</div>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; elseif($maccms['aid']==11): $__TAG__ = '{"num":"5","type":"current","order":"desc","by":"time","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-swip-slide">
<a class="fed-list-pics fed-part-5by2 fed-swip-lazy" href="<?php echo mac_url_vod_detail($vo); ?>" data-background="http://static.yg.cn/<?php echo mac_url_img(mac_default($vo['vod_pic_slide'],$vo['vod_pic'])); ?>">
<div class="fed-swip-title fed-text-white fed-part-eone">
<span class="fed-part-eone fed-font-xviii fed-swip-head"><?php echo $vo['vod_name']; ?></span>
<span class="fed-part-eone fed-font-xii"><?php echo mac_default($vo['vod_remarks'],'内详'); ?></span>
</div>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; elseif($maccms['aid']==20||$maccms['aid']==21): $__TAG__ = '{"num":"5","type":"current","order":"desc","by":"time","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Art")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-swip-slide">
<a class="fed-list-pics fed-part-5by2 fed-swip-lazy" href="<?php echo mac_url_art_detail($vo); ?>" data-background="http://static.yg.cn/<?php echo mac_url_img(mac_default($vo['art_pic_slide'],$vo['art_pic'])); ?>">
<div class="fed-swip-title fed-text-white fed-part-eone">
<span class="fed-part-eone fed-font-xviii fed-swip-head"><?php echo $vo['art_name']; ?></span>
<span class="fed-part-eone fed-font-xii"><?php echo mac_default($vo['art_remarks'],'内详'); ?></span>
</div>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</ul>
<div class="fed-swip-pagin fed-font-size fed-text-right"></div>
<a class="fed-swip-next fed-text-white fed-text-center fed-hide-xs fed-icon-font fed-icon-you" href="javascript:;"></a>
<a class="fed-swip-prev fed-text-white fed-text-center fed-hide-xs fed-icon-font fed-icon-zuo" href="javascript:;"></a>
</div>
</div>

<div class="fed-back-whits fed-show-xs-block fed-hide-sm">
<ul class="fed-part-rows">
<?php if($maccms['aid']==10): $__TAG__ = '{"num":"2","ids":"parent","order":"asc","by":"sort","flag":"vod","id":"vfed","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vfed): $mod = ($key % 2 );++$key;$__TAG__ = '{"num":"4","parent":"'.$vfed['type_id'].'","order":"asc","by":"sort","flag":"vod","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-padding-x fed-col-xs3 fed-part-rows fed-text-center fed-line-top fed-line-right">
<a href="<?php echo mac_url_type($vo); ?>"><?php echo $vo['type_name']; ?></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; elseif($maccms['aid']==11): if($obj['childids']): if($obj['type_name']!='直播'&&$obj['parent']['type_name']!='直播'): $__TAG__ = '{"num":"8","parent":"current","order":"asc","by":"sort","flag":"vod","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-padding-x fed-col-xs3 fed-part-rows fed-text-center fed-line-top fed-line-right">
<a href="<?php echo mac_url_type($vo); ?>"><?php echo $vo['type_name']; ?></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; else: $__TAG__ = '{"num":"8","parent":"current","order":"asc","by":"sort","flag":"vod","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-padding-x fed-col-xs3 fed-part-rows fed-text-center fed-line-top fed-line-right">
<a href="<?php echo mac_url_type($vo); ?>"><?php echo $vo['type_name']; ?></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; endif; endif; elseif($maccms['aid']==20): $__TAG__ = '{"num":"2","ids":"parent","order":"asc","by":"sort","flag":"art","id":"vfed","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vfed): $mod = ($key % 2 );++$key;$__TAG__ = '{"num":"4","parent":"'.$vfed['type_id'].'","order":"asc","by":"sort","flag":"art","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-padding-x fed-col-xs3 fed-part-rows fed-text-center fed-line-top fed-line-right">
<a href="<?php echo mac_url_type($vo); ?>"><?php echo $vo['type_name']; ?></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; elseif($maccms['aid']==21): $__TAG__ = '{"num":"8","parent":"current","order":"asc","by":"sort","flag":"art","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-padding-x fed-col-xs3 fed-part-rows fed-text-center fed-line-top fed-line-right">
<a href="<?php echo mac_url_type($vo); ?>"><?php echo $vo['type_name']; ?></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</ul>
</div>
<?php if($obj['type_name']=='直播'||$obj['parent']['type_name']=='直播'): ?>
<div class="fed-list-new fed-part-layout fed-back-whits">
	<div class="fed-list-head fed-part-rows fed-padding">
		<h2 class="fed-font-xvi"><?php echo $obj['type_name']; ?></h2>
		<ul class="fed-part-tips fed-padding">
			<?php $__TAG__ = '{"num":"8","parent":"current","order":"asc","by":"sort","mid":"vod","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
			<li class="fed-hide-xs"><a href="<?php echo mac_url_type($vo); ?>"><?php echo $vo['type_name']; ?></a>/</li>
			<?php endforeach; endif; else: echo "" ;endif; if($obj['childids']): ?>
			<li><a class="fed-more" href="javascript:;" onclick="location.reload();">刷新</a></li>
			<?php else: ?>
			<li><a class="fed-more" href="<?php echo mac_url_type($obj['parent']); ?>">返回</a></li>
			<?php endif; ?>
		</ul>
	</div>
	<ul class="fed-list-info fed-list-img fed-part-rows">
		<?php $__TAG__ = '{"num":"24","paging":"yes","half":"3","type":"current","order":"desc","by":"time","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__);$__PAGING__ = mac_page_param($__LIST__['total'],$__LIST__['limit'],$__LIST__['page'],$__LIST__['pageurl'],$__LIST__['half']); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
		<li class="fed-list-item fed-padding fed-col-xs6 fed-col-sm4 fed-col-md3">
		<a class="fed-list-pics fed-lazy fed-part-5by3" href="<?php echo mac_url_vod_detail($vo); ?>" data-original="http://static.yg.cn/<?php echo mac_url_img($vo['vod_pic']); ?>">
<span class="fed-list-play fed-hide-xs"></span>
<span class="fed-list-score fed-font-xii fed-text-white fed-back-green"><?php echo mac_default($vo['vod_remarks'],'内详'); ?></span>
<span class="fed-list-remarks fed-font-xii fed-text-white fed-text-center"><?php echo $vo['vod_name']; ?></span>
</a>
		</li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<?php if($__PAGING__['page_total']>1): ?>
<div class="fed-page-info fed-text-center">
	<?php if($maccms['aid']==4): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.message.show(1)">首页</a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.message.show('<?php echo $__PAGING__['page_prev']; ?>')">上一页</a>
	<?php if($__PAGING__['page_current']>3): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.message.show(1)"<?php endif; ?>>1</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<?php endif; if(is_array($__PAGING__['page_num']) || $__PAGING__['page_num'] instanceof \think\Collection || $__PAGING__['page_num'] instanceof \think\Paginator): if( count($__PAGING__['page_num'])==0 ) : echo "" ;else: foreach($__PAGING__['page_num'] as $key=>$num): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.message.show('<?php echo $num; ?>')"<?php endif; ?>><?php echo $num; ?></a>
	<?php endforeach; endif; else: echo "" ;endif; if($__PAGING__['page_current']<($__PAGING__['page_total']-2)): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.message.show('<?php echo $__PAGING__['page_total']; ?>')"<?php endif; ?>><?php echo $__PAGING__['page_total']; ?></a>
	<?php endif; ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline" href="javascript:;"><?php echo $__PAGING__['page_current']; ?>/<?php echo $__PAGING__['page_total']; ?></a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.message.show('<?php echo $__PAGING__['page_next']; ?>')">下一页</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.message.show('<?php echo $__PAGING__['page_total']; ?>')">尾页</a>
	<?php elseif($maccms['aid']==5): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.comment.show(1)">首页</a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.comment.show('<?php echo $__PAGING__['page_prev']; ?>')">上一页</a>
	<?php if($__PAGING__['page_current']>3): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.comment.show(1)"<?php endif; ?>>1</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<?php endif; if(is_array($__PAGING__['page_num']) || $__PAGING__['page_num'] instanceof \think\Collection || $__PAGING__['page_num'] instanceof \think\Paginator): if( count($__PAGING__['page_num'])==0 ) : echo "" ;else: foreach($__PAGING__['page_num'] as $key=>$num): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.comment.show('<?php echo $num; ?>')"<?php endif; ?>><?php echo $num; ?></a>
	<?php endforeach; endif; else: echo "" ;endif; if($__PAGING__['page_current']<($__PAGING__['page_total']-2)): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.comment.show('<?php echo $__PAGING__['page_total']; ?>')"<?php endif; ?>><?php echo $__PAGING__['page_total']; ?></a>
	<?php endif; ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline" href="javascript:;"><?php echo $__PAGING__['page_current']; ?>/<?php echo $__PAGING__['page_total']; ?></a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.comment.show('<?php echo $__PAGING__['page_next']; ?>')">下一页</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.comment.show('<?php echo $__PAGING__['page_total']; ?>')">尾页</a>
	<?php else: ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="<?php echo mac_url_page($__PAGING__['page_url'],1); ?>">首页</a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="<?php echo mac_url_page($__PAGING__['page_url'],$__PAGING__['page_prev']); ?>">上一页</a>
	<?php if($__PAGING__['page_current']>3): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline" href="<?php echo mac_url_page($__PAGING__['page_url'],1); ?>">1</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<?php endif; if(is_array($__PAGING__['page_num']) || $__PAGING__['page_num'] instanceof \think\Collection || $__PAGING__['page_num'] instanceof \think\Paginator): if( count($__PAGING__['page_num'])==0 ) : echo "" ;else: foreach($__PAGING__['page_num'] as $key=>$num): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="<?php if($__PAGING__['page_current']==$num): ?>javascript:;<?php else: ?><?php echo mac_url_page($__PAGING__['page_url'],$num); endif; ?>"><?php echo $num; ?></a>
	<?php endforeach; endif; else: echo "" ;endif; if($__PAGING__['page_current']<($__PAGING__['page_total']-2)): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline" href="<?php echo mac_url_page($__PAGING__['page_url'],$__PAGING__['page_total']); ?>"><?php echo $__PAGING__['page_total']; ?></a>
	<?php endif; ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline" href="javascript:;"><?php echo $__PAGING__['page_current']; ?>/<?php echo $__PAGING__['page_total']; ?></a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="<?php echo mac_url_page($__PAGING__['page_url'],$__PAGING__['page_next']); ?>">下一页</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="<?php echo mac_url_page($__PAGING__['page_url'],$__PAGING__['page_total']); ?>">尾页</a>
	<?php endif; ?>
</div>
<?php endif; if($__PAGING__['record_total']!=0): ?>
<script type="text/javascript">
if(document.getElementById('fed-now')) document.getElementById('fed-now').innerHTML='<?php echo $__PAGING__['page_current']; ?>';
if(document.getElementById('fed-count')) document.getElementById('fed-count').innerHTML='<?php echo $__PAGING__['record_total']; ?>';
</script>
<?php endif; ?>
</div>
<?php else: if($obj['childids']): ?>
<div class="fed-scre-list fed-part-layout fed-back-whits fed-part-rows">
<dl class="fed-col-sx12 fed-col-sm6 fed-col-md4">
<dt>地区</dt>
<?php if(empty($obj['type_extend']['area']) || (($obj['type_extend']['area'] instanceof \think\Collection || $obj['type_extend']['area'] instanceof \think\Paginator ) && $obj['type_extend']['area']->isEmpty())): $_5d26c38a740cd=explode(',',$obj['parent']['type_extend']['area']); if(is_array($_5d26c38a740cd) || $_5d26c38a740cd instanceof \think\Collection || $_5d26c38a740cd instanceof \think\Paginator): if( count($_5d26c38a740cd)==0 ) : echo "" ;else: foreach($_5d26c38a740cd as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$vo,'lang'=>$param['lang'],'year'=>$param['year']],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; else: $_5d26c38a740af=explode(',',$obj['type_extend']['area']); if(is_array($_5d26c38a740af) || $_5d26c38a740af instanceof \think\Collection || $_5d26c38a740af instanceof \think\Paginator): if( count($_5d26c38a740af)==0 ) : echo "" ;else: foreach($_5d26c38a740af as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$vo,'lang'=>$param['lang'],'year'=>$param['year']],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</dl>
<dl class="fed-col-sx12 fed-col-sm6 fed-col-md4">
<dt>年代</dt>
<?php if(empty($obj['type_extend']['year']) || (($obj['type_extend']['year'] instanceof \think\Collection || $obj['type_extend']['year'] instanceof \think\Paginator ) && $obj['type_extend']['year']->isEmpty())): $_5d26c38a74062=explode(',',$obj['parent']['type_extend']['year']); if(is_array($_5d26c38a74062) || $_5d26c38a74062 instanceof \think\Collection || $_5d26c38a74062 instanceof \think\Paginator): if( count($_5d26c38a74062)==0 ) : echo "" ;else: foreach($_5d26c38a74062 as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$param['area'],'lang'=>$param['lang'],'year'=>$vo],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; else: $_5d26c38a74044=explode(',',$obj['type_extend']['year']); if(is_array($_5d26c38a74044) || $_5d26c38a74044 instanceof \think\Collection || $_5d26c38a74044 instanceof \think\Paginator): if( count($_5d26c38a74044)==0 ) : echo "" ;else: foreach($_5d26c38a74044 as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$param['area'],'lang'=>$param['lang'],'year'=>$vo],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</dl>
<dl class="fed-col-sx12 fed-col-sm6 fed-col-md4 fed-hide-sm fed-show-md-block">
<dt>语言</dt>
<?php if(empty($obj['type_extend']['lang']) || (($obj['type_extend']['lang'] instanceof \think\Collection || $obj['type_extend']['lang'] instanceof \think\Paginator ) && $obj['type_extend']['lang']->isEmpty())): $_5d26c38a74003=explode(',',$obj['parent']['type_extend']['lang']); if(is_array($_5d26c38a74003) || $_5d26c38a74003 instanceof \think\Collection || $_5d26c38a74003 instanceof \think\Paginator): if( count($_5d26c38a74003)==0 ) : echo "" ;else: foreach($_5d26c38a74003 as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$param['area'],'lang'=>$vo,'year'=>$param['year']],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; else: $_5d26c38a73fe2=explode(',',$obj['type_extend']['lang']); if(is_array($_5d26c38a73fe2) || $_5d26c38a73fe2 instanceof \think\Collection || $_5d26c38a73fe2 instanceof \think\Paginator): if( count($_5d26c38a73fe2)==0 ) : echo "" ;else: foreach($_5d26c38a73fe2 as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$param['area'],'lang'=>$vo,'year'=>$param['year']],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</dl>
</div>
<div class="fed-part-layout fed-back-whits">
<div class="fed-list-head fed-part-rows fed-padding">
<h2 class="fed-font-xvi">最近更新</h2>
<ul class="fed-part-tips fed-padding">
<li>今日更新 <span class="fed-text-green"><?php echo mac_data_count($obj['type_id'],'today','vod'); ?></span> 部  共 <span class="fed-text-green"><?php echo mac_data_count($obj['type_id'],'all','vod'); ?> </span>部</li>
<li><a class="fed-more" href="<?php echo mac_url('map/index'); ?>">更多</a></li>
</ul>
</div>
<?php if($maccms['aid']==1): ?>
<div class="fed-padding fed-col-sx12 fed-col-md5">
<div class="fed-swip-container fed-part-rows">
<ul class="fed-swip-wrapper fed-font-size">
<?php $__TAG__ = '{"num":"5","order":"desc","by":"time","level":"4","key":"snum","id":"vo"}';$__LIST__ = model("Topic")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $snum = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($snum % 2 );++$snum;?>
<li class="fed-swip-slide">
<a class="fed-list-pics fed-part-3by2 fed-swip-lazy" href="<?php echo mac_url_topic_detail($vo); ?>" data-background="http://static.yg.cn/<?php echo mac_url_img(mac_default($vo['topic_pic_slide'],$vo['vod_pic'])); ?>">
<div class="fed-swip-title fed-text-white fed-part-eone">
<span class="fed-part-eone fed-font-xviii fed-swip-head"><?php echo $vo['topic_name']; ?></span>
<span class="fed-part-eone fed-font-xii"><?php echo mac_default($vo['topic_remarks'],'内详'); ?></span>
</div>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; if($snum==0): $__TAG__ = '{"num":"6","paging":"no","type":"all","level":"9","order":"desc","by":"sort","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-swip-slide">
<a class="fed-list-pics fed-part-3by2 fed-swip-lazy" href="<?php echo mac_url_vod_detail($vo); ?>" data-background="http://static.yg.cn/<?php echo mac_url_img($vo['vod_pic_slide']); ?>">
<div class="fed-swip-title fed-text-white fed-part-eone">
<span class="fed-part-eone fed-font-xviii fed-swip-head"><?php echo $vo['vod_name']; ?></span>
<span class="fed-part-eone fed-font-xii"><?php echo $vo['vod_state']; ?></span>
</div>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</ul>
<div class="fed-swip-pagin fed-font-size fed-text-right"></div>
<a class="fed-swip-next fed-text-white fed-text-center fed-hide-xs fed-icon-font fed-icon-you" href="javascript:;"></a>
<a class="fed-swip-prev fed-text-white fed-text-center fed-hide-xs fed-icon-font fed-icon-zuo" href="javascript:;"></a>
</div>

</div>
<?php endif; ?>
<div class="fed-col-sx12<?php if($maccms['aid']==1): ?> fed-col-md7<?php endif; ?>">
<ul class="fed-list-info fed-part-rows">
<?php $__TAG__ = '{"num":"8","type":"current","order":"desc","by":"time","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-list-item fed-padding fed-col-xs4 fed-col-sm3<?php if($maccms['aid']==1): ?> fed-col-md3<?php if($key>4): ?> fed-hide-sm<?php endif; if($key>6): ?> fed-hide-xs<?php endif; else: ?> fed-col-md2<?php if($key>6): ?> fed-hide-xs fed-show-sm-block fed-hide-md<?php endif; endif; ?>">
<a class="fed-list-pics fed-lazy fed-part-2by3" href="<?php echo mac_url_vod_detail($vo); ?>" data-original="http://static.yg.cn/<?php echo mac_url_img($vo['vod_pic']); ?>">
<span class="fed-list-play fed-hide-xs"></span>
<?php if($vo['vod_score']>0): ?>
<span class="fed-list-score fed-font-xii fed-back-green"><?php echo $vo['vod_score']; ?></span>
<?php endif; ?>
<span class="fed-list-remarks fed-font-xii fed-text-white fed-text-center"><?php echo mac_default($vo['vod_remarks'],'内详'); ?></span>
</a>
<a class="fed-list-title fed-font-xiv fed-text-center fed-text-sm-left fed-visible fed-part-eone" href="<?php echo mac_url_vod_detail($vo); ?>"><?php echo $vo['vod_name']; ?></a>
<span class="fed-list-desc fed-font-xii fed-visible fed-part-eone fed-text-muted fed-hide-xs fed-show-sm-block">
<?php echo mac_default($vo['vod_actor'],'内详'); ?>
</span>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<ul class="fed-list-text fed-part-rows fed-part-both fed-hide-xs fed-show-sm-block">
<?php $__TAG__ = '{"num":"12","type":"current","order":"desc","by":"time","start":"9","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-list-item fed-col-xs4 fed-col-sm3 fed-col-md2">
<a class="fed-list-title fed-text-line fed-visible fed-part-eone" href="<?php echo mac_url_vod_detail($vo); ?>"><?php echo $vo['vod_name']; ?><i class="fed-icon-font fed-icon-you"></i></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<?php $__TAG__ = '{"ids":"current","order":"asc","by":"sort","id":"vo","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<div class="fed-list-new fed-part-layout fed-back-whits">
	<div class="fed-list-head fed-part-rows fed-padding">
		<h2 class="fed-font-xvi"><?php echo $vo['type_name']; ?></h2>
		<ul class="fed-part-tips fed-padding">
			<li><a class="fed-more" href="<?php echo mac_url_type($vo); ?>">更多</a></li>
		</ul>
	</div>
	<ul class="fed-list-info fed-part-rows">
		<?php $__TAG__ = '{"num":"8","type":"'.$vo['type_id'].'","order":"desc","by":"time","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
		<li class="fed-list-item fed-padding fed-col-xs4 fed-col-sm3 fed-col-md2<?php if($key>6): ?> fed-hide-xs fed-show-sm-block fed-hide-md<?php endif; ?>">
		<a class="fed-list-pics fed-lazy fed-part-2by3" href="<?php echo mac_url_vod_detail($vo); ?>" data-original="http://static.yg.cn/<?php echo mac_url_img($vo['vod_pic']); ?>">
<span class="fed-list-play fed-hide-xs"></span>
<?php if($vo['vod_score']>0): ?>
<span class="fed-list-score fed-font-xii fed-back-green"><?php echo $vo['vod_score']; ?></span>
<?php endif; ?>
<span class="fed-list-remarks fed-font-xii fed-text-white fed-text-center"><?php echo mac_default($vo['vod_remarks'],'内详'); ?></span>
</a>
<a class="fed-list-title fed-font-xiv fed-text-center fed-text-sm-left fed-visible fed-part-eone" href="<?php echo mac_url_vod_detail($vo); ?>"><?php echo $vo['vod_name']; ?></a>
<span class="fed-list-desc fed-font-xii fed-visible fed-part-eone fed-text-muted fed-hide-xs fed-show-sm-block">
<?php echo mac_default($vo['vod_actor'],'内详'); ?>
</span>
		</li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<?php endforeach; endif; else: echo "" ;endif; else: ?>
<div class="fed-scre-list fed-part-layout fed-back-whits fed-part-rows">
<dl class="fed-col-sx12 fed-col-sm6 fed-col-md4">
<dt>地区</dt>
<?php if(empty($obj['type_extend']['area']) || (($obj['type_extend']['area'] instanceof \think\Collection || $obj['type_extend']['area'] instanceof \think\Paginator ) && $obj['type_extend']['area']->isEmpty())): $_5d26c38a73e27=explode(',',$obj['parent']['type_extend']['area']); if(is_array($_5d26c38a73e27) || $_5d26c38a73e27 instanceof \think\Collection || $_5d26c38a73e27 instanceof \think\Paginator): if( count($_5d26c38a73e27)==0 ) : echo "" ;else: foreach($_5d26c38a73e27 as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$vo,'lang'=>$param['lang'],'year'=>$param['year']],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; else: $_5d26c38a73e11=explode(',',$obj['type_extend']['area']); if(is_array($_5d26c38a73e11) || $_5d26c38a73e11 instanceof \think\Collection || $_5d26c38a73e11 instanceof \think\Paginator): if( count($_5d26c38a73e11)==0 ) : echo "" ;else: foreach($_5d26c38a73e11 as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$vo,'lang'=>$param['lang'],'year'=>$param['year']],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</dl>
<dl class="fed-col-sx12 fed-col-sm6 fed-col-md4">
<dt>年代</dt>
<?php if(empty($obj['type_extend']['year']) || (($obj['type_extend']['year'] instanceof \think\Collection || $obj['type_extend']['year'] instanceof \think\Paginator ) && $obj['type_extend']['year']->isEmpty())): $_5d26c38a73ddf=explode(',',$obj['parent']['type_extend']['year']); if(is_array($_5d26c38a73ddf) || $_5d26c38a73ddf instanceof \think\Collection || $_5d26c38a73ddf instanceof \think\Paginator): if( count($_5d26c38a73ddf)==0 ) : echo "" ;else: foreach($_5d26c38a73ddf as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$param['area'],'lang'=>$param['lang'],'year'=>$vo],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; else: $_5d26c38a73dc9=explode(',',$obj['type_extend']['year']); if(is_array($_5d26c38a73dc9) || $_5d26c38a73dc9 instanceof \think\Collection || $_5d26c38a73dc9 instanceof \think\Paginator): if( count($_5d26c38a73dc9)==0 ) : echo "" ;else: foreach($_5d26c38a73dc9 as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$param['area'],'lang'=>$param['lang'],'year'=>$vo],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</dl>
<dl class="fed-col-sx12 fed-col-sm6 fed-col-md4 fed-hide-sm fed-show-md-block">
<dt>语言</dt>
<?php if(empty($obj['type_extend']['lang']) || (($obj['type_extend']['lang'] instanceof \think\Collection || $obj['type_extend']['lang'] instanceof \think\Paginator ) && $obj['type_extend']['lang']->isEmpty())): $_5d26c38a73d95=explode(',',$obj['parent']['type_extend']['lang']); if(is_array($_5d26c38a73d95) || $_5d26c38a73d95 instanceof \think\Collection || $_5d26c38a73d95 instanceof \think\Paginator): if( count($_5d26c38a73d95)==0 ) : echo "" ;else: foreach($_5d26c38a73d95 as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$param['area'],'lang'=>$vo,'year'=>$param['year']],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; else: $_5d26c38a73d7b=explode(',',$obj['type_extend']['lang']); if(is_array($_5d26c38a73d7b) || $_5d26c38a73d7b instanceof \think\Collection || $_5d26c38a73d7b instanceof \think\Paginator): if( count($_5d26c38a73d7b)==0 ) : echo "" ;else: foreach($_5d26c38a73d7b as $key=>$vo): ?>
<dd<?php if($key>9): ?> class="fed-hide-sm"<?php endif; ?>><a href="<?php echo mac_url_type($obj,['area'=>$param['area'],'lang'=>$vo,'year'=>$param['year']],'show'); ?>"><?php echo $vo; ?></a></dd>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</dl>
</div>
<div class="fed-list-new fed-part-layout fed-back-whits">
	<div class="fed-list-head fed-part-rows fed-padding">
		<h2 class="fed-font-xvi"><?php echo $obj['type_name']; ?></h2>
		<ul class="fed-part-tips fed-padding">
			<li><span class="fed-hide-xs">当前第&nbsp;<span id="fed-now" class="fed-text-green fed-text-bold">1</span>&nbsp;页，</span>共&nbsp;<span id="fed-count" class="fed-text-green fed-text-bold">0</span>&nbsp;个影片</li>
			<li><a class="fed-more" href="<?php echo mac_url_type($obj,[],'show'); ?>">筛选</a></li>
		</ul>
	</div>
	<ul class="fed-list-info fed-part-rows">
		<?php $__TAG__ = '{"num":"24","paging":"yes","half":"3","type":"current","order":"desc","by":"time","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__);$__PAGING__ = mac_page_param($__LIST__['total'],$__LIST__['limit'],$__LIST__['page'],$__LIST__['pageurl'],$__LIST__['half']); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
		<li class="fed-list-item fed-padding fed-col-xs4 fed-col-sm3 fed-col-md2">
		<a class="fed-list-pics fed-lazy fed-part-2by3" href="<?php echo mac_url_vod_detail($vo); ?>" data-original="http://static.yg.cn/<?php echo mac_url_img($vo['vod_pic']); ?>">
<span class="fed-list-play fed-hide-xs"></span>
<?php if($vo['vod_score']>0): ?>
<span class="fed-list-score fed-font-xii fed-back-green"><?php echo $vo['vod_score']; ?></span>
<?php endif; ?>
<span class="fed-list-remarks fed-font-xii fed-text-white fed-text-center"><?php echo mac_default($vo['vod_remarks'],'内详'); ?></span>
</a>
<a class="fed-list-title fed-font-xiv fed-text-center fed-text-sm-left fed-visible fed-part-eone" href="<?php echo mac_url_vod_detail($vo); ?>"><?php echo $vo['vod_name']; ?></a>
<span class="fed-list-desc fed-font-xii fed-visible fed-part-eone fed-text-muted fed-hide-xs fed-show-sm-block">
<?php echo mac_default($vo['vod_actor'],'内详'); ?>
</span>
		</li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<?php if($__PAGING__['page_total']>1): ?>
<div class="fed-page-info fed-text-center">
	<?php if($maccms['aid']==4): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.message.show(1)">首页</a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.message.show('<?php echo $__PAGING__['page_prev']; ?>')">上一页</a>
	<?php if($__PAGING__['page_current']>3): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.message.show(1)"<?php endif; ?>>1</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<?php endif; if(is_array($__PAGING__['page_num']) || $__PAGING__['page_num'] instanceof \think\Collection || $__PAGING__['page_num'] instanceof \think\Paginator): if( count($__PAGING__['page_num'])==0 ) : echo "" ;else: foreach($__PAGING__['page_num'] as $key=>$num): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.message.show('<?php echo $num; ?>')"<?php endif; ?>><?php echo $num; ?></a>
	<?php endforeach; endif; else: echo "" ;endif; if($__PAGING__['page_current']<($__PAGING__['page_total']-2)): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.message.show('<?php echo $__PAGING__['page_total']; ?>')"<?php endif; ?>><?php echo $__PAGING__['page_total']; ?></a>
	<?php endif; ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline" href="javascript:;"><?php echo $__PAGING__['page_current']; ?>/<?php echo $__PAGING__['page_total']; ?></a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.message.show('<?php echo $__PAGING__['page_next']; ?>')">下一页</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.message.show('<?php echo $__PAGING__['page_total']; ?>')">尾页</a>
	<?php elseif($maccms['aid']==5): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.comment.show(1)">首页</a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.comment.show('<?php echo $__PAGING__['page_prev']; ?>')">上一页</a>
	<?php if($__PAGING__['page_current']>3): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.comment.show(1)"<?php endif; ?>>1</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<?php endif; if(is_array($__PAGING__['page_num']) || $__PAGING__['page_num'] instanceof \think\Collection || $__PAGING__['page_num'] instanceof \think\Paginator): if( count($__PAGING__['page_num'])==0 ) : echo "" ;else: foreach($__PAGING__['page_num'] as $key=>$num): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.comment.show('<?php echo $num; ?>')"<?php endif; ?>><?php echo $num; ?></a>
	<?php endforeach; endif; else: echo "" ;endif; if($__PAGING__['page_current']<($__PAGING__['page_total']-2)): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="javascript:;"<?php if($__PAGING__[ 'page_current']!=$num): ?> onclick="fed.comment.show('<?php echo $__PAGING__['page_total']; ?>')"<?php endif; ?>><?php echo $__PAGING__['page_total']; ?></a>
	<?php endif; ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline" href="javascript:;"><?php echo $__PAGING__['page_current']; ?>/<?php echo $__PAGING__['page_total']; ?></a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.comment.show('<?php echo $__PAGING__['page_next']; ?>')">下一页</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="javascript:;" onclick="fed.comment.show('<?php echo $__PAGING__['page_total']; ?>')">尾页</a>
	<?php else: ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="<?php echo mac_url_page($__PAGING__['page_url'],1); ?>">首页</a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==1): ?> fed-btns-disad<?php endif; ?>" href="<?php echo mac_url_page($__PAGING__['page_url'],$__PAGING__['page_prev']); ?>">上一页</a>
	<?php if($__PAGING__['page_current']>3): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline" href="<?php echo mac_url_page($__PAGING__['page_url'],1); ?>">1</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<?php endif; if(is_array($__PAGING__['page_num']) || $__PAGING__['page_num'] instanceof \think\Collection || $__PAGING__['page_num'] instanceof \think\Paginator): if( count($__PAGING__['page_num'])==0 ) : echo "" ;else: foreach($__PAGING__['page_num'] as $key=>$num): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline<?php if($__PAGING__['page_current']==$num): ?> fed-btns-green<?php endif; ?>" href="<?php if($__PAGING__['page_current']==$num): ?>javascript:;<?php else: ?><?php echo mac_url_page($__PAGING__['page_url'],$num); endif; ?>"><?php echo $num; ?></a>
	<?php endforeach; endif; else: echo "" ;endif; if($__PAGING__['page_current']<($__PAGING__['page_total']-2)): ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline fed-btns-disad" href="javascript:;">...</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-sm-inline" href="<?php echo mac_url_page($__PAGING__['page_url'],$__PAGING__['page_total']); ?>"><?php echo $__PAGING__['page_total']; ?></a>
	<?php endif; ?>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline" href="javascript:;"><?php echo $__PAGING__['page_current']; ?>/<?php echo $__PAGING__['page_total']; ?></a>
	<a class="fed-btns-info fed-rims-info<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="<?php echo mac_url_page($__PAGING__['page_url'],$__PAGING__['page_next']); ?>">下一页</a>
	<a class="fed-btns-info fed-rims-info fed-hide fed-show-xs-inline<?php if($__PAGING__['page_current']==$__PAGING__['page_total']): ?> fed-btns-disad<?php endif; ?>" href="<?php echo mac_url_page($__PAGING__['page_url'],$__PAGING__['page_total']); ?>">尾页</a>
	<?php endif; ?>
</div>
<?php endif; if($__PAGING__['record_total']!=0): ?>
<script type="text/javascript">
if(document.getElementById('fed-now')) document.getElementById('fed-now').innerHTML='<?php echo $__PAGING__['page_current']; ?>';
if(document.getElementById('fed-count')) document.getElementById('fed-count').innerHTML='<?php echo $__PAGING__['record_total']; ?>';
</script>
<?php endif; ?>
</div>
<?php endif; endif; ?>
</div>
</div>
<div class="fed-foot-info fed-part-layout fed-back-whits">
<div class="fed-part-case">
<div class="fed-text-center fed-text-black fed-hide-xs fed-show-sm-block"><?php $__TAG__ = '{"num":"1","type":"all","order":"desc","by":"time","level":"2","id":"vo","key":"key"}';$__LIST__ = model("Art")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><?php echo $vo['art_content']; endforeach; endif; else: echo "" ;endif; ?></div>
<p class="fed-text-center fed-text-black"><?php echo $maccms['site_tj']; ?></p>
<p class="fed-text-center fed-text-black fed-foot-maps fed-font-size">
<a class="fed-font-xiv" href="<?php echo mac_url('map/index'); ?>" target="_blank">最近更新</a>
<span class="fed-font-xiv"> - </span>

<a class="fed-font-xiv" href="<?php echo mac_url('gbook/index'); ?>" target="_blank">反馈留言</a>
<span class="fed-font-xiv"> - </span>

<a class="fed-font-xiv" href="<?php echo mac_url('rss/baidu'); ?>" target="_blank">百度sitemap</a>
<span class="fed-font-xiv fed-hide-xs"> - </span>
<a class="fed-font-xiv fed-hide-xs" href="<?php echo mac_url('rss/google'); ?>" target="_blank">谷歌sitemap</a>
<span class="fed-font-xiv fed-hide-xs"> - </span>
<a class="fed-font-xiv fed-hide-xs" href="<?php echo mac_url('rss/bing'); ?>" target="_blank">必应sitemap</a>
<span class="fed-font-xiv fed-hide-xs"> - </span>
<a class="fed-font-xiv fed-hide-xs" href="<?php echo mac_url('rss/sogou'); ?>" target="_blank">搜狗sitemap</a>
<span class="fed-font-xiv fed-hide-xs"> - </span>
<a class="fed-font-xiv fed-hide-xs" href="<?php echo mac_url('rss/so'); ?>" target="_blank">奇虎sitemap</a>
<span class="fed-font-xiv fed-hide-xs"> - </span>
<a class="fed-font-xiv fed-hide-xs" href="<?php echo mac_url('rss/sm'); ?>" target="_blank">神马sitemap</a>
</p>
<p class="fed-text-center fed-text-black">若本站收录内容无意侵犯了贵公司版权，请给网页底部邮箱地址来信，我们会及时处理和回复，谢谢合作。</p>
<p class="fed-text-center fed-text-black">站长邮箱:<?php echo $maccms['site_email']; ?><span class="fed-hide-xs"></span></p>
<p class="fed-text-center fed-text-black">Copyright © <?php echo date('Y'); ?> <?php echo $maccms['site_url']; ?> Inc.<span class="fed-hide-xs"> All Rights Reserved.</span></p>
</div>
</div>
<div class="fed-goto-info">
<a class="fed-goto-share fed-visible fed-text-center fed-back-whits fed-icon-font fed-icon-fenxiang" href="javascript:;"></a>
<a class="fed-goto-color fed-visible fed-text-center fed-back-whits fed-icon-font fed-icon-fengge fed-event" href="javascript:;"></a>
<a class="fed-goto-toper fed-visible fed-text-center fed-back-whits fed-icon-font fed-icon-top" href="javascript:;"></a>
</div>
<div class="fed-colo-info fed-part-layout fed-part-rows fed-back-whits fed-event fed-hidden">
<a class="fed-padding fed-colo-white" onclick="fed.colors.insert('white')" href="javascript:;">绿色</a>
<a class="fed-padding fed-colo-black" onclick="fed.colors.insert('black')" href="javascript:;">黑色</a>
<a class="fed-padding fed-colo-golds" onclick="fed.colors.insert('golds')" href="javascript:;">黑金</a>
<a class="fed-padding fed-colo-glass" onclick="fed.colors.insert('glass')" href="javascript:;">透明</a>
<a class="fed-padding fed-colo-orang" onclick="fed.colors.insert('orang')" href="javascript:;">橙色</a>
<a class="fed-padding fed-colo-blues" onclick="fed.colors.insert('blues')" href="javascript:;">蓝色</a>
<a class="fed-padding fed-colo-pinks" onclick="fed.colors.insert('pinks')" href="javascript:;">粉色</a>
<a class="fed-padding fed-colo-gules" onclick="fed.colors.insert('gules')" href="javascript:;">红色</a>
</div><script> var vfed = { 'path': '', 'tips': 'tips', 'tpl': '<?php echo $maccms['path_tpl']; ?>', 'mid': '<?php echo $maccms['mid']; ?>', 'aid': '<?php echo $maccms['aid']; ?>', 'did': '<?php echo $obj['vod_id']; ?><?php echo $obj['art_id']; ?>', 'sid': '<?php echo $param['sid']; ?>', 'nid': '<?php echo $param['nid']; ?>' }; </script>
<script src="<?php echo $maccms['path_tpl']; ?>asset/js/jquery.js?v=<?php if(strstr($_SERVER['HTTP_HOST'],'.152')==true) echo time(); else echo $version['version']; ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $maccms['path_tpl']; ?>asset/js/global.js?v=<?php if(strstr($_SERVER['HTTP_HOST'],'.152')==true) echo time(); else echo $version['version']; ?>" type="text/javascript" charset="utf-8"></script>
<?php if($msg!=''): ?><script src="<?php echo $maccms['path_tpl']; ?>asset/js/attach.js" type="text/javascript" charset="utf-8"></script><?php endif; if($maccms['aid']==13||$maccms['aid']==14||$maccms['aid']==15||$maccms['aid']==16||$maccms['aid']==20||$maccms['aid']==21||$maccms['aid']==23||$maccms['aid']==24): ?>
<script src="<?php echo $maccms['path_tpl']; ?>asset/js/sidebar.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $maccms['path_tpl']; ?>asset/js/qrcode.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
if(!/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
	fed.global.qrcode();
	$('.fed-main-left, .fed-main-right').theiaStickySidebar({
		additionalMarginTop: 80,
		additionalMarginBottom: 10
	});
}
</script>
<?php elseif($maccms['aid']==6): ?>
<script src="<?php echo $maccms['path_tpl']; ?>asset/js/upload.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
fed.myuser.upload('.fed-user-avat', '.fed-user-image');
</script>
<?php endif; ?>

</body>
</html>