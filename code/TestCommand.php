<?php

class TestCommand extends ControllerCommand {
	
	/**
	 *
	 */
	public function execute() {
		$data = $this->getParameters();
		$x = $data['x'];
		$y = $data['y'];
		return (int)$x * (int) $y;
	}	
}