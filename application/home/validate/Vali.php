<?php
namespace app\home\validate;

use think\Validate;

class Vali extends Validate {
    protected $rule = [
        ['username', 'require', '用户名不能为空'],
        ['name', 'require', '姓名不能为空'],
        ['area', 'require', '小区名不能为空'],
        ['sn', 'require', '房号不能为空'],
        ['connect', 'require', '与业主关系不能为空'],
        ['card', 'require', '身份证号不能为空'],
        ['tel', 'require', '电话不能为空'],
        ['tel', ['max'=>11], '电话必须是11位数字'],
        ['tel', ['min'=>11],'电话必须是11位数字'],
        ['tel', 'number', '电话必须是数字'],
    ];
}
