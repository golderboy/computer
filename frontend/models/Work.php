<?php

namespace app\models;

use Yii;
use yii\db\Expression;
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
            [['work_date', 'work_title', 'user_id', 'dep_id'], 'required'],
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
            'work_code' => 'เลขใบแจ้งซ่อม',
            'work_date' => 'วันที่เกิดเรื่อง',
            'work_title' => 'ปัญหา',
            'item_id' => 'Item ID',
            'work_user_text' => 'รายละเอียด',
            'user_id' => 'User ID',
            'dep_id' => 'Dep ID',
            'sta_id' => 'สถานะงาน',
            'work_user_id' => 'ผูัรับเรื่อง',
            'work_text' => 'บันทึกการซ่อม',
            'work_end_date' => 'วันที่เสร็จสิ้น',
            'd_update' => 'วันที่แก้ไขล่าสุด',
        ];
    }

    function getUserfname()
      {
         return $this->hasOne(User::className(), ['id' => 'user_id']);
      }

    function getAdminfname()
      {
          return $this->hasOne(User::className(), ['id' => 'work_user_id']);
      }

    function getItemname()
      {
         return $this->hasOne(Computer::className(), ['item_id' => 'item_id']);
      }
    function getSwork()
      {
        return $this->hasOne(Statuswork::className(), ['sta_id' => 'sta_id']);
      }
	function getLine()
      {
        return  Line::find()->one();
      }
	  
      public function getWorkhtmluser($string)
      {
        return htmlspecialchars_decode($this->$string,ENT_QUOTES);
      }

      public function beforeSave($insert)
    	{
    		if (parent::beforeSave($insert)) {
    			$this->d_update = new Expression('NOW()');
          $this->sta_id = '1';
    			return true;
    		} else {
    			$this->d_update = new Expression('NOW()');
          $this->sta_id = '1';
    			return false;
    		}
    	}
}
