<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_line".
 *
 * @property integer $id
 * @property string $line_token
 */
class Line extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_line';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['line_token'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'line_token' => 'Line Token',
        ];
    }
}
