<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongApiController extends AbstractController
{
    /**
     * @param int $id
     * @return Response
     */
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'], name: 'api_songs_get_one')]
    public function getSong(int $id, LoggerInterface $logger) : Response
    {
        $song = [
            'id'=>$id,
            'name'=>'Rick roll',
            'url'=>'https://symfonycasts.s3.amazonaws.com/sample.mp3'
        ];

        $logger->info('Returning API response for song {song}', [
            'song'=>$id
        ]);
       return new JsonResponse($song);
    }
}