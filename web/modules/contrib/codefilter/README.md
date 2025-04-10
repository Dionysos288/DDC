# Code Filter

This is a simple filter module. It handles <code></code> and <?php ?> tags so
that users can post code without having to worry about escaping with &lt; and
&gt;.

## Requirements

This module requires no modules outside of Drupal core.

## Installation

Install as you would normally install a contributed Drupal module. For further
information, see
[Installing Drupal Modules](https://www.drupal.org/docs/extending-drupal/installing-drupal-modules).

## Configuration

1. Go to Administration » Configuration » Content authoring » Text formats
   and editors.
2.  For each format you wish to add Code Filter to:
    1. Click the "configure" link.
    2. Under "Enabled filters", enable the codefilter checkbox.
    3. Under "Filter processing order", arrange the filtering chain. See below
       for points to consider.
    4. Save the format.
3. (optionally) Edit your theme to provide a div.codeblock style for blocks of
   code.

The Code Filter format has the following restrictions when used with other
formats:

* To allow the HTML tags produced to display PHP code, set the "Limit
  allowed HTML tags" filter, if used, before "Code filter".
* To prevent invalid XHTML in the form of '<p><div class="codefilter">'
  make sure "Code filter" comes before the "Convert line breaks into
  HTML" filter, if used.
* If body fields are output in summary format, the "Correct faulty and chopped
  off HTML" filter must be used, and it must come after "Code filter".

The recommended order to use the Code Filter format with formats that allow
basic HTML input is thus:

1. Limit allowed HTML tags and correct faulty HTML
2. Code filter
3. Convert line breaks into HTML
4. Correct faulty and chopped off HTML

## Credits

This mini-module was originally made by Steven Wittens <unconed@drupal.org>,
based on the PHP filter in Kjartan Mannes's <kjartan@drupal.org> project.module.
