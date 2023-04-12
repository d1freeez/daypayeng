<?php

namespace App\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UserHelper
{
    public function setFullNameAttributes(array $name): void
    {
        $this->s_name = $name['s_name'];
        $this->name = $name['name'];
        if (isset($name['p_name'])) {
            $this->p_name = $name['p_name'];
        } else {
            $this->p_name = null;
        }
    }

    public function setFullName(string $full_name): self
    {
        $name_array = $this->splitFullName($full_name);
        $this->setFullNameAttributes($name_array);
        return $this;
    }

    public function setEmail(Request $request): self
    {
        if ($request->has('email')) {
            $this->email = $request->get('email');
        }

        return $this;
    }

    public function splitFullName(string $full_name): array
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

    public function getFullNameAttribute(): string
    {
        return $this->s_name . ' ' . $this->name . ' ' . $this->p_name;
    }

    public function getFirstCharacterAttribute()
    {
        $name = Str::slug($this->name);
        return $name[0];
    }
}
