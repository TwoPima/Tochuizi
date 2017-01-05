<?php
namespace Home\Controller;

header("Content-type: text/html; charset=utf-8");
header('Access-Control-Allow-Origin: *');
use Think\Controller;
use Think\Page;

/**
 *
 * @author VIEWWING
 *         DATE 2016年12月16日
 *        
 */
class MallGoodsController extends BaseController
{
    
    public function index()
    {
        $this->display("Products/product_list");
    }
    
    // 显示所有商品信息
    public function get_all_goods()
    {
        $goods = D("mall_goods");
        $data = $goods->select();
        if (! empty($data)) {
            $list["data"]=$data;
            JReturn('查询成功', 1, $list);
        } else {
            JReturn('暂无数据', 0);
        }
    }
    
    // 获取不同分类下的商品，含分页功能；可按不同字段排序；
    public function get_goods_by_category_page()
    {
        // 获取配置文件分页尺寸；
        $page_size_config = C("CFG_SYS_PAGESIZE");
        // 默认排序方式
        $sort_field_default = "goods_id";
        
        // 分类id；查询某一分类下对应的商品
        $cate_id = I('cate_id');
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
        
        if (empty($cate_id)) {
            JReturn("分类ID 'cate_id' 不能为空", 0);
        }
        if (empty($page_index)) {
            $page_index = 1;
        }
        
        // 如果没设置排序字段则默认；
        if (empty($sort_field)) {
            $sort_field = $sort_field_default;
        }
        
        $mall_goods = D("mall_goods");
        $count_goods = $mall_goods->relation(true)
            ->where(array(
            "cate_id" => $cate_id
        ))
            ->count(); // 计算记录数
                       
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
        
        $list = $mall_goods->relation(true)
            ->where(array(
            "cate_id" => $cate_id
        ))
            ->order($sort_field . " " . $sort_type)
            ->limit($start_row, $page_size)
            ->select();
        $result = array(
            "list" => $list,
            "page" => $page
        );
        
        JReturn('查询成功', 1, $result);
        // $this->assign("result", $result);
        // $this->display();
    }
    
    // 获取前N条商品，（可限定字段）可按不同字段排序；
    public function get_goods_topn()
    {
        // 要显示的条数
        $row_num = I('row_num');
        // 排序字段
        $sort_field = I('sort_field');
        // 排序方式,
        $sort_type = I('sort_type');
        // 要显示的字段，默认为所有字段
        $show_fields = I('show_fields');
        
        if (empty($row_num)) {
            JReturn("查询数据条数 'row_num' 不能为空", 0);
        }
        if (empty($sort_field)) {
            JReturn("排序字段 'sort_field' 不能为空", 0);
        }
        
        // 要显示的字段，默认为所有字段
        if (empty($show_fields)) {
            $show_fields = true;
        }
        
        $mall_goods = D("mall_goods");
        $list = $mall_goods->field($show_fields)
            ->order($sort_field . " " . $sort_type)
            ->limit($row_num)
            ->select();
        JReturn('查询成功', 1, $list);
    }
    
    // 根据Id查询一条数据（可限定字段）
    public function get_good_by_id()
    {
        // 要查询数据的id
        $goods_id = I('goods_id');
        // 要显示的字段，默认为所有字段
        $show_fields = I('show_fields');
        
        if (empty($goods_id)) {
            JReturn("查询ID 'goods_id' 不能为空", 0);
        }
        
        // 要显示的字段，默认为所有字段
        if (empty($show_fields)) {
            $show_fields = true;
        }
        
        $mall_goods = D("mall_goods");
        
        $data = $mall_goods->field($show_fields)
            ->where('goods_id=' . $goods_id)
            ->find();
        JReturn('查询成功', 1, $data);
    }
    
    // 按时间倒序，获取某一地区的所有类型的商品,带分页；
    public function get_all_products_by_area()
    {
        // 获取配置文件分页尺寸；
        $page_size_config = C("CFG_SYS_PAGESIZE");
        
        // 设置每页记录数，调用是动态传入
        $page_size = I('page_size');
        $page_index = I('page_index');
        $area_id = I('area_id');
        if (empty($area_id)) {
            JReturn("地区ID 'area_id' 不能为空", 0);
        }
        if (empty($page_index)) {
            $page_index = 1;
        }
        
        // 如果用户未设置分页参数，则默认；
        if (empty($page_size)) {
            if (! empty($page_size_config)) {
                $page_size = $page_size_config;
            } else {
                $page_size = 20;
            }
        }
        $mall_goods = D("mall_goods");
        $count_goods = $mall_goods->where(array(
            "area_id" => $area_id
        ))->count(); // 计算记录数
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
        $list = $mall_goods->where(array(
            "area_id" => $area_id
        ))
            ->order("create_time DESC")
            ->limit($start_row, $page_size)
            ->select();
        $result = array(
            "list" => $list,
            "page" => $page
        );
        
        // $checkstru = md5(date('Ymd').get_all_products_by_area.'tuchuinet');
        JReturn('查询成功', 1, $result);
    }
    
