<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\HeartbeatPage\Dependency\Client;

class HeartbeatPageToSessionClientBridge implements HeartbeatPageToSessionClientInterface
{
    /**
     * @var \Spryker\Client\Session\SessionClientInterface
     */
    protected $sessionClient;

    /**
     * @param \Spryker\Client\Session\SessionClientInterface $sessionClient
     */
    public function __construct($sessionClient)
    {
        $this->sessionClient = $sessionClient;
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return void
     */
    public function set($name, $value)
    {
        $this->sessionClient->set($name, $value);
    }

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function get($name, $default = null)
    {
        return $this->sessionClient->get($name, $default);
    }
}
