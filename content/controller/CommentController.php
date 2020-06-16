<?php

namespace blog\controller;

use blog\model\CommentManager;
use blog\model\ChapterManager;
use blog\classes\View;

class CommentController
{
    public function showComment($params)
    {

        extract($params);
        $manager = new CommentManager();
        $chapterManager = new ChapterManager();
        $currentComment = $manager->findComment($id);
        $chapters = $chapterManager->findAllChapter();
        $comments = $manager->findAllComment(); //stock le résultat de la fonction findAllChapter
        $myView = new View('comment');
        $myView->render(array(
            'comments' => $comments,
            'currentComment' => $currentComment,
            'chapters' => $chapters
        )); //execute render (mise en mémoire tampon du contenu désiré)

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
        $chapterManager = new ChapterManager();
        $comments = $manager->findAllComment();
        $chapters = $chapterManager->findAllChapter();
        $myView = new View('editComment');
        $myView->render(array(
            'comments' => $comments,
            'currentComment' => $currentComment,
            'chapters' => $chapters
        ));
    }
    public function addComment($params)
    {
        extract($params);
        $contentComment = trim($values['content']);
        if (empty($contentComment)) {
            session_start();
            $_SESSION['flash']['fail'] = 'Un commentaire vide ne peut être créé';
        } else {
            session_start();
            $params['pseudo'] = $_SESSION['pseudo'];
            $manager = new CommentManager();
            $manager->addComment($params);
            $_SESSION['flash']['success'] = 'Ce commentaire a bien été ajouté';
        }
        $myView = new View();
        $currentChapter = 'chapter/id/' . $id;
        $myView->redirect($currentChapter);
    }
    public function updateComment($params)
    {
        extract($params);
        $dataComment = $values;
        $manager = new CommentManager();
        $currentComment = $manager->findComment($dataComment['id']);
        $contentComment = trim($dataComment['content']);
        if (empty($contentComment)) {
            session_start();
            $_SESSION['flash']['fail'] = 'Un commentaire vide ne peut être édité';
            $chapterId = $currentComment->getChapterId();
        } else {
            $manager->updateComment($dataComment);
            $chapterId = $currentComment->getChapterId();
            session_start();
            $_SESSION['flash']['success'] = 'Ce commentaire a bien été édité';
        }
        $myView = new View();
        if (isset($admin)) {
            $myView->redirect('adminPanel');
        }
        $currentChapter = 'chapter/id/' . $chapterId;
        $myView->redirect($currentChapter);
    }
    public function deleteComment($params)
    {
        extract($params);
        $manager = new CommentManager();
        $currentComment = $manager->findComment($id);
        $chapterId = $currentComment->getChapterId();
        $manager->deleteComment($id);
        session_start();
        $_SESSION['flash']['success'] = 'Ce commentaire a bien été supprimé';
        $myView = new View();
        if (isset($admin)) {
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
        $_SESSION['flash']['success'] = 'Ce commentaire a bien été signalé';
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
        $_SESSION['flash']['success'] = 'Ce commentaire a bien été acquitté';
        $myView = new View();
        $myView->redirect('adminPanel');
    }
}
