<?php


namespace App\Classes;


class GoogleIframeBuilder
{
    /**
     * @param $query
     * @param null $props
     * @return string
     */
    public static function build($query,$props = null) : string
    {
        return '<iframe width="600" height="500"  id="gmap_canvas"
                    src="https://maps.google.com/maps?q='.$query.'&t=&z=17&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0"
                    style="width: 100%;min-width: 100%"
                    marginwidth="0" '.$props.'></iframe>';
    }
}
