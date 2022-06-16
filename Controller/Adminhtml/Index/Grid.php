<?php
namespace Ced\Adminui\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Grid extends Action
{
   
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }

}