<?php

namespace App\Services;

use Twilio\Rest\Client; // <-- BARIS INI PENTING (YANG HILANG)

class SmsService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        // Ambil konfigurasi dari config/services.php
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $this->from = config('services.twilio.phone_number');

        $this->client = new Client($sid, $token);
    }

    public function send(string $to, string $message)
    {
        // TODO: Pastikan nomor $to sudah dalam format E.164 (cth: +628123...)
        // Anda perlu buat fungsi normalisasi nomor HP di OtpAuthController

        return $this->client->messages->create(
            $to,
            [
                'from' => $this->from,
                'body' => $message
            ]
        );
    }
}
