<?php
/**
 * Created by PhpStorm.
 * User: nnikitchenko
 * Date: 05.06.2016
 */

namespace components\Component\Quests\check;


class CheckerMagic extends BaseChecker
{
    public $magic_id;

    public function getCheckerType()
    {
        return self::ITEM_TYPE_MAGIC;
    }
}