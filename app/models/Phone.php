<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 24/01/2016
 * Time: 12:27 PM
 */

class Phone extends Eloquent {
    protected $table = 'phone_type';

    public function user()  {
        return $this->belongsTo('User');
    }
}