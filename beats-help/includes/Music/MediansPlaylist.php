<?php 


/**
 * Medians Beats Playlist
 * Handle the playlist with its items
 */
final class MediansPlaylist 
{
    

    /**
     * Int $id
     */
    public $id;

    
    /**
     * String $title
     */
    public $title;

    /**
     * [ MediansBeat() ] $tracks
     */
    public $tracks;
    
    /**
     * Load Station items
     */
    public function loadStationItems($params)
    {
        
        $args    = [
            'post_author'         => get_current_user_id(),
            'post_type'         => 'beat',
            'post_status'         => ['publish'],
            'tax_query'         =>  array(
                'taxonomy' => 'station',
                'field'    => 'term_id', // Can be 'term_id', 'name', or 'slug'
                'terms'    => array($term->term_id), // Replace with your categories
            )
        ];

        $beats = get_posts($args);

        $args = array(
            'post_type' => 'beat', 
            'meta_key' => 'medians_beat_playlist', 
            'meta_value' => intval($params['id']), 
            'posts_per_page' => 50 
        );
        
        // Create a new instance of WP_Query
        $query = new WP_Query($args);
        return $query->posts ?? [];
    }
    
    
    
    
    /**
     * Load Playlist items
     */
    public function add($item)
    {
        
    }
    

    /**
     * Load Playlist items
     */
    public function loadPlaylists()
    {
        
        $args    = [
            'post_type'         => 'playlist',
            'post_status'         => 'publish',
        ];
        return get_posts($args);
    }


    /**
     * Load Playlist items
     */
    public function totalCount()
    {
        
        $args    = [
            'post_type'         => 'playlist',
        ];
        $posts = get_posts($args);

        return count(get_posts($args));
    }

    /**
     * Load
     */
    public function totalPlaysCount()
    {
        global $wpdb;
    
        // Query to sum all plays_count meta values
        $total_plays = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT SUM(CAST(meta_value AS UNSIGNED)) 
                FROM $wpdb->postmeta 
                WHERE meta_key = %s",
                'plays_count'
            )
        );
    
        // Return the total plays count
        return $total_plays;
    }
}
