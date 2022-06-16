<?php

namespace Ced\Adminui\Helper;
use Ced\Adminui\Controller\Adminhtml\Index\Delete;

use Magento\Framework\App\Helper\AbstractHelper;

class Del extends AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Http\Context
     */
    private $httpContext;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Http\Context $httpContext,
        \Ced\Adminui\Model\ResourceModel\Test $testResource,
		\Ced\Adminui\Model\TestFactory $testFactory
    ) 
    {
        parent::__construct($context);
        $this->httpContext = $httpContext;
        $this->testFactory = $testFactory;
		$this->testResource = $testResource;
    }
    public function deleteData($id){
        if ($id){
            $testModel = $this->testFactory->create();
            $testModel->load($id);
            $delete = $testModel->delete();
            return $delete;
    }
}

    
}