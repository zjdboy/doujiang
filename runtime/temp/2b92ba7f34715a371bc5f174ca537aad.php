<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:42:"template/default_pc/html/comment/ajax.html";i:1544280134;s:65:"/usr/local/var/www/yg/template/default_pc/html/module/paging.html";i:1544281924;}*/ ?>
<form class="fed-comm-fort fed-comm-form" id="fed-comm-form" data-role="<?php echo $comment['login']; ?>" autocomplete="off" onkeydown="if(event.keyCode==13){return false}">
<input type="hidden" name="comment_pid" value="0">
<ul class="fed-part-rows">
<li class="fed-padding fed-col-xs12"><textarea class="fed-form-info fed-rims-info fed-form-area fed-comm-text fed-event" name="comment_content" cols="40" rows="4" placeholder="输入留言内容"></textarea></li>
<li class="fed-padding<?php if($comment['verify']==1): ?> fed-col-xs12 fed-col-md4<?php else: ?> fed-col-xs9 fed-col-md10<?php endif; ?>"><p class="fed-form-info fed-rims-info fed-btns-disad fed-text-muted">提示：<span class="fed-comm-tips">还可以输入255字</span></p></li>
<?php if($comment['verify']==1): ?>
<li class="fed-padding fed-col-xs6 fed-col-md4"><input class="fed-form-info fed-rims-info fed-comm-veri" type="tel" name="verify" placeholder="验证码" /></li>
<li class="fed-padding fed-col-xs3 fed-col-md2"><img class="fed-rims-info fed-comm-code" height="40" src="<?php echo mac_url('verify/index'); ?>" title="看不清楚? 换一张！" onClick="this.src=this.src+'?'" /></li>
<?php endif; ?>
<li class="fed-padding fed-col-xs3 fed-col-md2"><a class="fed-form-info fed-rims-info fed-btns-info fed-btns-green fed-comm-submit" href="javascript:;">发表</a></li>
</ul>
</form>
<?php $__TAG__ = '{"num":"10","paging":"yes","half":"3","order":"desc","by":"id","id":"vo","key":"key"}';$__LIST__ = model("Comment")->listCacheData($__TAG__);$__PAGING__ = mac_page_param($__LIST__['total'],$__LIST__['limit'],$__LIST__['page'],$__LIST__['pageurl'],$__LIST__['half']); if(is_array($__LIST__['list']) || $__LIST__['list'] instanceof \think\Collection || $__LIST__['list'] instanceof \think\Paginator): $key = 0; $__LIST__ = $__LIST__['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;endforeach; endif; else: echo "" ;endif; ?>
<ul class="fed-comm-list">
<?php if($__PAGING__['record_total']|intval): if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ?>
<li class="fed-comm-each fed-part-rows fed-line-top fed-margin">
<img class="fed-comm-avat fed-part-roun" src="<?php if(file_exists(substr_replace(mac_get_user_portrait($vo['user_id']),'',0,1))) echo mac_get_user_portrait($vo['user_id']); else echo '/static/images/touxiang.png'; ?>"/>
<div class="fed-comm-head">
<strong class="fed-text-line"><?php echo $vo['comment_name']; ?></strong>
<span class="fed-part-tips"><?php echo date('Y-m-d H:i:s',$vo['comment_time']); ?></span>
</div>
<div class="fed-comm-cont">
<pre><?php echo mac_em_replace($vo['comment_content']); ?></pre>
<div class="fed-comm-action fed-text-right fed-font-xii">
<a class="fed-comm-repo" data-id="<?php echo $vo['comment_id']; ?>" href="javascript:;">举报</a>
<a class="fed-comm-digg" data-id="<?php echo $vo['comment_id']; ?>" data-mid="4" data-type="up" href="javascript:;">支持(<?php echo $vo['comment_up']; ?>)</a>
<a class="fed-comm-digg" data-id="<?php echo $vo['comment_id']; ?>" data-mid="4" data-type="down" href="javascript:;">反对(<?php echo $vo['comment_down']; ?>)</a>
<a class="fed-comm-rbtn" data-id="<?php echo $vo['comment_id']; ?>" href="javascript:;">回复</a>
</div>
<?php if(is_array($vo['sub']) || $vo['sub'] instanceof \think\Collection || $vo['sub'] instanceof \think\Paginator): if( count($vo['sub'])==0 ) : echo "" ;else: foreach($vo['sub'] as $key=>$child): ?>
<div class="fed-comm-reply fed-back-ashen<?php if($key==0): ?> fed-comm-tops<?php else: ?> fed-line-top<?php endif; ?>">
<img class="fed-comm-avat fed-part-roun" src="<?php if(file_exists(substr_replace(mac_get_user_portrait($child['user_id']),'',0,1))) echo mac_get_user_portrait($child['user_id']); else echo '/static/images/touxiang.png'; ?>"/>
<div class="fed-comm-head">
<strong class="fed-text-line"><?php echo $child['comment_name']; ?></strong>
<span class="fed-part-tips"><?php echo mac_day($child['comment_time']); ?></span>
</div>
<div class="fed-comm-cont">
<pre><?php echo mac_em_replace($child['comment_content']); ?></pre>
<div class="fed-comm-action fed-text-right fed-font-xii">
<a class="fed-comm-repo" data-id="<?php echo $child['comment_id']; ?>" href="javascript:;">举报</a>
<a class="fed-comm-digg" data-id="<?php echo $child['comment_id']; ?>" data-mid="4" data-type="up" href="javascript:;">支持(<span><?php echo $child['comment_up']; ?></span>)</a>
<a class="fed-comm-digg" data-id="<?php echo $child['comment_id']; ?>" data-mid="4" data-type="down" href="javascript:;">反对(<span><?php echo $child['comment_down']; ?></span>)</a>
<a class="fed-comm-rbtn" data-id="<?php echo $vo['comment_id']; ?>" href="javascript:;">回复</a>
</div>
</div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</li>
<?php endforeach; endif; else: echo "" ;endif; else: ?>
<li class="fed-text-center fed-padding fed-margin">还没有人评论哎！</li>
<?php endif; ?>
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