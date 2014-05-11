<?php namespace Cornford\Alerter\Contracts;

interface AlertableInterface {

	/**
	 * Create a new alerter instance.
	 *
	 * @param string $content
	 * @param string $type
	 *
	 * @return self
	 */
	public static function create($content, $type);

	/**
	 * Return the stored alert content.
	 *
	 * @return string
	 */
	public function getContent();

	/**
	 * Return the stored alert type.
	 *
	 * @return string
	 */
	public function getType();

	/**
	 * Return the stored alert variable if it exists.
	 *
	 * @param string $variable ob
	 *
	 * @return string
	 */
	public function __get($variable);

}
