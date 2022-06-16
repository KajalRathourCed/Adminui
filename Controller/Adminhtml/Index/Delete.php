<?php
namespace Ced\Adminui\Controller\Adminhtml\Index;
use Ced\Adminui\Helper\Del;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Delete extends Action
{
    protected $helper;
    protected $resultPageFactory;
    
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        \Ced\Adminui\Model\ResourceModel\Test $testResource,
		\Ced\Adminui\Model\TestFactory $testFactory,
        Del $helper
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->testFactory = $testFactory;
		$this->testResource = $testResource;
        $this->helper = $helper;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        try {
            $helperData = $this->helper->deleteData($id);
            $this->messageManager->addSuccessMessage(__('You deleted the data.')); 
            return $resultRedirect->setPath('adminui/index/grid');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ced_Adminui::delete');
    }
}