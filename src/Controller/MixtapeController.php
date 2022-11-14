<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class MixtapeController
{
    /**
     * @return Response
     */
    #[Route('/')]
    public function home(): Response
    {
        return new Response('Title: Mickel Jackson');
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
