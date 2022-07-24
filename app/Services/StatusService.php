<?php 

namespace App\Services;

class StatusService
{
    /**
     * Record the response status of a url.
     *
     * @param  string  $url
     * @return array['status', 'error']
     */
    public function recordStatus($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

        $response = [
            'status' => curl_getinfo($ch, CURLINFO_HTTP_CODE) ?? 0,
            'error' => curl_error($ch),
        ];

        curl_close($ch);

        return $response;
    }
}
