<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'user_id',
        'name',
        'original_name',
        'path',
        'type',
        'size',
        'folder_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function folder()
    {
        return $this->belongsTo(MediaFolder::class);
    }

    public function getUrlAttribute()
    {
        return asset($this->path);
    }

    public function getFormattedSizeAttribute()
    {
        $bytes = $this->size;
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }
        return $bytes . ' bytes';
    }

    public function getIconAttribute()
    {
        if (str_starts_with($this->type, 'image/')) {
            return 'fa-file-image';
        } elseif (str_starts_with($this->type, 'video/')) {
            return 'fa-file-video';
        } elseif (str_starts_with($this->type, 'audio/')) {
            return 'fa-file-audio';
        } elseif ($this->type === 'application/pdf') {
            return 'fa-file-pdf';
        } elseif (str_contains($this->type, 'word') || str_contains($this->type, 'document')) {
            return 'fa-file-word';
        } elseif (str_contains($this->type, 'sheet') || str_contains($this->type, 'excel')) {
            return 'fa-file-excel';
        } elseif (str_contains($this->type, 'zip') || str_contains($this->type, 'rar') || str_contains($this->type, 'compressed')) {
            return 'fa-file-archive';
        } else {
            return 'fa-file';
        }
    }
}