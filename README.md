# rector-error
Demonstration of a Rector PHP bug

## Process

1. Clone the repo
2. Run `composer update`
3. Verify local execution succeeds: `./vendor/bin/rector process -vv`
4. Install Rector globally
5. Verify global execution fails: `rector process -vv`

*Tested on PHP 7.4 and 8.1 with Rector `0.12.13`.*

## Example Output

From an actual run of this process on ubuntu 20.04, PHP 7.4, Rector 0.12.13.
```
ubuntu:/opt/rector-error$ ~/.config/composer/vendor/bin/rector process -vv --clear-cache
[parsing] src/MyException.php
[parsing] src/MyOtherClass.php
[refactoring] src/MyOtherClass.php
[post rectors] src/MyOtherClass.php
    [post rector] Rector\PostRector\Rector\NodeToReplacePostRector
    [post rector] Rector\PostRector\Rector\NodeAddingPostRector
    [post rector] Rector\PostRector\Rector\PropertyAddingPostRector
    [post rector] Ssch\TYPO3Rector\Rector\PostRector\FullQualifiedNamePostRector
    [post rector] Rector\PostRector\Rector\NodeRemovingPostRector
    [post rector] Rector\PostRector\Rector\ClassRenamingPostRector
    [post rector] Rector\PostRector\Rector\NameImportingPostRector
    [post rector] Rector\PostRector\Rector\UseAddingPostRector
[print] src/MyOtherClass.php

                                                                                                                        
 [ERROR] Could not process "src/MyException.php" file, due to:                                                          
         "System error: "PHPStan\BetterReflection\Reflection\ReflectionClass "CodeIgniter\Exceptions\ExceptionInterface"
         could not be found in the located source"                                                                      
         Run Rector with "--debug" option and post the report here: https://github.com/rectorphp/rector/issues/new". On 
         line: 26                                                                                                       
                                                                                                                        

ubuntu:/opt/rector-error$ ./vendor/bin/rector process -vv --clear-cache
[parsing] src/MyException.php
[refactoring] src/MyException.php
[post rectors] src/MyException.php
    [post rector] Rector\PostRector\Rector\NodeToReplacePostRector
    [post rector] Rector\PostRector\Rector\NodeAddingPostRector
    [post rector] Rector\PostRector\Rector\PropertyAddingPostRector
    [post rector] Ssch\TYPO3Rector\Rector\PostRector\FullQualifiedNamePostRector
    [post rector] Rector\PostRector\Rector\NodeRemovingPostRector
    [post rector] Rector\PostRector\Rector\ClassRenamingPostRector
    [post rector] Rector\PostRector\Rector\NameImportingPostRector
    [post rector] Rector\PostRector\Rector\UseAddingPostRector
[print] src/MyException.php
[parsing] src/MyOtherClass.php
[printing skipped due error] src/MyOtherClass.php

                                                                                                                        
 [OK] Rector is done!                                                                                                   
```
