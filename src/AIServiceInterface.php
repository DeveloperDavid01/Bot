<?php

namespace App;

interface AIServiceInterface
{
    public function getResponse(string $input): string;
}