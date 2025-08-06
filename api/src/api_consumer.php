<?php

class ApiConsumer {
    private function api($endpoint, $metod = 'GET', $post_fields = []) {
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://restcountries.com/v3.1/all?fields=name%2Ccapital%2Ccurrencies$endpoint",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $metod,
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            die(0);
        } else {
            return json_decode($response, true);
        }
    }

    public function get_all_countries() {
        //get all countries data
        return $this->api('all');
    }
}
