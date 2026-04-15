<?php

namespace App;

class Chat
{

    public function __construct(
        private AIServiceInterface $aiService
    ){}

    public function start()
    {
        echo "Ask anything to AI:";
        $bot0_1 =
        "/n
          <-o->
        ____|___
        |        |
        |  O   o |
        |   ___  |
        |________|
        /n
        Hola soy bot0.1, tu asistente de inteligencia artificial. Estoy aquí para ayudarte con cualquier pregunta o tarea que tengas (relacionada con php).
        # Ten en cuenta que soy una versión básica en fase beta, así que mis respuestas pueden ser limitadas, haré lo mejor posible para asistirte.
        ";

        echo $bot0_1 . PHP_EOL;


        while (true) {
            $input = readline(" > ");

            if (strtolower($input) === "exit" || $input === "") {
                break;
            }

            $response = $this->aiService->getResponse($input);

            echo $response . PHP_EOL;

        }
    } 
}