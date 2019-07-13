<?php if (!defined('THINK_PATH')) exit(); /*a:17:{s:40:"template/default_pc/html/vod/detail.html";i:1544280378;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/alikes.html";i:1544326328;s:65:"/usr/local/var/www/yg/template/default_pc/html/public/header.html";i:1562816454;s:66:"/usr/local/var/www/yg/template/default_pc/html/public/include.html";i:1553340842;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/seokey.html";i:1544281904;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/styles.html";i:1544281908;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/themes.html";i:1544281914;s:62:"/usr/local/var/www/yg/template/default_pc/html/vod/player.html";i:1544326752;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/detail.html";i:1562588892;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/relate.html";i:1544281944;s:66:"/usr/local/var/www/yg/template/default_pc/html/module/listing.html";i:1562588892;s:66:"/usr/local/var/www/yg/template/default_pc/html/module/sidebar.html";i:1562817013;s:65:"/usr/local/var/www/yg/template/default_pc/html/public/footer.html";i:1544325116;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/colors.html";i:1544282080;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/global.html";i:1544282084;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/langon.html";i:1544282740;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/quicks.html";i:1544282762;}*/ ?>
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

<?php if($maccms['aid']==15): ?><script src="<?php echo $maccms['path']; ?>static/js/jquery.js"></script>
<script>var maccms={"path":"","mid":"<?php echo $maccms['mid']; ?>","aid":"<?php echo $maccms['aid']; ?>","url":"<?php echo $maccms['site_url']; ?>","wapurl":"<?php echo $maccms['site_wapurl']; ?>","mob_status":"<?php echo $maccms['mob_status']; ?>"};</script>
<script src="<?php echo $maccms['path']; ?>static/js/home.js"></script>
<div class="fed-play-info fed-margin-top fed-box-shadow fed-back-whits fed-part-rows">
<div class="fed-col-xs12 fed-col-md9">
<div class="fed-play-player fed-part-rows fed-back-black fed-part-16by9">
<style>
    #playleft{padding:0px;margin: 0px;border: none;}
</style>
    <div style="top:0px;width:100%;margin: 0px;padding: 0px;position: absolute;height: 100%;">
    <?php echo $player_data; ?>
    <?php echo $player_js; ?>
    </div>
<div class="fed-play-error fed-play-box fed-hidden fed-conceal fed-back-whits">
<h2 class="fed-text-center fed-font-xvi fed-hide-xs">失效数据，我们会在第一时间内修正</h2>
<div class="fed-comm-report" data-repo="<?php echo mac_url('gbook/report'); ?>"></div>
</div>
<div class="fed-play-parse fed-play-box fed-hidden fed-conceal fed-back-whits">
<h2 class="fed-text-center fed-play-top fed-font-xvi">如有无法播放请切换视频解析接口</h2>
</div>
<?php if($popedom['code']!=1): ?>
<div class="fed-play-confirm fed-play-pays fed-play-box fed-back-whits fed-event">
<div class="fed-part-core">
<h2 class="fed-text-center fed-play-top fed-font-xvi"><?php echo $popedom['msg']; ?></h2>
<p class="fed-text-center">一次支付，永久观看，不重复扣费，谢谢支持。</p>
<div class="fed-text-center">
<?php if($user['group']['group_id']==1): ?>
<a class="fed-btns-info fed-rims-info fed-visible fed-padding fed-margin fed-back-green fed-navs-login" href="javascript:;">立即登录</a>
<?php else: ?>
<a class="fed-btns-info fed-rims-info fed-visible fed-padding fed-margin" href="<?php echo url('user/buy'); ?>" target="_blank">马上充值</a>
<a class="fed-btns-info fed-rims-info fed-visible fed-padding fed-margin fed-back-green" href="javascript:;" onclick="fed.myuser.power(this,'<?php if($obj['player_info']['flag']=="play"): ?>播放<?php else: ?>下载<?php endif; ?>')" data-id="<?php echo $obj['vod_id']; ?>" data-sid="<?php echo $param['sid']; ?>" data-nid="<?php echo $param['nid']; ?>" data-type="<?php if($obj['player_info']['flag']=='play'): ?>4<?php else: ?>5<?php endif; ?>">确认购买</a>
<?php endif; ?>
</div>
</div>
</div>
<?php endif; ?>
</div>
<div class="fed-play-title fed-part-rows">
<ul class="fed-play-btn fed-padding fed-part-rows fed-col-xs12 fed-col-md6">
<li class="fed-padding<?php if($popedom['code']==1): ?> fed-col-xs6<?php else: ?> fed-col-xs9<?php endif; ?>"><span class="fed-play-text fed-visible fed-font-xvi fed-part-eone"><?php echo $obj['vod_name']; ?><?php echo $obj['vod_play_list'][$param['sid']]['urls'][$param['nid']]['name']; ?></span></li>

