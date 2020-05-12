<?php

namespace AHT\JsModule\Block\Widget;
/**
 * Promo block
 */
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Block extends Template implements BlockInterface
{
    protected $context;
    protected $_categoryFactory;
    protected $storeManager;
    protected $_template = "widget/promo.phtml";

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    )
    {
        $this->_storeManager = $storeManager;
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }

    public function getCategory($categoryId)
    {
        $category = $this->_categoryFactory->create();
        $category->load($categoryId);
        return $category;
    }

    public function getCategoryProducts($categoryId)
    {
        $products = $this->getCategory($categoryId)->getProductCollection();
        $products->addAttributeToSelect('small_image');
        return $products;
    }

    public function getProductUrlImage()
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . "catalog/product";
    }

    public function getTitle($categoryId)
    {
        $category = $this->_categoryFactory->create();
        $category->load($categoryId);
        return "List product of " . $category->getName();
    }

}
