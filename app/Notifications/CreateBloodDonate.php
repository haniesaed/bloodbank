<?php

namespace App\Notifications;

use App\Models\BloodDonation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateBloodDonate extends Notification
{
    use Queueable;

    private BloodDonation $bloodDonation;
    /**
     * Create a new notification instance.
     */
    public function __construct(BloodDonation $bloodDonation )
    {
        $this->bloodDonation = $bloodDonation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "blood_donation_id" => $this->bloodDonation->id,
            "user_id" => $this->bloodDonation->user->id,
            "blood_type" => $this->bloodDonation->blood_type,
            "location" => $this->bloodDonation->location,
        ];
    }
}
