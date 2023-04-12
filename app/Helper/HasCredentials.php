<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;

trait HasCredentials
{
    public function deleteCredentials(
        array|string $credentials,
        array $data
    ): array {
        if (is_string($credentials)) {
            $credentials = explode('|', $credentials);
        }

        foreach ($credentials as $credential) {
            unset($data[$credential]);
        }

        return $data;
    }

    public function fullNameCredential(
        array $credentials
    ): array {
        $credentials = array_merge($credentials, $this->splitName($credentials['full_name']));
        unset($credentials['full_name']);
        return $credentials;
    }

    public function updatePassword(Model $model, array $credentials): array
    {
        if (array_key_exists('password', $credentials) && !is_null($credentials['password'])) {
            $model->update([
                'password' => bcrypt($credentials['password'])
            ]);
        }

        return $this->deleteCredentials('password', $credentials);
    }

    private function splitName(string $full_name): array
    {
        $name_array = explode(' ', $full_name);

        $ret = [
            'name' => $name_array[1],
            's_name' => $name_array[0]
        ];

        if (count($name_array) === 3) {
            $ret['p_name'] = $name_array[2];
        }

        return $ret;
    }
}
