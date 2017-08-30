<?php
namespace App\DI;

/**
 * DI container with shared instances
 */
class Container
{
    /**
     * @var array
     */
	protected $values = [];

    /**
     * @param $id
     * @param $value
     */
    public function __set($id, $value)
	{
		$this->values[$id] = $value;
	}

    /**
     * @param string $id
     * @return mixed
     * @throws \Exception
     */
    public function __get($id)
	{
		if (!isset($this->values[$id])) {
			throw new \Exception(sprintf("Value '{$id}' is not defined", $id));
		}

		return is_callable($this->values[$id])
            ? $this->values[$id]($this)
            : $this->values[$id];
	}

    /**
     * @param $callable
     * @return \Closure
     */
    public function asShared($callable)
	{
		return function ($c) use ($callable)
		{
			static $object;

			if (empty($object)) {
				$object = $callable($c);
			}

			return $object;
		};
	}

}
