<?php
namespace app\admin\controller;


use think\Db;
use think\Request;


class Deal extends Admin{//http://www.tp.com/admin/deal/index.html
    //报修列表
    public function index(){
        $name=input('name');
        //获取数据
        $map = ['status'=>['gt',-1]];
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
        $list = $this->lists('deal',$map,'id desc');
        //分配数据
        $this->assign('list',$list);
        //页面
        return $this->fetch();
    }
    //添加保修
    public function add(){
        if(request()->isPost()){//Post接收
            //实例化模型
            $Deal = model('deal');
            //接收数据
            $data = Request::instance()->post();
            $data['sn']=uniqid();
            $data['create_time']=time();
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
            $this->assign('meta_title', '新增导航');
            //页面
            return $this->fetch('edit');
        }
    }
    //修改
    public function edit($id){
        if(request()->post()){
            //加载数据
            $data = Request::instance()->post();
//            var_dump($data);exit;
            //实例化数据库
            $deal = Db::name('deal');
            //调用验证方法自动验证
            $validate = validate('deal');
            //如果验证失败 提示错误信息
            if(!$validate->check($data)){
                return $this->error($validate->getError());
            }
            //修改数据
            $data['update_time']=time();
            $deal->update($data);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        }else{
            $info = Db::name('deal')->find(['id'=>$id]);
            if($info ===false){
                $this->error('获取配置信息错误');
            }
            $this->assign('info', $info);
            return $this->fetch();

        }
    }
    //删除
    public function del(){
        //用/a强制转换成数组
        $id = array_unique((array)input('id/a',0));// array_unique 移除数组中重复的值

        if ( empty($id) ) {
            $this->error("非法操作！",url('classify'));
        }
        $map = ['id'=>['in',$id]];
        if(Db::name('deal')->where($map)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败！');
        }
    }

}
