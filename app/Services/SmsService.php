<?php

namespace App\Services;

use Twilio\Rest\Client;
use Exception;
use Illuminate\Support\Facades\Log;

class SmsService
{
    protected $twilio;
    protected $from;

    public function __construct()
    {
        // PENTING: Gunakan config(), jangan env() di sini
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $this->from = config('services.twilio.from');

        // Debugging: Cek apakah config terbaca (bisa dihapus nanti)
        // \Illuminate\Support\Facades\Log::info("Twilio Config: SID=" . $sid . ", From=" . $this->from);

        Log::info('Debug Config Twilio:', [
            'sid_exists' => !empty(config('services.twilio.sid')),
            'token_exists' => !empty(config('services.twilio.token')),
            'from_exists' => !empty(config('services.twilio.from')),
            // JANGAN log token asli demi keamanan, cukup cek empty/tidak
        ]);

        if (!$sid || !$token || !$this->from) {
            // Ini pesan error yang kamu lihat di log sebelumnya
            throw new Exception("Konfigurasi Twilio (SID, Token, Phone Number) belum diatur atau tidak terbaca.");
        }

        $this->twilio = new Client($sid, $token);
    }

    public function send($to, $message)
    {
        return $this->twilio->messages->create($to, [
            'from' => $this->from,
            'body' => $message
        ]);
    }
}
