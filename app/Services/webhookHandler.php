<?php
namespace App\Services;

use  Spatie\WebhookClient\Jobs\ProcessWebhookJob;

 class webhookHandler extends ProcessWebhookJob  {

 
    public function Handle()  {
        logger($this->webhookCall);
    }


}

?>