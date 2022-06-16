<?php
namespace Ced\Adminui\Controller\Adminhtml\Index;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Ced\Adminui\Helper\Data;
class Save extends \Magento\Backend\App\Action
{
    
    protected $resultPageFactory;
    protected $helper;
    
    public function __construct(Context $context,
        PageFactory $resultPageFactory,
        \Ced\Adminui\Model\ResourceModel\Test $testResource,
		\Ced\Adminui\Model\TestFactory $testFactory,
         Data $helper
    
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
        $data = $this->getRequest()->getParams();
        try{
        // if(isset($data))
        // {
            $helperData = $this->helper->employeeData($data);
            $this->messageManager->addSuccessMessage(__('Your Data Submitted Successfully.'));
            $resultRedirect->setPath('adminui/index/grid');
            return $resultRedirect;
        // }else{
        //     $this->messageManager->addSuccessMessage(__('Your Data Not Submitted.'));
        // $resultRedirect->setPath('adminui/index/grid');
        // }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        
    }
    
}