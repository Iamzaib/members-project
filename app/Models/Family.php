<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Family extends Model implements HasMedia
{
    //use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const GENDER_RADIO = [
        'male'   => 'M',
        'female' => 'V',
    ];

    public const STATUS_RADIO = [
        'Alive'    => 'Levend',
        'deceased' => 'Overleden',
    ];

    public const FAMILY_MEMBER_TYPE_SELECT = [
        'Husband'   => 'Man',
        'Wife'      => 'Vrouw',
        'Daughter'  => 'Dochter',
        'Son'       => 'Zoon',
        'Otherwise' => 'Anders..',
    ];

    public const HISTORY_ALMERE_SELECT = [
        'Born'                        => 'Geboren',
        'Lived'                       => 'Gewoond',
        'relationship with someone'   => 'Relatie met iemand',
        'equal to place of residence' => 'Gelijk aan woonplaats',
        'otherwise'                   => 'anders..',
    ];

    public $table = 'families';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'd_o_b',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ledenid_id',
        'family_member_type',
        'first_name',
        'surname',
        'd_o_b',
        'gender',
        'status',
        'registration_date',
        'birthplace',
        'history_almere',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function ledenid()
    {
        return $this->belongsTo(Member::class, 'ledenid_id');
    }

    public function getDOBAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDOBAttribute($value)
    {
        $this->attributes['d_o_b'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
