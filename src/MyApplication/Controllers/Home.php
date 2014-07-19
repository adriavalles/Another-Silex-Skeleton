<?php

namespace MyApplication\Controllers;

use Twig_Environment;
use MyApplication\Services\WelcomeMessages;

class Home
{
    /**
     * Template service provider.
     *
     * @var Twig_Environment
     */
    private $template_engine;

    /**
     * Welcome messages service.
     *
     * @var WelcomeMessages
     */
    private $welcome_messages;

    /**
     * Builds class with its dependencies.
     *
     * @param Twig_Environment $template_engine Used to render our views.
     * @param WelcomeMessages $welcome_messages Service to get welcome messages.
     */
    public function __construct(Twig_Environment $template_engine, WelcomeMessages $welcome_messages)
    {
        $this->template_engine  = $template_engine;
        $this->welcome_messages = $welcome_messages;
    }


    /**
     * My home page.
     *
     * @param string $who Who are we going to say hello.
     * @return string
     */
    public function homeAction($who)
    {
        $hello = $this->welcome_messages->getRandomMessage();
        return $this->template_engine->render('index.twig', array('hello' => $hello, 'who' => $who));
    }
}