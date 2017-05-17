<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_computer".
 *
 * @property integer $item_id
 * @property string $item_code
 * @property string $item_name
 * @property string $item_barnd
 * @property string $item_ip
 * @property string $item_own
 * @property string $item_reg
 * @property string $d_update
 */
class Computer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_computer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'd_update'], 'required'],
            [['item_reg', 'd_update'], 'safe'],
            [['item_code'], 'string', 'max' => 50],
            [['item_name', 'item_own'], 'string', 'max' => 255],
            [['item_barnd'], 'string', 'max' => 200],
            [['item_ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'item_code' => 'เลขครุภัณฑ์',
            'item_name' => 'ชื่อเครื่อง',
            'item_barnd' => 'ยี่ห้อ',
            'item_ip' => 'Ip',
            'item_own' => 'เจ้าของเครื่อง',
            'item_reg' => 'วันที่รับเข้า',
            'd_update' => 'D Update',
        ];
    }

    function getItemfname()
      {
         return $this->item_name."_".$this->item_ip;
      }
}
