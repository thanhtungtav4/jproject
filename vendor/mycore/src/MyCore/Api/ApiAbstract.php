<?php
namespace MyCore\Api;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * User: daidp
 * Date: 11/15/2018
 * Time: 11:08 AM
 */
abstract class ApiAbstract
{
    protected $baseUrlApi = BASE_URL_API;

    /**
     * @return Client
     */
    protected function getClient()
    {
        $jwt = session('authen_token');

        $client = new Client([
            'base_uri'    => $this->baseUrlApi,
            'http_errors' => false, // Do not throw GuzzleHttp exception when status error
            'headers' => [
                'Authorization' => 'Bearer ' . $jwt
            ]
        ]);

        return $client;
    }

    /**
     * Hàm cơ bản xử lý gọi api và trã kết quả
     * @param $url
     * @param $params
     * @return mixed
     * @throws ApiException
     */
    protected function baseClient($url, $params, $stripTags = true)
    {
        try {
            if($stripTags) $params = $this->stripTagData($params);

            $oClient = $this->getClient();

            $rsp = $oClient->post($url, [
                'json' => $params,
            ]);

            $token = $rsp->getHeader('AUTH_TOKEN');
            if (! empty($token)) {
                session(['authen_token' => str_replace('Bearer ', '', current($token))]);
                \MasterConstant::createSSO(str_replace('Bearer ', '', current($token)));
            }


            return json_decode($rsp->getBody(), true);
        } catch (\Exception $ex) {

            Log::error('PIO ERR | Connection Error By Api: '.$url);
            Log::error('PIO ERR | Connection Content: '.$ex->getMessage());
            throw new ApiException('Đã có lỗi, vui lòng thử lại sau');
        }
    }

    protected function baseClientUpload($url, $params)
    {
        try {
            $oClient = $this->getClient();
            $rsp = $oClient->post($url, [
                'multipart' => [$params]
            ]);

            $token = $rsp->getHeader('AUTH_TOKEN');
            if (! empty($token)) {
                session(['authen_token' => str_replace('Bearer ', '', current($token))]);
                \MasterConstant::createSSO(str_replace('Bearer ', '', current($token)));
            }
            return json_decode($rsp->getBody(), true);
        } catch (\Exception $ex) {
            Log::error('PIO ERR | Connection Error By Api: '.$url);
            Log::error('PIO ERR | Connection Content: '.$ex->getMessage());
            throw new ApiException('Đã có lỗi, vui lòng thử lại sau');
        }
    }

    /**
     * hỗ trợ striptag data
     * @param $arrData
     * @return array
     */
    protected function stripTagData($arrData)
    {
        $arrResult = [];
        foreach ($arrData as $key => $item) {
            $arrResult[$key] = strip_tags($item);
        }

        return $arrResult;
    }
}
