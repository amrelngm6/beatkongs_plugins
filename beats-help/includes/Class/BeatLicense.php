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
            $list = $callback($this->authorMetaValue[$key][0]);
            return (is_array($list) && in_array($val, $list) ) ? 'checked' : '--';
        }

        // Return default license option value 
        if (isset($this->defaultMetaValue[$key]))
        {
            $list = $callback($this->defaultMetaValue[$key][0]);
            return (is_array($list) && in_array($val, $list) ) ? 'checked' : '';
        }
    }
}