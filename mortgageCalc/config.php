<?php
/** 
* Config file for Mortgage Calculator
* This file holds settings that affect the mortgage calculator tool.
*
**/

// Defaults for initial calculator
define('DPRICE', '100000');
define('DINT', '2.8');
define('DDP', '20');
define('DTERM', '20');


// Other factors (taxes, insurance, pmi)
define('HIR', '1');   // Homeowners Insurance Rate
define('PMI', '1');   // Private Mortgage Insurance


// Settings
define('LAYOUT', 'modal'); // breakdown schedule modal, div or popup
define('WEBSITE', ''); // Used in pdf emails to let your customers know where they came from 
define('URL', 'http://localhost/cSIT314-Grp48/CSIT314-Grp48/mortgageCalc');  // Used for scripts and file reference locations (include http://), no trailing slashes
define('EMAIL', ''); // Used for bcc to you so you can contact the customer 
define('FROMEMAIL', '');  // The email address that shows in the from field
define('ALLOWEMAIL', 'no');  // Allow email to send report to customer
define('SHOWBLURB', 'yes');   // Option to give information about other costs before schedule

// Disclaimer can say what you want
define('DISCLAIMER', 'CSIT314 HDB Huat AHH');