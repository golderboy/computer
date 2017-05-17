<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Computer;

/**
 * ComputerSearch represents the model behind the search form about `app\models\Computer`.
 */
class ComputerSearch extends Computer
{
    public function rules()
    {
        return [
            [['item_id'], 'integer'],
            [['item_code', 'item_name', 'item_barnd', 'item_ip', 'item_own', 'item_reg', 'd_update'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Computer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'item_id' => $this->item_id,
            'item_reg' => $this->item_reg,
            'd_update' => $this->d_update,
        ]);

        $query->andFilterWhere(['like', 'item_code', $this->item_code])
            ->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'item_barnd', $this->item_barnd])
            ->andFilterWhere(['like', 'item_ip', $this->item_ip])
            ->andFilterWhere(['like', 'item_own', $this->item_own]);

        return $dataProvider;
    }
}
