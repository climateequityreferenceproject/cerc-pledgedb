<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Climate Equity Reference Calculator Pledges Database</title>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="tinymce/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
        
        <script type="text/javascript" src="js/pledges.js"></script>
        <script type="text/javascript" src="tinymce/js/pledge_editor.js"></script>
        
        <link rel="stylesheet" type="text/css" href="css/pledges.css" />
    </head>
    <body>
        <h1>Help text for the caveat field</h1>
        We use the Caveat field to store other random information about the pledge in JSON format. <br>
        <ul><li>The User Interface lists all the data fields currently in use; you don't need to worry about syntax except for those important points:</li>
            <li>It is ok to mark up the texts within the JSON values with html, but any quotation marks must be written as html entities, i.e. &amp;quot; for double quotes and &amp;#39; for single quotes. Nowhere in the JSON data fields should quotation marks occur in plain (also be careful about other special chars like backslash, ampersand, question mark and hash symbol - test whether your input works as expected in the calculator).</li>
            <li>there are a few fields (help_text), where even encoded single and double quotes break the system; don't use them there. If you need to use quotes there, use typographical quotes, for example &amp;ldquo; (left double quote) for an opening quote and &amp;rdquo; (right double quote) for a closing quotation mark.</li>
            <li>quotation marks also break any HTML markup. For example, do not write <span style='font-family: monospace;'>&lt;a href="glossary.php#gloss_bau"&gt;</span> but rather <span style='font-family: monospace;'>&lt;a href=glossary.php#gloss_bau&gt;</span></li>
<?php // TODO: create collapsable entry form for caveat field that encodes and decodes user input as needed and ensures proper JSON 
      // single and double quotes are tested and confirmed to break at least the custom helptext popup, if quotes are used as html encoded
      // entities in html tags, e.g. <a href=&quot;random_link.php&quot;> it also breaks. 
            echo "<li>Currently, these keys are used by the calculator"."\n";
            echo "<ul>" . "\n";
            include_once('config/caveat_fields.php');
            foreach ($caveat_fields as $caveat_data_type) {
                echo "<li>".$caveat_data_type['name'] . " = " . $caveat_data_type['description'] . "</li>" . "\n";
            }
            echo "</ul>" . "\n";
        ?>
        </ul>
        <br /><br /> 
        Here is an example:<br />
        <textarea name="caveat" cols="120" rows="12" class="mceNoEditor">{"description_override":"reduce total emissions by 22% compared to Mexican INDC baseline", "help_label":"<br><b>important information on baseline calibration</b>", "help_title":"INDC Baseline Calibration", "help_text":"<p>Mexico has provided a BAU baseline in its INDC submissions. This BAU projection differs from the <a href=glossary.php#gloss_bau target=_self>no-policies baseline</a> used by the Climate Equity Reference Calculator. We have therefore adjusted the Mexican INDC pledge to match the baseline used by the calculator. The target emissions in 2030 are identical for both methods.</p>"}

Calculation of target "hack": (1) BAU(2030) in INDC submission (GHG only, no Black Carbon) is 973 Mt CO2e); (2) 2030 non-conditional target is 22% below BAU in 2030; (3) (1) and (2) gives an emissions target of 758,940 kt CO2e; (4) absolute 2000 emissions for MEX are 618,040Kt CO2e. (5) from (3) and (4) follows that the 2030 target is a limitation to 122.8% of 2020 levels. </textarea>
        <br>
        Here is another one:<br />
        <textarea name="caveat2" cols="120" rows="12" class="mceNoEditor">This is not really a 'unconditional' pledge. Rather it is the low end of China's 60% to 65% pledge. {"unconditional":"yes","pledge_qualifier":"low end of range"}</textarea>
    </body>
</html>
