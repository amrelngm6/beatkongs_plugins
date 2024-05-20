<?php
/**
 * SRMP3_AudioPreview Class
 *
 * A class to handle MP3 audio previews in WordPress.
 */
class SRMP3_AudioPreview {
    private static $instance = null;
    private $ffmpeg_path;
    private $overwrite;
    private $folder_name;
    private $preview_batch_size;
    private $preview_duration;
    private $fadein_duration;
    private $fadeout_duration;
    private $ad_preroll;
    private $ad_postroll;
    private $uploads_dir;
    private $watermark_file;
    private $trimstart;
    private $customFilePrefix;

    private $preview_duration_overall;
    private $fadein_duration_overall;
    private $fadeout_duration_overall;
    private $ad_preroll_overall;
    private $ad_postroll_overall;
    private $watermark_file_overall;
    private $watermark_spacegap_overall;
    private $trimstart_overall;

    /**
     * Constructor
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new SRMP3_AudioPreview();
        }
        return self::$instance;
    }
    private function __construct() {

        // Initialization code here
        $this->ffmpeg_path = get_option('srmp3_ffmpeg_path');
        $this->folder_name = (Sonaar_Music::get_option('preview_folder_name', 'srmp3_settings_audiopreview') != null) ? Sonaar_Music::get_option('preview_folder_name', 'srmp3_settings_audiopreview') : 'audio_preview';
        $this->preview_batch_size = (Sonaar_Music::get_option('preview_batch_size', 'srmp3_settings_audiopreview') != null) ? intval(Sonaar_Music::get_option('preview_batch_size', 'srmp3_settings_audiopreview')) : 1;
        $this->overwrite = Sonaar_Music::get_option('preview_overwrite', 'srmp3_settings_audiopreview');
        $this->preview_duration_overall = Sonaar_Music::get_option('audiopreview_duration', 'srmp3_settings_audiopreview');
        $this->fadein_duration_overall = Sonaar_Music::get_option('fadein_duration', 'srmp3_settings_audiopreview');
        $this->fadeout_duration_overall = Sonaar_Music::get_option('fadeout_duration', 'srmp3_settings_audiopreview');
        $this->ad_preroll_overall = Sonaar_Music::get_option('ad_preroll', 'srmp3_settings_audiopreview');
        $this->ad_postroll_overall = Sonaar_Music::get_option('ad_postroll', 'srmp3_settings_audiopreview');
        $this->watermark_file_overall = Sonaar_Music::get_option('audio_watermark', 'srmp3_settings_audiopreview');
        $this->watermark_spacegap_overall = (Sonaar_Music::get_option('watermark_spacegap', 'srmp3_settings_audiopreview') != null) ? intval(Sonaar_Music::get_option('watermark_spacegap', 'srmp3_settings_audiopreview')) : 5.5;
        $this->trimstart_overall = Sonaar_Music::get_option('trimstart', 'srmp3_settings_audiopreview');
        
        $this->setup_audio_preview_environment();
       

        add_action('wp_ajax_index_audio_preview', array($this, 'index_audio_preview'));
        add_action('wp_ajax_count_audio_files', array($this, 'count_audio_files'));
        add_action('wp_ajax_remove_audio_files_and_update_posts', array($this, 'remove_audio_files_and_update_posts'));
    }

    private function setup_audio_preview_environment() {
        if (defined('DOING_AJAX') && !DOING_AJAX) {
            return; // Don't execute for AJAX operations
        }
        // Check if ffmpeg exists
        //error_log("SETUP AUDIO PREVIEW ENVIRONMENT");

        $folder = '/' . $this->folder_name . '/';
        $this->uploads_dir = wp_get_upload_dir()['basedir'] . $folder;
        
        
        if (!is_dir($this->uploads_dir)) {
            mkdir($this->uploads_dir, 0755);
        }
    }
    public function saveThePageFirst(){
        
        echo json_encode([
            'message' => 'Error! Save this page first.',
            'progress' => 100,
            'error' => true,
            'completed' => true,
            'totalPosts' => 0,
            'processedPosts' => 0
        ]);
        wp_die();
    }
    public function fileNotCreated(){        
        echo json_encode([
            'message' => 'Error! File has not been created',
            'progress' => 100,
            'error' => true,
            'completed' => true,
            'totalPosts' => 1,
            'processedPosts' => 1
        ]);
        wp_die();
    }
   
    
















    public function index_audio_preview() {
        check_ajax_referer('sonaar_music_admin_ajax_nonce', 'nonce');
        // Check if either is null and return if so
        if ($this->preview_duration_overall === null) {
            $this->saveThePageFirst();
        }

        // Arguments to get all products and sr_playlist posts with alb_tracklist meta key.
        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : null;
        $index = isset($_POST['index']) ? intval($_POST['index']) : null;

        if ($post_id !== null && $index !== null) {
            // Directly fetch the relevant data based on $post_id
            $data = get_post_meta($post_id, 'alb_tracklist', true);
    
            if ($data && isset($data[$index])) {
                $item = $data[$index];
                $this->overwrite = 'true';
                
                $file_output = '';
                if (isset($item['track_mp3']) && !empty($item['track_mp3'])) {
                    $file_output = $this->trimfile($item['track_mp3'], null, $post_id, $index, $data);
                    //error_log("dataaa = " . print_r($data[$index], true));
                
                }
                if (isset($item['stream_link']) && !empty($item['stream_link'])) {
                        $stream_title = isset($item['stream_title']) ? $item['stream_title'] : $index;
                        $file_output = $this->trimfile($item['stream_link'],  $stream_title, $post_id, $index, $data);
                }
                
                if(!$file_output || $file_output == ''){
                     $this->fileNotCreated();
                }else{
                    $filename = isset($file_output) ? basename($file_output) : '';

                    echo json_encode([
                        'progress' => 100,
                        'message' => '[' . $filename .'] generated!',
                        'file_output' => $file_output,
                        'completed' => true,
                        'totalPosts' => 1,
                        'processedPosts' => 1
                    ]);
                    wp_die();
                }
            }else{
                $this->saveThePageFirst();    
            }
        }else{
            $limit = $this->preview_batch_size; // Process 250 posts at a time. Adjust this value based on your needs.
            $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
            $posts_in = isset($_POST['posts_in']) ? $_POST['posts_in'] : null;
            $args = array(
                'post_type' => array('product', 'sr_playlist'),
                'meta_key'  => 'alb_tracklist',
                //'post__in' => array( 5932,5933,5934,5935 ),
                'posts_per_page' => $limit,
                'offset' => $offset,
            );
            // if posts_in, add to args
            if ($posts_in !== null && !empty($posts_in)) {
                //convert posts_in in array
                $posts_in = explode(',', $posts_in);
                $args['post__in'] = $posts_in;
            }

            $query = new WP_Query( $args );

            $totalPosts = $query->found_posts;
            $processedPosts = $offset;
            $progress = 0;
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $data = get_post_meta($post_id, 'alb_tracklist', true);
                    if ($data && is_array($data)) {
                        foreach ($data as $index => $item) {
                            if (isset($item['post_audiopreview']) && $item['post_audiopreview'] === 'disabled') {
                                continue;
                            }else{
                                if (isset($item['track_mp3']) && !empty($item['track_mp3'])) {
                                        $this->trimfile($item['track_mp3'], null , $post_id, $index, $data); //will returns preview_filename;
                                }
                                if (isset($item['stream_link']) && !empty($item['stream_link'])) {
                                        $stream_title = isset($item['stream_title']) ? $item['stream_title'] : $index;
                                        $this->trimfile($item['stream_link'], $stream_title, $post_id, $index, $data);
                                }
                            }
                        
                        }
                        
                        $processedPosts++;
                    }
                }

                $progress = ($processedPosts / $totalPosts) * 100;
            }

            $response = array(
                'progress' => isset($progress) ? $progress : 0,  // Ensure that $progress is set
                'message' => '',
                'completed' => ($progress >= 100),
                'totalPosts' => $totalPosts,
                'processedPosts' => $processedPosts
            );

            // Reset post data.
            wp_reset_postdata();
            echo json_encode($response);
            wp_die();
        }
    }
    
    private function trimfile($file_input_fullpath, $file_output_title = null , $post_id = '', $index = null, $data = null){
      
        if($data){
            $item = $data[$index];
            // Check if we should use the track custom preview
            if (isset($data[$index]['post_audiopreview_settings']) && $data[$index]['post_audiopreview_settings'] == 'custom') {
                $this->customFilePrefix = 'x';
                $this->preview_duration = isset($item['post_audiopreview_duration']) ? $item['post_audiopreview_duration'] : 30;
                $this->fadein_duration = isset($item['post_fadein_duration']) ? $item['post_fadein_duration'] : 0;
                $this->fadeout_duration = isset($item['post_fadeout_duration']) ? $item['post_fadeout_duration'] : 0;
                $this->ad_preroll = isset($item['post_ad_preroll']) ? $item['post_ad_preroll'] : null;
                $this->ad_postroll = isset($item['post_ad_postroll']) ? $item['post_ad_postroll'] : null;
                $this->watermark_file = isset($item['post_audio_watermark']) ? $item['post_audio_watermark'] : null;
                $this->trimstart = isset($item['post_trimstart']) ? $item['post_trimstart'] : 0;
            }else{
                $this->customFilePrefix = '';
                $this->preview_duration = $this->preview_duration_overall;
                $this->fadein_duration = $this->fadein_duration_overall;
                $this->fadeout_duration = $this->fadeout_duration_overall;
                $this->ad_preroll = $this->ad_preroll_overall;
                $this->ad_postroll = $this->ad_postroll_overall;
                $this->watermark_file = $this->watermark_file_overall;
                $this->trimstart = $this->trimstart_overall;
                
            }
        }


        $this->trimstart = strtotime("1970-01-01 $this->trimstart UTC");
        $this->preview_duration = strtotime("1970-01-01 $this->preview_duration UTC");


        if ($file_output_title == null){
            // Extract the filename from the full path
            $parsed_url = parse_url($file_input_fullpath);
            $file_name = basename($parsed_url['path']);
            // Find the last occurrence of the period in the filename to determine the start of the extension
            $extension_position = strrpos($file_name, '.');
            // Generate a sanitized file name
            $sanitized_file_name = preg_replace('/[^a-zA-Z0-9\-\._]/', '_', $file_name);
            $file_output = $this->customFilePrefix . $post_id . '_' . substr($sanitized_file_name, 0, $extension_position) . '_preview' . substr($sanitized_file_name, $extension_position);
        }else{
            $file_output =  $this->customFilePrefix . $post_id . '_' . $file_output_title . '_preview.mp3';
        }
        // replace spaces by _
        $file_output = preg_replace('/[^a-zA-Z0-9\-\._]/', '_', $file_output);

        $file_output_fullpath =  $this->uploads_dir . $file_output;
        $file_output_url = str_replace(wp_get_upload_dir()['basedir'], wp_get_upload_dir()['baseurl'], $file_output_fullpath);
        if ($this->overwrite == 'false'){
            if (file_exists($file_output_fullpath)) {
                //error_log("File " . $post_id . " already exists. Skipping...");
                return;
            }
        }
        

        $uploads = wp_get_upload_dir();
        $site_domain = parse_url(get_site_url(), PHP_URL_HOST);
        $file_domain = parse_url($file_input_fullpath, PHP_URL_HOST);

        if ($site_domain !== $file_domain) {
            // The file is external. Download it to a temporary location.
            $temp_file =  $this->uploads_dir . 'temp_' . uniqid() . '.mp3';
            $ch = curl_init($file_input_fullpath);
            $fp = fopen($temp_file, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // this will follow redirects
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);

            // Update the input file path to the downloaded temporary file
            $file_input_fullpath = $temp_file;

            // The file is external. Handle or skip as needed.
            //return false;  // Exit the function or handle the external file case as you see fit.
        }
        $file_input_fullpath = str_replace($uploads['baseurl'], $uploads['basedir'], $file_input_fullpath);
        $file_input_fullpath = urldecode($file_input_fullpath);

        $watermark_file = $this->watermark_file;
        $trimstart = $this->trimstart;
        $this->preview_duration = $trimstart + $this->preview_duration;
        //$trimend = $trimstart + $duration;
        $duration = $this->preview_duration; // total duration in seconds
        $fadein_duration = $this->fadein_duration; // fade in duration in seconds
        $fade_duration = $this->fadeout_duration; // fade out duration in seconds
        $preroll_file = $this->ad_preroll;
        $postroll_file =  $this->ad_postroll;
        /*error_log('------------------------------------------------');
        error_log("post_id: " . $post_id);
        error_log("file_input_fullpath: " . $file_input_fullpath);
        error_log("duration: " . $duration);
        error_log("fadein_duration: " . $fadein_duration);
        error_log("fade_duration: " . $fade_duration);
        error_log("preroll_file: " . $preroll_file);
        error_log("watermark_file: " . $watermark_file);
        error_log("trim start at: " . $trimstart);
        error_log('------------------------------------------------');*/

        
        $inputs = []; 
        $filters = [];
        $filter_str = "";
        // Construct the FFmpeg command
        $cmd = $this->ffmpeg_path . " -y";


