<?php

namespace app\modules\api\controllers;

use app\models\Article;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller
{
    /**
     * @param $id
     *
     * @return Article
     * @throws NotFoundHttpException
     */
    public function actionGetArticleInfo($id)
    {
        $article = Article::findOne(['id' => $id]);

        if ($article === null) {
            throw new NotFoundHttpException('Article does not exist');
        }

        return $article;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     * @throws NotFoundHttpException
     */
    public function actionGetArticlesForToday()
    {
        $date = date("Y-m-d");
        $article = Article::find()->where(['date' => $date])->all();

        if ($article == null) {
            throw new NotFoundHttpException('Article does not exist');
        }

        return $article;
    }
}