<?php

namespace Admin\Controller;
use Admin\Controller\AdminAuthController;

/**
 * 后台管理页面控制器
 * @author jmjoy
 *
 */
class CategoryController extends CommonController {

    /**
     * 管理首页
     */
    public function index() {
        $data = D('Common/Category')->listCategory();

        // 处理结果数组
        if (is_array($data)) {
            foreach ($data as $key => $row) {
                $data[$row]['level'] = $this->mapLevel($row['depth']);
            }
        }

        $this->data = $data;
        $this->display();
    }

    /**
     * 新增分类
     */
    public function add() {
        $this->picImg = C('TMPL_PARSE_STRING')['__IMG__'] . '/default_frame.png';
        $this->display('edit');
    }

    /**
     * 修改分类
     */
    public function update() {
        $id = I('get.id', 0, 'intval');
        $result = D('Common/Category')->getCategory($id);

        if (!is_array($result)) {
            $this->error($result);
        }

        $this->data = $result;
        $this->picImg =  C('TMPL_PARSE_STRING')['__UPLOAD__'] . '/category/' . $result['pic_path'];
        $this->display('edit');
    }

    /**
     * 映射数字和汉字级别
     */
    protected function mapLevel($level) {
        switch ($level) {
        case 0:
            $num = '一';
            break;
        case 1:
            $num = '二';
            break;
        case 2:
            $num = '三';
            break;
        }

        return '第'.$num.'级';
    }
}
