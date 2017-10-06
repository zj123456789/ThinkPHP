<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/10/2
 * Time: 15:22
 */
namespace app\common\validate;
use think\Validate;

class Service extends Validate{
    // 验证规则
    protected $rule = [
        ['name','require','标识必须填写'],
        ['title','require','标题必须填写'],
        ['tel','require','电话必须填写'],
        ['content','require','详情必须填写'],
        ['description','require','描述必须填写'],
        ['status','require','必须填写'],


    ];
}