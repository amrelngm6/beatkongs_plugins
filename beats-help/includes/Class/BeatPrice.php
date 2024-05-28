<?php 

include 'BeatLicense.php';
/**
 * Name:  BeatPrice
 * 
 * Description: Extract the prices value
 * or get lowest price for the beat
 * 
 */


Class BeatPrice 
{
    
    public $defaultValue;

    public function setDefaultValue($value)
    {
        $this->defaultValue = $value;
    }

    public function getValue($key) 
    {

        // Return default license option value 
        if (isset($this->defaultValue[$key]))
        {
            return $this->defaultValue[$key][0] ?? 0;
        }
    }

    
    public function getLowestPrice($key) 
    {

        $amounts = [];
        $beatLicense = new BeatLicense();
        
        foreach ($beatLicense->loadLicenses() as $key => $value) 
        {
            $newKey = $value->post_title.'_wc_file_price';
            $amounts[$key] = $this->getValue($newKey);
        }
        print_r($amounts);
       return min($amounts); 
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
}