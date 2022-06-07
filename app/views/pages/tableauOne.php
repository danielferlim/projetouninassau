<?php
/*
PHP Script to generate a ticket to redeem a view on Tableau Server from a trusted web server

Place this script in the web root folder of the trusted web server, and generate a request from a client that can access the same. Your request must have the following parameters -

server - Tableau Server URL
username - Tableau Server username
target_site - Site ID (if it is not Default)
*/

$url = 'https://analytics.meutudo.app';
$url = $url . "/trusted";
$username = 'dataavengers1@meutudo.app';
// $site = $_GET ['target_site'];

if (isset($site) === FALSE)
{
	$data = array('username' => $username);
}
else
{
	$data = array('username' => $username, 'target_site' => $site);
}

$options = array(
    'http' => array(
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
//echo($result);
if ($result === FALSE) { echo "-1"; }

?>

<!DOCTYPE html>
<html>
<title>TABLEAU VIEW</title>
<!-- Importing Tableau API -->
<script type="text/javascript" src="https://analytics.meutudo.app/javascripts/api/tableau-2.8.3.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 
<body onload="initialize();">
    <div id="tableauViz"></div>
</body>

<script >   

var viz;
function refreshView(){
    viz.refreshDataAsync();
}

        function initialize() { 

        var placeholderDiv = document.getElementById("tableauViz");
                
        var url = "https://analytics.meutudo.app/trusted/<?php echo $result ?>/views/PainelTVCadastro/PainelTVCadastro?:iid=";
        var options = {
                hideTabs: true,
                hideToolbar: true,
                width: "100%",
                height: "97%",
                height: "97vh",
                position: "absolute"                
                }
        viz = new tableau.Viz(placeholderDiv, url, options);
        }

        setInterval(refreshView,600000);

</script>    
</html>

<!-- http://analytics.meutudo.app/trusted/C13F-yg_Q6Wu2jNEUb2qGQ==:nrnaU3P-7rcsfm81EbP27tnu/views/PainelTVCadastro/PainelTVCadastro?:iid=1 -->
<!-- var url = "https://analytics.meutudo.app/views/PainelTVCadastro/PainelTVCadastro?:iid=1"; -->