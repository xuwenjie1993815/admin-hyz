<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-04-14
 * Time: 17:02
 */

namespace Home\Model;


use Think\Model;

class AdvertModel extends Model
{

    protected $_validate = array(
        array('title', 'require', '请填写广告位名称'),
    );


    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
        array('code', 'getCode', 1, 'callback')
    );


    protected function getCode()
    {
        $max_id = $this->max('id');

        $code = $max_id ? 10000000 + $max_id : 10000000;
        return $code;
    }

}