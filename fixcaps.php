<?php
/*
Plugin Name:Fix Post Title Capitalization
Plugin URI: http://wordpress.org/plugins/fix-post-title-capitalization/
Description: Automatically fixes the capitalization in post titles. 
Version: 1.3
Author: Alexander C. Block
Author URI: http://www.pizzli.com/
License:GPL2
*/
?>
<?php
/*  Copyright 2013  Alexander C. Block  (email : ablock@pizzli.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
function lowertitle($title)  {
$title = strtolower($title);
return $title;
}

function fixtitle($title) {
$smallwordsarray = array( 'of','a','the','and','an','or','nor','but','is','if','then','else','when', 'at','from','by','on','off','for','in','out','over','to','into','with' ); 
$words = explode(' ', $title); 
foreach ($words as $key => $word) {
if ($key == 0 or !in_array($word, $smallwordsarray)) $words[$key] = ucwords($word); 
} 
$newtitle = implode(' ', $words); return $newtitle; }

add_filter('title_save_pre', 'lowertitle');
add_filter('the_title', 'lowertitle');
add_filter('title_save_pre', 'fixtitle');
add_filter('the_title', 'fixtitle');
?>