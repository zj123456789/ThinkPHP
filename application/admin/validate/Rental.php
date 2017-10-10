<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/10/3
 * Time: 17:01
 */
namespace app\common\validate;
use think\Validate;

class Rental extends Validate{
    // 验证规则
    protected $rule = [
        ['name','require','发布人必须填写'],
        ['title','require','标题必须填写'],
        ['tel','require','电话必须填写'],
        ['logo','require','图片必须上传'],
        ['end_time','require','截止时间必须填写'],
        ['content','require','详情必须填写'],
        ['price','require','价格必须填写'],


    ];
}