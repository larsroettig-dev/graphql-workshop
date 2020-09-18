<?php
/**
 * Copyright (c) 2018 TechDivision GmbH <info@techdivision.com> - TechDivision GmbH
 * All rights reserved
 *
 * This product includes proprietary software developed at TechDivision GmbH, Germany
 * For more information see http://www.techdivision.com/
 *
 * To obtain a valid license for using this software please contact us at
 * license@techdivision.com
 */
declare(strict_types=1);

namespace LarsRoettig\StorePickupGraphQL\Test\Unit\Model\Validator;

use LarsRoettig\StorePickupGraphQL\Model\Validator\Page;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

class PageTest extends \PHPUnit\Framework\TestCase
{
    /** @var Page */
    private $valdiator;

    protected function setUp(): void
    {
        $this->valdiator = (new ObjectManager($this))->getObject(
            Page::class,
            []
        );
    }

    public function testExecuteWithEmptyPage()
    {
        $this->expectException(GraphQlInputException::class);
        $this->valdiator->execute([]);
    }

    public function testExecuteWithEmptyCurrentPage()
    {
        $this->expectException(GraphQlInputException::class);
        $this->valdiator->execute(['pageSize' => 1]);
    }
}
