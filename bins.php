<html>

<head>

<!-- Include meta tag to ensure proper rendering and touch zooming -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Include jQuery Mobile stylesheets -->
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

<!-- Include the jQuery library -->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include the jQuery Mobile library -->
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

</head>
<body>
<div data-role="page" id="homepage">

  <div data-role="header">
    <h1>Argyll and Bute Council<br/>
	Bins and bin stuff</h1>
  </div>

  <div data-role="main" class="ui-content">
     
  <form name="input" action="" method="get">
<label for="sterm">Postcode:</label>
<input type="text" name="sterm" id="sterm" placeholder="Enter your postcode...">
<input type="submit" value="Search" data-corners="true">
</form>

<!-- Php search code  -->

<?php

function dosearch($searchterm)
{
    $header             = '<h2>Results for ' . $searchterm . '</h2>';
    $tableHeaderOpen    = '<table border="2" cellspacing="0" cellpadding="5">';
    $tableHeaderAddress = '';
    $tableHeaderClose   = '<th style="background-color:#8077B6;">Calendar</th><th>Blue Bin</th><th style="background-color:#1db15b;">Green Bin</th><th style="background-color:#bbb; color:#333">Glass Bin</th><th style="background-color:#CEE3A7; color:#056226">Food Bin</th><th style="background-color:#F9A538; color:#056226">Leave bin out by:</th>';
    $tableBody          = "";
    
    //start table
    $handle   = fopen("binroutes/phase_1_total.csv", "r");
    $noresult = 0;
    
    
    while (($utter = fgetcsv($handle, 1000, ',')) !== FALSE) {
        
        
        if ((stripos($utter[10], $searchterm)) !== false) {
            
            //echo '<tr>';
            $tableBody .= '<tr>';
            
            if ($utter[11] != '') {
                //echo '<td style="background-color:#fff";>', $utter[11], '</td>';
                $tableBody .= '<td style="background-color:#fff";>' . $utter[11] . '</td>';
                $tableHeaderAddress = '<th style="background-color:#B5121A;">Address</th>';
            } else {
                //echo '<td>For all properties at this postcode unless listed below</td>';
                
                //$tableBody .= '<td>For all properties at this postcode unless listed below</td>';
            }
            //echo '</td>';
            $tableBody .= '</td>';
            
            // show a message if there is no calendar
            
            if ($utter[1] != '') {
                //echo '<td><a href="https://www.argyll-bute.gov.uk/sites/default/files/binroutes/',$utter[1],'.pdf">Download calendar (.pdf)</a></td>';
                $tableBody .= '<td><a href="https://www.argyll-bute.gov.uk/sites/default/files/binroutes/' . $utter[1] . '.pdf">Download calendar (.pdf)</a></td>';
            } else {
                //echo '<td style="background-color:#ddd";>No calendar availiable</td>';
                $tableBody .= '<td style="background-color:#ddd";>No calendar availiable</td>';
            }
            
            /*
            echo '<td>', 
            $utter[5], 
            '</td><td>', 
            $utter[3], 
            '</td>';
            */
            // show a message if no glass collection
            $tableBody .= '<td>' . $utter[5] . '</td><td>' . $utter[3] . '</td>';
            
            
            if ($utter[7] != '') {
                //echo '<td style="background-color:#fff";>', $utter[7], '</td>';
                $tableBody .= '<td style="background-color:#fff";>' . $utter[7] . '</td>';
            } else {
                //echo '<td style="background-color:#ddd";>No glass collection</td>';
                $tableBody .= '<td style="background-color:#ddd";>No glass collection</td>';
            }
            
            //  now for the food collection
            
            if ($utter[9] != '') {
                //echo '<td style="background-color:#fff";>', $utter[9], '</td>';
                $tableBody .= '<td style="background-color:#fff";>' . $utter[9] . '</td>';
            } else {
                //echo '<td style="background-color:#ddd";>No food collection</td>';
                $tableBody .= '<td style="background-color:#ddd";>No food collection</td>';
            }
			
			//  now for the time
            
            if ($utter[13] != '') {
                //echo '<td style="background-color:#fff";>', $utter[9], '</td>';
                $tableBody .= '<td style="background-color:#fff";>' . $utter[13] . '</td>';
            } else {
                //echo '<td style="background-color:#ddd";>No food collection</td>';
                $tableBody .= '<td style="background-color:#ddd";>N/A</td>';
            }
            
            //echo '</tr>';
            $tableBody .= '</tr>';
        }
        
    }
    
    
    fclose($handle);
    //echo '</table>'; //end table
    $tableBody .= '</table>';
    
    echo $header . $tableHeaderOpen . $tableHeaderAddress . $tableHeaderClose . $tableBody;
    
    
}


if (isset($_GET['sterm'])) {
    $postcode = ($_GET['sterm']);
    if (substr($postcode, -4, 1) != " ") {
        $postcode = substr($postcode, 0, strlen($postcode) - 3) . " " . substr($postcode, -3);
    }
    dosearch($postcode);
}
?>




<!-- search ends -->
	<a href="#pageone" data-transition="flow" class="ui-btn ui-btn-inline ui-corner-all ui-icon-info ui-btn-icon-left">Go to Page One</a>
	 <a href="#pagetwo" data-transition="flow" class="ui-btn ui-btn-inline ui-corner-all ui-icon-search ui-btn-icon-left">Go to Page Two</a>
  </div>

  <div data-role="footer">
    <h1>Phone:  01546 605522</h1>
  </div>

</div>
<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>Argyll and Bute Council<br/>
	Bins and bin stuff</h1>
  </div>

  <div data-role="main" class="ui-content">
 
 <div class="holidayboxgreen">
