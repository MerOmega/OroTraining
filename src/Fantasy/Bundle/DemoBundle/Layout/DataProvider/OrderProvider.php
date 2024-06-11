<?php

namespace Fantasy\Bundle\DemoBundle\Layout\DataProvider;

use Oro\Bundle\OrderBundle\Entity\Order;

class OrderProvider
{

    /**
     * Returns the full name of the customer user who purchased the order
     * if it has a middle name it will be included in the full name
     *
     * @param Order $order
     * @return string
     */
    public function getCustomerUserFullName(Order $order): string
    {
        $customerUser = $order->getCustomerUser();
        $firstName    = $customerUser->getFirstName();
        $middleName   = $customerUser->getMiddleName();
        $lastName     = $customerUser->getLastName();

        if (!empty($middleName)) {
            return $firstName . ' ' . $middleName . ' ' . $lastName;
        }

        return $firstName . ' ' . $lastName;
    }
}
