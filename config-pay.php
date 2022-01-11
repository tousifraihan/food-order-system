<?php 
    require('stripe-php-master/init.php');
    $publishedKey="pk_test_51JJha9GyQSL5q9WMojYN2No8isnsr1ZpQqAAyqenOhMhaw13NoYRFXdEzi6UmCwliB9JBZFckRuODiNnG4MlPJ80004Ph7hAAF";
    $secretKey="sk_test_51JJha9GyQSL5q9WMfgLnCqWXPxzSxQsO8ysU4bKtuUOlmEtkdyTBIZHoYociAhDiCAbWDOr5OUfcmHRRpYR8SzIe00LkoEGmts";
    \Stripe\Stripe::setApiKey($secretKey);

?>