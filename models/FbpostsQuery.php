<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Fbposts]].
 *
 * @see Fbposts
 */
class FbpostsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Fbposts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Fbposts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}