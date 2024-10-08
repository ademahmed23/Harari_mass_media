<?php
namespace App\Http\Controllers;
   
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
   
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
   
        $botman->hears('{message}', function($botman, $message) {
   
            if (in_array(strtolower($message), ['hi', 'hello'])) {
                $this->askName($botman);
            } else if (stripos($message, 'harari') !== false) {
                $this->provideHarariInfo($botman);
            } else {
                $botman->reply("Start a conversation by saying hi or ask about the Harari Regional State.");
            }
   
        });
   
        $botman->listen();
    }
   
    /**
     * Ask the user for their name.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your name?', function(Answer $answer, $conversation) {
   
            $name = $answer->getText();
   
            $this->say('Nice to meet you, '.$name);
            $conversation->ask('Can you provide your email?', function(Answer $answer, $conversation) {
                $email = $answer->getText();
                $this->say('Email: '.$email);

                $this->provideHarariInfo($conversation);
            });
        });
    }

    /**
     * Provide information about Harari Regional State.
     */
    public function provideHarariInfo($botman)
    {
        $botman->ask('What would you like to know about Harari Regional State?', function(Answer $answer, $conversation) {
            $question = $answer->getText();
            $response = $this->getHarariInfo($question);
            $this->say($response);
        });
    }

    /**
     * Get information about Harari Regional State based on the user's question.
     */
    public function getHarariInfo($question)
    {
        // Define possible responses based on the question
        $responses = [
            'history' => 'Harari Regional State has a rich history dating back several centuries. It is known for its unique culture and heritage.',
            'culture' => 'Harari culture is known for its distinct language, traditional clothing, and unique architectural styles.',
            'location' => 'Harari Regional State is located in the eastern part of Ethiopia, surrounded by the Oromia Region.',
            'population' => 'The population of Harari Regional State is diverse, with a mix of different ethnic groups living in harmony.',
            'economy' => 'The economy of Harari Regional State is primarily based on agriculture, with chat (khat) being one of the main cash crops.'
        ];

        // Find a relevant response based on the question
        foreach ($responses as $key => $response) {
            if (stripos($question, $key) !== false) {
                return $response;
            }
        }

        return "I'm not sure about that. Can you ask something specific about Harari Regional State?";
    }
}
