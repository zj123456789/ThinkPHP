<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/10/4
 * Time: 21:07
 */
namespace app\home\controller;
use think\Db;

//小区活动
class Activity extends Home{
    //显示列表
    public function index(){
        $list=Db::name('activity')->select();
        $this->assign('list',$list);
        return $this->fetch();
    }

    //显示详情
    public function details($id){
        $list=Db::name('activity')->find($id);
        $this->assign('list',$list);
        return $this->fetch('lists');
    }
}