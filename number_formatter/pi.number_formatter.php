<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');
/**
 * Number Formatter Class
 *
 * @package     ExpressionEngine
 * @category    Plugin
 * @author      Douglas Green
 * @copyright   Copyright (c) 2012, Douglas Green
 * @link        http://greeninteractive.com
 * 
 */
$plugin_info = array(
  'pi_name'        => 'Number Formatter',
  'pi_version'     => '1.0',
  'pi_author'      => 'Douglas Green, Green Interactive',
  'pi_author_url'  => 'http://greeninteractive.com/',
  'pi_description' => 'Sends a value through the PHP number_format() function, and returns a formatted number.',
  'pi_usage'       => Number_formatter::usage()
);
/**
 * Number_formatter
 * 
 * Returns a number formatted by the PHP number_format() function.
 * 
 * @access public
 * @return number 
 */
class Number_formatter {
	
	private $_number        = 0;  // number to be formatted
	private $_decimals      = 0;  // number of decimal points, optional
	private $_dec_point     = ''; // decimal point separator, optional
	private $_thousands_sep = ''; // thousands separator, optional
	
	public function __construct() {
		
		$this->EE =& get_instance();
		$this->_number        = (float) $this->EE->TMPL->tagdata;
		$this->_decimals      = (int) $this->EE->TMPL->fetch_param('decimals');
		$this->_dec_point     = $this->EE->TMPL->fetch_param('dec_point');
		$this->_thousands_sep = $this->EE->TMPL->fetch_param('thousands_sep'); 
		
	}
	
	public function format() {
		
		$formatted_number = 0;
		
		if (!empty($this->_decimals)) {
			if (!empty($this->_dec_point) && !empty($this->_thousands_sep)) {
				$formatted_number = number_format($this->_number, $this->_decimals, $this->_dec_point, $this->_thousands_sep);
			}
			else {
				$formatted_number = number_format($this->_number, $this->_decimals);
			}
		}
		else {
			$formatted_number = number_format($this->_number);
		}
		return $formatted_number;
		
	}
	
	public static function usage() {
		
		ob_start(); ?>
The Number Formatter plugin accepts a value as a number, runs it through the PHP number_format() function, and returns the formatted result.

Basic usage:

{exp:number_formatter:format}
{value}
{/exp:number_formatter:format}

The plugin accepts the following parameters, which correspond with the PHP number_format() function parameters:

	- number: number to be formatted, passed as value between opening and closing plugin tags, required
	- decimals: number of decimal points, optional, 0 by default
	- dec_point: decimal point separator, optional, '.' by default
	- thousands_sep: thousands separator, optional, ',' by default

As with the PHP function, pass a number alone, a number and the number of decimals, or all 4 parameters. 3 parameters are not accepted.

Plugin with parameters:

{exp:number_formatter:format decimals='2' dec_point='.' thousands_sep=','}
{value}
{/exp:number_formatter:format}
		<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		
		return $buffer;
	}
}
/**
 * End of file pi.number_formatter.php
 * Location: ./system/expressionengine/third_party/number_formatter/pi.number_formatter.php
 */