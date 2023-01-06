<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 
        'user_id',
        'context'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    public function training_period($q)
    {
        $now_year = (int)substr((int)date('Ym'), 0, 4);
        $now_month = (int)substr((int)date('Ym'), 4);
        $start_year = (int)substr($q->user->training_start_month, 0, 4);
        $start_month = (int)substr($q->user->training_start_month, 4);
        if ($start_year == null) {
            $q['training_period'] = '秘密';
        } elseif ($now_year > $start_year && $now_month > $start_month) {
            $q['training_period'] = $now_year - $start_year . '年' . $now_month - $start_month . 'カ月';
        } elseif ($now_year > $start_year && $now_month < $start_month) {
            $q['training_period'] = ($now_year-1) - $start_year . '年' . ($now_month+12) - $start_month . 'カ月';
        }
        return $q;
    }
    
    public function multi_training_period($question_collection)
    {
        return $question_collection->map(function ($q) {
            return $this->training_period($q);
        });
    }
}
