<?php
namespace App\LaraFacades;
use Illuminate\Support\Facades\Facade;

class LaraFacadesDemo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'larafacades';
    }
}
