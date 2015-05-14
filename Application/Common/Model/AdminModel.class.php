<?php

namespace Common\Model;
use Common\Model\CommonModel;

/**
 * 管理员登陆模型
 * @author jmjoy
 *
 */
class AdminModel extends CommonModel {

    /**
     * 管理员登陆
     * @param unknown $name
     * @param unknown $password
     * @return string|multitype:string
     */
    public function signIn($inputs) {
        // 检验输入
        if (!isset($inputs['name'])) {
            return '请输入管理员账号';
        }
        if (!isset($inputs['password'])) {
            return '请输入密码';
        }

        // 获取正确的密码
        $result = $this->field(array('id', 'name', 'password'))
                         ->where('name = "%s"', $inputs['name'])
                         ->find();

        // 校验
        if ($result === false) {
            return '数据库异常，请重试';
        }

        if ($result === null) {
            return '用户名不存在';
        }

        if (sha1($inputs['password']) != $result['password']) {
            return '密码错误';
        }

        // 登录验证通过
        return $result;
    }

    /**
     * 注销
     * @param unknown $sessId
     */
    public function signOut($sessId) {
        $sessArr = S($sessId);
        unset($sessArr['admin']);
        S($sessId, $sessArr);
    }

}
