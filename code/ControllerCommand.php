<?php
/**
 *
 */
abstract class ControllerCommand extends Object implements ICommand {

	private $controller = null;
	private $params = array();

	/**
	 * 
	 */
	public function __construct($controller = null, $params = null) {
		parent::__construct();
		$this->controller = $controller;
		$this->setParameters($params);
	}

	/**
	 * 
	 */
	public function getController() {
		return $this->controller;
	}
		
	/**
	 * 
	 */
	public function getParameters() {
		return $this->params;
	}
	
	/**
	 * 
	 */
	public function setParameters($params) {
		
		if (!isset($params)) {
			$params = array();
		}
		
		if (!is_array($params)) {
			$params = array($params);
		}
		$this->params = $params;
	}
	
	/**
	 * 
	 */
	public function toString() {
		return $this->class;
	}
}

?>