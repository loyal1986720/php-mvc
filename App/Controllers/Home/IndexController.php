<?php
namespace App\Controllers\Home;
use App\Controllers\BaseController;
use App\Library\Curl;
use App\Library\Result;
use App\Models\Home\HomeModel;
use Core\Base\Request;

/**
 * Created by PhpStorm.
 * User: liuyong
 * Date: 16/7/4
 * Time: 下午1:57
 */
class IndexController extends BaseController{

    public function __construct(){

    }
    public function index(){
        $rs = HomeModel::getInstance()->test_delete();
        print_r($rs);
    }
    public function test(){
        $result = new Result();
        echo $result->setCode(Result::CODE_SUCCESS)->setMsg('操作成功')->setData(['123','456'])->toJson();
    }
    public function testCurl(){
        $header = [
            "Content-Type: application/text",
            "loginname:loyal"
        ];
        //取分机号
        $data = ['recordtype' => 0,
            'recordid' => '100164960521',
            'date' => '20160419142635'
        ];
        $url = 'https://www.baidu.com';
        $res = Curl::getInstance()->to($url)->withOption('HTTPHEADER', $header)->withData(json_encode($data))->get();
        echo $res;
    }
}