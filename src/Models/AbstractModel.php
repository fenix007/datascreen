<?php
namespace Siqwell\DataScreen\Models;

/**
 * Class AbstractModel
 * @package Siqwell\DataScreen\Model
 */
abstract class AbstractModel
{
    /**
     * List of properties to populate by the ObjectHydrator
     *
     * @var array
     */
    public static $properties = [];

    /**
     * AbstractModel constructor.
     */
    public function __construct()
    {
        self::$properties = array_keys(get_object_vars($this));
    }
}
