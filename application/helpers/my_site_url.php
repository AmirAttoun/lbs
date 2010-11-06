<?php
/**
 * Site URL
 *
 * Create a local URL based on your basepath. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access    public
 * @param    string
 * @return    string
 */
function my_site_url($uri = '')
{
 $CI =& get_instance();
 if (defined('LANG_FLAG'))
 $uri = LANG.'/'.$uri;

 return $CI->config->site_url($uri);
}

// ------------------------------------------------------------------------

/**
 * Anchor Link
 *
 * Creates an anchor based on the local URL.
 *
 * @access    public
 * @param    string    the URL
 * @param    string    the link title
 * @param    mixed    any attributes
 * @return    string
 */
 function my_anchor($uri = '', $title = '', $attributes = '')
 {
 $title = (string) $title;

 if ( ! is_array($uri))
 {
 $site_url = ( ! preg_match('!^\w+://!i', $uri)) ? my_site_url($uri) : $uri;
 }
 else
 {
 $site_url = my_site_url($uri);
 }

 if ($title == '')
 {
 $title = $site_url;
 }

 if ($attributes == '')
 {
 $attributes = ' title="'.$title.'"';
 }
 else
 {
 $attributes = _my_parse_attributes($attributes);
 }

 return '<a href="'.$site_url.'"'.$attributes.'>'.$title.'</a>';
 }
 
 
 
 ?>