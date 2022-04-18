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

class Member extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const GENDER_RADIO = [
        'male'   => 'Male',
        'female' => 'Female',
    ];

    public const TYPE_OF_DONOR_SELECT = [
        'Financial'  => 'Financial',
        'Non-paying' => 'Non-paying',
    ];

    public const STATUS_SELECT = [
        'Registered' => 'Registered',
        'Verified'   => 'Verified',
        'Active'     => 'Active',
        'Not Active' => 'Not Active',
        'Deceased'   => 'Deceased',
    ];

    public $table = 'members';

    protected $appends = [
        'photograph',
        'signed_document',
    ];

    protected $dates = [
        'date_of_birth',
        'unsubscribe_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ledenid',
        'status',
        'type_of_donor',
        'first_name',
        'surname',
        'street_name',
        'house_number',
        'zip_code',
        'town',
        'land',
        'enamel',
        'email_checked',
        'date_of_birth',
        'gender',
        'birthplace',
        'unsubscribe_date',
        'remark',
        'iban',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Member::observe(new \App\Observers\MemberActionObserver());
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPhotographAttribute()
    {
        $file = $this->getMedia('photograph')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getUnsubscribeDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setUnsubscribeDateAttribute($value)
    {
        $this->attributes['unsubscribe_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSignedDocumentAttribute()
    {
        return $this->getMedia('signed_document')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
