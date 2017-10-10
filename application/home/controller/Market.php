<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/10/4
 * Time: 22:00
 */
namespace app\home\controller;
use think\Db;

//商家活动
class Market extends Home{
    //显示列表
    public function index(){
   /*     $map  = array('category_id' => 44,'status'=>1,'display'=>1);//要显示的
        $list=Db::name('document')->where($map)->select();
        $cover_id = [];
        foreach ($list as $row){
            $cover_id[]=$row['cover_id'];
        }
        $pictures=Db::name('picture')->where('id','in',$cover_id)->select();
        $picture=array_column($pictures,'path');
        $this->assign('list',$list);
        $this->assign('picture',$picture);*/
        return $this->fetch();
    }
    //分页
    public function ajax($page=1){
        $map  = array('category_id' => 44,'status'=>1,'display'=>1);
        $list=Db::name('document')->where($map)->paginate(1);
        $cover_id = [];
        foreach ($list as $row){
            $cover_id[]=$row['cover_id'];
        }
        $pictures=Db::name('picture')->where('id','in',$cover_id)->select();
        $picture=array_column($pictures,'path');
        $this->assign('list',$list);
        $this->assign('no',++$page);
        $this->assign('picture',$picture);
        return $this->fetch('page');
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