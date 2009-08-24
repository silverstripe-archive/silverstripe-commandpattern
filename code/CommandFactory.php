<?php
/**
 *
 */
class CommandFactory extends Object {

	static $baseclass = 'ICommand';
	
	/**
	 * @param String $commandName
	 * @param Controller $controller
	 *
	 * @return  ControllerCommand
	 */
	static function get_command($commandName, $controller=null, $params = null) {
		$command = null;
		$className = $commandName . "Command";
		
		if (ClassInfo::exists($className) && is_subclass_of($className,'ICommand')) {
			$command = new $className($controller);
			$command->setParameters($params);
			
		} else {
			throw new CommandFactory_Exception("Command '$className' not found.");
		}
		return $command;
	}
}

class CommandFactory_Exception extends Exception {
}

?>