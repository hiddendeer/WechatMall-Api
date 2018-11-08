<?php

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use app\lib\exception\ThemeException;
use app\api\model\Theme as ThemeModel;

class Theme
{
    /**
     * @url /theme?ids=id1,id2,id3.....
     *
     * @return 一组theme模型
     */
    public function getSimpleList($ids = '')
    {
        (new IDCollection())->gocheck();

        $ids = explode(',',$ids);
        $result = ThemeModel::with('topicImg,headImg')
            ->select($ids);

        if (!$result) {
            throw new ThemeException();
        }

        return $result;
    }

    public function getComplexOne ($id)
    {
        $result = ThemeModel::with('products')->find($id);
        return $result;
    }
}
