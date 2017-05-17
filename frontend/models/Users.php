<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $pname
 * @property string $fname
 * @property string $lname
 * @property integer $sex
 * @property string $email
 * @property integer $dep_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $sta_id
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['pname', 'sex', 'dep_id', 'status', 'created_at', 'updated_at', 'sta_id'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['fname', 'lname'], 'string', 'max' => 200],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'pname' => 'Pname',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'sex' => 'Sex',
            'email' => 'Email',
            'dep_id' => 'Dep ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'sta_id' => 'Sta ID',
        ];
    }

    function getPrename()
  	  {
  		 return $this->hasOne(Pname::className(), ['id' => 'pname']);
  	  }

  	function getFullname()
  	  {
  		 return $this->prename->pname." ".$this->fname." ".$this->lname;
  	  }

  	function getSexname()
  	  {
  		 return $this->hasOne(Sex::className(), ['sex' => 'sex']);
  	  }

    function getDepname()
      {
      return $this->hasOne(Department::className(), ['dep_id' => 'dep_id']);
      }

}
