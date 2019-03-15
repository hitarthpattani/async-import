<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\ImportService\Model\Import\Processor;

use Magento\ImportService\Api\Data\SourceInterface;
use Magento\ImportService\Api\Data\SourceUploadResponseInterface;
use Magento\ImportService\Model\Import\SourceTypePool;
use Magento\ImportService\Model\Import\Type\PartialSourceType;
use Magento\ImportService\ImportServiceException;

/**
 * Define the source type pool and process the request
 */
class PersistentSourceProcessor implements SourceProcessorInterface
{
    /**
     * @var SourceTypePool
     */
    private $sourceTypePool;

    /**
     * @var PartialSourceType
     */
    private $partialSourceType;

    /**
     * @param SourceTypePool $sourceTypePool
     * @param PartialSourceType $partialSourceType
     */
    public function __construct(
        SourceTypePool $sourceTypePool,
        PartialSourceType $partialSourceType
    ) {
        $this->sourceTypePool = $sourceTypePool;
        $this->partialSourceType = $partialSourceType;
    }

    /**
     * {@inheritdoc}
     *
     * @throws ImportServiceException
     * @return SourceTypeInterface
     */
    public function processUpload(SourceInterface $source, SourceUploadResponseInterface $response)
    {
    	/** process partial source and generate souce when partial process complete to save the source */
    	if($this->partialSourceType->isValidSource($source))
        {
        	/** save partial source */
        	$source = $this->partialSourceType->save($source);

        	/** check if there all pieces are imported */
        	if(!$this->partialSourceType->isFinalPiece($source))
        	{
            	return $response->setSourceId($source->getSourceId())->setStatus($source->getStatus());
        	}

        	/** read all pieces and get the merge content */
        	$content = $this->partialSourceType->merge($source);

        	/** Set downloaded data */
        	$source->setImportData($content);
        }

        /** @var \Magento\ImportService\Model\Import\Type\SourceTypeInterface $sourceType */
        $sourceType = $this->sourceTypePool->getSourceType($source);

        /** save processed content get updated source object */
        $source = $sourceType->save($source);

        /** return response with details */
        return $response->setSource($source)->setSourceId($source->getSourceId())->setStatus($source->getStatus());
    }
}