        // If an intro is provided, add it
        if (!empty($preroll_file)) {
            $cmd .= " -i " . escapeshellarg($preroll_file);
            $inputs['intro'] = count($inputs);
        }
        $inputs['main'] = count($inputs);

        if (!empty($this->watermark_file)) {
            $watermarkResults = $this->applyWatermark($file_input_fullpath, $file_output_fullpath);
            $file_input_fullpath = $watermarkResults['watermarked_file'];
            $temp_watermark = $watermarkResults['temp_watermark'];
            $filters[] = "[{$inputs['main']}:a]asetpts=PTS-STARTPTS[a]";
        }else{
            $filters[] = "[{$inputs['main']}:a]atrim=" . $trimstart . ":" . $duration . ",asetpts=PTS-STARTPTS[a]";
        }

        $cmd .= " -i " . escapeshellarg($file_input_fullpath);
       
        // If an outro is provided, add it
        if (!empty($postroll_file)) {
            $cmd .= " -i " . escapeshellarg($postroll_file);
            $inputs['outro'] = count($inputs);
            //error_log("postroll_file: " . $postroll_file);

        }

        // Apply fade-in effect
        if ($fadein_duration > 0) {
            $filters[] = "[a]afade=t=in:st=0:d=" . $fadein_duration . "[a1]";
            $latest_audio = "a1";
        } else {
            $latest_audio = "a";
        }

