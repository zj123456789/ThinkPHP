<?php
namespace app\admin\controller;
use think\Db;

class Vali extends Admin{
    //认证列表
    public function index(){
        $name=input('name');
        //获取数据
        $map = [];
        if(is_numeric($name)){
            $map['username|tel']=   array('like','%'.$name.'%');
        }else{
            $map['username']    =   array('like', '%'.(string)$name.'%');
        }
        //根据状态和Pid获取所有数据
        //$list = Db::name('deal')->where($map)->order(['id '=>'asc'])->paginate(3);
        /*  <!--<div class="page">
              {$list->render()}
          </div>-->*/
        config(['list_rows'=>3]);
        $list = $this->lists('vali',$map,'id asc');
        //分配数据
        $this->assign('list',$list);
        return $this->fetch();
    }
    //审核
    public function edit($id){
        $user = \app\admin\model\Vali::where(['id'=>$id])->update(['status'=>1]);
        if($user){
            return "true";
        }else{
            return 'false';
        }

    }
}
