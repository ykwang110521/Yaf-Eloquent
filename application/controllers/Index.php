<?php
/**
 * @name IndexController
 * @author qh-20160425tocw\administrator
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
use Illuminate\database\Capsule\Manager as DB;
class IndexController extends \Yaf\Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/yaf-sample/index/index/index/name/qh-20160425tocw\administrator 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
		//1. fetch query
		$get = $this->getRequest()->getQuery("get", "default value");

		//2. fetch model
		$model = new SampleModel();

		//3. assign
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("name", $name);

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}

	public function testAction() {
		$res = DB::table('t_partner')->where('cate_id',1)->get();
		var_dump($res);die;
	}
}
