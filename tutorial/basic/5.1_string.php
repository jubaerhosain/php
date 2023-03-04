<?php

$str1 = 'This is a \'single-quoted\' string.';
$str2 = "This is a \"double-quoted\" string.";
$str3 = "This string contains a backslash: \\";
$str4 = "This string\ncontains\nmultiple\nlines.";
$str5 = "This string\tcontains\ta\ttab.";
$str6 = "This string contains \\.";

echo $str1 . "\n";  // Output: This is a 'single-quoted' string.
echo $str2 . "\n";  // Output: This is a "double-quoted" string.
echo $str3 . "\n";  // Output: This string contains a backslash: \
echo $str4 . "\n";  // Output: This string
//         contains
//         multiple
//         lines.
echo $str5 . "\n";  // Output: This string   contains a  tab. 
echo $str6 . "\n";
