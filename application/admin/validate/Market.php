<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/10/3
 * Time: 23:08
 */
namespace  app\common\validate;
use think\Validate;
class Market extends  Validate{
    protected $rule = [
        ['name','require','标识必须填写'],
        ['title','require','标题必须填写'],
        ['content','require','详情必须填写'],
        ['description','require','描述必须填写'],
        ['view','require','必须填写'],
        //['status','require','必须填写'],


    ];

}