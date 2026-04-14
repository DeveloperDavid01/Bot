<?php

namespace App;

use OpenAI;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        //cliente comentado para que no pida la Key
        // $this->client = OpenAI::client("sk-...");
    }

    public function getResponse(string $question): string
    {
        /* ESTE CÓDIGO ESTÁ DESACTIVADO (FALTA API KEY)
           
           
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [['role' => 'user', 'content' => $question]],
        ]);
        return $response['choices'][0]['message']['content'];
        */

        return "Aquí respondería OpenAI, pero el servicio está deshabilitado para ahorrar costos. Usa el servicio de Ollama.";
    }
}