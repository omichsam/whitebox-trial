<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter Timeline Embed</title>
</head>

<body>

    <?php

    // Set your Bearer Token
    $bearerToken = 'AAAAAAAAAAAAAAAAAAAAAHSDvAEAAAAAZ1KSUzCo%2BXURSJNfL8LMUiVWoAc%3DfRk3lOKCroytXuNen01yiOybKnRKX9PwSSzoDCEqjCeq2PRjaq'; // Replace this with your actual Bearer Token
    
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.x.com/2/tweets",  // Replace this with the actual endpoint you want to hit
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $bearerToken"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // Handle errors
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // Decode JSON response for easier handling
        $responseData = json_decode($response, true);

        // Check if data exists in the response
        if (isset($responseData['data'])) {
            // Loop through the tweets and display
            foreach ($responseData['data'] as $tweet) {
                echo "Tweet ID: " . $tweet['id'] . "\n";
                echo "Tweet Text: " . $tweet['text'] . "\n";
                echo "Created At: " . $tweet['created_at'] . "\n\n";
            }
        } else {
            echo "No data found or there was an issue with the request.\n";
        }
    }

    ?>






</body>

</html>