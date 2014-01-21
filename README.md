RuudkMollieBundle
=================

A Symfony2 bundle for working with the old iDEAL Mollie API.

This bundle uses [AMNL\Mollie](https://github.com/itavero/AMNL-Mollie) created by Arno Moonen.

## Deprecated!

**If you start a new project today, don't use this bundle, but use [RuudkPaymentMollieBundle](https://github.com/ruudk/PaymentMollieBundle) which is powered by [JMSPaymentCorebundle](https://github.com/schmittjoh/JMSPaymentCoreBundle) and [Omnipay/Mollie](https://github.com/omnipay/mollie) and support the new Mollie API that supports ideal, credit cards, mister cash and more.**

## Installation

### Step1: Require the package with Composer

``php composer.phar require ruudk/mollie-bundle``

### Step2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new Ruudk\MollieBundle\RuudkMollieBundle(),
    );
}
```

### Step3: Configure

Finally, add the following to your config.yml

``` yaml
# app/config/config_prod.yml

ruudk_mollie:
    partner_id:  # Your partner ID
    profile_key: ~  # Optional profile key
    testmode:    true
	buzz_client: # Optional Buzz client, can be file_get_contents or curl
```

Congratulations! You're ready.

## Use the API

````php
$ideal = $this->container->get('mollie.ideal');
$minitix = $this->container->get('mollie.minitix');
$ivr = $this->container->get('mollie.ivr');
````

For full usage of the Mollie API see the [documentation](https://github.com/itavero/AMNL-Mollie).
