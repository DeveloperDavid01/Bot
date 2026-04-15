<?php

namespace App;

class Chat
{

    public function __construct(
        private AIServiceInterface $aiService
    ){}

    public function start()
    {
        $this->welcome();
      
        while ($input = $this -> prompt()) {
            if ($this->exit($input)) {
                break;
            }

            $response = $this->aiService->getResponse($input);

            $this->output($response);

        }
    } 

    private function welcome()
    {
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

        echo "Ask anything to AI:";
        echo $bot0_1 . PHP_EOL;
    }

    private function prompt()
    {
        return readline("> ");
    }

    private function exit($input)
    {
        return trim($input) === "exit";
    }

    private function output($response)
    {
        echo $response . PHP_EOL;
    }
}
