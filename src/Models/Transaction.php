<?php

namespace Siqwell\DataScreen\Models;

use Fenix007\Wrapper\Models\AbstractModel;

class Transaction extends AbstractModel
{
    public $internal_id;
    public $rightholder;
    public $content;
    public $channel;
    /* ISO 3166-1 alpha-2 */
    public $country;
    public $price_without_vat;
    public $share_per_unit;
    public $ad_count;
    public $preorder;
}
