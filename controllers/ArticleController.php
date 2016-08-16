<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\Message;

class ArticleController extends BaseController
{
    public $enableCsrfValidation = false;
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //获得文章详情
        $id = Yii::$app->request->get("id");
        $detail = Article::find()
                           ->where(['id'=>$id])
                           ->asArray()
                           ->one();
        
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
        //评论
        $message_list = Message::find()
                                ->where(['level'=> Message::MESSAGE_LEVEL_FIRST])
                                ->orderBy("createTime desc")
                                ->asArray()
                                ->all();
        $message_count = count($message_list);
        //找一下楼中楼的数据
        foreach ($message_list as $key=>$message){
            if(Message::MESSAGED_NO == $message['isMessaged']){
                $message_list[$key]['recvCount'] = 0;
                continue;
            }
            $messaged_info_list = Message::find()
                                          ->where(['parentId' => $message['id']])
                                          ->orderBy(" createTime desc")
                                          ->asArray()
                                          ->all();
            foreach ($messaged_info_list as $k=>$messageChild){
                $count = Message::find()->where(['toId'=>$messageChild['id']])->count();
                $messaged_info_list[$k]['recvCount'] = $count;
            }
            $message_list[$key]['list'] = $messaged_info_list;
            $message_list[$key]['recvCount'] = count($messaged_info_list);
        }
        
        $arr_render = array(
            'detail' => $detail,
            'articleList' => $articleList,
            'blogArticleList' => $blogArticleList,
            'tagList'  => $tag_arr,
            'messageList' => $message_list,
        );
        return $this->render('index', $arr_render);
    }
    /**
    * @date: 2016年8月14日 上午12:01:26
    * @author: louzhiqiang
    * @return:
    * @desc:   博文的添加页面
    */
    public function actionAdd(){
        return $this->render("add");
    }
    /**
    * @date: 2016年8月14日 上午12:01:47
    * @author: louzhiqiang
    * @return:
    * @desc:   博文的添加动作
    */
    public function actionCreate(){
        $content = Yii::$app->request->post('content');
        $userId = "123";
        $userName = "shuaife";
        $title = Yii::$app->request->post("title");
        $file = $_FILES['img'];
        $author = Yii::$app->request->post("author");
        $tag  = Yii::$app->request->post("tag");
        $ext = substr($file['type'], strpos($file['type'], "/") + 1);
        if(strpos(php_uname("s"), "NT")){
            $path = dirname(__FILE__)."\\..\\web\\assets\\upload\\";
        }else{
            $path = dirname(__FILE__)."/../web/assets/upload/";
        }
        if(!file_exists($path)){
            mkdir($path, 777);
        }
        $fileName = time().".".$ext;
        $real_path = $path.$fileName;
        move_uploaded_file($file["tmp_name"],$real_path);
        $real_fileName = "/assets/upload/".$fileName;
        $model = new Article();
        $model->content = $content;
        $model->author = $author;
        $model->createTime = time();
        $model->tag = "|".$tag."|";
        $model->title = $title;
        $model->imgUrl = $real_fileName;
        
        $model->save();
        
        $this->redirect("/");
        
    }
}
