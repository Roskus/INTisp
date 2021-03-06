<?php

use OAuth\OAuth2\Service\Google;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;

require_once 'vendor/autoload.php';
function auth()
{
    require 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    $sql = "SELECT value FROM settings WHERE code =  'google_public' LIMIT 0 , 30";

    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $gpub = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    $sql = "SELECT value FROM settings WHERE code =  'google_secret' LIMIT 0 , 30";

    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $gsec = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    $serviceFactory = new \OAuth\ServiceFactory();
    // Session storage
    $actual_link = (isset($_SERVER['HTTPS']) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $storage = new Session();
    $credentials = new Credentials(
    $gpub,
    $gsec,
    $actual_link
);
    $googleService = $serviceFactory->createService('google', $credentials, $storage, array('userinfo_email', 'userinfo_profile'));
    if (!empty($_GET['code'])) {
        // retrieve the CSRF state parameter
        $state = isset($_GET['state']) ? $_GET['state'] : null;
        // This was a callback request from google, get the token
        $googleService->requestAccessToken($_GET['code'], $state);
        // Send a request with it
        $result = json_decode($googleService->request('userinfo'), true);
        // Show some of the resultant data
        return $result['email'];
    } else {
        $url = $googleService->getAuthorizationUri();
        header('Location: '.$url);
        die();
    }
}
