<?php
namespace TYPO3\Form\Finishers;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Form".                 *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * A simple finisher that invokes a closure when executed
 */
class ClosureFinisher extends \TYPO3\Form\Core\Model\AbstractFinisher {

	protected $defaultOptions = array(
		'closure' => NULL
	);

	protected function executeInternal() {
		/** @var $closure \Closure */
		$closure = $this->parseOption('closure');
		if ($closure === NULL) {
			return;
		}
		if (!$closure instanceof \Closure) {
			throw new \TYPO3\Form\Exception\FinisherException(sprintf('The option "closure" must be of type Closure, "%s" given.', gettype($closure)), 1332155239);
		}
		$formRuntime = $this->finisherContext->getFormRuntime();
		$closure($formRuntime);
	}
}
?>