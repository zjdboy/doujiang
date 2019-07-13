<?php
namespace app\common\validate;
use think\Validate;

class Withdraw extends Validate
{
    protected $rule =   [
        'card_no'  => 'require|max:30',
        'bank_name'   => 'require|max:255',

    ];

    protected $message  =   [
        'card_no.require' => '银行卡号必须',
        'card_no.max'     => '银行卡号不能超过30个字符',
        'bank_name.require'   => '银行名称必须',
        'bank_name.max'   => '银行名称最多不能超过255个字符',
    ];

    protected $scene = [
        'add'=> ['card_no','bank_name'],
        'edit'=> ['card_no','bank_name'],
    ];
}
