<?php

function stars($rating, $prefix = '') {
    $rating = round($rating, 1);

    $retval = "";
    for ($i = 1; $i <= 5; $i++) {
        $star = "";
        if ($rating == $i) {

        } else if ($rating > $i - .5 && $rating < $i) {
            $star = "h";
        } else if ($rating >= $i) {

        } else {
            $star = "g";
        }
        $retval .= '<img src="' . site_url() . '/wp-content/plugins/wpbase-youtube/media/images/' . $prefix . 'star' . $star . '.png">';
    }

    return '<div class="rating">' . $retval . '</div>';
}

function getApplet($jarFile, $className, $params = array(), $width=1, $height=1, $name='japplet') {
    $retVal = "";

    $useApplet = 0;
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    if (stristr($user_agent, "konqueror") || stristr($user_agent, "macintosh") || stristr($user_agent, "opera")) {
        $useApplet = 1;
        $retVal = sprintf('<applet name="%s" id="%s" archive="%s" code="%s" width="%s" height="%s" MAYSCRIPT >', $name, $name, $jarFile, $className, $width, $height);
    } else {
        if (strstr($user_agent, "MSIE")) {
            $retVal = sprintf('<object  name="%s" id="%s" classid="clsid:8AD9C840-044E-11D1-B3E9-00805F499D93" style="border-width:0;" codebase="http://java.sun.com/products/plugin/autodl/jinstall-1_4_1-windows-i586.cab#version=1,4,1"  width= "%spx" height= "%spx">', $name, $name, $width, $height);
        } else {
            $retVal = sprintf('<object  name="%s" id="%s" type="application/x-java-applet;version=1.4.1" width= "%s" height= "%s">', $name, $name, $width, $height);
        }

        $params['archive'] = $jarFile;
        $params['code'] = $className;
        $params['mayscript'] = 'true';
        $params['scriptable'] = 'true';
        $params['name'] = $name;
    }

    foreach ($params as $var => $val) {
        $retVal .= sprintf('<param name="%s" value="%s">', $var, $val);
    }
    
    $msg = __('It appears you do not have Java installed or it is disabled on your system.%s Please download it %s here %s','wpby');
    $msg = sprintf($msg,'<br />',' <a href="http://www.java.com/getjava/" class="link" target="_blank">','</a>');
    
    $retVal .= $msg;
    
    
    
    if ($useApplet == 1) {
        $retVal .= '</applet>';
    } else {
        $retVal .= '</object>';
    }

    return $retVal;
}

function truncate($string, $length = 80, $etc = '...', $break_words = true)
{
	if ($length == 0)
	return '';

	if (strlen($string) > $length) {
		$length -= strlen($etc);
		if ($break_words)
		$string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));

		return substr($string, 0, $length).$etc;
	} else
	return $string;
}

function minutes($secs)
{
	if ($secs<0) return false;

	$m = (int)($secs / 60);
	$s = $secs % 60;
	$h = (int)($m / 60);
	$m = $m % 60;

	$text = "";
	if ($h > 0)
	$text = $h.":";

	if (strlen($s)==1)
	$s = "0".$s;
	return $text.$m.":".$s;
}