<?php

namespace common\modules\create_recipes\models;

/**
 * This is the ActiveQuery class for [[Dishes]].
 *
 * @see Dishes
 */
class DishesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Dishes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Dishes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
