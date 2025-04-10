INTRODUCTION
------------

To improve readability of code, many text editors use language specific syntax
highlighting. This module uses the highlight.php library to offer similar
functionality when displaying code snippets on your site. highlight.php itself
is a port of the popular highlight.js, and allows the syntax highlighting to be
done on the web-server. Instead of relying on the client to do highlighting, the
advantage of server sided code highlighting is that this allows to cache the
results and not be dependent on JavaScript running in the browser.

 * For a full description of the module, visit the project page:
   https://www.drupal.org/project/ssch

 * To submit bug reports and feature suggestions, or track changes:
   https://www.drupal.org/project/issues/ssch

REQUIREMENTS
------------

This module requires the following modules:

 * Vendor Stream Wrapper (https://www.drupal.org/project/vendor_stream_wrapper)
 * highlight.php (https://github.com/scrivo/highlight.php)

INSTALLATION
------------

 * Install as you would normally install a contributed Drupal module. Visit
   https://www.drupal.org/node/1897420 for further information.

CONFIGURATION
-------------

This module introduces the "Code snippet (server sided code highlighting)"
field, which can be attached to any field-able entity (like nodes or
paragraphs). As an example, you can add this field to nodes of the type article
by navigating to Administration » Structure » Content types » Article » Manage
fields, choose a "Plain text" field type and then select the option Code snippet
(server sided code highlighting).

The provided widget can be set at Administration » Structure » Content types »
Article » Manage form display and allows to provide the following settings:

 * Rows: the height of the text area to enter the code snippet (height).
 * Placeholder: text that is shown in the text area until a value is entered.
 * Available programming languages: can be used to limit the number of options
   to select the programming language for the content editor.
 * Default programming language: the default programming language selection.

The formatter can be configured at Administration » Structure » Content types »
Article » Manage display. Here you can indicate whether the programming language
should be displayed to the user, whether a maximum number of code lines should
be shown and which stylesheet to use for the syntax highlighting.

MAINTAINERS
-----------

Current maintainers:
 * Niels Sluijs (Watergate) - https://www.drupal.org/u/watergate

This project has been sponsored by:

 * Sicse
   Specialized in creating and managing dynamic web-solutions, incorporating
   state-of-the-art services. Visit https://sicse.dev for more information.
