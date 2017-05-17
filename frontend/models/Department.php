<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_department".
 *
 * @property integer $dep_id
 * @property string $dep_name
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dep_name'], 'required'],
            [['dep_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dep_id' => 'Dep ID',
            'dep_name' => 'Dep Name',
        ];
    }
}
