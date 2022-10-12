<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\ResourceFeatureTestCase;

class ReviewsFeatureTest extends TestCase
{
  protected $endpoint = '/api/v1/reviews';
  protected $postData = [
    'foreign_table' => 'products',
    'foreign_id' => 'e1625fb5-d615-4adc-9212-ad28fff6cdd4',
    'scope' => 'product',
    'rate' => 5
  ];

  protected $putDataInvalid = [
    "rate" => 10,
  ];

  protected $putDataValid = [
    'foreign_table' => 'products',
    'foreign_id' => 'e1625fb5-d615-4adc-9212-ad28fff6cdd4',
    'scope' => 'product',
    'rate' => 4
  ];

  use ResourceFeatureTestCase;
}
