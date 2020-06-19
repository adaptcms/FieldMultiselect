<?php

namespace Adaptcms\FieldMultiselect\Facades;

use Illuminate\Support\Facades\Facade;

class FieldMultiselect extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'FieldMultiselect';
    }
}
