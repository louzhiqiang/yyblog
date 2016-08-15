<?php

namespace app\controllers;

use Yii;
use app\models\Article;

class SiteController extends BaseController
{
    private $__pernum = 5;
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //首页文章数据
        $page = Yii::$app->request->get("page", 1);
        $start = ($page-1) * $this->__pernum;
        $list = Article::find()
                    ->offset($start)
                    ->limit($this->__pernum)
                    ->asArray()
                    ->all();
        $count = Article::find()
                    ->count();
        $totalPage = ceil($count/$this->__pernum);
        
        //归档数据
        $articleList = Article::find()
                    ->orderBy("createTime desc")
                    ->asArray()
                    ->all();
        
        //博文列表
        $blogArticleList = array_slice($articleList, 0, 5);
        
        //标签数据
        $tag_str = "";
        array_walk($articleList, function($v) use(&$tag_str){
            $tag_str .= "|".$v['tag'];
        });
        $tag_arr = array_filter(array_unique(explode("|", $tag_str)));
        
        $arr_render = array(
            'blogList' => $list,
            'totalPage'  => $totalPage,
            'page'     => $page,
            'articleList' => $articleList,
            'blogArticleList' => $blogArticleList,
            'tagList'  => $tag_arr,
        );
        return $this->render('index', $arr_render);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
