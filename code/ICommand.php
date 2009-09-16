<?php
/**
 * @package commands
 * @subpackage code
 * @author Rainer Spittel (rainer at silverstripe dot com)
 *
 * Interface class for command classes. The current implementation enables the
 * the reuse of the command factory for non controller specific commands, i.e.
 * to implement commands for DataObjects. The DataObjectCommand should then
 * implement this interface, too to enable the factory calls to initiate the 
 * correct command classes.
 *
 * @link CommandFactory @link ControllerCommand
 */
interface ICommand {

	/**
	 * This method performs the action/command. No parameters should be passed
	 * into this method call. If additional parameters are required, use the 
	 * constructor parameters or a dedicated setter method. To provide an 
	 * non-parameterized method call to perform an action enables the use of
	 * the command-history pattern.
	 */
	public function execute();

	/**
	 * Each command should support a toString function to enable a command logging.
	 */
	public function toString();
}