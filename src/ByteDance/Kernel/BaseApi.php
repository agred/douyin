<?php

namespace ByteDance\Kernel;

/**
 * 内核
 * Class BaseApi
 * @package ByteDance\Douyin\Kernel
 */
class BaseApi
{

    const SDK_VER = '1.0.8';

    const DOUYIN_API  = "https://open.douyin.com";
    const TOUTIAO_API = "https://open.snssdk.com";
    const XIGUA_API   = "https://open-api.ixigua.com";
    public $client_key    = null;
    public $client_secret = null;

    public $response = null;

    public function __construct($config)
    {
        $this->client_key = $config['client_key'];
        $this->client_secret = $config['client_secret'];
    }

    public function toArray()
    {
        return $this->response ? json_decode($this->response, true) : true;
    }

    public function cloud_https_post($url, $data = [])
    {
        $data['client_key'] = $this->client_key;
        $data['client_secret'] = $this->client_secret;
        $result = $this->https_request($url, $data);
        return json_decode($result, true);
    }

    public function https_get($url , $params = []){
        if($params){
            $url = $url . '?' . http_build_query($params);
        }
        $result = $this->https_request($url);
        return json_decode($result, true);
    }

    public function https_post($url, $data = []){
        $header = [
            'Accept:application/json' , 'Content-Type:application/json'
        ];
        $result = $this->https_request($url, json_encode($data), $header);
        return json_decode($result, true);
    }

    public function https_request($url, $data = null, $headers = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        if (!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }
        if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
            curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        $output = curl_exec($curl);
        curl_close($curl);
        return ($output);
    }

    public function https_byte($url, $file)
    {
        $payload = '';
        $params = "--__X_PAW_BOUNDARY__\r\n"
            . "Content-Type: application/x-www-form-urlencoded\r\n"
            . "\r\n"
            . $payload . "\r\n"
            . "--__X_PAW_BOUNDARY__\r\n"
            . "Content-Type: video/mp4\r\n"
            . "Content-Disposition: form-data; name=\"video\"; filename=\"test.mp4\"\r\n"
            . "\r\n"
            . file_get_contents($file) . "\r\n"
            . "--__X_PAW_BOUNDARY__--";

        $first_newline = strpos($params, "\r\n");
        $multipart_boundary = substr($params, 2, $first_newline - 2);
        $request_headers = array();
        $request_headers[] = 'Content-Length: ' . strlen($params);
        $request_headers[] = 'Content-Type: multipart/form-data; boundary=' . $multipart_boundary;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
            curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        $output = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($output, true);
        return $result['data'];
    }

    public function https_file($url, $file)
    {
        $curl = curl_init();
        if(class_exists('\CURLFile')){
            curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, true);
            $data = array('media' => new \CURLFile($file));
        }else{
            if (defined ( 'CURLOPT_SAFE_UPLOAD' )) {
                curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, false );
            }
            $data = array('media' => '@' . realpath($file));
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output, true);
    }

}
