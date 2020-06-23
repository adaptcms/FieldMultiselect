<?php

namespace Adaptcms\FieldMultiselect;

use Adaptcms\Base\Models\Package;

class FieldMultiselect
{
  /**
  * On Install
  *
  * @return void
  */
  public function onInstall()
  {
    Package::syncPackageFolder(get_class());
  }
}
