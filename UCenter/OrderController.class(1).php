<?php
namespace Home\Controller;

use Think\Controller;

class OrderController extends BaseController
{
    
    // 获取某一商铺的所有订单；
    public function get_all_order_by_store()
    {
        // 获取配置文件分页尺寸；
        $page_size_config = C("CFG_SYS_PAGESIZE");
        $sort_field_default = "order_id";
        $sort_type = "DESC";
        
        // 商铺id
        $partner_id = I('partner_id');
        
        // 设置每页记录数，调用是动态传入
        $page_size = I('page_size');
        // 排序字段,默认按商品 goods_id
        $sort_field = I('sort_field');
        // 排序方式,
        $sort_type = I('sort_type');
        
        // 设置每页记录数，调用是动态传入
        $page_size = I('page_size');
        $page_index = I('page_index');
        
        // 如果用户未设置分页参数，则默认；
        if (empty($page_size)) {
            if (! empty($page_size_config)) {
                $page_size = $page_size_config;
            } else {
                $page_size = 20;
            }
        }
        
        if (empty($partner_id)) {
            JReturn("商铺ID 'partner_id' 不能为空", 0);
        }
        if (empty($page_index)) {
            $page_index = 1;
        }
        
        // 如果没设置排序字段则默认；
        if (empty($sort_field)) {
            $sort_field = $sort_field_default;
        }
        
        $cond["store_id"] = $partner_id;
        
        $mall_order = D("mall_order");
        $count_goods = $mall_order->where($cond)->count(); // 计算记录数
                                                           
        // 总页数;
        $page_total = ceil($count_goods / $page_size);
        // 构建分页信息;
        $page = array(
            "page_index" => $page_index,
            "page_size" => $page_size,
            "page_total" => $page_total
        );
        
        // 分页开始行数;
        $start_row = ($page_index - 1) * $page_size;
        $list = $mall_order->where($cond)
            ->order($sort_field . " " . $sort_type)
            ->limit($start_row, $page_size)
            ->select();
        $result = array(
            "list" => $list,
            "page" => $page
        );
        
        JReturn('查询成功', 1, $result);
    }
    
    
    // 获取某一商铺的所有某一状态的订单；
    public function get_all_order_by_store_by_status()
    {
        // 获取配置文件分页尺寸；
        $page_size_config = C("CFG_SYS_PAGESIZE");
        $sort_field_default = "order_id";
        $sort_type = "DESC";
    
        // 商铺id
        $partner_id = I('partner_id');
        $order_status=I("order_status");
    
        // 设置每页记录数，调用是动态传入
        $page_size = I('page_size');
        // 排序字段,默认按商品 goods_id
        $sort_field = I('sort_field');
        // 排序方式,
        $sort_type = I('sort_type');
    
        // 设置每页记录数，调用是动态传入
        $page_size = I('page_size');
        $page_index = I('page_index');
    
        // 如果用户未设置分页参数，则默认；
        if (empty($page_size)) {
            if (! empty($page_size_config)) {
                $page_size = $page_size_config;
            } else {
                $page_size = 20;
            }
        }
    
        if (empty($partner_id)) {
            JReturn("商铺ID 'partner_id' 不能为空", 0);
        }
        if (empty($page_index)) {
            $page_index = 1;
        }
    
        // 如果没设置排序字段则默认；
        if (empty($sort_field)) {
            $sort_field = $sort_field_default;
        }
    
        $cond["store_id"] = $partner_id;
        $cond["order_status"]=$order_status;
        
    
        $mall_order = D("mall_order");
        $count_goods = $mall_order->where($cond)->count(); // 计算记录数
         
        // 总页数;
        $page_total = ceil($count_goods / $page_size);
        // 构建分页信息;
        $page = array(
            "page_index" => $page_index,
            "page_size" => $page_size,
            "page_total" => $page_total
        );
    
        // 分页开始行数;
        $start_row = ($page_index - 1) * $page_size;
        $list = $mall_order->where($cond)
        ->order($sort_field . " " . $sort_type)
        ->limit($start_row, $page_size)
        ->select();
        $result = array(
            "list" => $list,
            "page" => $page
        );
        JReturn('查询成功', 1, $result);
    }
    
    // 根据订单id获取订单；
    public function get_order_detail_by_orderid()
    {
        $order_id = I("order_id");
        $mall_order = D("mall_order");
        $cond['order_id'] = $order_id;
        $list = $mall_order->where($cond)->select();
        JReturn('查询成功', 1, $list);
    }
    
