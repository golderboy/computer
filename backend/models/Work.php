<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_work".
 *
 * @property integer $work_id
 * @property string $work_code
 * @property string $work_date
 * @property string $work_title
 * @property integer $item_id
 * @property string $work_user_text
 * @property integer $user_id
 * @property integer $dep_id
 * @property integer $sta_id
 * @property integer $work_user_id
 * @property string $work_text
 * @property string $work_end_date
 * @property string $d_update
 */
class Work extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_date', 'work_title', 'user_id', 'dep_id', 'd_update'], 'required'],
            [['work_date', 'work_end_date', 'd_update'], 'safe'],
            [['item_id', 'user_id', 'dep_id', 'sta_id', 'work_user_id'], 'integer'],
            [['work_user_text', 'work_text'], 'string'],
            [['work_code'], 'string', 'max' => 25],
            [['work_title'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'work_id' => 'Work ID',
            'work_code' => 'Work Code',
            'work_date' => 'Work Date',
            'work_title' => 'Work Title',
            'item_id' => 'Item ID',
            'work_user_text' => 'Work User Text',
            'user_id' => 'User ID',
            'dep_id' => 'Dep ID',
            'sta_id' => 'Sta ID',
            'work_user_id' => 'Work User ID',
            'work_text' => 'Work Text',
            'work_end_date' => 'Work End Date',
            'd_update' => 'D Update',
        ];
    }
}
