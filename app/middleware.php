<?php

/**
 * Add Error Middleware
 *
 * @param bool                  $displayErrorDetails -> Should be set to false in production
 * @param bool                  $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool                  $logErrorDetails -> Display error details in error log
 * @param LoggerInterface|null  $logger -> Optional PSR-3 Logger
 *
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */

use Slim\App;

return function(App $app) {
    $settigs = $app->getContainer()->get('settings');

    $app->addErrorMiddleware(
        $settigs['displayErrorDetails'],
        $settigs['logErrors'],
        $settigs['logErrorDetails'],
    );
};
