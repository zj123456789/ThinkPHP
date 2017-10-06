<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/10/5
 * Time: 10:26
 */
namespace app\common\validate;
use think\Validate;

class Life extends Validate{
    protected $rule = [
        ['name','require','标识必须填写'],
        ['title','require','标题必须填写'],
        ['content','require','详情必须填写'],
        ['description','require','描述必须填写'],
        //['status','require','必须填写'],


    ];
}