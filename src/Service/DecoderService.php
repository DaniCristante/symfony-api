<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;

class DecoderService
{
    public function decode(Request $request)
    {
        return \json_decode($request->getContent(), true);
    }
}