<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9b274c18b2140917dbecb7b6733e224e
{
    public static $classMap = array (
        'SnapIntegrationTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/integration/SnapIntegrationTest.php',
        'VT_Tests' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/VtTests.php',
        'VeritransApiRequestorTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/VeritransApiRequestorTest.php',
        'VeritransConfigTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/VeritransConfigTest.php',
        'VeritransNotificationIntegrationTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/integration/VtNotificationIntegrationTest.php',
        'VeritransNotificationTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/VeritransNotificationTest.php',
        'VeritransSnapApiRequestorTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/VeritransSnapApiRequestorTest.php',
        'VeritransSnapTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/VeritransSnapTest.php',
        'VeritransTransactionTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/VeritransTransactionTest.php',
        'VeritransVtDirectTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/VeritransVtDirectTest.php',
        'VeritransVtWebTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/VeritransVtWebTest.php',
        'Veritrans_ApiRequestor' => __DIR__ . '/..' . '/veritrans/veritrans-php/Veritrans/ApiRequestor.php',
        'Veritrans_Config' => __DIR__ . '/..' . '/veritrans/veritrans-php/Veritrans/Config.php',
        'Veritrans_Notification' => __DIR__ . '/..' . '/veritrans/veritrans-php/Veritrans/Notification.php',
        'Veritrans_Sanitizer' => __DIR__ . '/..' . '/veritrans/veritrans-php/Veritrans/Sanitizer.php',
        'Veritrans_Snap' => __DIR__ . '/..' . '/veritrans/veritrans-php/Veritrans/Snap.php',
        'Veritrans_SnapApiRequestor' => __DIR__ . '/..' . '/veritrans/veritrans-php/Veritrans/SnapApiRequestor.php',
        'Veritrans_Transaction' => __DIR__ . '/..' . '/veritrans/veritrans-php/Veritrans/Transaction.php',
        'Veritrans_VtDirect' => __DIR__ . '/..' . '/veritrans/veritrans-php/Veritrans/VtDirect.php',
        'Veritrans_VtWeb' => __DIR__ . '/..' . '/veritrans/veritrans-php/Veritrans/VtWeb.php',
        'VtChargeFixture' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/utility/VtFixture.php',
        'VtDirectIntegrationTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/integration/VtDirectIntegrationTest.php',
        'VtFixture' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/utility/VtFixture.php',
        'VtIntegrationTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/integration/VtIntegrationTest.php',
        'VtTransactionIntegrationTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/integration/VtTransactionIntegrationTest.php',
        'VtWebIntegrationTest' => __DIR__ . '/..' . '/veritrans/veritrans-php/tests/integration/VtWebIntegrationTest.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit9b274c18b2140917dbecb7b6733e224e::$classMap;

        }, null, ClassLoader::class);
    }
}
