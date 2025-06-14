<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'pembayaran';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_pembayaran';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_transaksi',
        'metode_pembayaran',
        'status_pembayaran',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the transaction that owns the payment.
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
    /**
     * Get the formatted payment status.
     */
    /**
     * Scope for filtering by payment status.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status_pembayaran', $status);
    }

    /**
     * Scope for filtering by payment method.
     */
    public function scopeByMethod($query, $method)
    {
        return $query->where('metode_pembayaran', $method);
    }

    /**
     * Check if payment is completed.
     */
    public function isCompleted()
    {
        return $this->status_pembayaran === 'completed';
    }

    /**
     * Check if payment is pending.
     */
    public function isPending()
    {
        return $this->status_pembayaran === 'pending';
    }

    /**
     * Check if payment is failed.
     */
    public function isFailed()
    {
        return $this->status_pembayaran === 'failed';
    }
}