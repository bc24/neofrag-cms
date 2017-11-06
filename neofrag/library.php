<?php
/**
 * https://neofr.ag
 * @author: Michaël BILCOT <michael.bilcot@neofr.ag>
 */

namespace NF\NeoFrag;

class Library extends NeoFrag
{
	protected $__caller;

	public function __construct($caller)
	{
		$this->__caller = $caller;
	}

	public function __sleep()
	{
		return array_filter(array_keys(get_object_vars($this)), function($a){
			return $a[0] == '_';
		});
	}

	public function reset()
	{
		if (isset($this->load->libraries[$this->name]))
		{
			unset($this->load->libraries[$this->name]);
		}

		return $this->set_id();
	}

	public function save()
	{
		$clone = clone $this;

		$this->reset();

		return $clone;
	}

	public function set_id($id = NULL)
	{
		$this->id = $id ?: md5($this->name.++self::$ID);
		return $this;
	}
}