Installation
============

### Get the bundle using composer

Add GlavwebMongoDBBundle by running this command from the terminal at the root of
your Symfony project:

```bash
php composer.phar require glavweb/mongodb-bundle
```

### Enable the bundle

To start using the bundle, register the bundle in your application's kernel class:

```php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Glavweb\MongoDBBundle\GlavwebMongoDBBundle(),
        // ...
    );
}
```
### Configure the bundle


```yaml
 
glavweb_mongo_db:
    host:     "%mongodb_host%"
    dbname:   "%mongodb_dbname%"
    user:     "%mongodb_user%"
    password: "%mongodb_password%"
```
