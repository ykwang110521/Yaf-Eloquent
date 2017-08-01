<?php
use Illuminate\database\Capsule\Manager as DB;
use App\Models\Partner;
class PartnerController extends \Yaf\Controller_Abstract {

    public function indexAction() {
        $cate_id = $this->getRequest()->getQuery("cate_id", "1");
        $list = DB::table('t_partner')->where("cate_id",$cate_id)->select('partner_id','partner_name','add_time')->get();
        var_dump($list);die;
    }

    public function showAction() {
        $pid = $this->getRequest()->getQuery("pid", "1");
        $res = Partner::with('category')->where('partner_id',$pid)->get();
        var_dump($res->toArray());die;
    }

}