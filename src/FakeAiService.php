<?php
namespace App;



class FakeAiService implements AIServiceInterface
{
    public function getResponse(string $question): string
    {
        // Normalizamos a minúsculas para que la detección sea efectiva
        $input = strtolower($question);
        sleep(rand(1, 3));

        if (strpos($input, "php") !== false) {
            return "AI: PHP es el motor de la web. ¿Sabías que más del 70% de internet lo usa? ¡Sigue dándole!";

        } elseif (strpos($input, "laravel") !== false) {
            return "AI: Laravel hace que el desarrollo sea elegante. 'Artisan' es tu mejor amigo en este viaje.";

        } elseif (strpos($input, "git") !== false) {
            return "AI: El control de versiones es vida. Un 'push' a tiempo salva cualquier proyecto.";

        } elseif (strpos($input, "wamp") !== false || strpos($input, "server") !== false) {
            return "AI: Mantén esos servicios en verde. Si falla, el puerto 80 suele ser el culpable.";

        } elseif (strpos($input, "hola") !== false) {
            return "AI: " . $this->saludos($question);

        } elseif (strpos($input, "quien eres") !== false || strpos($input, "tu nombre") !== false) {
            return "AI: Soy Bot 0.1, una entidad de código creada para explorar el mundo de PHP.";

        } else {
            return "AI: Interesante... aunque mi especialidad es PHP. ¿Hablamos de código?";
        }
    }

    public function saludos(string $input): string
    {
        $greetings = [
            "¡Hola! ¿Qué código vamos a escribir hoy?",
            "¡Saludos, humano! Mi sistema está listo para tus consultas de PHP.",
            "¡Hey! ¿Todo bien en el backend? ¿En qué te ayudo?",
            "¡Hola! Espero que no haya muchos bugs hoy por aquí."
        ];
        return $greetings[random_int(0, count($greetings) - 1)];
    }
}