<?php
namespace Magento\ImportService\Model;

/**
 * Factory class for @see \Magento\ImportService\Model\SourceUploadResponse
 */
class SourceUploadResponseFactory
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Instance name to create
     *
     * @var string
     */
    protected $_instanceName = null;

    /**
     * Factory constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $instanceName
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\Magento\\ImportService\\Model\\SourceUploadResponse')
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
    }

    /**
     * Create class instance with specified parameters
     *
     * @param array $data
     * @return \Magento\ImportService\Model\SourceUploadResponse
     */
    public function create(array $data = [])
    {
        return $this->_objectManager->create($this->_instanceName, $data);
    }

    /**
     * Create class instance with specified parameters
     *
     * @param string $error
     * @return \Magento\ImportService\Model\SourceUploadResponse
     */
    public function createFailure(string $error = "")
    {
        $response = $this->_objectManager->create($this->_instanceName, []);
        $response->setError($error);
        $response->setStatus(\Magento\ImportService\Api\Data\SourceUploadResponseInterface::STATUS_FAILED);
        return $response;
    }
}
