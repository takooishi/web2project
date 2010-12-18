<?php /* $Id: lang.php 38 2008-02-11 11:38:51Z pedroix $ $URL: https://web2project.svn.sourceforge.net/svnroot/web2project/trunk/locales/de/lang.php $ */
// Entries in the LANGUAGES array are elements that describe the
// countries and language variants supported by this locale pack.
// Elements are keyed by the ISO 2 character language code in lowercase
// followed by an underscore and the 2 character country code in Uppercase.
// Each array element has 4 parts:
// 1. Directory name of locale directory
// 2. English name of language
// 3. Name of language in that language
// 4. Microsoft locale code

$dir = basename(dirname(__file__));

// in case of experienceing troubles you may try one of the following
//$LANGUAGES['de_DE'] = array($dir, 'German', 'Deutsch', 'deu', 'ISO-8859-1');
//$LANGUAGES['de_DE'] = array($dir, 'German', 'Deutsch', 'deu', 'ISO-8859-15');
$LANGUAGES['ru_RU'] = array($dir, 'Russian (ru)', 'Русский (ru)', 'ru', 'utf-8');
?>