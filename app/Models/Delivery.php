<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'carrier',
        'tracking_number',
        'tracking_url',
        'status',
        'delivery_notes',
        'history',
        'shipped_at',
        'delivered_at',
    ];

    protected function casts(): array
    {
        return [
            'history' => 'array',
            'shipped_at' => 'datetime',
            'delivered_at' => 'datetime',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function addHistory(string $status, string $note): void
    {
        $history = $this->history ?? [];
        $history[] = [
            'status' => $status,
            'note' => $note,
            'timestamp' => now()->toIso8601String(),
        ];
        $this->history = $history;
        $this->save();
    }

    public function markAsShipped(string $carrier, string $trackingNumber): void
    {
        $this->update([
            'carrier' => $carrier,
            'tracking_number' => $trackingNumber,
            'status' => 'shipped',
            'shipped_at' => now(),
        ]);
    }

    public function markAsDelivered(): void
    {
        $this->update([
            'status' => 'delivered',
            'delivered_at' => now(),
        ]);
    }
}