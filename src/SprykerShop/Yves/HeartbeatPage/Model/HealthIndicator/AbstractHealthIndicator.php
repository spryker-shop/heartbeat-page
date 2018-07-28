<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\HeartbeatPage\Model\HealthIndicator;

use Generated\Shared\Transfer\HealthDetailTransfer;
use Generated\Shared\Transfer\HealthIndicatorReportTransfer;
use Generated\Shared\Transfer\HealthReportTransfer;
use Spryker\Shared\Heartbeat\Code\HealthIndicatorInterface;

abstract class AbstractHealthIndicator implements HealthIndicatorInterface
{
    /**
     * @var \Generated\Shared\Transfer\HealthIndicatorReportTransfer|null
     */
    private $healthIndicatorReport;

    /**
     * @param \Generated\Shared\Transfer\HealthReportTransfer $healthReport
     *
     * @return void
     */
    public function writeHealthReport(HealthReportTransfer $healthReport)
    {
        $healthReport->addHealthIndicatorReport($this->getHealthIndicatorReport());
    }

    /**
     * @param string $message
     *
     * @return void
     */
    protected function addFailure($message)
    {
        $healthIndicatorReport = $this->getHealthIndicatorReport();
        $healthIndicatorReport->setStatus(false);

        $healthDetail = new HealthDetailTransfer();
        $healthDetail->setMessage($message);

        $healthIndicatorReport->addHealthDetail($healthDetail);
    }

    /**
     * @return \Generated\Shared\Transfer\HealthIndicatorReportTransfer
     */
    private function getHealthIndicatorReport()
    {
        if (!$this->healthIndicatorReport) {
            $this->healthIndicatorReport = new HealthIndicatorReportTransfer();
            $this->healthIndicatorReport->setName(get_class($this));
            $this->healthIndicatorReport->setStatus(true);
        }

        return $this->healthIndicatorReport;
    }
}
