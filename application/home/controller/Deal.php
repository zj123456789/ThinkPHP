<?php
namespace app\home\controller;
use think\Db;
use think\Request;

//在线报修
class Deal extends Home{
    public function add(){
        if(request()->isPost()){//Post接收
            //实例化模型
            $Deal = model('deal');
            //接收数据
            $data = Request::instance()->post();
            $data['sn']=uniqid();
            $data['create_time']=time();
            $data['status']=1;
            $data['sn']=uniqid();
            //调用验证方法自动验证
            $validate = validate('deal');
            //如果验证失败 提示错误信息
            if(!$validate->check($data)){
                return $this->error($validate->getError());
            }
            //保存

            $result = Db::name('deal')->insert($data);
            if($result){//保存成功  跳转
                $this->success('添加成功',url('index'));
                //记录行为
//                action_log('add_deal','deal',$result->id,1);
            }else{//保存失败  提示错误信息
                $this->error($Deal->getError());
            }
        }else{//通过连接点击添加


            $this->assign('info',null);

            //页面
            return $this->fetch('edit');
        }
    }
}