    // 根据订单编号获取订单；
    public function get_order_detail_by_order_no()
    {
        $order_no = I("order_no");
        $mall_order = D("mall_order");
        $cond['order_no'] = $order_no;
        $list = $mall_order->where($cond)->select();
        
        if ($list) {
            JReturn('查询成功', 1, $list);
        } else {
            JReturn('查询失败', 0);
        }
    }
    
    
    // 修改订单信息,数量及总价；
    public function update_order()
    {
//         $order_no = I("order_no");
//         $cond['order_no'] = $order_no;
        
//         $mall_order = D("mall_order");
//         $data = $mall_order->where($cond)->find();
    
//         if ($data) {
//             JReturn('查询成功', 1, $data);
//         } else {
//             JReturn('查询失败', 0);
//         }
    }
    
    
    
    
    // 一键购
    // 生成一个商品所对应的订单;
    public function create_order()
    {
        $goods_id = I("goods_id");
        if (empty($goods_id)) {
            JReturn("商品id 'goods_id' 不能为空", 0);
        }
        $mall_goods = D("mall_goods");
        
        $data = $mall_goods->where('goods_id=' . $goods_id)->find();
        if ($data) {
            // 把获取的商品插入到订单里;
            // 把商品信息拼装成订单信息;
            $data_order["order_sn"] = date("YmdHis");
            $data_order["product_id"] = $data->goods_id;
            $data_order["product_name"] = $data->goods_name;
            $data_order["product_spec"] = null;
            $data_order["order_status"] = 0;
            $data_order["order_create_time"] = date("Y-m-d H:i:s");
            $data_order["goods_count"] = 1; // 商品数量
            $data_order["goods_amount"] = $data->price; // 订单金额；
                                                        
            // 其他属性后续完善;
                                                        // 订单表里增加了 商品数量goods_count 字段;
                                                        
            // 订单表
            $mall_order = D("mall_order");
            $mall_order->add($data_order);
            
            // 返回订单编号
            $order_no["order_no"] = $data_order["order_sn"];
            
            if ($mall_order) {
                JReturn("生成订单成功", 1, $order_no);
            } else {
                JReturn("生成订单失败", 0);
            }
        } else {
            JReturn('查询失败', 0);
        }
    }
    
    // /////////////////////原有函数；///////////////////////////////////////
    function buy()
    {
        $goodsId = intval(I('post.goods_id'));
        $this->checkLogin(U('index/goods_view') . "&id=$goodsId");
        if (IS_POST) {
            
            $sysId = intval(I('post.sys_classid'));
            $orderUti = new \Common\Lib\Order($sysId);
            $orderId = $orderUti->makeOrder($this->user);
            if ($orderId === false) {
                $this->error($orderUti->getError());
            }
            if ($sysId == 3) {
                redirect(U('order/address') . "&orderid=$orderId");
            } else {
                redirect(U('order/pay') . "&orderid=$orderId");
            }
        } else {
            $this->error('页面出错了，去看看其他页面吧~', U('index'));
        }
    }

    function address()
    {
        if (! IS_POST) {
            $this->checkLogin();
            
            $orderId = intval(I('get.orderid'));
            
            $orderUti = $orderUti = new \Common\Lib\Order();
            $order = $orderUti->getFullOrder($orderId);
            if ($order === false) {
                $this->error('订单不存在');
            }
            
            $addrlist = M('member_address')->where("member_id='$this->userid'")->select();
            $this->assign('addrlist', $addrlist);
            $this->assign('order', $order);
            $this->display();
        } else {
            $this->checkLogin();
            
            $orderId = intval(I('get.orderid'));
            
            $data = array(
                'address_person' => I('post.person'),
                'address_phone' => I('post.phone'),
                'address' => I('post.region_name') . " " . I('post.address')
            );
            $r = D('Order')->where("order_id='$orderId'")->save($data);
            $this->error('订单确认成功');
        }
    }

    function pay()
    {
        $this->checkLogin();
        
        $orderId = intval(I('get.orderid'));
        
        $orderUti = $orderUti = new \Common\Lib\Order();
        $order = $orderUti->getFullOrder($orderId);
        if ($order === false) {
            $this->error('订单不存在');
        }
        $paymentCofig = getPayment();
        
        $this->assign('order', $order);
        $this->assign('paymentCofig', $paymentCofig);
        $this->display();
    }

    function payparam()
    {
        $this->checkLogin();
        $paytype = $this->checkType();
        $orderId = intval(I('get.orderid'));
        $orderUti = $orderUti = new \Common\Lib\Order();
        $order = $orderUti->getFullOrder($orderId);
        if ($order === false) {
            $this->error('订单不存在');
        }
        $data = array(
            'order_id' => $order['order_id'],
            'goods_name' => $order['goods']['goods_name'],
            'out_trade_no' => $order['out_trade_no'],
            'order_amount' => $order['order_amount'],
            'buyer_mobi' => $order['buyer_mobi']
        );
        $payment = new \Common\Lib\Payment($paytype);
        // $qrcode=$payment->qrcode('123456');
        if ($paytype == 'Wepay') {
            // 二维码支付
            $qrcodeUrl = $payment->qrcodePay($data);
            
            if (! empty($qrcodeUrl)) {
                
                Vendor("phpqrcode.phpqrcode");
                $qr = new \QRcode();
                $filename = '/Public/qrcodepay/' . $this->userid . '-' . time() . '.png';
                $img = $qr->png($qrcodeUrl, '.' . $filename);
                echo $filename;
                exit();
            } else {
                exit();
            }
        } else {
            $payparm = $payment->getPayForm($data);
            $this->ajaxReturn($payparm);
        }
    }

    private function checkType()
    {
        $paytype = I('get.type');
        $paymentCfg = getPayment();
        $allow = false;
        $paycode = '';
        foreach ($paymentCfg as $p) {
            if ($p['code'] == $paytype) {
                $allow = true;
            }
        }
        if ($allow) {
            return $paytype;
        } else {
            $this->error('支付类型错误');
        }
    }
}