<?php 

/**
 * Name:  BeatLicense
 * 
 * Description: Extract the License option value
 * or get default value if Author license is empty
 * 
 */


Class BeatLicense 
{
    
    public $defaultValue;

    public $defaultMetaValue;

    public $authorValue;

    public $authorMetaValue;


    // function __construct($defaultValue, $authorValue)
    // {
    //     $this->defaultValue = $authorValue ? $defaultValue : null;

    //     $this->authorValue = $authorValue ? $authorValue : null;
    // }

    public function getValue($key) 
    {

        // Check if the author has filled his license option
        if (isset($this->authorValue[$key]))
        {
            return $this->authorValue[$key];
        }

        // Return default license option value 
        if (isset($this->defaultValue[$key]))
        {
            return $this->defaultValue[$key];
        }
    }

    
    public function getMetaValue($key) 
    {

        // Check if the author has filled his license option
        if (isset($this->authorMetaValue[$key]))
        {
            return $this->authorMetaValue[$key][0] ?? '';
        }

        // Return default license option value 
        if (isset($this->defaultMetaValue[$key]))
        {
            return $this->defaultMetaValue[$key][0] ?? '';
        }
    }

    /**
     * Check if the option is selected or not
     */
    public function checkMetaSelected($key, $val = '') 
    {

        // Check if the author has filled his license option
        if (isset($this->authorMetaValue[$key]))
        {
            return $this->authorMetaValue[$key][0] == $val ? 'selected' : '';
        }

        // Return default license option value 
        if (isset($this->defaultMetaValue[$key]))
        {
            return $this->defaultMetaValue[$key][0] == $val ? 'selected' : '';
        }
    }

    /**
     * Check if the option is checked or not
     */
    public function checkMetaChecked($key, $val = '', $callback = 'unserialize') 
    {

        // Check if the author has filled his license option
        if (isset($this->authorMetaValue[$key]))
        {
            $list = unserialize(unserialize($this->authorMetaValue[$key][0]));
            return (is_array($list) && in_array($val, $list) ) ? 'checked' : '--';
        }

        // Return default license option value 
        if (isset($this->defaultMetaValue[$key]))
        {
            $list = unserialize($this->defaultMetaValue[$key][0]);
            return (is_array($list) && in_array($val, $list) ) ? 'checked' : '';
        }
    }

    public function loadLicenses()
    {
        $args = array(
            'post_type' => 'usage-terms',
            'author'    => 1,
            'orderby' => 'ID',
            'order' => 'ASC',
        );

        return new WP_Query( $args );
    }

    
    public function loadBeatLicensesVariations($post_id)
    {
        $args = array(
            'post_type' => 'usage-terms',
            'author'    => 1,
            'orderby' => 'ID',
            'order' => 'ASC',
        );

        $items = new WP_Query( $args );

        $array = [];

        foreach ($items->posts as $key => $value) {
            $array[$key] = $this->loadLicenseVariations($post_id, $value);
        }
        
        return array_filter($array);
        
    }

    
    public function loadLicenseVariations($post_id, $license)
    {
        
        $image_id     = get_post_thumbnail_id( $post_id );
        $image     = get_the_post_thumbnail_url( $post_id );
        $price = get_post_meta($post_id, $license->post_name.'_wc_file_price', true);
        $url = get_post_meta($post_id, $license->post_name.'_wc_file_url', true);

        if (!$url)
        {
            return null;
        }
        
        $array = [];
        $array["attributes"] = [
            "attribute_pa_license" => $license->post_title
        ];

        $array["availability_html"] = "";
        $array["backorders_allowed"] = false;
        $array["dimensions"] = [
            "length" => "",
            "width" => "",
            "height" => ""
        ];
        $array["dimensions_html"] = "N\/A";
        $array["display_price"] = $price;
        $array["display_regular_price"] = $price;
        $array["image"] = [
            "title" => "Black-Magic-mp3-image",
            "caption"=> "",
            "url"=> $image,
            "alt"=> "Black-Magic-mp3-image",
            "src"=> $image,
            "srcset"=> "$image 400w, $image 100w, $image 150w, $image 300w",
            "sizes"=> "(max-width: 400px) 100vw, 400px",
            "full_src"=> $image,
            "full_src_w"=> 400,
            "full_src_h"=> 400,
            "gallery_thumbnail_src"=> $image,
            "gallery_thumbnail_src_w"=> 100,
            "gallery_thumbnail_src_h"=> 100,
            "thumb_src"=> $image,
            "thumb_src_w"=> 400,
            "thumb_src_h"=> 400,
            "src_w"=> 400,
            "src_h"=> 400
        ];

        $array["image_id"] = $image_id;
        $array["is_downloadable"] = get_post_meta($post_id, 'beat_downloadable', true) ? true : false;
        $array["is_in_stock"] = true;
        $array["is_purchasable"] = true;
        $array["is_sold_individually"] = "yes";
        $array["is_virtual"] = false;
        $array["max_qty"] = 1;
        $array["min_qty"] = 1;
        $array["price_html"] = "&lt;span class=\"price\"&gt;&lt;span class=\"woocommerce-Price-amount amount\"&gt;&lt;bdi&gt;&lt;span class=\"woocommerce-Price-currencySymbol\"&gt;&amp;#36;&lt;\/span&gt;$price&lt;\/bdi&gt;&lt;\/span&gt;&lt;\/span&gt;";
        $array["sku"] = "";
        $array["variation_description"] = "";
        $array["variation_id"] = $license->ID;
        $array["variation_is_active"] = true;
        $array["variation_is_visible"] = true;
        $array["weight"] = "";
        $array["weight_html"] = "N\/A";

        return $array;
    }
}