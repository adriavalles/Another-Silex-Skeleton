<?php

namespace MyApplication\Services;

class WelcomeMessages
{
    /**
     * Some welcome messages :)
     *
     * @var array
     */
    protected $welcome_messages = array(
        'Hello',
        'Bonjour',
        'Ciao',
        'Hola'
    );

    /**
     * Gets a random welcome message.
     *
     * @return string
     */
    public function getRandomMessage()
    {
        return $this->welcome_messages[array_rand($this->welcome_messages)];
    }
}