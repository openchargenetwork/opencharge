<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ocid extends Model
{
    /** @use HasFactory<\Database\Factories\OcidFactory> */
    use HasFactory;

    protected $fillable = [
        'ocid',
        'type',
        'opencharge_version',
        'name',
        'profile',
        'icon',
        'config',
        'signature',
        'contact',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'config' => 'array',
        ];
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ocid', 'ocid');
    }

    /**
     * KYC providers that have verified this entity.
     *
     * @return BelongsToMany<Ocid, $this>
     */
    public function kycProviders(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'ocid_kyc', 'ocid_id', 'kyc_provider_id');
    }

    /**
     * Entities that this KYC provider has verified.
     *
     * @return BelongsToMany<Ocid, $this>
     */
    public function kycVerifiedEntities(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'ocid_kyc', 'kyc_provider_id', 'ocid_id');
    }

    /**
     * Partners/gateways this entity accepts for settlement.
     *
     * @return BelongsToMany<Ocid, $this>
     */
    public function acceptedPartners(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'ocid_accepts', 'ocid_id', 'accepts_id');
    }

    /**
     * Entities that accept this gateway/partner.
     *
     * @return BelongsToMany<Ocid, $this>
     */
    public function acceptedBy(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'ocid_accepts', 'accepts_id', 'ocid_id');
    }

    /**
     * @return Attribute<array<string>, never>
     */
    protected function capabilities(): Attribute
    {
        return Attribute::get(fn (): array => $this->config['capabilities'] ?? []);
    }

    /**
     * @return Attribute<array<string>, never>
     */
    protected function currencies(): Attribute
    {
        return Attribute::get(fn (): array => $this->config['settlement']['currencies'] ?? []);
    }

    /**
     * @param  Builder<Ocid>  $query
     * @return Builder<Ocid>
     */
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * @param  Builder<Ocid>  $query
     * @return Builder<Ocid>
     */
    public function scopeWithCapability(Builder $query, string $capability): Builder
    {
        return $query->whereJsonContains('config->capabilities', $capability);
    }

    /**
     * @param  Builder<Ocid>  $query
     * @return Builder<Ocid>
     */
    public function scopeSearch(Builder $query, string $term): Builder
    {
        return $query->where(function (Builder $q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
                ->orWhere('profile', 'like', "%{$term}%");
        });
    }
}
