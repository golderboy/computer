<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_status_work".
 *
 * @property integer $sta_id
 * @property string $sta_name
 */
class Statuswork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_status_work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sta_name'], 'required'],
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
            'sta_name' => 'Sta Name',
        ];
    }
}
