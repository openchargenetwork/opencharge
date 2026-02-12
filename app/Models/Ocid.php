<?php

namespace App\Models;

use App\Enums\OcidStatus;
use Illuminate\Database\Eloquent\Model;

class Ocid extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'token_id',
        'opencharge_version',
        'name',
        'profile',
        'icon',
        'public_key',
        'endpoint',
        'capabilities',
        'settlement_currencies',
        'settlement_accepts',
        'kyc',
        'signature',
        'contact',
        'testnet',
        'valid_signature',
        'status',
        'tags',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts()
    {
        return [
            'capabilities' => 'array',
            'settlement_currencies' => 'array',
            'settlement_accepts' => 'array',
            'kyc' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'valid_signature' => 'boolean',
            'testnet' => 'boolean',
            'status' => OcidStatus::class,
            'tags' => 'array',
        ];
    }

    /**
     * Rebuild the complete OCID JSON structure
     */
    public function buildOcidJson(): array
    {
        return [
            'opencharge' => $this->opencharge_version,
            'name' => $this->name,
            'profile' => $this->profile,
            'icon' => $this->icon,
            'config' => [
                'publicKey' => $this->public_key,
                'endpoint' => $this->endpoint,
                'capabilities' => $this->capabilities ?? [],
                'settlement' => [
                    'currencies' => $this->settlement_currencies ?? [],
                    'accepts' => $this->settlement_accepts ?? [],
                ],
            ],
            'kyc' => $this->kyc ?? [],
            'signature' => $this->signature,
            'contact' => $this->contact,
        ];
    }

    /**
     * Get the OCID JSON as a formatted string
     */
    public function toOcidJson(): string
    {
        return json_encode($this->buildOcidJson(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'country_ocid', 'ocid_id', 'country_id');
    }
}