</ul>
<ul class="fed-play-btn fed-padding fed-part-rows fed-col-xs12 fed-col-md6">
<li class="fed-padding fed-col-xs2">
<a class="fed-btns-info fed-rims-info fed-visible fed-play-erro fed-event" href="javascript:;">报错</a>
</li>
<li class="fed-padding fed-col-xs2">
<?php if($user['user_id']==0): ?>
<a class="fed-btns-info fed-rims-info fed-visible fed-play-reno fed-event" href="javascript:window.open(document.all.playeriframe.src,'playeriframe','')">刷新</a>
<?php else: ?>
<a class="fed-btns-info fed-rims-info fed-visible fed-play-favo fed-event" href="javascript:;">收藏</a>
<?php endif; ?>
</li>
<li class="fed-padding fed-col-xs2">
<a class="fed-btns-info fed-rims-info fed-visible fed-play-share fed-event" href="javascript:;">分享</a>
</li>
<li class="fed-padding fed-col-xs3">
<a class="fed-btns-info fed-rims-info fed-visible fed-play-prev<?php if($param['nid']==1): ?> fed-btns-disad<?php endif; ?>" href="<?php echo $obj['player_info']['link_pre']; ?>">上一集</a>
</li>
<li class="fed-padding fed-col-xs3">
<a class="fed-btns-info fed-rims-info fed-visible fed-play-next<?php if($param['nid']==$obj['vod_play_list'][$param['sid']]['url_count']): ?> fed-btns-disad<?php endif; ?>" href="<?php echo $obj['player_info']['link_next']; ?>">下一集</a>
</li>
</ul>
</div>
</div>
<div class="fed-col-xs12 fed-col-md3">
<div class="fed-tabs-info fed-tabs-play fed-conv-double fed-part-roll">
<div class="fed-tabs-boxs">
<div class="fed-tabs-head">
<span class="fed-tabs-title fed-visible fed-font-xvi fed-part-rows">
<span class="fed-col-xs4 fed-part-eone">选择资源</span>
<span class="fed-col-xs8 fed-part-eone fed-text-right">无法播放请尝试切换资源</span>
</span>
</div>
<div class="fed-tabs-foot">
<ul class="fed-padding fed-part-rows">
<?php if(is_array($obj['vod_play_list']) || $obj['vod_play_list'] instanceof \think\Collection || $obj['vod_play_list'] instanceof \think\Paginator): if( count($obj['vod_play_list'])==0 ) : echo "" ;else: foreach($obj['vod_play_list'] as $key=>$vo): ?>
<li class="fed-padding fed-col-xs3 fed-col-md6 fed-col-lg4">
<a class="fed-btns-info fed-rims-info fed-part-eone<?php if($vo['player_info']['from']==$obj['vod_play_list'][$param['sid']]['player_info']['from']||$param['nid'] > $obj['vod_play_list'][$vo['sid']]['url_count']): ?> fed-tabs-btn<?php endif; if($vo['player_info']['from']==$obj['vod_play_list'][$param['sid']]['player_info']['from']): ?> fed-btns-green<?php endif; ?>" href="<?php if($vo['player_info']['from']==$obj['vod_play_list'][$param['sid']]['player_info']['from']||$param['nid'] > $obj['vod_play_list'][$vo['sid']]['url_count']): ?>javascript:;<?php else: ?><?php echo mac_url_vod_play($obj,['sid'=>$vo['sid'],'nid'=>$param['nid']]); endif; ?>"><?php echo mac_default($vo['player_info']['show'],'云播放器'); ?></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
</div>
<div class="fed-tabs-boxs">
<div class="fed-tabs-head">
<?php if(is_array($obj['vod_play_list']) || $obj['vod_play_list'] instanceof \think\Collection || $obj['vod_play_list'] instanceof \think\Paginator): if( count($obj['vod_play_list'])==0 ) : echo "" ;else: foreach($obj['vod_play_list'] as $key=>$vo): ?>
<span class="fed-tabs-top fed-tabs-title fed-font-xvi fed-part-rows fed-hidden<?php if($vo['player_info']['from']==$obj['vod_play_list'][$param['sid']]['player_info']['from']): ?> fed-show<?php endif; ?>">
<span class="fed-col-xs4 fed-part-eone"><?php echo mac_default($vo['player_info']['show'],'云播放器'); ?></span>
<span class="fed-col-xs8 fed-part-eone fed-text-right"><?php echo $vo['player_info']['tip']; ?><i class="fed-icon-font fed-icon-you"></i></span>
</span>
<?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="fed-tabs-foot">
<?php if(is_array($obj['vod_play_list']) || $obj['vod_play_list'] instanceof \think\Collection || $obj['vod_play_list'] instanceof \think\Paginator): if( count($obj['vod_play_list'])==0 ) : echo "" ;else: foreach($obj['vod_play_list'] as $key=>$vo): ?>
<ul class="fed-tabs-btm fed-padding fed-part-rows fed-hidden<?php if($vo['player_info']['from']==$obj['vod_play_list'][$param['sid']]['player_info']['from']): ?> fed-show<?php endif; ?>">
<?php if(is_array($vo['urls']) || $vo['urls'] instanceof \think\Collection || $vo['urls'] instanceof \think\Paginator): if( count($vo['urls'])==0 ) : echo "" ;else: foreach($vo['urls'] as $key=>$vo2): ?>
<li class="fed-padding<?php if($obj['type_1']['type_name']=='电影'||$obj['type']['type_name']=='电影'||$obj['type_1']['type_name']=='综艺'||$obj['type']['type_name']=='综艺'): ?> fed-col-xs4 fed-col-sm6<?php else: ?> fed-col-xs3 fed-col-md6 fed-col-lg4<?php endif; ?>">
<a class="fed-btns-info fed-rims-info fed-part-eone<?php if($key==$param['nid']&&$vo['player_info']['from']==$obj['vod_play_list'][$param['sid']]['player_info']['from']): ?> fed-btns-green<?php endif; ?>" href="<?php echo mac_url_vod_play($obj,['sid'=>$vo['sid'],'nid'=>$vo2['nid']]); ?>"><?php echo $vo2['name']; ?></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</div>
</div>
</div>
</div><?php endif; ?>
<div class="fed-part-rows">
	<div class="fed-main-left fed-col-xs12 fed-col-md9">
		<div class="fed-part-layout fed-back-whits fed-margin-right">
		<dl class="fed-list-deta<?php if($maccms['aid']==13): ?> fed-deta-padding fed-line-top<?php endif; ?> fed-margin fed-part-rows fed-part-over">
	<dt class="fed-deta-images fed-list-info fed-col-xs3">
		<a class="fed-list-pics fed-lazy fed-part-2by3" href="<?php echo mac_url_vod_play($obj,['sid'=>1,'nid'=>1]); ?>" data-original="http://static.yg.cn/<?php echo mac_url_img($obj['vod_pic']); ?>">
			<span class="fed-list-play fed-hide-xs"></span>
			<?php if($obj['vod_score']>0): ?>
			<span class="fed-list-score fed-font-xii fed-back-green"><?php echo $obj['vod_score']; ?></span>
			<?php endif; ?>
			<span class="fed-list-remarks fed-font-xii fed-text-white fed-text-center"><?php echo $obj['vod_remarks']; ?></span>
		</a>
	</dt>
	<dd class="fed-deta-content fed-col-xs7 fed-col-sm8">
		<h3 class="fed-part-eone"><a href="<?php echo mac_url_vod_play($obj,['sid'=>1,'nid'=>1]); ?>"><?php echo $obj['vod_name']; ?></a></h3>
		<ul class="fed-part-rows">
			<li class="fed-part-eone"><span class="fed-text-muted">主演：</span><?php echo mac_url_create($obj['vod_actor'],'actor','vod','search'); ?></li>
			<li class="fed-part-eone"><span class="fed-text-muted">导演：</span><?php echo mac_url_create($obj['vod_director'],'director','vod','search'); ?></li>
			<li class="fed-col-xs6 fed-part-eone"><span class="fed-text-muted">分类：</span><a href="<?php echo mac_url_type($obj['type']); ?>" target="_blank"><?php echo $obj['type']['type_name']; ?></a></li>
			<li class="fed-col-xs6 fed-part-eone"><span class="fed-text-muted">地区：</span><?php echo mac_url_create($obj['vod_area'],'area','vod','search'); ?></li>
			<li class="fed-col-xs6 fed-part-eone"><span class="fed-text-muted">年份：</span><?php echo mac_url_create($obj['vod_year'],'year','vod','search'); ?></li>
			<li class="fed-col-xs6 fed-part-eone"><span class="fed-text-muted">播放：</span><?php echo $obj['vod_hits']; ?></li>
		</ul>
	</dd>
	<dd class="fed-deta-button fed-col-xs7 fed-col-sm8 fed-part-rows">
		<?php if($maccms['aid']==13||$maccms['aid']==15||$maccms['aid']==16): ?>
		<a class="fed-deta-play fed-rims-info fed-btns-info fed-btns-green fed-col-xs4" href="<?php echo mac_url_vod_detail($obj); ?>">查看详情</a>
		<?php endif; if(is_array($obj['vod_play_list']) || $obj['vod_play_list'] instanceof \think\Collection || $obj['vod_play_list'] instanceof \think\Paginator): if( count($obj['vod_play_list'])==0 ) : echo "" ;else: foreach($obj['vod_play_list'] as $play=>$vo): if($maccms['aid']!=15&&$play==1): ?>
		<a class="<?php if($maccms['aid']==16): ?>fed-deta-down<?php else: ?>fed-deta-play<?php endif; ?> fed-rims-info fed-btns-info fed-btns-green fed-col-xs4" href="<?php echo mac_url_vod_play($obj); ?>"><?php if($maccms['aid']!=16): ?>立即<?php endif; ?>播放</a>
		<?php endif; endforeach; endif; else: echo "" ;endif; if(is_array($obj['vod_down_list']) || $obj['vod_down_list'] instanceof \think\Collection || $obj['vod_down_list'] instanceof \think\Paginator): if( count($obj['vod_down_list'])==0 ) : echo "" ;else: foreach($obj['vod_down_list'] as $key=>$vo): if($maccms['aid']!=16&&$key==1): ?>
		<a class="<?php if($play==''): ?>fed-deta-play<?php else: ?>fed-deta-down<?php endif; ?> fed-rims-info fed-btns-info fed-btns-green fed-col-xs4" href="<?php echo mac_url_vod_down($obj); ?>"><?php if($play==''): ?>立即<?php endif; ?>下载</a>
		<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</dd>
