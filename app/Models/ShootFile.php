<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShootFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'shoot_id',
        'filename',
        'stored_filename',
        'path',
        'file_type',
        'file_size',
        'uploaded_by',
        'workflow_stage',
        'dropbox_path',
        'dropbox_file_id',
        'moved_to_completed_at',
        'verified_at',
        'verified_by',
        'verification_notes'
    ];

    protected $casts = [
        'moved_to_completed_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    // Workflow stage constants
    const STAGE_TODO = 'todo';
    const STAGE_COMPLETED = 'completed';
    const STAGE_VERIFIED = 'verified';
    const STAGE_ARCHIVED = 'archived';

    public function shoot()
    {
        return $this->belongsTo(Shoot::class);
    }

    public function uploadedBy()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function canMoveToCompleted()
    {
        return $this->workflow_stage === self::STAGE_TODO;
    }

    public function canVerify()
    {
        return $this->workflow_stage === self::STAGE_COMPLETED;
    }

    public function moveToCompleted($userId = null)
    {
        $this->workflow_stage = self::STAGE_COMPLETED;
        $this->moved_to_completed_at = now();
        $this->save();

        // Log the action
        $this->shoot->workflowLogs()->create([
            'user_id' => $userId ?? auth()->id(),
            'action' => 'file_moved_to_completed',
            'details' => "File '{$this->filename}' moved to completed folder",
            'metadata' => [
                'file_id' => $this->id,
                'filename' => $this->filename,
                'dropbox_path' => $this->dropbox_path
            ]
        ]);
    }

    public function verify($userId, $notes = null)
    {
        $this->workflow_stage = self::STAGE_VERIFIED;
        $this->verified_at = now();
        $this->verified_by = $userId;
        $this->verification_notes = $notes;
        $this->save();

        // Log the action
        $this->shoot->workflowLogs()->create([
            'user_id' => $userId,
            'action' => 'file_verified',
            'details' => "File '{$this->filename}' verified by admin",
            'metadata' => [
                'file_id' => $this->id,
                'filename' => $this->filename,
                'verification_notes' => $notes
            ]
        ]);
    }
}