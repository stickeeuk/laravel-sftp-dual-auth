<?php

namespace Stickee\LaravelSftpDualAuth;

use Exception;
use League\Flysystem\Sftp\SftpAdapter;
use LogicException;

/**
 * Class SftpDualAuthAdapter
 */
class SftpDualAuthAdapter extends SftpAdapter
{
    /**
     * Login.
     *
     * @throws Exception
     * @throws LogicException
     */
    protected function login()
    {
        if ($this->hostFingerprint) {
            throw new Exception('Host fingerprint functionality not implemented');
        }

        if (!$this->connection->login($this->getUsername(), $this->getPrivateKey())
            && !$this->connection->login($this->getUsername(), $this->getPassword())) {
            throw new LogicException('Could not login with username: ' . $this->getUsername() . ', host: ' . $this->host);
        }
    }
}
