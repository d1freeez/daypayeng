<?php

namespace App\Services\Freedompay\Contracts;

use Exception;
use SimpleXMLElement;

abstract class DataProvider
{
    protected array $serverAnswer = [];

    public function send(string $method): bool
    {
        if($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $this->base_url . $method);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->request);
            $xml = new SimpleXMLElement(curl_exec($curl));
            curl_close($curl);
            if($xml->xpath('//pg_error_code')) {
                $exception = new Exception($xml->xpath('//pg_error_code')[0]
                    . ':' .
                    $xml->xpath('//pg_error_description')[0]
                    . PHP_EOL
                );
                logger($exception->getMessage());
                return false;
            }
            $this->serverAnswer = (array) $xml;
            return true;
        }
        return false;
    }

    public function getServerAnswerParam(string $param): string
    {
        return $this->serverAnswer['pg_'.$param];
    }

    public function getFullServerAnswer(): ?array
    {
        return $this->serverAnswer;
    }
}
