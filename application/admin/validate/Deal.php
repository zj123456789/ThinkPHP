<?php
namespace app\admin\validate;
use think\Validate;

class Deal extends Validate{
    protected $rule = [
        ['username', 'require', '报修人不能为空'],
        ['problem', 'require', '报修问题不能为空'],
        ['sort', 'require', '排序不能为空'],
        ['status', 'require', '状态不能为空'],
        ['tel', 'require', '电话不能为空'],
        ['tel', ['max'=>11], '电话必须是11位数字'],
        ['tel', ['min'=>11],'电话必须是11位数字'],
        ['tel', 'number', '电话必须是数字'],
        ['sort', 'number', '排序必须是数字'],
    ];
}
