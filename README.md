# SilverStripe Command Pattern Module

## Maintainer Contact

 * Rainer Spittel (Nickname: fb3rasp) - rainer (at) silverstripe (dot) com

## Requirements

 * SilverStripe V2.4

## Documentation

The commandpattern module enables SilverStripe to decouple business logic from the MVC structure. Commands can be executed individually and have a reference to a calling controller.

To install this module, please clone this module, copy the commands folder
into the root folder of the SilverStripe installation and run a dev/build, i.e.:

  http://localhost/silverstripe/dev/build

The module consists of a Factory-class which will be used to request command
actions. The factory class initiates the command and returns the command
object to the calling method, i.e.:

  $command = CommandFactory::get_command('Test');

This call will return initiate a TestCommand object and returns the instance.
get_command also accepts two optional parameters:

  - first parameter is a reference to the calling controller instance (@link Controller).
  - second parameter is a associated array for parameters.

### Example

We want to create a command with takes two integer ('x' and 'y') values and when executing the
command, it will return the result of x * y.

First create the command class in your project folder:

	<?php
	class TestCommand extends ControllerCommand {

		public function execute() {
			$data = $this->getParameters();
			$x = $data['x'];
			$y = $data['y'];
			return (int)$x * (int) $y;
		}	
	}

## Installation Instructions

Add this module into your project folder (name mapping) and run a dev/build
to generate the required database schema.

## Usage Overview

Implements the command pattern for SilverStripe controllers. This enables
the developers to move core business logic into a dedicated command class.

Ideal for de-coupling MVC from core business domain related logic.

## Known issues

n/a