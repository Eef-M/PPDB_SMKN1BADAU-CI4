<?php

if (! function_exists('public_url'))
{
    /**
     * Get the URL to the public folder.
     *
     * @param  string|null  $uri
     * @return string
     */
    function public_url(string $uri = null): string
    {
        return base_url('public/' . $uri);
    }
}


?>