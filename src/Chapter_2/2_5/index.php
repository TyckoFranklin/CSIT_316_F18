<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 9/23/2018
 * Time: 10:38 AM
 */
print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Coast City Computers</title>");
print("</head>");
print("<body>");

include("src/inc_header.php");
/* Let's use a Heredoc string for this..... */
echo <<<EOD
<h2>Memorial Day Sale</h2>
<ul>
<li>Compaq Presario m2007us Notebook:
<strong>$799.99</strong></li>
<li>Epson Stylus CX6600 Color All-In-One Printer,
Print/Copy/Scan: <strong>$699.99</strong></li>
<li>Proview Technology Inc. KDS K715s 17-inch LCD
Monitor,
Silver/Black: <strong>$199.99</strong></li>
<li>Hawking Technology Hi-Speed Wireless-G Cardbus
Card:
<strong>$9.99</strong></li>
</ul>
EOD;

include("src/inc_footer.php");

print("</body>");
print("</html>");
