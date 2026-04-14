<?php

namespace App;

use OpenAI;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        //cliente comentado para que no pida la Key
        // $this->client = OpenAI::client("$_ENV[OPENAI_API_KEY]");
    }

    public function getResponse(string $question): string
    {
        /* ESTE CÓDIGO ESTÁ DESACTIVADO (FALTA API KEY)
           
           
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
            ['role' => 'user', 'content' => $question]],
            ['role' => 'system', 'content' => "Eres Bot 0.1, un mentor de PHP veloz y directo. Reglas: 1. No hagas preguntas innecesarias. 2. Entrega el código de una vez. 3. Usa tipos de datos en PHP. 4. Sé breve para ahorrar energía."],
        ]);
        return $response['choices'][0]['message']['content'];
        */

        return "Aquí respondería OpenAI, pero el servicio está deshabilitado para ahorrar costos. Usa el servicio de Ollama.";
    }
}