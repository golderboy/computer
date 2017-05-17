<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_user_status".
 *
 * @property integer $sta_id
 * @property string $sta_code
 * @property string $sta_name
 */
class Userstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_user_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sta_code', 'sta_name'], 'required'],
            [['sta_code'], 'string', 'max' => 2],
            [['sta_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sta_id' => 'Sta ID',
            'sta_code' => 'Sta Code',
            'sta_name' => 'Sta Name',
        ];
    }
}
