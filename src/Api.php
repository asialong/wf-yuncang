<?php
namespace Asialong\WfYuncang;

use Hanson\Foundation\AbstractAPI;
use Hanson\Foundation\Foundation;

class Api extends AbstractAPI
{

    const URL = '';
    private $partnerID = '';
    private $partnerKey = '';

    public function __construct(array $config,Foundation $app)
    {
        parent::__construct($app);
        $this->partnerID = $config['partnerID'];
        $this->partnerKey = $config['partnerKey'];
    }

    /**
     * @param array $method
     * @param array $params
     * @return mixed
     * @throws DispatchException
     */
    public function request(array $method, array $params)
    {
        $params = array_merge($params,[
            'api' => $method['methodName']
        ]);
        $params['sign'] = $this->signature($params);
        $http = $this->getHttp();
        $response = $http->post(self::URL . $method['className'], $params);
        $result = json_decode(strval($response->getBody()), true);
        $this->checkErrorAndThrow($result);
        return $result;
    }

    public function signature(array $params)
    {
        $str = $params['bizData'].$this->partnerKey;
        $str = $this->strToBytes($str);
        $str = $this->strToHex(md5($str));
        return $str;
    }

    /**
     * @param $result
     * @throws DispatchException
     */
    private function checkErrorAndThrow($result)
    {
        if (!$result['result']) {
            throw new DispatchException('错误编码：'.$result['errorCode'].';错误信息：'.$result['errorDescription'], 500);
        }
    }

    /**
     * 转换一个字符串为byte字符串
     * @param string $str 需要转换的字符串
     * @return string $bytes 目标byte字符串
     */
    private function strToBytes($str)
    {
        $bytes = '';
        for($i = 0; $i < strlen($str); $i++){
            $bytes .= ord($str[$i]);
        }
        return $bytes;
    }

    /**
     * 字符串转十六进制字符串
     * @pream string $str 需要转换的字符串
     * @return string $hex 目标byte字符串
     */
    private function strToHex($str)
    {
        $hex='';
        for($i = 0;$i <strlen ($str); $i++)
            $hex .= dechex(ord($str[$i]));
        $hex=strtoupper($hex);
        return $hex;
    }

}