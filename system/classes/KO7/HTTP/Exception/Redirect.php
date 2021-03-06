<?php
/**
 * Redirect HTTP exception class. Used for all [HTTP_Exception]'s where the status
 * code indicates a redirect.
 *
 * Eg [HTTP_Exception_301], [HTTP_Exception_302] and most of the other 30x's
 *
 * @package    KO7
 * @category   Exceptions
 * @author     Kohana Team
 * @copyright  (c) Kohana Team
 * @license    https://koseven.ga/LICENSE.md
 */
abstract class KO7_HTTP_Exception_Redirect extends HTTP_Exception_Expected {

	/**
	 * Specifies the URI to redirect to.
	 *
	 * @param  string  $location  URI of the proxy
	 */
	public function location($uri = NULL)
	{
		if ($uri === NULL)
			return $this->headers('Location');

		if (strpos($uri, '://') === FALSE)
		{
			// Make the URI into a URL
			$uri = URL::site($uri, TRUE, ! empty(KO7::$index_file));
		}

		$this->headers('Location', $uri);

		return $this;
	}

	/**
	 * Validate this exception contains everything needed to continue.
	 *
	 * @throws KO7_Exception
	 * @return bool
	 */
	public function check()
	{
		if ($this->headers('location') === NULL)
			throw new KO7_Exception('A \'location\' must be specified for a redirect');

		return TRUE;
	}

}
