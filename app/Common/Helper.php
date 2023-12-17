<?php

namespace App\Common;

use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class Helper
{
    /**
     * @param $result
     * @param $errorMessage
     * @param int|null $status
     * @return Application|ResponseFactory|Response
     */
    public static function getResponse($result, $errorMessage = null, int $status = null)
    {
        if ($result) {
            return response([
                'success' => $result
            ], $status ?? 200);
        } else {
            return response([
                'error' => $errorMessage ?? 'Please try again'
            ], $status ?? 400);
        }
    }

    public static function sendMail($toMail, $subject, $htmlContent, $cc = null)
    {
        $url =  'https://rapidprod-sendgrid-v1.p.rapidapi.com/mail/send';
        $sender = env('MAIL_ADDRESS');

        // Data Format, for more about this format
        // Visit https://docs.sendgrid.com/api-reference/mail-send/mail-send#body
        /*
        {
            "personalizations": [
                {
                    "to": [
                        {
                            "email": "john@example.com"
                        }
                    ],
                    "cc": [
                        {
                            "email": "cc_email@gmail.com"
                        }
                    ]
                    "subject": "Hello, World!"
                }
            ],
            "from": {
                "email": "from_address@example.com"
            },
            "content": [
                {
                    "type": "text/plain",
                    "value": "Hello, World!"
                }
            ]
        }
        */
        $data = array(
            "personalizations" => array(
                array(
                    "to" => array(
                        array(
                            "email" => $toMail
                        )
                    )
                )
            ),
            "from" => array(
                "email" => $sender
            ),
            "subject" => $subject,
            "content" => array(
                array(
                    "type" => "text/html",
                    "value" => $htmlContent
                )
            )
        );

        if ($cc) {
            $data["personalizations"][0]["cc"] = [];

            foreach ($cc as $key => $value) {
                $data["personalizations"][0]["cc"][] = [
                    "email" => $value
                ];
            }
        }

        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'X-RapidAPI-Host' => 'rapidprod-sendgrid-v1.p.rapidapi.com',
                'X-RapidAPI-Key' =>  env('SENDGRID_RAPID_API_KEY')
            ]
        ]);

        $client->post($url, [
            'json' => $data
        ]);
    }

    public static function changeKey()
    {
        // Get the content of the env file
        $path = base_path('.env');
        $content = file_get_contents($path);

        // Get the current key and it's position
        $keys = config('api_keys.sendgrid_api_key');
        $currentKey = env('SENDGRID_RAPID_API_KEY');

        // Calculate the next position
        $currentIndex  = array_search($currentKey, $keys);
        $nextIndex = ($currentIndex + 1) % count($keys);

        if (file_exists($path)) {
            // Replace the current key with the next key
            file_put_contents(
                $path,
                str_replace(
                    "SENDGRID_RAPID_API_KEY=$currentKey",
                    "SENDGRID_RAPID_API_KEY=$keys[$nextIndex]",
                    $content
                )
            );
        }
    }

    public static function encrypt($string, $key)
    {
        $encrypted = openssl_encrypt($string, 'AES-256-CBC', $key, 0, substr(md5($key), 0, 16));
        return base64_encode($encrypted);
    }

    public static function decrypt($encryptedString, $key)
    {
        $encrypted = base64_decode($encryptedString);
        $decrypted = openssl_decrypt($encrypted, 'AES-256-CBC', $key, 0, substr(md5($key), 0, 16));
        return $decrypted;
    }
}
