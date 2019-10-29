<?php

namespace Modules\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function makeResult($oSelect)
    {
        if ($oSelect->count()) {
            return $oSelect->get()->toArray();
        }
        return [];
    }
}
