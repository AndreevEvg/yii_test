<?php

namespace app\controllers;

use app\models\Post;

class PostController extends AppController {
    
    public function actionIndex()
    {   
        //$posts = Post::find()->select('id, title, excerpt')->orderBy('id DESC')->all();
        
        //Пагинация постов
        $query = Post::find()->select('id, title, excerpt')->orderBy('id DESC');
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('index', [
            'posts' => $posts,
            'pages' => $pages,
        ]);
    }
    
    public function actionTest()
    {
        $test = "Hello Test!";
        
        return $this->render('test', [
            'test' => $test,
        ]);
    }
}
