<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\Message;

class MessageController extends BaseController
{
    public $enableCsrfValidation = false;
    /**
    * @date: 2016年8月14日 上午12:01:26
    * @author: louzhiqiang
    * @return:
    * @desc:   留言的添加页面
    */
    public function actionAdd(){
//         $articleId
//         $content
//         //如果是回复某条评论  把回复的那条评论
//         $parentId
        $articleId = Yii::$app->request->post("articleId");
        $content = Yii::$app->request->post("content");
        $toId      = Yii::$app->request->post("toId");
        $model = new Message();
        $model->createTime = time();
        $model->userId = ip2long($_SERVER['REMOTE_ADDR']);
        $model->userName = $_SERVER['REMOTE_ADDR'];
        if(!$toId){
            $model->level = Message::MESSAGE_LEVEL_FIRST;
            $model->parentId = 0;
        }else{
            $model->level = Message::MESSAGE_LEVEL_SEC;
            //更新被恢复
            $toIdInfo = Message::findOne(['id'=>$toId]);
            if($toIdInfo->level == Message::MESSAGE_LEVEL_FIRST){
                $toIdInfo->isMessaged = Message::MESSAGED_YES;
                $model->parentId = $toId;
            }else{
                $model->parentId = $toIdInfo['parentId'];
            }
            $toIdInfo->save();
            $model->toId = $toId;
            $model->toUid = $toIdInfo['userId'];
            $model->toUserName = $toIdInfo['userName'];
        }
        $model->articleId = $articleId;
        $model->content = $content;
        $model->userPhoto = "/assets/img/de-face.jpg";
        $model->save();
        exit(json_encode(array("code"=>0)));
    }
    /**
    * @date: 2016年8月14日 下午9:23:39
    * @author: louzhiqiang
    * @return:
    * @desc:   顶
    */
    public function actionAcc(){
        $messageId = Yii::$app->request->post("id");
        $info = Message::findOne(['id'=>$messageId]);
        $info->acc += 1;
        if($info->save()){
            exit(json_encode(array('code' => 0)));
        }else{
            exit(json_encode(array('code' => 1)));
        }
    }
    /**
     * @date: 2016年8月14日 下午9:23:39
     * @author: louzhiqiang
     * @return:
     * @desc:   踩
     */
    public function actionRef(){
        $messageId = Yii::$app->request->post("id");
        $info = Message::findOne(['id'=>$messageId]);
        $info->ref += 1;
        if($info->save()){
            exit(json_encode(array('code' => 0)));
        }else{
            exit(json_encode(array('code' => 1)));
        }
    }
}
