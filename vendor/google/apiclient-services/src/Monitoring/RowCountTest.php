<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Monitoring;

class RowCountTest extends \Google\Model
{
  /**
   * @var string
   */
  public $comparison;
  /**
   * @var string
   */
  public $threshold;

  /**
   * @param string
   */
  public function setComparison($comparison)
  {
    $this->comparison = $comparison;
  }
  /**
   * @return string
   */
  public function getComparison()
  {
    return $this->comparison;
  }
  /**
   * @param string
   */
  public function setThreshold($threshold)
  {
    $this->threshold = $threshold;
  }
  /**
   * @return string
   */
  public function getThreshold()
  {
    return $this->threshold;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RowCountTest::class, 'Google_Service_Monitoring_RowCountTest');
