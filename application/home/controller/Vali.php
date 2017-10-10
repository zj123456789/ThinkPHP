<?php
namespace app\home\controller;
use think\Db;

class Vali extends Home {
    //认证列表
    public function add(){
        if(request()->isGet()){
            $this->assign('info',null);
            //页面
            return $this->fetch('edit');
        }else{
            $data = request()->post();
            $model = model('vali');
            $validate = validate('vali');
            //如果验证失败 提示错误信息
            if(!$validate->check($data)){
                return $this->error($validate->getError());
            }
            //保存
            $data['status']=0;
            $result = Db::name('vali')->insert($data);
            if($result){//保存成功  跳转
                $this->success('添加成功',url('index'));
                //记录行为
//                action_log('add_deal','deal',$result->id,1);
            }else{//保存失败  提示错误信息
                $this->error($model->getError());
            }
        }

    }
}
