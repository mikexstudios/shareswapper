<?php defined('SYSPATH') or die('No direct script access.');
// ----------------------------------------------------------------------------
// markItUp! BBCode Parser
// v 1.0.1
// Dual licensed under the MIT and GPL licenses.
// ----------------------------------------------------------------------------
// Copyright (C) 2007 Jay Salvat
// http://www.jaysalvat.com/
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
// 
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
// 
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.
// ----------------------------------------------------------------------------

class bbcode {

	public static function parse($text) {
		$text = trim($text);
		$text = stripslashes($text);
		
		// BBCode [code]
		function escape($s) {
			return '<pre><code>'.htmlspecialchars($s[1]).'</code></pre>';
		}	
		$text = preg_replace_callback('/\[code\](.*?)\[\/code\]/ms', "escape", $text);
		$text = strip_tags($text); //People can still do XSS through this!
		
		// BBCode to find...
		$in = array( 	 '/\[b\](.*?)\[\/b\]/ms',	
						 '/\[i\](.*?)\[\/i\]/ms',
						 '/\[u\](.*?)\[\/u\]/ms',
						 '/\[img\](.*?)\[\/img\]/ms',
						 '/\[email\](.*?)\[\/email\]/ms',
						 '/\[url\="?(.*?)"?\](.*?)\[\/url\]/ms',
						 '/\[size\="?(.*?)"?\](.*?)\[\/size\]/ms',
						 '/\[color\="?(.*?)"?\](.*?)\[\/color\]/ms',
						 '/\[quote](.*?)\[\/quote\]/ms',
						 '/\[list\=(.*?)\](.*?)\[\/list\]/ms',
						 '/\[list\](.*?)\[\/list\]/ms',
						 '/\[\*\](.*?)\n/ms'
		);
		// And replace them by...
		$out = array(	 '<strong>\1</strong>',
						 '<em>\1</em>',
						 '<u>\1</u>',
						 '<img src="\1" alt="\1">',
						 '<a href="mailto:\1">\1</a>',
						 '<a href="\1">\2</a>',
						 '<span style="font-size:\1%">\2</span>',
						 '<span style="color:\1">\2</span>',
						 '<blockquote>\1</blockquote>',
						 '<ol start="\1">\2</ol>',
						 '<ul>\1</ul>',
						 '<li>\1</li>'
		);
		$text = preg_replace($in, $out, $text);
		
		// paragraphs
		$text = str_replace("\r", "", $text);
		$text = "<p>".ereg_replace("(\n){2,}", "</p><p>", $text)."</p>";
		$text = nl2br($text);
		
		return $text;
	}
}
?>
