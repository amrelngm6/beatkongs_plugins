<?php

class MediansBeat {

    

    public $ID = 0;
    public $mp3;
    public $loading = true;
    public $track_title = "";
    public $track_artist = "";
    public $length = "";
    public $album_title = "";
    public $poster = "";
    public $track_image_id = 0;
    public $track_pos = 0;
    public $release_date = "";
    public $song_store_list = "";
    public $has_song_store = false;
    public $sourcePostID = 0;
    public $has_lyric = false;
    public $peak_allow_frontend = true;
    public $peakFile = "";
    public $description = "<p>80BPM | #piano<\/p>";
    public $icecast_json = false;
    public $icecast_mount = false;
    public $album_store_list = [];
    public $optional_storelist_cta = [];

    function __construct($post = null, ) {
        if (!$post) { return;}
        $this->ID = $post->ID;
        $this->sourcePostID = $post->ID;
        $this->track_title = $post->post_title;
        $this->description = $post->post_content;
        $this->track_artist = get_the_author_meta('display_name', $post->author);
        $this->poster = get_the_post_thumbnail_url($post->ID);
        $this->track_image_id = get_post_thumbnail_id($post->ID);
        $this->peakFile = get_site_url()."/wp-content/uploads/audio_peaks/$post->ID.peack";
        $this->length = get_post_meta($post->ID, 'beat_mp3', true) ;
        $this->length = $post->length ?? "";
        $this->mp3 = $this->handleMp3Path($post->ID);
        $this->handleStoreList($post);

    }

    /**
     * Handle Beat MP3 file path
     */
    function handleMp3Path($postID) {
        
        $beatMP3Url = get_post_meta($postID, 'beat_mp3_url', true) ?? '';
        $beatMP3Id = get_post_meta($postID, 'beat_mp3', true) ?? '';
        $localBeatMP3 = wp_get_attachment_url($beatMP3Id);

        return !empty($beatMP3Url) 
        ? $beatMP3Url
        : $localBeatMP3;
        
    }

    /**
     * Handle Beat MP3 file path
     */
    function handleStoreList($post) {
        
            $this->album_store_list[] =  
            [
                "store-icon" => "fas fa-cart-plus",
                "store-link"=> get_site_url()."/beat/".$post->post_name,
                "store-name"=> "$00.00",
                "store-target"=> "_self",
                "show-label"=> true,
                "has-variation"=> true,
                "product-id"=> get_site_url()."/beat/".$post->ID
            ];
        
    }

    /**
     * Load Playlist items
     */
    public function findItem($id)
    {
        // Create a new instance of WP_Query
        return get_post(intval($id));
    }
    
    /**
     * Get total items
     */
    public function totalCount()
    {
        $args    = [
            'post_type'         => 'beat',
        ];

        return count(get_posts($args));
    }
        
    function setId($id) {
        $this->ID = $id;
        return $this;
    }

    function setMp3($mp3) {
        $this->mp3 = $mp3;
        return $this;
    }

    function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    function setArtist($artist) {
        $this->artist = $artist;
        return $this;
    }

    function setCover($cover) {
        $this->cover = $cover;
        return $this;
    }

    function setText($text) {
        $this->text = $text;
        return $this;
    }

    function setIndex($index) {
        $this->index = $index;
        return $this;
    }

    function getId() {
        return $this->ID;
    }

    function getMp3() {
        return $this->mp3;
    }

    function getTitle() {
        return $this->title;
    }

    function getArtist() {
        return $this->artist;
    }

    function getCover() {
        return $this->cover;
    }

    function getText() {
        return $this->text;
    }
}