<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait Encryptable
{
    /**
     * Obtener los campos que deben ser encriptados.
     *
     * @return array
     */
    protected function getEncryptableFields()
    {
        return [];
    }

    /**
     * Obtener un atributo del modelo.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->getEncryptableFields()) && !is_null($value)) {
            return Crypt::decryptString($value);
        }

        return $value;
    }

    /**
     * Establecer un atributo del modelo.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->getEncryptableFields()) && !is_null($value)) {
            $value = Crypt::encryptString($value);
        }

        return parent::setAttribute($key, $value);
    }
} 