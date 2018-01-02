<?php

namespace app\modules\api\controllers;

use app\models\Author;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class AuthorController extends Controller
{
    /**
     * @param $id
     *
     * @return ActiveDataProvider
     */
    public function actionGetArticlesByAuthor($id)
    {
        $author = $this->findAuthor($id);
        $query = $author->getArticles();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);

        return $dataProvider;
    }

    /**
     * @param $id
     *
     * @return Author
     * @throws NotFoundHttpException
     */
    protected function findAuthor($id)
    {
        $model = Author::findOne(['id' => $id]);
        if ($model === null) {
            throw new NotFoundHttpException('Author does not exist');
        }

        return $model;
    }
}