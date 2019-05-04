<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ImportServiceUI\Block\Adminhtml\Async\Import\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * Add fieldsets
     *
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id' => 'edit_form',
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                ],
            ]
        );

        // base fieldset
        $fieldsets['base'] = $form->addFieldset('base_fieldset', ['legend' => __('Import Settings')]);
        $fieldsets['base']->addField(
            'entity',
            'select',
            [
                'name' => 'entity',
                'title' => __('Entity Type'),
                'label' => __('Entity Type'),
                'required' => true,
            ]
        );

        $fieldsets['basic_behavior'] = $form->addFieldset(
            'basic_behavior_fieldset',
            ['legend' => __('Import Behavior')]
        );

        $fieldsets['basic_behavior']->addField(
            'basic_behavior',
            'select',
            [
                'name' => 'behavior',
                'title' => __('Import Behavior'),
                'label' => __('Import Behavior'),
                'required' => true,
                'class' => 'basic_behavior',
                'note' => ' ',
            ]
        );

        $fieldsets['basic_behavior']->addField(
            'basic_behavior_validation_strategy',
            'select',
            [
                'name' => 'validation_strategy',
                'title' => __(' '),
                'label' => __(' '),
                'required' => true,
                'class' => 'basic_behavior',
            ]
        );
        $fieldsets['basic_behavior']->addField(
            'basic_behavior_allowed_error_count',
            'text',
            [
                'name' => 'allowed_error_count',
                'label' => __('Allowed Errors Count'),
                'title' => __('Allowed Errors Count'),
                'required' => true,
                'value' => 10,
                'class' => 'basic_behavior validate-number validate-greater-than-zero input-text',
                'note' => __(
                    'Please specify number of errors to halt import process'
                ),
            ]
        );
        $fieldsets['basic_behavior']->addField(
            'basic_behavior_import_field_separator',
            'text',
            [
                'name' => 'import_field_separator',
                'label' => __('Field separator'),
                'title' => __('Field separator'),
                'required' => true,
                'class' => 'basic_behavior',
                'value' => ',',
            ]
        );

        $fieldsets['basic_behavior']->addField(
            'basic_behavior_import_multiple_value_separator',
            'text',
            [
                'name' => 'import_multiple_value_separator',
                'label' => __('Multiple value separator'),
                'title' => __('Multiple value separator'),
                'required' => true,
                'class' => 'basic_behavior',
                'value' => ',',
            ]
        );

        $fieldsets['basic_behavior']->addField(
            'basic_behavior_import_empty_attribute_value_constant',
            'text',
            [
                'name' => 'import_empty_attribute_value_constant',
                'label' => __('Empty attribute value constant'),
                'title' => __('Empty attribute value constant'),
                'required' => true,
                'class' => 'basic_behavior',
                'value' => '__EMPTY__VALUE__',
            ]
        );

        $fieldsets['basic_behavior']->addField(
            'basic_behavior' . 'fields_enclosure',
            'checkbox',
            [
                'name' => 'fields_enclosure',
                'label' => __('Fields enclosure'),
                'title' => __('Fields enclosure'),
                'value' => 1,
            ]
        );

        // fieldset for file uploading
        $fieldsets['upload'] = $form->addFieldset(
            'upload_file_fieldset',
            ['legend' => __('File to Import')]
        );

        $fieldsets['upload']->addField(
            'import_file',
            'file',
            [
                'name' => 'import_file',
                'label' => __('Select File to Import'),
                'title' => __('Select File to Import'),
                'required' => true,
                'class' => 'input-file',
                'note' => __(
                    'File must be saved in UTF-8 encoding for proper import'
                ),
            ]
        );

        $fieldsets['upload']->addField(
            'import_images_file_dir',
            'text',
            [
                'name' => 'import_images_file_dir',
                'label' => __('Images File Directory'),
                'title' => __('Images File Directory'),
                'required' => false,
                'class' => 'input-text',
                'note' => __(
                    'For Type "Local Server" use relative path to Magento installation,
                                e.g. var/export, var/import, var/export/some/dir'
                ),
            ]
        );

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
