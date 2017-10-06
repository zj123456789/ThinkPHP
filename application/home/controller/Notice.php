<?php
namespace app\home\controller;

use think\Db;

class Notice extends Home {
    //通告列表
    public function index(){
        $notices = Db::name('document')->paginate(5,true);
        $this->assign('notices',$notices);
        return $this->fetch('notice');
    }
    //通告详情
    public function detail($id){

        $detail = Db::name('document_article')->find($id);//->where(['id'=>$id])->select();

        $notices = Db::name('document')->find($id);//->where(['id'=>$id])->select();
//        var_dump($detail);exit;
        $this->assign('notices',$notices);
        $this->assign('detail',$detail);
        return $this->fetch('notice-detail');
    }
}
