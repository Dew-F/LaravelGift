<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionnaireFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'recipient_type',
        'design_preference',
        'color_preference',
        'greeting_type',
        'recipient_name',
        'recipient_age',
        'recipient_flower',
        'recipient_hobby',
        'social_media_link',
        'delivery_date',
        'delivery_address',
        'delivery_time',
        'recipient_contact_name',
        'recipient_contact_phone',
        'customer_email',
    ];

}
