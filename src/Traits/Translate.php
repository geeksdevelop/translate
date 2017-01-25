<?php

namespace Geeksdevelop\Translate\Traits;

trait Translate
{
    /*
     *
     */
    public function translatables()
    {
        return $this->morphMany('Geeksdevelop\Translate\Models\Translate', 'translable');
    }

    /*
     *
     */
    public function translate($type=null, $locale=null)
    {
        if($type){
            $translate = $this->translatables->where('locale', config('app.locale'))->where('type', $type)->first();
        }elseif($locale && $type){
            $translate = $this->translatables->where('locale', $locale)->where('type', $type)->first();
        }else{
            return $this->translatables->where('locale', config('app.locale'));
        }
        return isset($translate) ? $translate->value : $type;
    }

    /*
     *
     */
    public function setTranslate($locale, $type, $value)
    {
        return $this->translatables()->create(['locale' => $locale, 'type' => $type, 'value' => $value]); 
    }
    
    /*
     *
     */
    public function updateTranslate($locale, $type, $value)
    {
        $translate = $this->translatables()->where('locale', $locale)->where('type', $type)->first();
        return $translate->update(['value' => $value]);
    }

    /*
     *
     */
    public function deleteTranslate($locale, $type)
    {
        $translate = $this->translatables()->where('locale', $locale)->where('type', $type)->first();
        return $translate->delete();
    }
}
