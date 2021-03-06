<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Behat\Page\Shop\Taxon;

use Sylius\Behat\Page\SymfonyPage;

/**
 * @author Anna Walasek <anna.walasek@lakion.com>
 */
class ShowPage extends SymfonyPage implements ShowPageInterface
{
    /**
     * {@inheritdoc}
     */
    public function isProductInList($productName)
    {
        $elements= $this->getDocument()->findAll('css', 'div.header');
        foreach ($elements as $element) {
            if ($productName === $element->getText()) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        return false !== strpos($this->getDocument()->find('css', '.message')->getText(), 'There are no products to display');
    }
    
    /**
     * {@inheritdoc}
     */
    public function getRouteName()
    {
        return 'sylius_shop_taxon_show';
    }
}
