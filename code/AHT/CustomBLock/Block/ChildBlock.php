<?php
namespace AHT\CustomBlock\Block;
class ChildBlock extends \Magento\Framework\View\Element\Template
{
    private $postFactory;
    private $postRepository;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    )
    {
        parent::__construct($context);
    }

    public function hello()
    {
        return __('Hello Parent');
    }
}
