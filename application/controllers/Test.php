<?php
use Illuminate\database\Capsule\Manager as DB;
class TestController extends \Yaf\Controller_Abstract {

    public function indexAction() {
        $this->getView()->assign("content","hello test indexAction");
    }

    public function testAction() {
        $res = DB::table('t_partner')->where('cate_id',1)->limit(2)->get();
        var_dump($res);die;
    }
}