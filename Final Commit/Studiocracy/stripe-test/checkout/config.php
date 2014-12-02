<?php
require_once('./lib/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_test_rrOzsIElG53BFgpo3QMAooFm",
  "publishable_key" => "pk_test_P7xCZz7kDorrz0nferUUuJJA"
);

Stripe::setApiKey($stripe['secret_key']);
?>