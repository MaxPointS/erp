<?php

namespace App\Services;

use Illuminate\Http\Request;
use Spatie\WebhookClient\Exceptions\InvalidConfig;
use \Spatie\WebhookClient\SignatureValidator\DefaultSignatureValidator;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class webhookSigntureValidator implements SignatureValidator
{


    public function isValid(Request $request, WebhookConfig $config): bool
    {
        // $signature = $request->header($config->signatureHeaderName);

        // if (!$signature) {
        //     return false;
        // }

        return true;
        // $signingSecret = $config->signingSecret;

        // if (empty($signingSecret)) {
        //     throw InvalidConfig::signingSecretNotSet();
        // }

        // $computedSignature = hash_hmac('sha256', $request->getContent(), $signingSecret);

        // return hash_equals($signature, $computedSignature);
    }
}
