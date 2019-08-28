<?php

    $client = new Google_Client();
    $client->setDeveloperKey('AIzaSyBDgE6dDpo2_HXLhkiVfBDrsV65i76ZHzM');

    // Define service object for making API requests.
    $service = new Google_Service_YouTube($client);

?>