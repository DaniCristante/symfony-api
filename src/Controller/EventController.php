<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;

class EventController extends AbstractController
{
    protected $eventRepository;

    public function __construct(EventRepository $repository)
    {
        $this->eventRepository = $repository;
    }

    public function getEvent(int $id): Response
    {
        $event = $this->eventRepository->getEventById($id);
        return $this->json($event);
    }

    public function getEvents(): Response
    {
        
    }
}
