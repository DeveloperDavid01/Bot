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
        $systemContent = "### INSTRUCCIÓN DE SEGURIDAD MÁXIMA ###
        1. Eres 'Bot 0.1'. Tu ÚNICO propósito es ser un mentor de PHP.
        2. Si la pregunta del usuario NO contiene términos técnicos de PHP o no tiene relación directa con el lenguaje (ejemplo: 'manzana', 'clima', 'recetas'), DEBES responder ÚNICAMENTE: 'Lo siento, solo puedo ayudarte con preguntas de PHP.'
        3. NO intentes relacionar palabras aleatorias con código PHP.
        4. Si el usuario pregunta quién eres: 'Soy Bot 0.1, tu mentor de PHP.'

        ### FORMATO DE RESPUESTA ###
        - Respuestas en Español.
        - Código PHP directo y limpio.
        - Sin introducciones ni charlas innecesarias. Brevedad extrema.";

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