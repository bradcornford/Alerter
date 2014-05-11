<?php namespace Cornford\Alerter\Contracts;

interface TypeableInterface {

	/**
	 * Return the an alert type error.
	 *
	 * @param string $content
	 *
	 * @return \Cornford\Alerter\Alert
	 */
	public static function error($content);

	/**
	 * Return the an alert type .
	 *
	 * @param string $content
	 *
	 * @return \Cornford\Alerter\Alert
	 */
	public static function info($content);

	/**
	 * Return the an alert type warning.
	 *
	 * @param string $content
	 *
	 * @return \Cornford\Alerter\Alert
	 */
	public static function warning($content);

	/**
	 * Return the an alert type success.
	 *
	 * @param string $content
	 *
	 * @return \Cornford\Alerter\Alert
	 */
	public static function success($content);

	/**
	 * Return the an alert type none.
	 *
	 * @param string $content
	 *
	 * @return \Cornford\Alerter\Alert
	 */
	public static function none($content);

}
