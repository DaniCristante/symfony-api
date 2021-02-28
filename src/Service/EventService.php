<?php

namespace App\Service;

use App\Repository\EventRepository;

class EventService
{
    private $eventRepository;

    public function __construct(
        EventRepository $eventRepository
    ) {
        $this->eventRepository = $eventRepository;
    }

    public function getAllEvents(): ?array
    {
        $events = $this->eventRepository->getAllEvents();

        return $events;
    }

    public function getEvent(int $id = null): array
    {
        if (\is_null($id)) {
            return [];
        }

        $event = $this->eventRepository->getEventById($id);

        return $event;
    }
}