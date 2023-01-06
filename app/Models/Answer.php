<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'context',
        'user_id',
        'question_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    
    public function training_period($a)
    {
        $now_year = (int)substr((int)date('Ym'), 0, 4);
        $now_month = (int)substr((int)date('Ym'), 4);
        $start_year = (int)substr($a->user->training_start_month, 0, 4);
        $start_month = (int)substr($a->user->training_start_month, 4);
        if ($start_year == null) {
            $a['training_period'] = '秘密';
        } elseif ($now_year > $start_year && $now_month > $start_month) {
            $a['training_period'] = $now_year - $start_year . '年' . $now_month - $start_month . 'カ月';
        } elseif ($now_year > $start_year && $now_month < $start_month) {
            $a['training_period'] = ($now_year-1) - $start_year . '年' . ($now_month+12) - $start_month . 'カ月';
        }
        return $a;
    }
}
