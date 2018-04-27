<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //与模型关联的数据表

    protected $table = 'my_flights';

    //模型是否被自动维护时间戳

    public $timestamps = false;

    /**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    /**
     * 此模型的连接名称。
     *
     * @var string
     */
    protected $connection = 'connection-name';
}
