<?php namespace Cornford\Alerter\Contracts;

interface DisplayableInterface {

	/**
	 * Create a new alert display instance.
	 *
	 * @param \Cornford\Alerter\Alert $alert
	 * @param string                  $viewPath
	 * @param string                  $view
	 *
	 * @return self
	 */
	public function __construct(\Cornford\Alerter\Alert $alert, $viewPath, $view);

	/**
	 * Return a compiled alert display view.
	 *
	 * @return string
	 */
	public function display();

}
