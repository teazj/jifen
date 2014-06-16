<?php
/*---------------------------商品试图模型类-------------------------------------*/

class GoodsViewModel extends ViewModel {
   public $viewFields = array(
     'goods'=>array('id','tid','name','price','snum','bnum','vnum','status'),
     'goods_detail'=>array('gid', '_on'=>'goods.id=goods_detail.gid'),
	 'goods_pic'=>array('pic','_on'=>'goods.id=goods_pic.gid'),
   );
}
