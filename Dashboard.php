<?php

//// Embed Properties ////
$secretCode = "pn4MIykyAlhDYJRXzQMXUwsQDbl1Y0d";
$userInfo = "vinothkumare@syncfusion.com"; // Email address of the user
$embedDashboardUrl = "";// Your dashboard embedding URL

//// URL parameters //// 
$nonce = '1a882bed-2f25-4877-9bd7-aeb4fdb9c730'; // Random string in this format
$canSaveView = "true"; // Enable or disable permission to create, open, update, delete view 
$hasViews = "true"; // Enable or disable the permission to check the views of the dashboard
$hasExport = "true"; // enable or disable the permission to export the dashboards and widgets
$hasDashboardComments = "true"; // Enable or disable the permission to comment related actions to dashboards
$hasWidgetComments = "true"; // Enable or disable the permission to comment related actions to widgets
$isMarkFavorite = "true"; // Enable to disable the permission to make the dashboard favorite
$timeStamp = time(); // Current time as UNIX time stamp
$expirationTime = "100"; // Alive time of the token

//// Making URL with parameters ////            
$embedMessage = "embed_nonce=" . $nonce . "&embed_user_email=" . $userInfo . "&embed_dashboard_views_edit=" . $canSaveView . "&embed_dashboard_views=" . $hasViews . "&embed_dashboard_export=" . $hasExport . "&embed_dashboard_comments=" . $hasDashboardComments . "&embed_widget_comments=" . $hasWidgetComments . "&embed_dashboard_favorite=" . $isMarkFavorite . "&embed_timestamp=" . $timeStamp . "&embed_expirationtime=" . $expirationTime;

//// Prepare embed_Signature by encrypting with secretCode ////
$keyBytes = utf8_encode($secretCode);            
$messageBytes = utf8_encode($embedMessage);
$hashMessage = hash_hmac('sha256',$messageBytes, $keyBytes, true);
$signature = base64_encode($hashMessage);

//// Appending signature with existing URL ////
$embedSignature = $embedMessage . "&embed_signature=" . $signature;


?>

<iframe src='<?php echo $embedDashboardUrl; ?>' id='dashboard-frame' width='500px' height='500px' allowfullscreen frameborder='0'></iframe>

