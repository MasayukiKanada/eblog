<?php

namespace App\Constants;

class Common
{
    const ORDER_LATER = '0';
    const ORDER_OLDER = '1';

    const SORT_ORDER = [
        'later' => self::ORDER_LATER,
        'older' => self::ORDER_OLDER,
    ];
}
