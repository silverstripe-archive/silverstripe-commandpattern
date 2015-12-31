<?php
/**
 * @package commands
 * @subpackage code
 * @author Rainer Spittel (rainer at silverstripe dot com)
 *
 * The command factory class provides a method to initiate a command object.
 * The factory class checks for all available ICommand implementations 
 * (@see ICommand) and initiate the command object. If the requested command
 * name is not available, the factory class will throw an exception.
 */
class CommandFactory extends Object
{

    public static $baseclass = 'ICommand';
    
    /**
     * @param String $commandName
     * @param Controller $controller
     *
     * @return ControllerCommand
     * @throws CommandFactory_Exception
     */
    public static function get_command($commandName, $controller=null, $params = null)
    {
        $command = null;
        $className = $commandName . "Command";
        
        if (ClassInfo::exists($className) && is_subclass_of($className, 'ICommand')) {
            $command = new $className($controller);
            $command->setParameters($params);
        } else {
            throw new CommandFactory_Exception("Command '$className' not found.");
        }
        return $command;
    }
}

/**
 * Customised exception class, thrown by the command factory class only.
 *
 * @link CommandFactory
 */
class CommandFactory_Exception extends Exception
{
}
