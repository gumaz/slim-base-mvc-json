<?php

namespace Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $hidden = array('password');

    /**
     * User has many messages
     *
     * @param none
     * @return Illuminate\Database\Eloquent\Relations\hasMany - associated messages
    */
    public function messages()
    {
         return $this->hasMany('\Model\Messages');
    }
}