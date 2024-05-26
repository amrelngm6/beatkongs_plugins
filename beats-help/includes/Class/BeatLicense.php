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
        if (isset($this->authorValue[$key]))
        {
            return $this->authorValue[$key][0] ?? '';
        }

        // Return default license option value 
        if (isset($this->defaultMetaValue[$key]))
        {
            return $this->defaultMetaValue[$key][0] ?? '';
        }
    }

    
    public function checkMetaSelected($key, $val = '') 
    {

        // Check if the author has filled his license option
        if (isset($this->authorValue[$key]))
        {
            return $this->authorValue[$key][0] == $val ? 'selected' : '';
        }

        // Return default license option value 
        if (isset($this->defaultMetaValue[$key]))
        {
            return $this->defaultMetaValue[$key][0] == $val ? 'selected' : '';
        }
    }
}