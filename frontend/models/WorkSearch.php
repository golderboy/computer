<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Work;

/**
 * WorkSearch represents the model behind the search form about `app\models\Work`.
 */
class WorkSearch extends Work
{
    public function rules()
    {
        return [
            [['work_id', 'item_id', 'user_id', 'dep_id', 'sta_id', 'work_user_id'], 'integer'],
            [['work_code', 'work_date', 'work_title', 'work_user_text', 'work_text', 'work_end_date', 'd_update'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Work::find()->where(['user_id' => Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'work_id' => $this->work_id,
            'work_date' => $this->work_date,
            'item_id' => $this->item_id,
            'user_id' => $this->user_id,
            'dep_id' => $this->dep_id,
            'sta_id' => $this->sta_id,
            'work_user_id' => $this->work_user_id,
            'work_end_date' => $this->work_end_date,
            'd_update' => $this->d_update,
        ]);

        $query->andFilterWhere(['like', 'work_code', $this->work_code])
            ->andFilterWhere(['like', 'work_title', $this->work_title])
            ->andFilterWhere(['like', 'work_user_text', $this->work_user_text])
            ->andFilterWhere(['like', 'work_text', $this->work_text]);

        return $dataProvider;
    }
}
