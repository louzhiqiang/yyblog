<?php
namespace app\models;

use yii\db\ActiveRecord;

class Message extends ActiveRecord{
    const MESSAGE_LEVEL_FIRST = 1;//主楼
    const MESSAGE_LEVEL_SEC = 2;//楼中楼
    
    const MESSAGED_NO = 1;//否
    const MESSAGED_YES = 2;//是
    public static function tableName() {
        return '{{%message}}';
    }



}