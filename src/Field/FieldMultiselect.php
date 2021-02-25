<?php

namespace Adaptcms\FieldMultiselect\Field;

use Adaptcms\Fields\FieldType;

class FieldMultiselect extends FieldType
{
  /**
  * @var array
  */
  public $defaultSettings = [
    'options' => [
      'is_sortable'        => false,
      'is_searchable'      => false,
      'is_required_create' => false,
      'is_required_edit'   => false
    ],
    'action_rules' => [
      'index'  => false,
      'create' => true,
      'edit'   => true,
      'show'   => true,
      'search' => false
    ]
  ];

  /**
  * Migration Command
  * When a package field is made from this field, you must supply a valid
  * migration string in string format.
  * Here is an example, please note the use of `:columnName` and having the command
  * in single quotes so the CMS can execute the command via migrations:
  *
  * '$table->string(":columnName")->nullable();'
  *
  * @return string
  */
  public function migrationCommand()
  {
    return '$table->json(":columnName")->nullable();';
  }

  /**
  * Get Value
  *
  * @param mixed $value
  *
  * @return mixed
  */
  public function getValue($value)
  {
    return json_decode($value, true);
  }

  /**
  * Set Value
  *
  * @param mixed $value
  *
  * @return void
  */
  public function setValue($value)
  {
    return json_encode($value);
  }

  /**
  * Create Field Rules
  *
  * @return array
  */
  public function createFieldRules()
  {
    return [
      'meta.options' => 'required'
    ];
  }

  /**
  * Update Field Rules
  *
  * @return array
  */
  public function updateFieldRules()
  {
    return [
      'meta.options' => 'required'
    ];
  }
}
