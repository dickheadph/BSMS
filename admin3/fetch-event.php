<?php
    include "../connection.php";

    $json = array();
    //$sqlQuery = "SELECT notification.notif_ID, notification.start, resident.resFName, resident.resLName, request.docID FROM ((notification INNER JOIN resident ON notification.resID=resident.resID) INNER JOIN request ON notification.requestID=request.requestID ) ORDER BY notif_ID";

    $sqlQuery = "SELECT notification.notif_ID, notification.start, resident.resFName, resident.resLName, request.docID, document.type, request.status FROM notification INNER JOIN resident ON notification.resID=resident.resID INNER JOIN request ON notification.requestID=request.requestID INNER JOIN document ON notification.docID=document.docID ORDER BY notif_ID";

    $result = mysqli_query($con, $sqlQuery);
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    mysqli_close($con);
    echo json_encode($eventArray);
?>