<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\www\tp\public/../application/home/view/default/activity\index.html";i:1507467169;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="/cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <!--{notempty name="list"}-->
        <?php foreach($list as $k=>$activity):?>
        <div class="row noticeList">
            <a href="<?php echo url('details?id='.$activity['id']); ?>">
                <div class="act">
                    <img class="noticeImg" src="<?php echo $picture[$k]; ?>" style="width: 300px"/>
                    <a href="javascript:;" class="add_activity" id="<?php echo $activity['id']; ?>"><strong>加入活动</strong></a>
                </div>
                <div class="col-xs-10">
                    <p class="title"><strong><?php echo $activity['title']; ?></strong></p>
                    <p class="intro"><?php echo $activity['description']; ?></p>
                    <p class="info">浏览量:<?php echo $activity['view']; ?> <span class="pull-right"><?php echo date("Y-m-d H:i:s",$activity['create_time']); ?></span> </p>
                </div>
            </a>
        </div>
        <?php endforeach;?>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<script type="text/javascript">
    $('.add_activity').on('click',function() {
        var id=$(this).attr('id');
            $.get('/home/activity/add.html',{'id':id},function (data) {
                if(data=='true'){
                    alert('参加活动成功');
                }else{
                    alert('您已经参加过活动')
                }
            })
    })
</script>