<?php
namespace app\api\controller\v1;

use think\Validate;

class Banner
{

    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     *
     **/
    public function getBanner($id)
    {
        $data = [
            'name' => 'vendor',
            'email' => 'vendor@qq.com'
        ];

        $validate = new Validate([
            'name' => 'require|max:10',
            'email' => 'email'
        ]);

        $result = $validate->check($data);
        
        dump($result);
    }
}
