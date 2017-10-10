<?php

namespace app\home\controller;
use think\Db;

//关于我们
class Us extends Home{
    //显示列表
    public function index(){
        $map  = array('category_id' => 51,'status'=>1,'display'=>1);//要显示的
        $list=Db::name('document')->where($map)->select();
        $cover_id = [];
        foreach ($list as $row){
            $cover_id[]=$row['cover_id'];
        }
        $pictures=Db::name('picture')->where('id','in',$cover_id)->select();
        $picture=array_column($pictures,'path');
        $this->assign('list',$list);
        $this->assign('picture',$picture);
        return $this->fetch();
    }

    //显示详情
    public function details($id){
        $detail=Db::name('document_article')->find($id);
        $list=Db::name('document')->find($id);
        $pictrue=Db::name('picture')->find($list['cover_id']);
        $this->assign('list',$list);
        $this->assign('picture',$pictrue);
        $this->assign('detail',$detail);
        return $this->fetch('lists');
    }
}