<?php

namespace App\Helpers;

use Vinkla\Hashids\Facades\Hashids;

class Helpers
{
    public static function encrypt($id)
    {
        return Hashids::connection('main')->encode($id);
    }

    public static function decrypt($hash)
    {
        return count(Hashids::connection('main')->decode($hash)) > 0 ? Hashids::connection('main')->decode($hash)[0] : null;
    }
}
