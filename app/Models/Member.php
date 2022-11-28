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
use App\Models\VerifyUser;
use Illuminate\Notifications\Notifiable;

class Member extends Model implements HasMedia
{
    //use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;
    use Notifiable;

    public const GENDER_RADIO = [
        'male'   => 'M',
        'female' => 'V',
    ];

    public const TYPE_OF_DONOR_SELECT = [
        'Financial'  => 'Betalend',
        'Non-paying' => 'Niet betalend',
    ];

    public const STATUS_SELECT = [
        'Registered' => 'Geregistreerd',
        'Verified'   => 'Geverifieerd',
        'Active'     => 'Actief',
        'Not Active' => 'Niet actief',
        'Deceased'   => 'Overleden',
    ];

    public $table = 'members';

    protected $appends = [
        'photograph',
        'signed_document',
    ];

    protected $dates = [
        'date_of_birth',
        'email_verified_at',
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
        'amount',
        'email_checked',
        'email_verified_at',
        'date_of_birth',
        'gender',
        'birthplace',
        'unsubscribe_date',
        'remark',
        'iban',
        'terms_1',
        'terms_2',
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
    public function verifyMember()
    {
        return $this->hasOne(VerifyUser::class);
    }
    /**
     * Route notifications for the mail channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|string
     */
    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->enamel;

//        // Return email address and name...
//        return [$this->email_address => $this->name];
    }
}
