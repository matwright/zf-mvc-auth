#!/usr/bin/env php
<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

if (! file_exists('./config/autoload') || ! is_dir('./config/autoload')) {
    print("You do not appear to be running this from within a ZF2/Apigility application; aborting.\n");
    exit(1);
}

$configFile = './config/autoload/zf-mvc-auth-oauth2-override.global.php';

$config =<<<'EOC'
<?php
/**
 * This file was autogenerated by zfcampus/zf-mvc-auth (bin/zf-mvc-auth-oauth2-override.php),
 * and overrides the ZF\OAuth2\Service\OAuth2Server to provide the ability to create named
 * OAuth2\Server instances.
 */
return array(
    'service_manager' => array(
        'factories' => array(
            'ZF\OAuth2\Service\OAuth2Server' => 'ZF\MvcAuth\Factory\NamedOAuth2ServerFactory',
        ),
    ),
);
EOC;

file_put_contents($configFile, $config);

printf("Wrote OAuth2 server override configuration to %s\n", $configFile);
exit(0);