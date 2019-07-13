<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"/usr/local/var/www/yg/application/admin/view/template/ver.html";i:1562123924;s:61:"/usr/local/var/www/yg/application/admin/view/public/head.html";i:1522628860;s:61:"/usr/local/var/www/yg/application/admin/view/public/foot.html";i:1526021730;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title; ?> - 苹果CMS</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <link rel="stylesheet" href="/static/css/admin_style.css">
    <script type="text/javascript" src="/static/js/jquery.js"></script>
    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <script>
        var ROOT_PATH="",ADMIN_PATH="<?php echo $_SERVER['SCRIPT_NAME']; ?>", MAC_VERSION='v10';
    </script>
</head>
<body>
<div class="page-container p10">
    <div class="my-btn-box lh30" >
        <div class="layui-btn-group fl">
            <a data-full="1" data-href="<?php echo url('verinfo'); ?>" class="layui-btn layui-btn-primary j-iframe"><i class="layui-icon">&#xe654;</i>添加</a>
        </div>
        <div class="page-filter fr" >

        </div>
    </div>

    <form class="layui-form layui-form-pane" action="">
        <table class="layui-table mt10">
        <thead>
        <tr>
            <th> ID </th>
            <th width="150">版本号</th>
            <th width="150">类型</th>
            <th width="150">下载地址URL</th>
            <th width="150">升级内容</th>
            <th width="200">更新时间</th>
            <th width="130">操作</th>
        </tr>
        </thead>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>

                <th><?php echo $vo['id']; ?></a></th>
                <td><?php echo $vo['ver']; ?></td>
                <td><?php if($vo['type'] == '1'): ?>苹果<?php else: ?>安卓<?php endif; ?></td>
                <td><?php echo $vo['down_url']; ?></td>
                <td><?php echo $vo['content']; ?></td>
                <td><?php echo mac_day($vo['uptime'],color); ?></td>
                <td>
                    <a class="layui-badge-rim j-tr-del" data-href="<?php echo url('verdel'); ?>?id=<?php echo $vo['id']; ?>" href="javascript:;" title="删除">删除</a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    </form>
</div>
<script type="text/javascript" src="/static/js/admin_common.js"></script>
<script type="text/javascript" src="/static/js/jquery.clipboard.js"></script>
<script type="text/javascript">
    var clipboard = new ClipboardJS('.j-clipboard');
    clipboard.on('success', function(e) {
       layer.msg('复制成功');
    });

    function data_info(path,name)
    {
        var index = layer.open({
            type: 2,
            shade:0.4,
            title: '编辑数据',
            content: "<?php echo url('template/info'); ?>?fpath="+path+'&fname='+name
        });

        layer.full(index);
    }

    function data_del(id)
    {
        if(!id){
            id  = checkIds('fname[]');
        }
        layer.confirm('确认要删除吗？', function (index) {
            location.href = "<?php echo url('template/del'); ?>?fname=" + id;
        });
    }

    $(function(){

    });
</script>
</body>
</html>
