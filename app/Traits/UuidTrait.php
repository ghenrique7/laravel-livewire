<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UuidTrait
{
    protected static function boot ()
    {
        // Inicializa outras Traits na Model
        parent::boot();

        /**
         * Escuta o evento de criar na model
         * Usa o Str::uuid() para setar o id como Uuid
         */
        static::creating(function ($model) {
            if ($model->getKey() === null) {
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    // O uuid deve ser não incremental
    public function getIncrementing ()
    {
        return false;
    }

    // Ajuda da tipagem do uuid na aplicação
    public function getKeyType ()
    {
        return 'string';
    }
}
