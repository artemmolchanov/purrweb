<?php

namespace app\modules\api\controllers;

use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    /**
     * @param $category
     *
     * @return ActiveDataProvider
     */
    public function actionGetArticlesByCategory($category)
    {
        $category = $this->findCategory($category);
        $query = $category->getArticles();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);

        return $dataProvider;
    }

    /**
     * @param $category
     *
     * @return Category
     * @throws NotFoundHttpException
     */
    protected function findCategory($category)
    {
        $model = Category::findOne(['category' => $category]);
        if ($model === null) {
            throw new NotFoundHttpException('Category does not exist');
        }

        return $model;
    }
}