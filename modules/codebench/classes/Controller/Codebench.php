<?php
/**
 * Codebench — A benchmarking module.
 *
 * @package    koseven/Codebench
 * @category   Controllers
 * @author     Kohana Team
 * @copyright  (c) Kohana Team
 * @license    https://koseven.ga/LICENSE.md
 */
class Controller_Codebench extends KO7_Controller_Template {

	// The codebench view
	public $template = 'codebench';

	public function action_index()
	{
		$class = $this->request->param('class');

		// Convert submitted class name to URI segment
		if (isset($_POST['class']))
		{
			throw HTTP_Exception::factory(302)->location('codebench/'.trim($_POST['class']));
		}

		// Pass the class name on to the view
		$this->template->class = (string) $class;

		// Try to load the class, then run it
		if (KO7::auto_load($class) === TRUE)
		{
			$codebench = new $class;
			$this->template->codebench = $codebench->run();
		}
	}
}
