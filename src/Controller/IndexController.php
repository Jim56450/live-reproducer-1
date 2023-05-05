<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function getParentChildComponentDir(): string
    {
        return dirname(__DIR__).'/../templates/components/';
    }
    public function getParentChildCommentDir(): string
    {
        return dirname(__DIR__).'/../comments/';
    }

    public function getParentChildComponentArgumentContent(int $id): string
    {
        $fileDirectory = $this->getParentChildComponentDir();
        $fileName = $fileDirectory."parent$id.html.twig";
        if (!file_exists($fileName))
            return "File '$fileName' missing";
        $parentComponentContent = file_get_contents($fileName);

        return (preg_match('/(?s)(?<={{ component)(.*?)(?=}})/', $parentComponentContent, $matches)>0) ?
            '{{ component'.$matches[0].'}}' : '';
    }

    public function getParentChildComponentArgumentComment(int $id): string
    {
        $fileDirectory = $this->getParentChildCommentDir();
        $fileName = $fileDirectory."parent$id.comment.html";
        if (!file_exists($fileName))
            return "File '$fileName' is missing";
        return file_get_contents($fileName);
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', []);
    }
    #[Route('/tab/{id}', name: 'app_tab_by_id')]
    public function indexTabById(int $id = 1): Response
    {
        $options = [
            1 => [
                    'child_component' => $this->getParentChildComponentArgumentContent(1),
                    'comment'   => $this->getParentChildComponentArgumentComment(1)
                ],
            2 => [
                    'child_component' => $this->getParentChildComponentArgumentContent(2),
                    'comment'   => $this->getParentChildComponentArgumentComment(2)
                ],
            3 => [
                    'child_component'   => $this->getParentChildComponentArgumentContent(3),
                    'comment' => $this->getParentChildComponentArgumentComment(3)
                ]
        ];

        $id = array_key_exists($id, $options) ? $id: 1;

        return $this->render('index/component-tab.html.twig', [
            'id' => $id,
            'options' => $options[$id],
            'component_name' => "parent$id",
            'controller_name' => 'Parent'.$id.'Component.php'
        ]);
    }
}
