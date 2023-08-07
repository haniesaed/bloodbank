<?php

namespace App\Notifications;

use App\Models\RequestDonation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateRequestDonate extends Notification
{
    use Queueable;

    private RequestDonation $requestDonation;
    /**
     * Create a new notification instance.
     */
    public function __construct(RequestDonation $requestDonation)
    {
        $this->requestDonation = $requestDonation;
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
            "user_id" => $this->requestDonation->user->id,
            "blood_donation_id" => $this->requestDonation->bloodDonation->id,
            "donor name" => $this->requestDonation->bloodDonation->user->name,
            "location" => $this->requestDonation->bloodDonation->location,
            "blood_type" => $this->requestDonation->bloodDonation->blood_type,
        ];
    }
}
