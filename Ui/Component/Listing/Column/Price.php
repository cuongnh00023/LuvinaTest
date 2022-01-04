<?php

namespace Luvina\Test\Ui\Component\Listing\Column;

use Magento\Framework\Escaper;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class Price extends Column
{
    /**
     * @var Escaper
     */
    protected $escaper;

    /**
     * @var ContextInterface
     */
    protected $context;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Escaper $escaper
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        Escaper            $escaper,
        array              $components = [],
        array              $data = []
    )
    {
        $this->escaper = $escaper;
        $this->context = $context;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare component configuration
     *
     * @return void
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function prepare()
    {
        if ($this->context->getRequestParam('price') == 100) {
            $config = $this->getData('config');
            $config['visible'] = false;
            $this->setData($config);
        }
        parent::prepare();
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item[$this->getData('name')])) {
                    $item[$this->getData('name')] = nl2br($this->escaper->escapeHtml($item[$this->getData('name')]));
                }
            }
        }

        return $dataSource;
    }
}
