<?php

namespace Api\Controller;
use Api\Controller\CommonController;

/**
 * 管理员登陆控制器
 * @author jmjoy
 *
 */
class AdminSignController extends CommonController {

    /**
     * 处理管理员登陆请求
     */
    public function postSignIn() {
        // 判断验证码是否正确
        $verify = new \Think\Verify(array(
            'reset'     =>  false,
        ));
        if (!isset($_POST['verify'])) {
            return $this->simpleAjaxReturn('请输入验证码');
        }
        if (!$verify->check($_POST['verify'])) {
            return $this->simpleAjaxReturn('验证码不正确');
        }

        $result = D('Common/Admin')->signIn($_POST);

        // 登陆失败
        if (!is_array($result)) {
            $this->ajaxReturn([
                    'status'    =>  400,
                    'msg'       =>  $result,
            ]);
        }

        // 登陆成功，保存Session
        $_SESSION['admin']['id'] = $result['id'];
        $_SESSION['admin']['name'] = $result['name'];

        // 删除保存在session中的verifycode的信息
        unset_verify_session();

        $this->ajaxReturn([
                'status'    =>  200,
        ]);
    }

}
