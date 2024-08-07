Oro Training Application
==================================

>[!IMPORTANT]
>[Check the wiki for more detailed info](https://github.com/MerOmega/OroTraining/wiki)

## Description

--------------------

This is a training application for Oro Platform. It is a simple application that demonstrates the basic features of Oro.
The training consists of a series of tasks.

<!-- TOC -->
* [Oro Training Application](#oro-training-application)
  * [Description](#description)
    * [Task 1: Platform Installation](#task-1-platform-installation)
    * [Task 2: Create the new bundle](#task-2-create-the-new-bundle)
    * [Task 3: Create a modify the PDP of products](#task-3-create-a-modify-the-pdp-of-products)
    * [Task 4: Create a new entity](#task-4-create-a-new-entity)
    * [Task 5: Add a new field to the entity](#task-5-add-a-new-field-to-the-entity)
    * [Task 6: CRUD for the entity](#task-6-crud-for-the-entity)
    * [Task 7: Modify the Order History datagrid and the order detail page.](#task-7-modify-the-order-history-datagrid-and-the-order-detail-page)
    * [Task 8: Create a new payment method](#task-8-create-a-new-payment-method)
<!-- TOC -->

### Task 1: Platform Installation
Uses warp to create the project, after that run the following command to install:
```bash
sudo rm -rf var/cache/prod/ var/cache/dev/ &&
php -dxcache.cacher=0 bin/console oro:install --application-url=http://oro.local --env=prod --user-name=admin --user-email=admin@example.com --user-firstname=John --user-lastname=Doe --user-password=admin --sample-data=y --organization-name="Oro" --language=en --formatting-code=en --timeout=10000 &&
bin/console oro:config:update oro_website.url http://oro.local --env=prod &&
bin/console oro:config:update oro_ui.application_url http://oro.local --env=prod &&
bin/console oro:config:update oro_website.secure_url http://oro.local --env=prod &&
bin/console oro:config:update oro_website.url http://oro.local &&
bin/console oro:config:update oro_ui.application_url http://oro.local &&
bin/console oro:config:update oro_website.secure_url http://oro.local &&
php bin/console oro:user:create --user-name=meromega --user-email=user@admin.com --user-firstname=user --user-lastname=Admin2 --user-password=admintest --user-role=ROLE_ADMINISTRATOR --user-business-unit="Acme, General" &&
bin/console oro:platform:update --env=prod --force --schedule-search-reindexation &&
bin/console oro:message-queue:consume -vvv
```
(You might need to change COMPOSE_PROJECT_NAME in .env to remove uppercase letters)

--------------------------

### Task 2: Create the new bundle
Create a new Bundle following those instructions:
src->Name->Bundle->NameBundle
After that create the DependencyInjection folder and a Extension.php file inside it with the fullname of the bundle i.e DemoBundleExtension.php
And a {Fullname}Bundle.php in the root of the bundle

[Documentation](https://doc.oroinc.com/5.1/backend/extension/create-bundle/)

--------------------------

### Task 3: Create a modify the PDP of products
Modify the PDP of the products to show the inventory status (in stock / out of stock). This new information must be visible just below SKU (same information block).

You need to create a new theme
[How to create a new theme](https://doc.oroinc.com/5.1/frontend/storefront/quick-start/)

Create the following folder structure:
Resources\views\layouts\Theme_name
inside Config the Theme.yml
Inside the Theme the folder you need to overwrite the layout of the product view
[More info](https://doc.oroinc.com/5.1/frontend/storefront/quick-start/#change-existing-pages-structure)

If you want to add custom assets for your theme you need to create a new folder in the public folder
Yourbundle\Resources\views\layouts\Theme_name\config
and an assets.yml file with the following content:
```yml
styles:
    inputs:
        - 'bundles/{shortname}/{theme_name}/scss/styles.scss'
        - 'bundles/{shortname}/{theme_name}/scss/components/product.scss'
    output: css/styles.css
```
Notice this, if your bundle structure is Foo\Bundle\BarBundle, the shortname is "foobar"

[More about this](https://doc.oroinc.com/5.1/frontend/storefront/css/)

### Task 4: Create a new entity
Create a new entity following in Bundle->Entity->Name.php with the following attributes:
- id
- name (string 250 not null)
- type (enum with values: web, dual, local)

[How to create an entity](https://doc.oroinc.com/5.1/backend/entities/create-entities/)

The entity needs to be enxtended to accept enums or relation
[How to create an enum](https://doc.oroinc.com/5.1/backend/entities/extend-entities/enums/)

[Configurable Entity](https://doc.oroinc.com/5.1/backend/entities/config-entities/)

--------------------------
### Task 5: Add a new field to the entity
Add a new field to the entity with the following attributes:
- description (string 200 not null)

[Use migrations to add new fields, and update the installer later](https://doc.oroinc.com/5.1/backend/entities/migration/#create-versioned-schema-migrations)

--------------------------
### Task 6: CRUD for the entity
Create CRUD for the entity you created in Task 4 and 5, remember to update the DependencyInjection and Extension files to load the new entity
to inject the container, there is no autowiring in Oro

[How to create a CRUD](https://doc.oroinc.com/5.1/backend/entities/crud/#dev-cookbook-framework-create-simple-crud)

You will also need to create a datagrid

[How to create a datagrid](https://doc.oroinc.com/5.1/backend/entities/data-grids/#complete-datagrid-configuration)

Important to add extended_entity if not displaying info or not working
```yml
datagrids:
    acme-demo-question-grid-base:
        extended_entity_name: Acme\Bundle\DemoBundle\Entity\Question
        source:
            type: orm
```

--------------------------

### Task 7: Modify the Order History datagrid and the order detail page.

- Delete the Payment Method column

- - Both columns came from Checkout and Order bundle, so there are a few alternatives to hide it, one is merging the datagrid
with in the current datagrid.yml in the bundle, another is to create an event listener that catches the configuration on preBuild,
i took the first approach, setting the render as false.

- Add a new column with the full name of the user who made the purchase. This new column must be before the shipping address column and must have html formatting to style the displayed text.
  Example:
  JUAN ARMANDO PEREZ
- - Here i took the second approach and i created an event listener that adds the column with its configurations, the order columns here
didnt have an order configured so again the two approaches, one merging the other modifing using an event listener. Here i decided to practice using the last one.

- On the order detail page add at the top (Order Information) the information of the person who made the purchase.
- - Simplest way I added a new block with that uses a data provider to search for the name of the customer_user
----

### Task 8: Create a new payment method

Create a new payment method called “on Delivery”. This new method need to be implemented by integration following Oro rules. This payment method will support 2 actions PURCHASE and CHARGE. When the customer select this method and finish the checkout the transaction will remain as PURCHASE.
We have to implement an entity listener for Orders, so when the order with this payment method change the internal status to SHIPPED we have to implemente the CHARGE action for the method.

[How to create a payment method](https://doc.oroinc.com/5.1/backend/extend-commerce/payment/#create-payment-method-integrations)

Follow the documentation to create a payment method, the last part is wrong as obviously the layout.html is a yaml file.

This also was missing in the documentation which you will need to inject the view factory in the other services

````yaml
            fantasy_on_delivery.factory.method_view.on_delivery:
              class: Fantasy\Bundle\DemoBundle\PaymentMethod\View\Factory\OnDeliveryViewFactory
    public: false
````

For the event listener is just doctrine, except for the PaymentTransaction part, when you create the transaction you need to set the payment method and the action, and when you update the order you need to check if the payment method is the one you are looking for and the status is shipped, then you need to update the transaction to charge, also you need to set the transaction as father modified one.
