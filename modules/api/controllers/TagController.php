<?php

namespace app\modules\api\controllers;

use app\models\Tag;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class TagController extends Controller
{
    /**
     * @param $tag
     *
     * @return ActiveDataProvider
     */
    public function actionGetArticlesByTag($tag)
    {
        $tag = $this->findTag($tag);
        $query = $tag->getArticles();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    /**
     * @param $tag
     *
     * @return Tag
     * @throws NotFoundHttpException
     * @internal param $id
     *
     * @internal param $tag
     *
     * @internal param $category
     */
    protected function findTag($tag)
    {
        $model = Tag::findOne(['tag' => $tag]);
        if ($model === null) {
            throw new NotFoundHttpException('Tag does not exist');
        }

        return $model;
    }
}