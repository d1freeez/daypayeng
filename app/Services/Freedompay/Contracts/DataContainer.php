<?php

namespace App\Services\Freedompay\Contracts;

use Str;

abstract class DataContainer extends DataProvider
{
    protected function generateSig(array $request, string $method, string $salt = null): array
    {
        $request['pg_salt'] = $salt ?: $request['pg_salt'];
        ksort($request);
        array_unshift($request, $method);
        $request[] = $this->secret_key;

        $request['pg_sig'] = md5(implode(';', $request));

        unset($request[0], $request[1]);

        return $request;
    }

    protected function generateSalt(): string
    {
        return Str::random(32);
    }

    public function checkSig(array $data, string $method): bool
    {
        $this->serverAnswer = $data;
        $sign = $this->getServerAnswerParam('sig');
        $salt = $this->getServerAnswerParam('salt');
        unset($data['pg_sig'], $data['pg_salt']);
        $data = $this->generateSig($data, $method, $salt);
        return ($sign == $data['pg_sig']);
    }

    public function parseXML($request): array
    {
        return (array)(new \SimpleXMLElement($request['pg_xml']));
    }
}
