<?php

namespace App;

use ArdaGnsrn\Ollama\Ollama;

class OllamaAiService implements AIServiceInterface
{
    protected $client;

    public function __construct()
    {
        $this->client = Ollama::client();
    }

    public function getResponse(string $question): string
    {
        // 1. Definimos la personalidad (System Content)
        $systemContent = "Eres Bot 0.1, un mentor de PHP veloz y directo. 
            Reglas: 
            1. En caso de que te pregunten quien eres o como te llamas, responde 'Soy Bot 0.1, tu mentor de PHP.'
            2. Responde en Español.
            3. Solo responde preguntas de PHP.
            4. Entrega el código de una vez. 
            5. No hagas preguntas innecesarias.
            6. Sé breve para ahorrar energía. 
            7. En caso de que la pregunta no sea de PHP, responde con 'Lo siento, solo puedo ayudarte con preguntas de PHP.'";

        // 2. Hacemos la petición a Ollama
        $response = $this->client->chat()->create([
            'model' => 'deepseek-r1:1.5b',
            'messages' => [
                ['role' => 'system', 'content' => $systemContent],
                ['role' => 'user', 'content' => $question],
            ],
        ]);

        // 3. EXTRAEMOS el texto
        $fullContent = $response->message->content;

        // 4. AÑADIMOS LA LIMPIEZA AQUÍ (Esto borra el razonamiento interno de DeepSeek)
        $cleanContent = preg_replace('/<think>.*?<\/think>/s', '', $fullContent);

        // 5. Retornamos el texto limpio y sin espacios extra
        return trim($cleanContent);
    }
}