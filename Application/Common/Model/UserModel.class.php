<?php

namespace Common\Model;
use Common\Model\CommonModel;

/**
 * 用户模型
 * @author jmjoy
 *
 */
class UserModel extends CommonModel {

    /**
     * 验证规则
     */
    public $validateRules;

    /**
     * 初始方法
     */
    public function _initialize() {
        $this->validateRules = [
            'nickname'     =>  ['nickname', '/^[\-\w\x{4e00}-\x{9fa5}]{2,8}$/u', '昵称必须为2～8个字符！', 1, 'regex'],
            'phone'        =>  ['phone', '/^1\d{10}$/', '手机号码不正确', 1, 'regex'],
            'password'     =>  ['password', '/^[\s\S]{6,32}$/', '密码长度应该为6～32位', 1, 'regex'],
        ];
    }

    /**
     * 处理登陆请求
     */
    public function handleSignIn($phone, $password) {
        // 验证输入
        $args = [
            'phone'     =>  $phone,
            'password'  =>  $password,
        ];

        $rules = [
            $this->validateRules['phone'],
            $this->validateRules['password'],
        ];

        if (!$this->validate($rules)->create($args)) {
            return $this->getError();
        }

        // 数据库验证
        $row = $this->where('phone = "%s"', $phone)->find();

        if ($row === false) {
            return $this->getDbError();
        }

        if ($row === null) {
            return '手机号码不存在';
        }

        if ($row['password'] != md5($password)) {
            return '密码错误';
        }

        // 登陆成功后，修改最后登陆时间和ip
        $this->loginSuccess($row['id']);

        return $row;
    }

    /**
     * 处理注册请求
     */
    public function postHandleSignUp($phone, $password, $nickname) {
        // 验证输入
        $args = [
            'phone'     =>  $phone,
            'password'  =>  $password,
            'nickname'  =>  $nickname,
        ];

        $rules = [
            $this->validateRules['phone'],
            $this->validateRules['password'],
            $this->validateRules['nickname'],
        ];

        if (!$this->validate($rules)->create($args)) {
            return $this->getError();
        }

        // 组装数据
        $data = array_merge($args, [
            'ctime'     =>  $nowTime,
        ]);

        $result = $this->data($data)->add();

        // 插入失败
        if ($result === false) {
            return $this->getDbError();
        }

        return true;
    }

    /**
    * 登陆成功后，修改最后登陆时间和ip
    */
    protected function loginSuccess($id) {
        $data = [
            'last_time' =>  time(),
            'last_ip'   =>  get_client_ip(),
        ];

        $this->data($data)->where('id = %d')->save();
    }

}
