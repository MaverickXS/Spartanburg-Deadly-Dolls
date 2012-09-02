<?
// Get FB Access Token
$url    = 'https://graph.facebook.com/oauth/access_token?client_id=277754392334380&client_secret=60bdee57edf5d5c7a27da109d543fbab&grant_type=client_credentials';
$ch     = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$output = curl_exec($ch); 
curl_close($ch);
$fb_access_token = str_ireplace('access_token=', '', $output);

// Get events
$url    = 'https://graph.facebook.com/spddolls/posts?access_token=' . $fb_access_token; // SDD
//$url  = 'https://graph.facebook.com/576061663/events?access_token=' . $fb_access_token; // Me
$ch     = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$output = curl_exec($ch); 

// Convert response
$fb_json = json_decode($output);

// Handle Output
if (curl_getinfo($ch, CURLINFO_HTTP_CODE)==200){
    if (count($fb_json) > 0 && strlen($output) > 11){
        $fb_posts   = $fb_json->data;
        $count      = 0;
        if (count($fb_posts) > 0){
            foreach ($fb_posts as $post){
                //var_dump($post);
                if (!isset($post->story) && $post->type='status'){
                    $post_date = date('Y-m-d H:i:s', strtotime($post->created_time));
                    $count++;
                    ?>
                    <article>
                        <h3><?=date('M d, Y h:iA', strtotime($post_date . " +1 day"));?></h3>
                        <p><?=$post->message;?></p>
                    </article>
                    <?
                }

                if ($count==4){
                    break;
                } 
            }
        }
    }
}
curl_close($ch);
?>