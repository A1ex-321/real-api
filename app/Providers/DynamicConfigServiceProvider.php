<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\smtp;

class DynamicConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $smtpConfig = smtp::find(6);

        // Set SMTP configuration dynamically
        config([
            // 'mail.mailers.smtp.mailer' => $smtpConfig->MAIL_MAILER,
            'mail.mailers.smtp.host' => $smtpConfig->MAIL_HOST,
            'mail.mailers.smtp.port' => $smtpConfig->MAIL_PORT,
            'mail.mailers.smtp.username' => $smtpConfig->MAIL_USERNAME,
            'mail.mailers.smtp.password' => $smtpConfig->MAIL_PASSWORD,
            'mail.mailers.smtp.encryption' => $smtpConfig->MAIL_ENCRYPTION,
            // 'mail.from.address' => $smtpConfig->MAIL_ADDRESS,
            // 'mail.from.name' => $smtpConfig->MAIL_FROMNAME,
        ]);
    }
}