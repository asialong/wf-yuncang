<?php
namespace Asialong\WfYuncang;

class Warehouse extends Api
{
    /**
     * SKU同步接口
     * 数据流向：ERP->WMS
     * Note: 每次sku数据包<100
     *
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function sku_sync(array $params)
    {
        return $this->request(['methodName'=>'WMS_SKU_NOTIFY'], $params);
    }

    /**
     * 仓配入库单同步接口
     * 数据流向：ERP->WMS
     *
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function stock_in_sync(array $params)
    {
        return $this->request(['methodName'=>'TW_ASN_NOTIFY'], $params);
    }

    /**
     * 仓配出库单同步接口
     * 数据流向：ERP->WMS
     *
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function stock_out_sync(array $params)
    {
        return $this->request(['methodName'=>'TW_SO_NOTIFY'], $params);
    }

    /**
     * 仓配单取消接口
     * 数据流向：ERP->WMS
     *
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function stock_order_cancel(array $params)
    {
        return $this->request(['methodName'=>'TW_CANCEL_NOTIRY'], $params);
    }

    /**
     * 电子面单申请接口
     * 数据流向：ERP->OMS
     * Note: 一次请求单个订单
     *
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function get_electronic_sheet(array $params)
    {
        return $this->request(['methodName'=>'TMS_WAYBILL_APPLY'], $params);
    }

    /**
     * 库存拓展查询接口
     * 数据流向：ERP->WMS
     *
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function expand_search(array $params)
    {
        return $this->request(['methodName'=>'WMS_INVENTORY_GET'], $params);
    }

    /**
     * 运单信息查询接口
     * 数据流向：ERP->WMS
     *
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function waybill_info(array $params)
    {
        return $this->request(['methodName'=>'GetShippingOrderInfo'], $params);
    }



}