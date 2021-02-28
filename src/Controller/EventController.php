<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\EventService;
use App\Service\DecoderService;

class EventController extends AbstractController
{
    private const FIELD_ID = 'id';


    protected $eventService;
    protected $decoder;

    public function __construct(
        EventService $eventService,
        DecoderService $decoder
    ) {
        $this->eventService = $eventService;
        $this->decoder = $decoder;
    }

    public function getEvent(Request $request): Response
    {
        $id = $request->get(self::FIELD_ID);
        $event = $this->eventService->getEvent($id);
        return $this->json($event);
    }

    public function getEvents(): Response
    {
        return $this->json('hola');
    }
}
