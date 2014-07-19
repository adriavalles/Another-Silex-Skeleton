<?php

namespace MyApplication\Controllers;

use Twig_Environment;
use Symfony\Component\HttpFoundation\Response;

class Error
{
    /**
     * Template engine.
     *
     * @var Twig_Environment
     */
    private $template_engine;

    /**
     * Debug must be shown?
     *
     * @var boolean
     */
    private $is_debug_enabled;

    /**
     * Class construct.
     *
     * @param Twig_Environment $template_engine Template engine to render templates.
     * @param boolean $is_debug_enabled Debug enabled.
     */
    public function __construct(Twig_Environment $template_engine, $is_debug_enabled)
    {
        $this->template_engine  = $template_engine;
        $this->is_debug_enabled = $is_debug_enabled;
    }

    /**
     * Handling errors.
     *
     * @param integer $error_code Error code.
     * @return Response
     */
    public function handleAction($error_code)
    {
        if ($this->is_debug_enabled) {
            return;
        }

        // 404.html, or 4xx.html, or error.html
        $templates = array(
            'errors/' . $error_code . '.twig',
            'errors/' . substr($error_code, 0, 1) . 'xx.twig',
            'errors/default.twig',
        );

        return new Response(
            $this->template_engine->resolveTemplate($templates)->render(array('code' => $error_code)),
            $error_code
        );
    }
}