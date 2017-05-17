<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Useradmin;

/**
 * UseradminSearch represents the model behind the search form about `app\models\Useradmin`.
 */
class UseradminSearch extends Useradmin
{
    public function rules()
    {
        return [
            [['id', 'pname', 'sex', 'dep_id', 'status', 'created_at', 'updated_at', 'sta_id'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'fname', 'lname', 'email'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Useradmin::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'pname' => $this->pname,
            'sex' => $this->sex,
            'dep_id' => $this->dep_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sta_id' => $this->sta_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lanme', $this->lanme])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
