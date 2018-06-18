<script src="https://apis.google.com/js/platform.js"></script>
	<?php
	require_once './include/vendor/autoload.php';
	if (isset($_GET['q'])) {
  $DEVELOPER_KEY = 'YOUR API KEY';

  $client = new Google_Client();
  $client->setDeveloperKey($DEVELOPER_KEY);

  // Define an object that will be used to make all API requests.
  $youtube = new Google_Service_YouTube($client);

  $htmlBody = '';
  try {

    // Call the search.list method to retrieve results matching the specified
    // query term.
    $searchResponse = $youtube->search->listSearch('id,snippet', array(
      'q' => $_GET['q'],
      'maxResults' => 10,
    ));

    $videos = '';
    $channels = '';
    $playlists = '';

    foreach ($searchResponse['items'] as $searchResult) {
      switch ($searchResult['id']['kind']) {
        case 'youtube#video':
          $videos .= sprintf('<li>%s</li>',
              '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $searchResult['id']['videoId'] . '" frameborder="0" allowfullscreen></iframe>');
          break;
        case 'youtube#channel':
          $channels .= sprintf('<li>%s</li>',
              '<div style="left: 30px;" class="g-ytsubscribe" data-channelid="'. $searchResult['id']['channelId'] . '" data-layout="full" data-theme="dark"　data-count="default"></div>');
          break;
        case 'youtube#playlist':
          $playlists .= sprintf('<li>%s</li>',
              '<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=' . $searchResult['id']['playlistId'] . '" frameborder="0" allowfullscreen></iframe>');
          break;
      }
    }

    $htmlBody .= <<<END
    <ul id="videoresult">$videos</ul>
    <ul id="channelresult">$channels</ul>
    <ul id ="listresult">$playlists</ul>
END;
  } catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }
}
  ?>
  <?=$htmlBody?>
  </div>
  <div id="bottom"></div>