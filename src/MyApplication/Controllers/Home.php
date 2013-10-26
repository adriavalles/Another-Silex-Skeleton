<?php

namespace MyApplication\Controllers;

class Home
{
	/**
	 * Template service provider.
	 *
	 * @var \Twig_Environment
	 */
	private $template_engine;

	/**
	 * Builds class with its dependencies.
	 *
	 * @param \Twig_Environment $template_engine Used to render our views.
	 */
	public function __construct( \Twig_Environment $template_engine )
	{
		$this->template_engine = $template_engine;
	}


	/**
	 * My home page.
	 *
	 * @param string $who Who are we going to say hello.
	 * @return string
	 */
	public function homeAction( $who )
	{
		return $this->template_engine->render( 'index.twig', array( 'who' => $who ) );
	}
}