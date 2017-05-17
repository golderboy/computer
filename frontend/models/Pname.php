<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_pname".
 *
 * @property integer $id
 * @property string $pname
 * @property string $sex
 * @property string $marrystatus
 */
class Pname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_pname';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex'], 'required'],
            [['pname'], 'string', 'max' => 100],
            [['sex', 'marrystatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pname' => 'Pname',
            'sex' => 'Sex',
            'marrystatus' => 'Marrystatus',
        ];
    }
}
