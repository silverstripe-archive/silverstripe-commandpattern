<?php
/**
 * @package commands
 * @subpackage code
 * @author Rainer Spittel (rainer at silverstripe dot com)
 *
 * The ControllerCommand implements the interface ICommand except for execute.
 * This will ensure the ControllerCommand will be treated as an abstract class.
 *
 * @link ICommand
 *
 */
abstract class ControllerCommand extends Object implements ICommand
{

    private $controller = null;
    private $params = array();

    /**
     * The constructure initiates the command object and stores the provided
     * parameters in the instance. The reference to the calling controller 
     * object is optional and depends on the individual implementation of the 
     * command class. The $params parameter is a property array which can be 
     * used to pass in parameters for the command.
    
     * @param $controller Controller a reference to the calling controller. 
     * @param $params array 
     */
    public function __construct($controller = null, $params = null)
    {
        parent::__construct();
        $this->controller = $controller;
        $this->setParameters($params);
    }

    /**
     * Returns the instance of the controller class, assigned to this command.
     * @return Controller | null
     */
    public function getController()
    {
        return $this->controller;
    }
        
    /**
     * Returns the parameter array for this command.
     * @return array | null 
     */
    public function getParameters()
    {
        return $this->params;
    }
    
    /**
     * Set the parameter variable of the command instance. if the given
     * parameter is not an array, the method will create an array envelope. If
     * the parameter is null, it will create an empty array.
     * @return void
     */
    public function setParameters($params)
    {
        if (!isset($params)) {
            $params = array();
        }
        
        if (!is_array($params)) {
            $params = array($params);
        }
        $this->params = $params;
    }
    
    /**
     * Returns a string which represents this command instance.
     * @return string
     */
    public function toString()
    {
        return $this->class;
    }
}
