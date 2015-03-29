<?php

namespace Api\Controller;
use Api\Controller\CommonController;

/**
 * 管理员登陆验证
 * @author jmjoy
 *
 */
class AdminAuthController extends CommonController {

    /**
     * SessionId
     * @var string
     */
    public $sessId;

    /**
     * 管理员名字
     * @var string
     */
    public $adminName;

    /**
     *
     */
    public function _initialize() {
        parent::_initialize();

        // 检验有没有登陆
        $this->sessId = "SESS_" . I("SESSID");
        $sessArr = S($this->sessId);

        if (!$sessArr || !isset($sessArr['admin'])) {
            $this->ajaxReturn([
                    'status'    =>  403,
                    'msg'       =>  '管理员没有登陆',
            ]);
        }

        $this->adminName = $sessArr['admin']['name'];
    }

}
