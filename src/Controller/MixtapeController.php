<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use function Symfony\Component\String\u;

class MixtapeController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/', name: 'app_homepage')]
    public function home(Environment $twig): Response
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
    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('mixtape/browse.html.twig', [
            'genre'=>$genre
        ]);
    }
}
