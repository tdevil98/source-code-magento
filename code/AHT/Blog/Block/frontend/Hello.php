<?php
namespace AHT\Blog\Block\frontend;
class Hello extends \Magento\Framework\View\Element\Template
{
    private $postFactory;
    private $postRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AHT\Blog\Model\PostRepository $postRepository,
        \AHT\Blog\Model\PostFactory $postFactory
    )
    {
        parent::__construct($context);
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepository;
    }

    public function getBlogInfo()
    {
        return __('Hello World');
    }
}
