<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\www\tp\public/../application/home/view/default/market\page.html";i:1507467051;}*/ ?>
<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
<strong><h3>没有更多数据了!!!!!</h3></strong>
<?php else: foreach($list as $k=>$market):?>
<div class="row noticeList">
    <a href="<?php echo url('details?id='.$market['id']); ?>">
        <div class="">
            <img class="noticeImg" src="<?php echo $picture[$k]; ?>" style="width: 300px"/>
        </div>
        <div class="col-xs-10">
            <p class="title"><?php echo $market['title']; ?></p>
            <p class="intro"><?php echo $market['description']; ?></p>
            <p class="info">浏览量:<?php echo $market['view']; ?> <span class="pull-right"><?php echo date("Y-m-d H:i:s",$market['create_time']); ?></span> </p>
        </div>
    </a>
</div>
<?php endforeach;?>
<button class="btn btn-info load btn-block" onclick="load(<?php echo $no; ?>)">获取更多</button>
<?php endif; ?>
