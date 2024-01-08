<?php

namespace App\Console\Commands;

use App\Models\BarangDetail;
use App\Models\Pesanan;
use App\Models\WaitingList;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Telegram\Bot\Laravel\Facades\Telegram;

class BatasBayarCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batasbayar:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()

    {
        $dayOfWeek = now()->format('l'); // Mendapatkan hari dalam format teks (Senin, Selasa, dst.)
        $message = "Selamat hari $dayOfWeek sayang. Semoga hari mu menyenangkan ya. Semangat!";
        Telegram::sendMessage([
            'chat_id' => 5237463607, // Ganti dengan ID chat tujuan
            'parse_mode' => 'HTML',
            'text' => $message,
        ]);
    
        Log::info("Morning message sent successfully!");
    }
}
