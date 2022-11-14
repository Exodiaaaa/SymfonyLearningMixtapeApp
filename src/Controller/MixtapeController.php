<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class MixtapeController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/')]
    public function home(): Response
    {
        $songs=[
            ['song'=>'Gangsta\'s Paradise' ,'singer'=> 'Coolio'],
            ['song'=>'Alone' ,'singer'=> 'Maduk'],
            ['song'=>'Die of you' ,'singer'=> 'Grabitzz'],
            ['song'=>'Rendez-vous' ,'singer'=> 'tunsi'],

        ];
        return $this->render('mixtape/home.html.twig', [
            'title'=>'Mickel Jackson',
            'songs'=>$songs
        ]);
    }

    /**
     * @param string|null $slug
     * @return Response
     */
    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Type: '.u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All types';
        }

        return new Response($title);
    }
}
