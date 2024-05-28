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
        
        $i = 0;
        foreach ($beatLicense->loadLicenses()->posts as $key => $value) 
        {
            $newKey = $value->post_name.'_wc_file_price';
            $amounts[$i] = $this->getValue($newKey);
            $i++;
        }
        
        return min($amounts) ?? 'FREE'; 
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