<?php namespace Cornford\Alerter;

use Cornford\Alerter\Contracts\DisplayableInterface;
use Cornford\Alerter\Exceptions\AlertDisplayViewException;
use Cornford\Alerter\Exceptions\AlertDisplayViewPathException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class AlertDisplay implements DisplayableInterface {

    const VIEW_SIMPLE = 'simple';
    const VIEW_LIST = 'list';
    const VIEW_BOOTSTRAP = 'bootstrap';
    const VIEW_BOOTSTRAP_CLOSABLE = 'bootstrap-closeable';
    const VIEW_FOUNDATION = 'foundation';
    const VIEW_FOUNDATION_CLOSABLE = 'foundation-closable';
    const VIEW_PURE = 'pure';
    const VIEW_PURE_CLOSABLE = 'pure-closable';

    /**
     * The views base folder.
     *
     * @var string
     */
    protected $viewPath;

    /**
     * The Alert object.
     *
     * @var Alert
     */
    private $alert;

    /**
     * The view name.
     *
     * @var string
     */
    private $view;

    /**
     * Construct class with an alert object, a display view, and a view path.
     *
     * @param Alert  $alert
     * @param string $view
     * @param string $viewPath
     *
     * @return self
     *
     * @throws \Cornford\Alerter\Exceptions\AlertDisplayViewPathException
     */
    public function __construct(Alert $alert, $viewPath, $view)
    {
        $this->alert = $alert;

        if (!is_dir($viewPath)) {
            throw new AlertDisplayViewPathException('Could not locate the view path.');
        }

        $this->viewPath = $viewPath;
        $this->view = $view;

        $this->view = $this->findDisplayViewFile();
    }

    /**
     * Get the directory iterator.
     *
     * @return RecursiveIteratorIterator
     */
    protected function getDirectoryIterator()
    {
        return new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($this->viewPath)
        );
    }

    /**
     * Track down the display view file.
     *
     * @return string
     *
     * @throws \Cornford\Alerter\Exceptions\AlertDisplayViewException
     */
    protected function findDisplayViewFile()
    {
        foreach($this->getDirectoryIterator() as $file) {
            $name = $file->getFilename();

            if ($this->isDisplayViewFile($name)) {
                return $file->getPathname();
            }
        }

        throw new AlertDisplayViewException('Could not locate the view file.');
    }

    /**
     * Is the given file a display view file?
     *
     * @param string $name
     *
     * @return bool
     */
    protected function isDisplayViewFile($name)
    {
        return preg_match('/' . $this->view . '.php$/i', $name);
    }

    /**
     * Return a compiled alert display view.
     *
     * @return string
     */
    public function display()
    {
        ob_start();
        require $this->view;

        return ob_get_clean();
    }

}
