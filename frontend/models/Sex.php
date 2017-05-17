<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_sex".
 *
 * @property integer $sex
 * @property string $sexname
 */
class Sex extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_sex';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'sexname'], 'required'],
            [['sex'], 'integer'],
            [['sexname'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sex' => 'Sex',
            'sexname' => 'Sexname',
        ];
    }
}
