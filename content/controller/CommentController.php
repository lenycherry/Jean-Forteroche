<?php

namespace blog\controller;

use blog\model\CommentManager;
use blog\classes\View;

class CommentController
{
    public function showComment($params)
    {

        extract($params);
        $manager = new CommentManager();
        $currentComment = $manager->findComment($id);
        $comments = $manager->findAllComment(); //stock le résultat de la fonction findAllChapter
        $myView = new View('comment');
        $myView->render(array('comments' => $comments, 'currentComment' => $currentComment)); //execute render (mise en mémoire tampon du contenu désiré)

    }
    public function showEditComment($params)
    {
        extract($params);
        if (isset($id)) {
            $manager = new CommentManager();
            $currentComment = $manager->findComment($id);
        } else {
            $myView = new View();
            $myView->redirect('comment');
        }
        $comments = $manager->findAllComment();
        $myView = new View('editComment');
        $myView->render(array('comments' => $comments, 'currentComment' => $currentComment));
    }
    public function addComment($params)
    {
        session_start();
        extract($params);
        $params['pseudo'] = $_SESSION['pseudo'];
        $manager = new CommentManager();
        $manager->addComment($params);
        $myView = new View();
        $currentChapter = 'chapter/id/' . $id;
        $myView->redirect($currentChapter);
    }
    public function updateComment($params)
    {
        $dataComment = $_POST['values'];
        $manager = new CommentManager();
        $manager->updateComment($dataComment);
        $myView = new View();
        $myView->redirect('chapter');
    }
    public function deleteComment($params)
    {

        extract($params); 
        $manager = new CommentManager();
        $currentComment = $manager->findComment($id);
        $chapterId = $currentComment->getChapterId();
        $manager->deleteComment($id);
        $myView = new View(); 
        if(isset($admin)){
            $myView->redirect('adminPanel');
        }
        $currentChapter = 'chapter/id/' . $chapterId;
        $myView->redirect($currentChapter);
    }
    public function reportComment($params)
    {
        extract($params);
        $manager = new CommentManager();
        $currentComment = $manager->findComment($id);
        if ($currentComment->getAcquit() != 1) {
            $manager->reportComment($currentComment);
        }  
        $myView = new View();
        $chapterId = $currentComment->getChapterId();
        $currentChapter = 'chapter/id/' . $chapterId;
        $myView->redirect($currentChapter);
    }
    public function acquitComment($params)
    {
        extract($params);
        $manager = new CommentManager();
        $currentComment = $manager->findComment($id);

        if ($currentComment->getReported() > 0) {

            $manager->acquitComment($currentComment);
        }
        $myView = new View();
        $myView->redirect('adminPanel');
    }
    public function seenComment($params)
    {
        extract($params);
        $manager = new CommentManager();
        $currentComment = $manager->findComment($id);

        if ($currentComment->seen === 0) {

            $manager->seenComment($currentComment);
        }
        $myView = new View();
        $myView->redirect('chapter');
    }
}
