<?php

namespace Ced\Adminui\Ui\DataProvider;

class Grid extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * Product collection
     *
     * @var \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public $objectManager;
    /**
     * @var \Ced\Range\Model\ResourceModel\Order\Collection
     */
    public $collection;

    /**
     * @var \Magento\Ui\DataProvider\AddFieldToCollectionInterface[]
     */
    public $addFieldStrategies;

    /**
     * @var \Magento\Ui\DataProvider\AddFilterToCollectionInterface[]
     */
    public $addFilterStrategies;

    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \Ced\Range\Model\ResourceModel\Order\CollectionFactory $collectionFactory
     * @param array $addFieldStrategies
     * @param array $addFilterStrategies
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Ced\Adminui\Model\ResourceModel\Test\CollectionFactory $collectionFactory,
        array $addFieldStrategies = [],
        array $addFilterStrategies = [],
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {

        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }

        $items = $this->getCollection()->getData();
        // echo"<pre>";
        // print_r($items);
        // die(__FILE__);
        return [
            'totalRecords' =>  $this->getCollection()->getSize(),
            'items' => array_values($items),
        ];
    }
}