<?php
/**
 *
 */
class CommandControllerExtension extends Extension {

	/**
	 * Returns the requested command and assigns the controller class to its
	 * owner/caller. See @link CommandFactory for more details.
	 * @param $commandName string name of the command
	 * @param $data array|null list of parameters for the command. The array
	 *        structure is specific to the command.
	 *
	 * @return ControllerCommand the requested command.
	 * @throws CommandControllerException
	 */
	function getCommand($commandName, $data = null) {

		if($data && !is_array($data)) {
			throw new CommandControllerException('Invalid command parameters');
		}
		
		try {
			$command = CommandFactory::get_command($commandName,$this->owner, $data);
		} 
		catch (CommandFactory_Exception $e) {
			throw new CommandControllerException( $e->getMessage() );
		}

		return $command;
	}
}

class CommandControllerException extends Exception {};