    // 按时间倒序，获取某一地区的不同类型的商品,带分页；
    public function get_all_products_by_area_cate()
    {
        // 获取配置文件分页尺寸；
        $page_size_config = C("CFG_SYS_PAGESIZE");
        $area_id = I('area_id');
        $cate_id = I('cate_id');
        
        // 设置每页记录数，调用是动态传入
        $page_size = I('page_size');
        $page_index = I('page_index');
        
        if (empty($area_id)) {
            JReturn("地区ID 'area_id' 不能为空", 0);
        }
        
        if (empty($page_index)) {
            $page_index = 1;
        }
        // 拼接查询条件；
        $cond["area_id"] = $area_id;
        if (! empty($cate_id)) {
            $cond["cate_id"] = $cate_id;
        }
        
        // 如果用户未设置分页参数，则默认；
        if (empty($page_size)) {
            if (! empty($page_size_config)) {
                $page_size = $page_size_config;
            } else {
                $page_size = 20;
            }
        }
        $mall_goods = D("mall_goods");
        $count_goods = $mall_goods->where($cond)->count(); // 计算记录数
                                                           
        // 分页开始行数;
        $start_row = ($page_index - 1) * $page_size;
        // 总页数;
        $page_total = ceil($count_goods / $page_size);
        // 构建分页信息;
        $page = array(
            "page_index" => $page_index,
            "page_size" => $page_size,
            "page_total" => $page_total
        );
        $list = $mall_goods->where($cond)
            ->order("create_time DESC")
            ->limit($start_row, $page_size)
            ->select();
        $result = array(
            "list" => $list,
            "page" => $page
        );
        
        // $checkstru = md5(date('Ymd').get_all_products_by_area.'tuchuinet');
        JReturn('查询成功', 1, $result);
    }
    
    // 商品搜索
    public function product_search()
    {
        // 获取配置文件分页尺寸；
        $page_size_config = C("CFG_SYS_PAGESIZE");
        // 设置每页记录数，调用是动态传入
        $page_size = I('page_size');
        $page_index = I('page_index');
        $area_id = I('area_id');
        $goods_name = I('goods_name'); // 要搜索商品的名称
        
        if (empty($goods_name)) {
            JReturn("搜索字段不能为空", 0);
        }
        if (empty($page_index)) {
            $page_index = 1;
        }
        // 查询条件
        
        $cond["goods_name"] = array(
            "like",
            "%" . $goods_name . "%"
        );
        
        // 如果用户未设置分页参数，则默认；
        if (empty($page_size)) {
            if (! empty($page_size_config)) {
                $page_size = $page_size_config;
            } else {
                $page_size = 20;
            }
        }
        $mall_goods = D("mall_goods");
        $count_goods = $mall_goods->where($cond)->count(); // 计算记录数
                                                           
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
        $list = $mall_goods->where($cond)
            ->order("create_time DESC")
            ->limit($start_row, $page_size)
            ->select();
        $result = array(
            "list" => $list,
            "page" => $page
        );
        
        JReturn('查询成功', 1, $result);
    }
    
    // 按时间倒序，获取某一地区的不同类型的商品,区分(出售与租赁)带分页；
    public function get_all_products_by_area_cate_issale()
    {
        // 获取配置文件分页尺寸；
        $page_size_config = C("CFG_SYS_PAGESIZE");
        
        $is_sales = 1; // 默认是1[出售]
                       
        // 设置每页记录数，调用是动态传入
        $page_size = I('page_size');
        $page_index = I('page_index');
        
        $area_id = I('area_id');
        $cate_id = I('cate_id');
        $is_sale = I('is_sale');
        
        if (empty($page_index)) {
            $page_index = 1;
        }
        if (empty($area_id)) {
            JReturn("地区ID 'area_id' 不能为空", 0);
        }
        if (! empty($is_sale)) {
            $is_sales = $is_sale; // 如果用户自己定义;则重新赋值;
        }
        
        // 拼接查询条件；
        $cond["area_id"] = $area_id;
        $cond["is_sale"] = $is_sales;
        
        if (! empty($cate_id)) {
            $cond["cate_id"] = $cate_id;
        }
        
        // 如果用户未设置分页参数，则默认；
        if (empty($page_size)) {
            if (! empty($page_size_config)) {
                $page_size = $page_size_config;
            } else {
                $page_size = 20;
            }
        }
        
        // 分页开始行数;
        $start_row = ($page_index - 1) * $page_size;
        
        $mall_goods = D("mall_goods");
        $list = $mall_goods->where($cond)
            ->order("create_time DESC")
            ->limit($start_row, $page_size)
            ->select();
        
        // 计算记录数
        $count_goods = $mall_goods->where($cond)->count();
        // 总页数;
        $page_total = ceil($count_goods / $page_size);
        // 构建分页信息;
        $page = array(
            "page_index" => $page_index,
            "page_size" => $page_size,
            "page_total" => $page_total
        );
        
        $result = array(
            "list" => $list,
            "page" => $page
        );
        JReturn('查询成功', 1, $result);
    }

    public function to_page()
    {
        $is_type = I("is_type");
        if (! empty($is_type)) {
            if ($is_type == "show") {
                $this->display("show_product");
            } else {
                $this->display("get_goods_by_category_page");
            }
        } else {
            echo "页面不存在";
        }
    }
}














