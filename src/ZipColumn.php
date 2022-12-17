<?php

namespace Parand\ZipColumn;

use Illuminate\Support\Facades\Http;

trait ZipColumn {
    
    public function getAttribute($key)
    {
        ///> 
        if (empty($this->complexes)) {
            return abort(402, "No attribute defiend, please define your attributes in complex array !");
        }

        if (in_array($key, $this->complexes)) {
            return explode(';', $this->attributes[$key]);
        }

        return parent::getAttribute($key);
    }

    public function setAttribute($key, $value)
    {

        if (empty($this->complexes)) {
            return abort(402, "No attribute defiend, please define your attributes in complex array !");
        }

        if (in_array($key, $this->complexes)) {
            return $this->attributes[$key] = implode(';', $value);
        } 

        return parent::setAttribute($key, $value);
    }
}