<?php

namespace Api\Controller;
use Think\Controller;

class CommonController extends Controller {

    /**
     *
     */
    public function _initialize() {
        // 判断是get还是post方法
        if (strpos(ACTION_NAME, 'get') === 0) {
            // 是get方法
            if (!IS_GET) {
                $this->ajaxReturn([
                    'status'    =>  400,
                    'msg'       =>  '不是GET请求',
                ]);
            }

        } else if (strpos(ACTION_NAME, 'post') === 0) {
            // 是post方法
            if (!IS_POST) {
                $this->ajaxReturn([
                        'status'    =>  400,
                        'msg'       =>  '不是POST请求',
                ]);
            }

        } else {
            // 都不是
            $this->ajaxReturn([
                    'status'    =>  400,
                    'msg'       =>  '不是有效请求',
            ]);
        }
    }

    /**
     * 简单返回接口数据，理论上只能用于修改操作之后响应是否成功
     * @param bool|string $result
     * @param number $code
     */
    protected function simpleAjaxReturn($result, $code = 400) {
        // 失败
        if ($result !== true) {
            $this->ajaxReturn([
                    'status'    =>  400,
                    'msg'       =>  $result,
            ]);
        }

        // 成功
        $this->ajaxReturn([
                "status"    =>  200,
        ]);
    }

    /**
     * 处理图像上传
     * @param string $fileKey 比如是input标签中name的值
     * @param int $maxSize 图像最大允许的大小
     * @param string $rootPath 图片保存的根目录
     * @param array $thumbSize 如果需要缩略图，则传入缩略后的长和宽数组，
     *                         不需要则传入空值
     * @return array|string 如果成功返回[相对文件路径]，否则返回错误信息
     */
    protected function handleImgUpload($fileKey, $maxSize, $rootPath, $thumbSize = []) {
        $config = [
            'maxSize'   =>  $maxSize,
            'rootPath'  =>  $rootPath,
            'savePath'  =>  '',
            'saveName'  =>  ['uniqid',''],
            'exts'      =>  [
                'jpg','png', 'jpeg', 'bmp'
            ],
            'mines'     =>  [
                'image/jpeg',
                'image/png',
                'image/nbmp',
                'application/x-MS-bmp',
                'image/vnd.wap.wbmp',
            ],
            'autoSub'   =>  true,
            'subName'   =>  ['date','Y/md'],
        ];

        $upload = new \Think\Upload($config);

        // 上传单个文件
        $info   =   $upload->uploadOne($_FILES[$fileKey]);

        // 上传错误提示错误信息
        if (!$info) {
            return $upload->getErro();
        }

        // 上传成功 获取上传文件信息
         $filepath = $info['savepath'] . $info['savename'];

        // 是否需要裁剪
        if ($thumbSize) {
            $image = new \Think\Image();
            $image->open($rootPath . $filepath);
            $image->thumb($thumbSize[0], $thumbSize[1], \Think\Image::IMAGE_THUMB_FIXED)
                  ->save($rootPath . $filepath);
        }

        return [$filepath];
    }

}
