<?php

namespace common\models;


use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{

    const STATUS_DELETED = 0;
    const STATUS_MODERATION = 5;
    const STATUS_APPROVED = 10;

    public static function tableName()
    {
        return 'comments';
    }

}
