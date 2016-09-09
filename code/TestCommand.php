<?php
/**
 * @package commands
 * @subpackage code
 * @author Rainer Spittel (rainer at silverstripe dot com)
 *
 * This is an example for a command implementation. The command will expect 
 * array keys 'x' and 'y' and the command will multiply the two integer-values.
 *
 * No validation has been implemented.
 *
 * Please see the README file for more information.
 */
class TestCommand extends ControllerCommand
{
    
    /**
     * Perform the action/command
     */
    public function execute()
    {
        $data = $this->getParameters();
        $x = $data['x'];
        $y = $data['y'];
        return (int)$x * (int) $y;
    }
}