        // Apply fade-out effect
        if ($fade_duration > 0) {
            $fadeout_start = $duration - $trimstart - $fade_duration;
            $filters[] = "[{$latest_audio}]afade=t=out:st=" . $fadeout_start . ":d=" . $fade_duration . "[a2]";
            $latest_audio = "a2";
        }

        $audio_streams = "";

        if (isset($inputs['intro'])) {
            $audio_streams .= "[{$inputs['intro']}:a]";
        }
        $audio_streams .= "[$latest_audio]";
        if (isset($inputs['outro'])) {
            $audio_streams .= "[{$inputs['outro']}:a]";
        }
       
        

        $cmd .= " -filter_complex \"" . implode(";", $filters) . ";{$audio_streams}concat=n=" . (count($inputs)) . ":v=0:a=1[out]\" -map \"[out]\" " . escapeshellarg($file_output_fullpath);
        $cmd .= " 2>&1";  // To display error

        // Log the FFmpeg command
        //error_log("FFmpeg FINAL CMD: " . $cmd);

        // Execute the FFmpeg command
        $output = shell_exec($cmd);

        // If FFmpeg produces any output (including errors), log it
        if (!empty($output)) {
            error_log("FFmpeg output: " . $output);
        }

        if (isset($temp_watermark) && file_exists($temp_watermark)) {
            unlink($temp_watermark); // Delete the temporary watermark file
        }

