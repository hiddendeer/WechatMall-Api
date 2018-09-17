<?php
namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use think\Exception;

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
        //对传入的id检验
        (new IDMustBePostiveInt())->gocheck();

        /* 抛出JSON异常处理 */
        try {
            $banner = BannerModel::getBannerById($id);
        } 
        catch (Exception $ex) {
            $err = [
                          'error_code' => 10001,
                          'error_msg' => $ex->getMessage()
                      ];
            return json($err, 400);
        }

        return $banner;
    }
}
