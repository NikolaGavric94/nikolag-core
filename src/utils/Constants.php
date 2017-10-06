<?php

namespace Nikolag\Core\Utils;

class Constants
{
    //Transaction info
    const TRANSACTION_NAMESPACE    = 'Nikolag\Core\Models\Transaction';
    const TRANSACTION_IDENTIFIER    = 'id';
    //Transaction statuses
    const TRANSACTION_STATUS_OPENED = 'PENDING';
    const TRANSACTION_STATUS_PASSED = 'PAID';
    const TRANSACTION_STATUS_FAILED = 'FAILED';
    //Customer info
    const CUSTOMER_NAMESPACE        = 'Nikolag\Core\Models\Customer';
    const CUSTOMER_IDENTIFIER        = 'id';
}
