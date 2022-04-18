<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mandaat extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'Active'   => 'Actief',
        'Inactive' => 'Inactief',
    ];

    public $table = 'mandaats';

    protected $dates = [
        'start_mandaat',
        'einde_mandaat',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ledenid_id',
        'status',
        'mandaadnr',
        'start_mandaat',
        'einde_mandaat',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function ledenid()
    {
        return $this->belongsTo(Member::class, 'ledenid_id');
    }

    public function getStartMandaatAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartMandaatAttribute($value)
    {
        $this->attributes['start_mandaat'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEindeMandaatAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEindeMandaatAttribute($value)
    {
        $this->attributes['einde_mandaat'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
