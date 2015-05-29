<?php

namespace Util;

class Upload {

    /**
     * 处理图像上传
     * @param string $fileKey 比如是input标签中name的值
     * @param int $maxSize 图像最大允许的大小
     * @param string $rootPath 图片保存的根目录
     * @param array $thumbSize 如果需要缩略图，则传入缩略后的长和宽数组，
     *                         不需要则传入空值
     * @return array|string 如果成功返回 array(相对文件路径)，否则返回错误信息
     */
    public static function handleImgUpload($file, $maxSize, $rootPath, $thumbSize = array()) {
        $config = array(
            'maxSize'   =>  $maxSize,
            'rootPath'  =>  $rootPath,
            'savePath'  =>  '',
            'saveName'  =>  array('uniqid',''),
            'exts'      =>  array(
                'jpg','png', 'jpeg', 'bmp',
            ),
            'mines'     =>  array(
                'image/jpeg',
                'image/png',
                'image/nbmp',
                'application/x-MS-bmp',
                'image/vnd.wap.wbmp',
            ),
            'autoSub'   =>  true,
            'subName'   =>  array('date', 'Y/md'),
        );

        $upload = new \Think\Upload($config);

        // 上传单个文件
        $info   =   $upload->uploadOne($file);

        // 上传错误提示错误信息
        if (!$info) {
            return array(null, $upload->getError());
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

        return array($filepath, null);
    }


}