</dl>
		</div>
		<div class="fed-conv-info fed-part-layout fed-margin-right fed-back-whits">
			<div class="fed-list-head fed-part-rows fed-padding">
				<h2 class="fed-font-xvi">
					<?php if(is_array($obj['vod_play_list']) || $obj['vod_play_list'] instanceof \think\Collection || $obj['vod_play_list'] instanceof \think\Paginator): if( count($obj['vod_play_list'])==0 ) : echo "" ;else: foreach($obj['vod_play_list'] as $key=>$vo): if($maccms['aid']!=15&&$key==1): ?>
					<a class="fed-conv-btn<?php if($maccms['aid']!=16): ?> fed-text-bold fed-text-green<?php endif; ?>" href="javascript:;">选集播放</a>
					<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					<a class="fed-conv-btn" href="javascript:;">剧情简介</a>
					<a class="fed-conv-btn<?php if($maccms['aid']==15): ?> fed-text-bold fed-text-green<?php endif; ?>" href="javascript:;">观后评论</a>
					<?php if(is_array($obj['vod_down_list']) || $obj['vod_down_list'] instanceof \think\Collection || $obj['vod_down_list'] instanceof \think\Paginator): if( count($obj['vod_down_list'])==0 ) : echo "" ;else: foreach($obj['vod_down_list'] as $key=>$vo): if($key==1): ?>
					<a class="fed-conv-btn<?php if($maccms['aid']==16): ?> fed-text-bold fed-text-green<?php endif; ?>" href="javascript:;">影片下载</a>
					<?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</h2>
			</div>
			<div class="fed-conv-deta">
				<?php if(is_array($obj['vod_play_list']) || $obj['vod_play_list'] instanceof \think\Collection || $obj['vod_play_list'] instanceof \think\Paginator): if( count($obj['vod_play_list'])==0 ) : echo "" ;else: foreach($obj['vod_play_list'] as $play=>$vo): if($maccms['aid']!=15&&$play==1): ?>
				<div class="fed-conv-boxs fed-conv-play fed-tabs-info fed-tabs-play fed-conv-double<?php if($maccms['aid']!=16): ?> fed-visible<?php else: ?> fed-hidden<?php endif; ?>">
					<div class="fed-tabs-boxs">
						<div class="fed-tabs-head">
							<span class="fed-tabs-title fed-visible fed-font-xvi fed-part-rows">
								<span class="fed-col-xs5 fed-part-eone">资源切换</span>
								<span class="fed-col-xs7 fed-part-eone fed-text-right">无法播放请尝试切换资源</span>
							</span>
						</div>
						<div class="fed-tabs-foot">
							<ul class="fed-padding fed-part-rows">
								<?php if(is_array($obj['vod_play_list']) || $obj['vod_play_list'] instanceof \think\Collection || $obj['vod_play_list'] instanceof \think\Paginator): if( count($obj['vod_play_list'])==0 ) : echo "" ;else: foreach($obj['vod_play_list'] as $key=>$vo): ?>
								<li class="fed-padding fed-col-xs3 fed-col-sm2">
									<a class="fed-tabs-btn fed-btns-info fed-rims-info fed-part-eone<?php if($key==1): ?> fed-btns-green<?php endif; ?>" href="javascript:;"><?php echo mac_default($vo['player_info']['show'],'云播放器'); ?></a>
								</li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div>
					<div class="fed-tabs-boxs">
						<div class="fed-tabs-head">
							<?php if(is_array($obj['vod_play_list']) || $obj['vod_play_list'] instanceof \think\Collection || $obj['vod_play_list'] instanceof \think\Paginator): if( count($obj['vod_play_list'])==0 ) : echo "" ;else: foreach($obj['vod_play_list'] as $key=>$vo): ?>
							<span class="fed-tabs-top fed-tabs-title fed-font-xvi fed-part-rows<?php if($key==1): ?> fed-visible<?php else: ?> fed-hidden<?php endif; ?>">
								<span class="fed-col-xs5 fed-part-eone">已选择：<?php echo mac_default($vo['player_info']['show'],'云播放器'); ?></span>
								<span class="fed-col-xs7 fed-part-eone fed-text-right"><?php echo $vo['player_info']['tip']; ?><i class="fed-icon-font fed-icon-you"></i></span>
							</span>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<div class="fed-tabs-foot">
							<?php if(is_array($obj['vod_play_list']) || $obj['vod_play_list'] instanceof \think\Collection || $obj['vod_play_list'] instanceof \think\Paginator): if( count($obj['vod_play_list'])==0 ) : echo "" ;else: foreach($obj['vod_play_list'] as $key=>$vo): ?>
							<ul class="fed-tabs-btm fed-padding fed-part-rows<?php if($key==1): ?> fed-visible<?php else: ?> fed-hidden<?php endif; ?>">
								<?php if(is_array($vo['urls']) || $vo['urls'] instanceof \think\Collection || $vo['urls'] instanceof \think\Paginator): if( count($vo['urls'])==0 ) : echo "" ;else: foreach($vo['urls'] as $key=>$vo2): ?>
								<li class="fed-padding fed-col-xs3 fed-col-sm2">
									<a class="fed-btns-info fed-rims-info fed-part-eone" href="<?php echo mac_url_vod_play($obj,['sid'=>$vo['sid'],'nid'=>$vo2['nid']]); ?>"><?php echo $vo2['name']; ?></a>
								</li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
				<div class="fed-conv-boxs fed-conv-cont fed-hidden">
					<p class="fed-conv-text fed-padding fed-text-muted">
						<?php echo mac_filter_html($obj['vod_content']); ?>
					</p>
				</div>
				<div class="fed-conv-boxs fed-conv-comm fed-hidden<?php if($maccms['aid']==14&&$play==''): ?> fed-visible<?php endif; if($maccms['aid']==15): ?> fed-visible<?php endif; ?>">
					<div class="fed-comm-info" data-id="<?php echo $obj['vod_id']; ?>" data-mid="<?php echo $maccms['mid']; ?>"></div>
				</div>
				<?php if(is_array($obj['vod_down_list']) || $obj['vod_down_list'] instanceof \think\Collection || $obj['vod_down_list'] instanceof \think\Paginator): if( count($obj['vod_down_list'])==0 ) : echo "" ;else: foreach($obj['vod_down_list'] as $key=>$vo): if($key==1): ?>
				<div class="fed-conv-boxs fed-conv-down fed-tabs-info fed-tabs-down fed-conv-double<?php if($maccms['aid']==16): ?> fed-visible<?php else: ?> fed-hidden<?php endif; ?>">
					<?php if($maccms['aid']==16&&$obj['vod_points_down']!=0): ?>
					<div class="fed-conv-tops">
						<ul class="fed-padding fed-visible">
							<li class="fed-part-rows">
								<?php if($popedom['code']==1): ?>
								<div class="fed-padding fed-col-xs8 fed-col-sm9">
									<input class="fed-form-info fed-rims-info fed-part-eone" type="text" value="<?php echo $obj['vod_down_list'][$param['sid']]['urls'][$param['nid']]['url']; ?>" />
								</div>
								<div class="fed-padding fed-col-xs4 fed-col-sm3">
									<a target="_blank" download="<?php echo $obj['vod_down_list'][$param['sid']]['urls'][$param['nid']]['url']; ?>" class="fed-form-info fed-btns-info fed-rims-info fed-part-eone" href="<?php echo $obj['vod_down_list'][$param['sid']]['urls'][$param['nid']]['url']; ?>">下载<?php echo $obj['vod_down_list'][$param['sid']]['urls'][$param['nid']]['name']; ?></a>
								</div>
								<?php else: ?>
								<div class="fed-padding fed-col-xs12 fed-col-sm8">
									<input class="fed-form-info fed-rims-info fed-part-eone" type="text" value="<?php echo $popedom['msg']; ?>" />
								</div>
								<div class="fed-padding fed-col-xs6 fed-col-sm2">
									<a class="fed-form-info fed-btns-info fed-rims-info fed-part-eone" href="<?php echo url('user/buy'); ?>" target="_blank">马上充值</a>
								</div>
								<div class="fed-padding fed-col-xs6 fed-col-sm2">
									<a class="fed-form-info fed-btns-info fed-rims-info fed-part-eone fed-back-green" href="javascript:;" onclick="fed.myuser.power(this,'<?php if($obj['player_info']['flag']=="play"): ?>播放<?php else: ?>下载<?php endif; ?>')" data-id="<?php echo $obj['vod_id']; ?>" data-sid="<?php echo $param['sid']; ?>" data-nid="<?php echo $param['nid']; ?>" data-type="<?php if($obj['player_info']['flag']=='play'): ?>4<?php else: ?>5<?php endif; ?>">确认购买</a>
								</div>
								<?php endif; ?>
							</li>
						</ul>
					</div>
					<?php endif; ?>
					<div class="fed-tabs-boxs">
						<div class="fed-tabs-head">
							<span class="fed-tabs-title fed-visible fed-font-xvi fed-part-rows">
								<span class="fed-col-xs5 fed-part-eone">下载线路</span>
								<span class="fed-col-xs7 fed-part-eone fed-text-right">无法下载请切换线路<i class="fed-icon-font fed-icon-you"></i></span>
							</span>
						</div>
						<div class="fed-tabs-foot">
							<ul class="fed-padding fed-part-rows">
								<?php if(is_array($obj['vod_down_list']) || $obj['vod_down_list'] instanceof \think\Collection || $obj['vod_down_list'] instanceof \think\Paginator): if( count($obj['vod_down_list'])==0 ) : echo "" ;else: foreach($obj['vod_down_list'] as $key=>$vo): ?>
								<li class="fed-padding fed-col-xs3 fed-col-sm2">
									<a class="fed-tabs-btn fed-btns-info fed-rims-info fed-part-eone<?php if($key==1): ?> fed-btns-green<?php endif; ?>" href="javascript:;"><?php echo mac_default($vo['player_info']['show'],'云播放器'); ?></a>
								</li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div>
					<div class="fed-tabs-boxs">
						<div class="fed-tabs-head">
							<?php if(is_array($obj['vod_down_list']) || $obj['vod_down_list'] instanceof \think\Collection || $obj['vod_down_list'] instanceof \think\Paginator): if( count($obj['vod_down_list'])==0 ) : echo "" ;else: foreach($obj['vod_down_list'] as $key=>$vo): ?>
							<span class="fed-tabs-top fed-tabs-title fed-font-xvi fed-part-rows<?php if($key==1): ?> fed-visible<?php else: ?> fed-hidden<?php endif; ?>">
								<span class="fed-col-xs5 fed-part-eone"><?php echo mac_default($vo['player_info']['show'],'本地下载'); ?></span>
								<span class="fed-col-xs7 fed-part-eone fed-text-right"><?php echo $vo['player_info']['tip']; ?><i class="fed-icon-font fed-icon-you"></i></span>
							</span>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<div class="fed-tabs-foot">
							<?php if($obj['vod_points_down']==0): if(is_array($obj['vod_down_list']) || $obj['vod_down_list'] instanceof \think\Collection || $obj['vod_down_list'] instanceof \think\Paginator): if( count($obj['vod_down_list'])==0 ) : echo "" ;else: foreach($obj['vod_down_list'] as $key=>$vo): ?>
							<ul class="fed-tabs-btm fed-padding fed-part-rows<?php if($key==1): ?> fed-visible<?php else: ?> fed-hidden<?php endif; ?>">
								<?php if(is_array($vo['urls']) || $vo['urls'] instanceof \think\Collection || $vo['urls'] instanceof \think\Paginator): if( count($vo['urls'])==0 ) : echo "" ;else: foreach($vo['urls'] as $key=>$vo2): ?>
								<li class="fed-part-rows fed-padding fed-col-xs12">
									<div class="fed-conv-input fed-col-xs8 fed-col-sm9">
										<input class="fed-form-info fed-rims-info fed-part-eone" type="text" value="<?php echo $vo2['url']; ?>" />
									</div>
									<div class="fed-conv-submit fed-col-xs4 fed-col-sm3">
										<a target="_blank" download="<?php echo $vo2['url']; ?>" class="fed-form-info fed-btns-info fed-rims-info fed-part-eone" href="<?php echo $vo2['url']; ?>">下载<?php echo $vo2['name']; ?></a>
									</div>
								</li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<?php endforeach; endif; else: echo "" ;endif; else: if(is_array($obj['vod_down_list']) || $obj['vod_down_list'] instanceof \think\Collection || $obj['vod_down_list'] instanceof \think\Paginator): if( count($obj['vod_down_list'])==0 ) : echo "" ;else: foreach($obj['vod_down_list'] as $key=>$vo): ?>
							<ul class="fed-tabs-btm fed-padding fed-part-rows<?php if($key==1): ?> fed-visible<?php else: ?> fed-hidden<?php endif; ?>">
								<?php if(is_array($vo['urls']) || $vo['urls'] instanceof \think\Collection || $vo['urls'] instanceof \think\Paginator): if( count($vo['urls'])==0 ) : echo "" ;else: foreach($vo['urls'] as $key=>$vo2): ?>
								<li class="fed-padding fed-col-xs3 fed-col-sm2">
									<a class="fed-btns-info fed-rims-info fed-part-eone<?php if($key==$param['nid']&&$vo['player_info']['from']==$obj['vod_down_list'][$param['sid']]['player_info']['from']): ?> fed-btns-green<?php endif; ?>" href="<?php echo mac_url_vod_down($obj,['sid'=>$vo['sid'],'nid'=>$vo2['nid']]); ?>"><?php echo $vo2['name']; ?></a>
								</li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</div>
					</div>
				</div>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="" style="text-align:center;">

