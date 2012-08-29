ee-number-formatter
===================

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