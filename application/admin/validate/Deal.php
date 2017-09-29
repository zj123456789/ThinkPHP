<?php
namespace app\admin\validate;
use think\Validate;

class Deal extends Validate{
    protected $rule = [
        ['username', 'require', '报修人不能为空'],
        ['tel', 'require', '电话不能为空'],
        ['tel', 'number', '电话必须是数字'],
    ];
}