<div class="row">
<div class="col-md-4">
<p>&nbsp;</p>
<p><strong><img src="http://www.argyll-bute.gov.uk/sites/default/files/ab_wheelie_bin_green_small_0.png" alt="Green bin" width="65" height="92" style="float: left; margin-left: 5px; margin-right: 5px;" /></strong><span style="color: #008000;"><a name="greenbin"></a><strong>Your green bin is for general rubbish</strong></span></p>
<p><span style="color: #008000;"><strong>Your green bin is emptied every 3 weeks</strong></span></p>
<p><strong>Please use your green bin for all the general rubbish that we can't recycle</strong></p>
</div>
<div class="col-md-4">
<h2><span style="color: #008000;"><img src="http://www.argyll-bute.gov.uk/sites/default/files/tick_1_0.png" alt="Yes" title="Yes" width="35" height="26" style="float: left; margin-left: 5px; margin-right: 5px;" /><strong>Include:</strong></span></h2>
<ul>
<li>nappies</li>
<li>cling film, bubble wrap, or food contaminated plastics</li>
<li>non-recyclable plastics</li>
<li>polystyrene packing</li>
<li>items that can't be recycled</li>
</ul>
</div>
<div class="col-md-4">
<h2><img src="http://www.argyll-bute.gov.uk/sites/default/files/cross_2_0.png" alt="No" title="No" width="30" height="30" style="float: left; margin-left: 5px; margin-right: 5px;" /> <span style="color: #ff0000;">Please don't include:</span></h2>
<ul>
<li>items that can be recycled</li>
<li>batteries and electrical equipment</li>
<li>rubble, soil, stone or bricks</li>
<li>bulky items</li>
</ul>
</div>
</div>
<div class="holidayboxred">
<ul>
<li>Only 1 green bin per household will be emptied (apart from some <a href="https://www.argyll-bute.gov.uk/bins/faqs">exceptions - <strong>find out more in our FAQs</strong></a>)</li>
<li>Please ensure your bin is clearly labelled with your house number or name</li>
</ul>
</div>
</div>
<div class="holidayboxblue">
<div class="row">
<div class="col-md-4">
<p>&nbsp;</p>
<p><strong><img src="http://www.argyll-bute.gov.uk/sites/default/files/ab_wheelie_bin_blue_dark_small.png" alt="Green bin" width="75" height="106" style="float: left; margin-left: 5px; margin-right: 5px;" /></strong><span style="color: #008000;"><a name="bluebin"></a><strong><span style="color: #000080;">Your blue bin is for paper, card, cans and plastic</span></strong><br /></span></p>
<p><span style="color: #008000;"><strong><span style="color: #000080;">Your blue bin is emptied every 2 weeks<br /></span></strong></span></p>
<ul>
<li>Please do not put items into plastic bags, just straight into the bin</li>
</ul>
<ul>
<li>Please rinse cans, cartons and plastics before putting them in the bin</li>
<li>Please leave the lids off bottles so they can be squashed, or squash them and put the lids back on</li>
</ul>
</div>
<div class="col-md-4">
<h2><span style="color: #008000;"><img src="http://www.argyll-bute.gov.uk/sites/default/files/tick_1_0.png" alt="Yes" title="Yes" width="35" height="26" style="float: left; margin-left: 5px; margin-right: 5px;" /><strong>Include:</strong></span></h2>
<ul>
<li>food, drink and aerosol cans</li>
<li>clean plastic drinks, detergent or cosmetic bottles, plastic pots, tubs and trays</li>
<li>paper, newspaper, brochures, magazines, envelopes, phone books</li>
<li>food packaging cardboard / packaging sleeves</li>
<li>cereal boxes</li>
<li>egg boxes</li>
<li>cardboard boxes / packaging</li>
<li>drinks cartons / tetrapaks</li>
</ul>
</div>
<div class="col-md-4">
<h2><img src="http://www.argyll-bute.gov.uk/sites/default/files/cross_2_0.png" alt="No" title="No" width="30" height="30" style="float: left; margin-left: 5px; margin-right: 5px;" /> <span style="color: #ff0000;">Please don't include:</span></h2>
<ul>
<li>oil or paint tins</li>
<li>plastic bags or liners</li>
<li>other types of plastic packaging</li>
<li>tissues</li>
<li>metallic wrapping paper</li>
<li>paper and card contaminated with food</li>
<li>painted paper or card</li>
</ul>
</div>
</div>
</div>
 
  
    <a href="#pagetwo" data-transition="flow" class="ui-btn ui-btn-inline ui-corner-all ui-icon-search ui-btn-icon-left">Go to Page Two</a>
	<a href="#homepage" data-transition="flow" data-direction="reverse" class="ui-btn ui-btn-inline ui-corner-all ui-icon-home ui-btn-icon-left">Go to Homepage</a>
  </div>
  
    <div data-role="footer">
    <h1>Phone:  01546 605522</h1>
  </div>
</div>

<div data-role="page" data-dialog="true" id="pagetwo">
  <div data-role="header">
    <h1>Argyll and Bute Council<br/>
	Bins and bin stuff</h1>
  </div>

  <div data-role="main" class="ui-content">
    <a href="#pageone" data-transition="flow" data-direction="reverse" class="ui-btn ui-btn-inline ui-corner-all ui-icon-info ui-btn-icon-left">Go to Page One</a>
	<a href="#homepage" data-transition="flow" data-direction="reverse" class="ui-btn ui-btn-inline ui-corner-all ui-icon-home ui-btn-icon-left">Go to Homepage</a>
  </div>
  
    <div data-role="footer">
    <h1>Phone:  01546 605522</h1>
  </div>
</div>
</body>

</html>