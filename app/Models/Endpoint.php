<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Endpoint extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['endpoint', 'frequency', 'next_check'];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function checks(): HasMany
    {
        return $this->hasMany(Check::class);
    }

    public function check(): HasOne
    {
        return $this->hasOne(Check::class)->latest();
    }

    public function url(): string
    {
        return $this->site->url . $this->endpoint;
    }
}
