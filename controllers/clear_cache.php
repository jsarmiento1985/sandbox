<?php

class ClearCache
{

    public static function limpiarCache()
    {
        echo '<script>
        if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href);
        }
        </script>';
    }
}
