<?php

namespace Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Message extends Eloquent
{
    protected $table = 'messages';

    protected $primaryKey = 'id';

    /**
     * Every message is associated to a user
     *
     * @param none
     * @return Illuminate\Database\Eloquent\Relations\belongsTo - associated user
    */
    public function user()
    {
         return $this->belongsTo('\Model\User');
    }
}