        if (isset($temp_file) && file_exists($temp_file)) {
            unlink($temp_file);
        }

        if (file_exists($file_output_fullpath)) {
        }else{
            $file_output_url = ''; // we want to save/update the post below as well.
        }

        // Fetch current 'alb_tracklist' data
        $alb_tracklist = get_post_meta($post_id, 'alb_tracklist', true);

        // Check if the fetched data is an array (to avoid PHP errors) and if index is provided
        if (is_array($alb_tracklist) && isset($index) && isset($alb_tracklist[$index])) {
            // Update the 'audio_preview' key of the specific item in the array with the new path
            $alb_tracklist[$index]['audio_preview'] = $file_output_url;
            //error_log("alb_tracklist: " . print_r($alb_tracklist, true));
            // Update the post meta with the modified data
            update_post_meta($post_id, 'alb_tracklist', $alb_tracklist);
        }
        return $file_output_url;
    }

    private function applyWatermark($input_file, $output_file) {
        $temp_watermark = $this->uploads_dir . 'temp_watermark_' . uniqid() . '.mp3';
        $duration = $this->preview_duration; // total duration in seconds
        $watermark_audiolevel = 2;
        $watermark_spacegap = $this->watermark_spacegap_overall; // ...
        $watermark_beginat = 0;
        $trimstart = $this->trimstart;
        $silence_file = $this->uploads_dir . 'silence.mp3';

        //error_log('------------------------------------------------');
        //error_log("trimstart: " . $trimstart);
        //error_log("duration: " . $duration);
        
        $cmd_silence = $this->ffmpeg_path . " -y -f lavfi -i anullsrc=r=44100:cl=stereo -t " . $watermark_spacegap . " " . escapeshellarg($silence_file);

        shell_exec($cmd_silence);
        
        $cmd = $this->ffmpeg_path . " -y -i " . escapeshellarg($input_file);
        $cmd .= " -i " . escapeshellarg($this->watermark_file);
        $cmd .= " -i " . escapeshellarg($silence_file);
        $cmd .= " -filter_complex \"[0:a]atrim=" . $trimstart . ":" . $duration . ",asetpts=PTS-STARTPTS[a];[1:a]volume=" . $watermark_audiolevel . ",adelay=" . $watermark_beginat . "|" . $watermark_beginat . "[watermark];[2:a][watermark]concat=n=2:v=0:a=1,aloop=loop=-1:size=2e+09[watermarkloop];[a][watermarkloop]amix=inputs=2:duration=first[out]\" -map \"[out]\" " . escapeshellarg($temp_watermark);
        $cmd .= " 2>&1";  // To display error
        

        // Log the FFmpeg command
       // error_log("FFmpeg WATERMARK CMD: " . $cmd);

        // Execute the FFmpeg command
        $output = shell_exec($cmd);

        // If FFmpeg produces any output (including errors), log it
        if (!empty($output)) {
            error_log("FFmpeg WTMRK output: " . $output);
        }

        shell_exec($cmd);
        
        return [
            'watermarked_file' => $temp_watermark,
            'temp_watermark' => $temp_watermark
        ];
    }
    public function count_audio_files() {
        check_ajax_referer('sonaar_music_admin_ajax_nonce', 'nonce');

        $files = glob($this->uploads_dir . '*.*');
        $fileCount = count($files);
        echo json_encode(['count' => $fileCount]);
        wp_die();
    }
    public function remove_audio_files_and_update_posts() {
        check_ajax_referer('sonaar_music_admin_ajax_nonce', 'nonce');

        try {
            // 1. Remove all files from your folder
            $files = glob($this->uploads_dir . '*'); // get all file names
            foreach($files as $file) { 
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }

            // 2. Update all posts
            $args = array(
                'post_type' => array('product', 'sr_playlist'),
                'meta_key'  => 'alb_tracklist',
                'posts_per_page' => -1 // get all posts
            );

            $query = new WP_Query($args);
            if($query->have_posts()) {
                while($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $data = get_post_meta($post_id, 'alb_tracklist', true);
                    if($data && is_array($data)) {
                        foreach($data as $index => $item) {
                            $data[$index]['audio_preview'] = ''; // set 'audio_preview' to empty
                        }
                        update_post_meta($post_id, 'alb_tracklist', $data); // update the post meta
                    }
                }
            }

            // Return success response
            echo json_encode([
                'success' => true,
                'message' => 'All files removed and posts updated successfully!'
            ]);
            wp_die();

        } catch(Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
            wp_die();
        }
    }
    
    
}
