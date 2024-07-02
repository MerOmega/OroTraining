<?php

namespace Fantasy\Bundle\DemoBundle\Formatter;

use Fantasy\Bundle\DemoBundle\Enum\EType;
use Oro\Bundle\DataGridBundle\Extension\Formatter\Property\AbstractProperty;
use Oro\Bundle\DataGridBundle\Datasource\ResultRecordInterface;

class EnumDataTransformer extends AbstractProperty
{
    public function getRawValue(ResultRecordInterface $record)
    {
        $value = $record->getValue($this->get(self::NAME_KEY));

        if ($value instanceof EType) {
            return $value->getLabel();
        }

        return 'N/A';
    }
}
