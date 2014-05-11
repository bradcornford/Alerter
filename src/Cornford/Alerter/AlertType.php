<?php namespace Cornford\Alerter;

use Cornford\Alerter\Contracts\TypeableInterface;
use Cornford\Alerter\Alert;

abstract class AlertType implements TypeableInterface {

    const TYPE_ERROR = 'danger';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_SUCCESS = 'success';
    const TYPE_NONE = 'default';

    /**
     * Return the an alert type error.
     *
     * @param string $content
     *
     * @return \Cornford\Alerter\Alert
     */
    public static function error($content)
    {
        return Alert::create(self::TYPE_ERROR, $content);
    }

    /**
     * Return the an alert type info.
     *
     * @param string $content
     *
     * @return \Cornford\Alerter\Alert
     */
    public static function info($content)
    {
        return Alert::create(self::TYPE_INFO, $content);
    }

    /**
     * Return the an alert type warning.
     *
     * @param string $content
     *
     * @return \Cornford\Alerter\Alert
     */
    public static function warning($content)
    {
        return Alert::create(self::TYPE_WARNING, $content);
    }

    /**
     * Return the an alert type success.
     *
     * @param string $content
     *
     * @return \Cornford\Alerter\Alert
     */
    public static function success($content)
    {
        return Alert::create(self::TYPE_SUCCESS, $content);
    }

    /**
     * Return the an alert type none.
     *
     * @param string $content
     *
     * @return \Cornford\Alerter\Alert
     */
    public static function none($content)
    {
        return Alert::create(self::TYPE_NONE, $content);
    }

}
