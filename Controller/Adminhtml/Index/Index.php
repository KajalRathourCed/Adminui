<?php
namespace Ced\Adminui\Controller\Adminhtml\Index;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Ced_Adminui::menu_item';
    
    protected $resultPageFactory;
    protected $helper;
    
    public function __construct(Context $context,PageFactory $resultPageFactory) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Ced_Adminui::menu_item');
        return $resultPage;
    }
    
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}