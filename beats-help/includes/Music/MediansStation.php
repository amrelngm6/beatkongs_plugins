<?php 

include 'MediansTrack.php';

/**
 * Medians Beats Station
 * Handle the station with its items
 */
final class MediansStation 
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
    

    public function __construct($term)
    {
        $this->id = $term->term_id;
        $this->title = $term->name;
    }


    /**
     * Load Station items
     */
    public function loadStationItems()
    {
        
        $args    = [
            'post_type'         => 'beat',
            'post_status'         => ['publish'],
            'tax_query'         =>  array(
                'taxonomy' => 'station',
                'field'    => 'term_id', // Can be 'term_id', 'name', or 'slug'
                'terms'    => array($this->id), // Replace with your categories
            )
        ];

        return get_posts($args);
    }
    
    
    /**
     * Load Station items
     */
    public function loadStationItemsPlayer()
    {
        
        $args    = [
            'post_type'         => 'beat',
            'post_status'         => ['publish'],
            'orderby'        => 'rand',
            'tax_query'         =>  array(
                'taxonomy' => 'station',
                'field'    => 'term_id', // Can be 'term_id', 'name', or 'slug'
                'terms'    => array($this->id), // Replace with your categories
            )
        ];

        $reponse = [];
        $beats = get_posts($args);
        foreach ($beats as $key => $value) {
            $reponse[$key] = new MediansTrack($value);
        }
        
        return json_encode([
            'playlist_name' => $this->title,
            'tracks'        => $reponse
        ]);
    }
    
    
    
    /**
     * Load Playlist items
     */
    public function add($item)
    {
        
    }
    

}
