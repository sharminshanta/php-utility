### PHP Utility
Utility library to generate a uuid, text slug, database table unique text slug

### To install just run 
```
composer require sharminshanta/php-utility

```
#### Usage
 - UUID
   ```php 
   echo $uuid = \Sharminshanta\Web\PHPUtilities\Utility::generateUUID();
   echo $slug = \Sharminshanta\Web\PHPUtilities\Utility::generateSlugify("Sharmin Shanta");
