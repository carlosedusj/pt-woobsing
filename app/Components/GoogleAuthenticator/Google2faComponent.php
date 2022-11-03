<?php

namespace App\Components\GoogleAuthenticator;

class Google2faComponent{

    protected $secret;

    /**
     * instanciate as a singleton
     */
    public function __construct(protected $google2fa)
    {
        
    }

    /**
     * create 2fa key
     * @return string
     */
    protected function generateKey()
    {
        $this->secret = $this->google2fa->generateSecretKey();
        return $this->secret;
    }
    /**
     * create svg QR
     * @return string|xml
     */
    protected function generateQR($email,$secret)
    {
        return $this->google2fa->getQRCodeInline(
            config('app.name'),
            $email,
            $secret
        );
    }
    /**
     * generate codes
     * @param string $email
     * @return array
     */
    public function run($email)
    {
        $this->generateKey();

        return [
            'secret'   => $this->secret,
            'QR_Image' => $this->generateQR($email,$this->secret)
        ];
    }

    public function getSecretKey()
    {
        return $this->secret;
    }

}