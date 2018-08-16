**Installation**

NOTE: Installation process provided is compatible with Symfony4. It is possible to run bundle in lower versions but additional actions required.

1. Find preconfigured config files in **./Resources/config/preconfigured**
2. Update your application **config/packages/security.yaml** with provided configuration
3. Copy Monolog config to **config/packages/**
4. Update **config/packages/hwi_oauth.yaml** with provided configuration
5. Include routes to your application
6. You can now login into application using SalesForce user credentials via **_/login_** route