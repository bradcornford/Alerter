<?php namespace Cornford\Alerter;

use Cornford\Alerter\Contracts\AlertableInterface;
use Cornford\Alerter\Exceptions\AlertContentException;
use Cornford\Alerter\Exceptions\AlertTypeException;
use Cornford\Alerter\Exceptions\AlertVariableException;
use Illuminate\Support\Facades\Config;

class Alert extends AlertType implements AlertableInterface {

	/**
	 * The content of the alert.
	 *
	 * @var string
	 */
	protected $content;

	/**
	 * The type of the alert.
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * The view of the alert.
	 *
	 * @var string
	 */
	protected $view = 'simple';

	/**
	 * Construct a new alerter instance.
	 *
	 * @param string $type
	 * @param string $content
	 *
	 * @return self
	 */
	private function __construct($type, $content)
	{
		$this->type = $type;
		$this->content = $content;

        $viewPath = '';
        $view = '';

        if (class_exists('Config')) {
            $viewPath = Config::get('alerter::path');
            $view = Config::get('alerter::alert');
        }

		$this->viewPath = $viewPath ?: dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Views';
		$this->view = $view ?: AlertDisplay::VIEW_SIMPLE;
	}

	/**
	 * Create a new alerter instance.
	 *
	 * @param string $type
	 * @param string $content
	 *
	 * @return self
	 *
	 * @throws \Cornford\Alerter\Exceptions\AlertContentException
	 * @throws \Cornford\Alerter\Exceptions\AlertTypeException
	 */
	public static function create($type, $content)
	{
		if (empty($type)) {
			throw new AlertTypeException('Unable to create message with invalid type.');
		}

		if (empty($content)) {
			throw new AlertContentException('Unable to create message with invalid content.');
		}

		return new self($type, $content);
	}

	/**
	 * Return the stored alert type.
	 *
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Return the stored alert content.
	 *
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Return the stored alert variable if it exists.
	 *
	 * @param string $variable ob
	 *
	 * @return string
	 *
	 * @throws \Cornford\Alerter\Exceptions\AlertVariableException
	 */
	public function __get($variable)
	{
		if (!property_exists($this, $variable)) {
			throw new AlertVariableException('Unable to find variable: ' . $variable . '.');
		}

		return $this->{$variable};
	}

	/**
	 * Set the alert view.
	 *
	 * @param string $view
	 *
	 * @return self
	 */
	public function useView($view)
	{
		$this->view = $view;

		return $this;
	}

	/**
	 * Set the alert view path.
	 *
	 * @param string $path
	 *
	 * @return self
	 */
	public function useViewPath($path)
	{
		$this->viewPath = $path;

		return $this;
	}

	/**
	 * Return a string of alert display HTML for a set display view.
	 *
	 * @param string $view
	 * @param string $viewPath
	 *
	 * @return string
	 */
	public function display($viewPath = null, $view = null)
	{
		if (!$viewPath) {
			$viewPath = $this->viewPath;
		}

		if (!$view) {
			$view = $this->view;
		}

		return (new AlertDisplay($this, $viewPath, $view))->display();
	}

}
