<?php
use Illuminate\database\Capsule\Manager as DB;
use App\Models\Partner;
class PartnerController extends \Yaf\Controller_Abstract {

    public function indexAction() {
        $cate_id = $this->getRequest()->getQuery("cate_id", "1");
        //$list = DB::table('t_partner')->where("cate_id",$cate_id)->select('partner_id','partner_name','add_time')->limit(10)->get();
        $page = $this->getRequest()->getQuery("page", "1");
        // 查询语句构造器进行分页
        $list = DB::table('t_partner')->paginate(10,['*'],'page',$page);

        // Eloquent 模型进行分页
//        $list = Partner::with('category')->paginate(10,['*'],'page',$page);
//        foreach ($list as $l) {
//            var_dump($l->partner_name);
//        }die;
        var_dump($list);die;
    }

    public function showAction() {
        $pid = $this->getRequest()->getQuery("pid", "1");
        $res = Partner::with('category')->where('partner_id',$pid)->get();
        var_dump($res->toArray());die;
    }

}