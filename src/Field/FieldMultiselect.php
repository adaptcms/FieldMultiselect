<?php

namespace Adaptcms\FieldMultiselect\Field;

use Adaptcms\Fields\FieldType;

class FieldMultiselect extends FieldType
{
  /**
  * Rules applied when record is being stored with a post type.
  *
  * @var array
  */
  public $storeRules = [
    //
  ];

  /**
  * Rules applied when record is being updated with a post type.
  *
  * @var array
  */
  public $updateRules = [
    //
  ];

  /**
  * Migration Command
  * When a module field, page field, or another variation is made
  * from this field, you must supply a valid migration string in string format.
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
}