<script src="https://jc.ziig.com.cn/b4892f/c@65510!25.js"></script>
</div>
<div class="fed-list-new fed-part-layout fed-margin-right fed-back-whits">
<div class="fed-list-head fed-part-rows fed-padding">
<h2 class="fed-font-xvi">相关热播</h2>
<ul class="fed-part-tips fed-padding">
<li><a class="fed-more" href="<?php echo mac_url_type($obj['type']); ?>">更多</a></li>
</ul>
</div>
<ul class="fed-list-info fed-part-rows">
<?php $__TAG__ = '{"num":"6","type":"current","order":"desc","by":"hits","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-list-item fed-padding fed-width-xx fed-col-xs4 fed-col-sm3<?php if($key>4): ?> fed-show-xs-block fed-hide-sm<?php endif; if($key>5): ?> fed-show-lg-block<?php endif; ?>">
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
	</div>
	<div class="fed-main-right fed-col-xs12 fed-col-md3">
		<div class="fed-side-info fed-part-layout fed-back-whits fed-hide-xs fed-hide-sm fed-show-md-block">
<div class="fed-side-list fed-text-center">
<h2 class="fed-list-head fed-part-rows fed-font-xvi fed-text-center">扫描二维码在手机上观看此影片</h2>
<!-- <div class="fed-side-code"><img class="fed-side-image" style="width:200px;height:200px;" src="<?php if((strstr($maccms['site_email'],'@')==true)): ?><?php echo $maccms['path_tpl']; ?>asset/img/qrcode.png<?php else: ?><?php echo $maccms['site_email']; endif; ?>" /></div> -->
<!-- <h2 class="fed-list-head fed-part-rows fed-font-xvi fed-text-center">支付宝扫一扫，天天领红包！最高99元！</h2> -->
<!-- <div class="fed-text-center"><img class="fed-side-image" width="250" src="<?php echo $maccms['path_tpl']; ?>asset/img/ttzfbhongbao.png" ></div> -->
<p class="fed-text-center">喜欢请分享给你的小伙伴！<br/>请记住本站：<?php echo $maccms['site_url']; ?></p>
</div>
<?php if($maccms['aid']==14||$maccms['aid']==15||$maccms['aid']==16): ?>
<div class="fed-side-list fed-list-info fed-line-top fed-list-rank fed-part-rows">
<h2 class="fed-list-head fed-part-rows fed-font-xvi">今日热门<?php echo $obj['type']['type_name']; ?><a class="fed-part-tips fed-font-xiv" href="<?php echo mac_url('label/rank'); ?>">更多</a></h2>
<ul class="fed-part-rows">
<?php $__TAG__ = '{"num":"9","type":"current","order":"desc","by":"hits_day","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-part-eone">
<a href="<?php echo mac_url_vod_detail($vo); ?>"><span class="fed-part-nums fed-part-num<?php echo $key; ?>"><?php echo $key; ?></span><?php echo $vo['vod_name']; ?><span class="fed-part-tips fed-text-green"><?php echo $vo['vod_hits_day']; ?></span></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<?php else: $__TAG__ = '{"num":"2","ids":"parent","order":"asc","by":"sort","mid":"vod","id":"vfed","key":"key"}';$__LIST__ = model("Type")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vfed): $mod = ($key % 2 );++$key;?>
<div class="fed-side-list fed-list-info fed-line-top fed-list-rank fed-part-rows">
<h2 class="fed-list-head fed-part-rows fed-font-xvi">今日热门<?php echo $vfed['type_name']; ?><a class="fed-part-tips fed-font-xiv" href="<?php echo mac_url('label/rank'); ?>">更多</a></h2>
<ul class="fed-part-rows">
<?php $__TAG__ = '{"num":"9","type":"'.$vfed['type_id'].'","order":"desc","by":"hits","id":"vo","key":"key"}';$__LIST__ = model("Vod")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-part-eone">
<a href="<?php echo mac_url_vod_detail($vo); ?>"><span class="fed-part-nums fed-part-num<?php echo $key; ?>"><?php echo $key; ?></span><?php echo $vo['vod_name']; ?><span class="fed-part-tips fed-text-green"><?php echo $vo['vod_hits_day']; ?></span></a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<?php endforeach; endif; else: echo "" ;endif; endif; $__TAG__ = '{"num":"1","order":"desc","by":"time","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Topic")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<div class="fed-side-list fed-line-top fed-part-rows">
<h2 class="fed-list-head fed-part-rows fed-font-xvi">推荐专题<a class="fed-part-tips fed-font-xiv" href="{maccms:link_topic_vod}">更多</a></h2>
<ul class="fed-list-info">
<?php $__TAG__ = '{"num":"3","order":"desc","by":"time","level":"5","id":"vo","key":"key"}';$__LIST__ = model("Topic")->listCacheData($__TAG__); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
<li class="fed-side-item">
<a class="fed-list-pics fed-part-2by1" href="<?php echo mac_url_topic_detail($vo); ?>"<?php if($vo['topic_pic']): ?> style="background-image: url(<?php echo $vo['topic_pic']; ?>);"<?php endif; ?>>
<span class="fed-list-play fed-hide-xs"></span>
<span class="fed-list-remarks fed-font-xii fed-text-white fed-text-center"><?php echo $vo['topic_name']; ?></span>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
</div>

	</div>
</div>
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