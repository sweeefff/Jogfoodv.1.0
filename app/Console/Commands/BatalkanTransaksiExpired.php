<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaksi;
use Carbon\Carbon;

class BatalkanTransaksiExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaksi:batalkan-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Batalkan transaksi yang snap_token sudah lebih dari 1 jam dan belum dibayar';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $expired = Transaksi::where('status_transaksi', 'pending')
            ->whereNotNull('snap_token_created_at')
            ->where('snap_token_created_at', '<', $now->subHour())
            ->update(['status_transaksi' => 'dibatalkan']);

        $this->info("Transaksi kadaluwarsa dibatalkan: $expired");
    }
}
