<?php

namespace App;

use Moloquent;

class Record extends Moloquent {
    protected $connection = 'mongodb';
    protected $collection = 'records';
}
