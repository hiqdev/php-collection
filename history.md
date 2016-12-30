hiqdev/php-collection
---------------------

## [0.1.0] - 2016-12-30

- Changed `getItem()`: added default parameter
    - [1e026a2] 2016-12-30 csfixed [@hiqsol]
    - [189a655] 2016-12-30 changed getItem: + default [@hiqsol]
- Fixed minor issues
    - [b43d824] 2016-09-22 csfixed [@hiqsol]
    - [4243f1e] 2016-09-22 switched to `chkipper` history bumping [@hiqsol]
    - [f5f26dd] 2016-09-22 fixed minor issues [@hiqsol]

## [0.0.6] - 2016-05-20

- Fixed minor issues
    - [4b51f7b] 2016-05-20 rehideved [@hiqsol]
    - [5ae398b] 2016-02-17 happynized scrutinizer [@hiqsol]
    - [a5f6dd6] 2016-02-17 rehideved [@hiqsol]
    - [7dfb00f] 2016-02-17 fixed PHP notice [@hiqsol]

## [0.0.5] - 2015-11-25

- Added `ArrayHelper::getItems`
    - [4185489] 2015-11-25 + ArrayHelper::getItems [@hiqsol]

## [0.0.4] - 2015-11-24

- Added Travis CI
    - [0794d13] 2015-11-24 added Travis CI [@hiqsol]

## [0.0.3] - 2015-11-24

- Added `ArrayHelper`
    - [55d5a79] 2015-11-23 changed used `var_export` <- serialize in `ArrayHelper::unique` [@hiqsol]
    - [9992ccb] 2015-11-21 + tests for ArrayHelper [@hiqsol]
    - [bb1c058] 2015-11-21 + ArrayHelper::toArray [@hiqsol]
    - [b68dc74] 2015-11-21 fixed typo [@hiqsol]
    - [fd4b650] 2015-11-21 php-cs-fixed [@hiqsol]
    - [2a00b6e] 2015-11-21 added `ArrayHelper::unique()` [@hiqsol]
- Redone to `php-collection` from `yii2-collection`
    - [373b061] 2015-11-20 exposed tests namespace [@hiqsol]
    - [c407507] 2015-11-20 offset functions and getIterator moved to BaseTrait [@hiqsol]
    - [b81be9d] 2015-11-20 fixed tests bootstrap [@hiqsol]
    - [2d6f2c2] 2015-11-20 fixed tests [@hiqsol]
    - [7c9803a] 2015-11-20 trying phpunit [@hiqsol]
    - [c9ea8d7] 2015-11-20 merged [@hiqsol]
    - [af9048f] 2015-11-20 Fixed autoloader for unit tests [@SilverFire]
    - [59e5733] 2015-11-20 redoing to `php-collection` [@hiqsol]
    - [7ea0de7] 2015-11-20 fixed namespace [@hiqsol]
    - [8c44704] 2015-11-20 moved to src [@hiqsol]
    - [1d5aba0] 2015-11-05 BaseTrait::keys() - fixed returning type in PHPDoc [@SilverFire]
    - [1e39467] 2015-08-07 `BaseTrait` - added `count()` method, FIXED `addItems()` method (???) [@SilverFire]
    - [a3e1ef7] 2015-06-26 php-cs-fixed [@hiqsol]
    - [0644c1d] 2015-06-26 fixed requirements [@hiqsol]

## [0.0.2] - 2015-06-19

- Fixed minor issues
    - [dd1bfd9] 2015-06-19 rephp-cs-fixed [@hiqsol]
    - [01c3a1d] 2015-06-19 hideved [@hiqsol]
    - [2b1d237] 2015-06-19 * BaseTrait::rawItem + default value [@hiqsol]
    - [05be8f5] 2015-05-17 - require yii2 [@hiqsol]
    - [bfba8ba] 2015-05-14 improved putItem and used everywhere renamed getRaw -> rawItem improved insertInside, renamed convertWhere2List -> prepareWhere [@hiqsol]

## [0.0.1] - 2015-05-12

- Added basics
    - [2c95c95] 2015-05-12 fixed getItemConfig, reflectioning proper class [@hiqsol]
    - [91a363c] 2015-05-08 Travis fixed. Again... [@SilverFire]
    - [52e19b7] 2015-05-08 Travis fixed [@SilverFire]
    - [61d39bc] 2015-05-08 Playing with travis-ci [@SilverFire]
    - [be45b95] 2015-05-08 Playing with travis-ci config [@SilverFire]
    - [cb1d5aa] 2015-05-08 Playing with travis-ci config [@SilverFire]
    - [b58d930] 2015-05-08 Added ItemWithName and ItemWithCollection interfaces [@SilverFire]
    - [42e1184] 2015-05-07 * ManagerTrait::getItemConfig: + tellName/Parent [@hiqsol]
    - [a627c4a] 2015-05-07 * getIterator moved to BaseTrait [@hiqsol]
    - [7ca869e] 2015-05-07 php-cs-fixed [@hiqsol]
    - [c37d34d] 2015-05-07 + BaseTrait, ManagerTrait [@hiqsol]
    - [0cd6bad] 2015-05-06 + ManagerTrait [@hiqsol]
    - [c6dea94] 2015-05-06 * setItems: do nothing when empty items [@hiqsol]
    - [2096ac2] 2015-05-05 php-cs-fixed [@hiqsol]
    - [5e920f1] 2015-05-05 fixed get/set('') [@hiqsol]
    - [ba603ca] 2015-05-05 * CollectionTrait ArrayAccess items to work with items only [@hiqsol]
    - [636e475] 2015-05-04 * smartSet to use setItem <- set [@hiqsol]
    - [f497af8] 2015-05-04 * creating item * getRaw to return really raw [@hiqsol]
    - [1073da2] 2015-05-03 php-cs-fixed [@hiqsol]
    - [d95804f] 2015-05-03 php-cs-fixed [@hiqsol]
    - [c6ce463] 2015-05-03 * Object, Component: + IteratorAggregate interface [@hiqsol]
    - [e735de5] 2015-05-03 redone set functions with where argument, + getIterator() for IteratorAggregate [@hiqsol]
    - [3d654c7] 2015-05-03 + more tests [@hiqsol]
    - [4f73089] 2015-05-03 + enable coverage [@hiqsol]
    - [0708f9b] 2015-05-03 * createItem to work with non arrays [@hiqsol]
    - [07accc9] 2015-05-02 default itemClass to `get_called_class` [@hiqsol]
    - [896667e] 2015-05-02 * addItem to check with hasItem and set with setItem [@hiqsol]
    - [9ae7daa] 2015-04-30 minor fix [@hiqsol]
    - [4159ace] 2015-04-30 REDONE a bit [@hiqsol]
    - [fb6ef6a] 2015-04-29 try3 [@hiqsol]
    - [80d9c94] 2015-04-29 still strying [@hiqsol]
    - [e0bc391] 2015-04-29 + CBIN [@hiqsol]
    - [943f83d] 2015-04-29 trying [@hiqsol]
    - [15af62c] 2015-04-29 fixed Makefile spaces -> tab [@hiqsol]
    - [33ed9ff] 2015-04-29 trying [@hiqsol]
    - [d2e14ad] 2015-04-29 + setpath [@hiqsol]
    - [46d1147] 2015-04-29 trying global php-cs-fixer and codeception [skip ci] [@hiqsol]
    - [e37d4f1] 2015-04-29 added .scrutinizer.yml [@hiqsol]
    - [6afa261] 2015-04-29 php-cs-fixed [@hiqsol]
    - [ca96353] 2015-04-29 + more tests [@hiqsol]
    - [6badfaf] 2015-04-28 BIG changes: + Model, splitted functional to Manager, added tests [@hiqsol]
    - [3cf92bc] 2015-04-26 allow hhvm build to fail [@hiqsol]
    - [286fbd3] 2015-04-26 * Makefile: enabled full checks: fix tests [@hiqsol]
    - [7b5e01e] 2015-04-26 php-cs-fixed [@hiqsol]
    - [d4e0478] 2015-04-26 php-cs-fixing [skip ci] [@hiqsol]
    - [ae2848a] 2015-04-26 * composer.json: + extra [@hiqsol]
    - [b1feb72] 2015-04-26 doc [skip ci] [@hiqsol]
    - [8c8ee19] 2015-04-25 php-cs-fixed [@hiqsol]
    - [bf7e588] 2015-04-25 no need setPhpdoc any more [@hiqsol]
    - [0c0df1e] 2015-04-25 disabled fix for the moment [@hiqsol]
    - [5fdba26] 2015-04-24 php-cs-fixed [@hiqsol]
    - [325e54c] 2015-04-24 still trying [@hiqsol]
    - [d79dc85] 2015-04-24 trying phpdoc [@hiqsol]
    - [b146cf2] 2015-04-24 php-cs-fixed and fixed addItems [@hiqsol]
    - [ae29feb] 2015-04-24 improved `.php_cs`: + skip UnitTests.php [@hiqsol]
    - [023ab9c] 2015-04-24 php-cs-fixed [@hiqsol]
    - [2d93480] 2015-04-24 php-cs-fixed [@hiqsol]
    - [d81b741] 2015-04-24 php-cs-fixed [@hiqsol]
    - [9e3ca7c] 2015-04-24 trying [@hiqsol]
    - [9835033] 2015-04-24 trying [@hiqsol]
    - [3085249] 2015-04-24 + contrib fixers [@hiqsol]
    - [aed16a3] 2015-04-24 improved `.php_cs` [@hiqsol]
    - [fbf3b47] 2015-04-24 Integrating php-cs-fixer [@hiqsol]
    - [2a817b6] 2015-04-24 + require codeception for travis [@hiqsol]
    - [a070885] 2015-04-24 + make clean [@hiqsol]
    - [e1c1ddc] 2015-04-24 trafis do it ! [@hiqsol]
    - [d9a8bd6] 2015-04-24 + testing, making travis [@hiqsol]
    - [346cad8] 2015-04-24 NOT FINISHED making tests [@hiqsol]
    - [627d23e] 2015-04-23 + tests/CollectionTest.php [@hiqsol]
    - [c7a62e3] 2015-04-23 try [@hiqsol]
    - [e725a84] 2015-04-22 NOT TESTED [@hiqsol]
    - [fa16f83] 2015-04-22 doc [@hiqsol]
    - [4ca7b69] 2015-04-22 inited [@hiqsol]

## [Development started] - 2015-04-22

[@hiqsol]: https://github.com/hiqsol
[sol@hiqdev.com]: https://github.com/hiqsol
[@SilverFire]: https://github.com/hiqsol
[d.naumenko.a@gmail.com]: https://github.com/hiqsol
[4b51f7b]: https://github.com/hiqdev/php-collection/commit/4b51f7b
[5ae398b]: https://github.com/hiqdev/php-collection/commit/5ae398b
[a5f6dd6]: https://github.com/hiqdev/php-collection/commit/a5f6dd6
[7dfb00f]: https://github.com/hiqdev/php-collection/commit/7dfb00f
[4185489]: https://github.com/hiqdev/php-collection/commit/4185489
[0794d13]: https://github.com/hiqdev/php-collection/commit/0794d13
[55d5a79]: https://github.com/hiqdev/php-collection/commit/55d5a79
[9992ccb]: https://github.com/hiqdev/php-collection/commit/9992ccb
[bb1c058]: https://github.com/hiqdev/php-collection/commit/bb1c058
[b68dc74]: https://github.com/hiqdev/php-collection/commit/b68dc74
[fd4b650]: https://github.com/hiqdev/php-collection/commit/fd4b650
[2a00b6e]: https://github.com/hiqdev/php-collection/commit/2a00b6e
[373b061]: https://github.com/hiqdev/php-collection/commit/373b061
[c407507]: https://github.com/hiqdev/php-collection/commit/c407507
[b81be9d]: https://github.com/hiqdev/php-collection/commit/b81be9d
[2d6f2c2]: https://github.com/hiqdev/php-collection/commit/2d6f2c2
[7c9803a]: https://github.com/hiqdev/php-collection/commit/7c9803a
[c9ea8d7]: https://github.com/hiqdev/php-collection/commit/c9ea8d7
[af9048f]: https://github.com/hiqdev/php-collection/commit/af9048f
[59e5733]: https://github.com/hiqdev/php-collection/commit/59e5733
[7ea0de7]: https://github.com/hiqdev/php-collection/commit/7ea0de7
[8c44704]: https://github.com/hiqdev/php-collection/commit/8c44704
[1d5aba0]: https://github.com/hiqdev/php-collection/commit/1d5aba0
[1e39467]: https://github.com/hiqdev/php-collection/commit/1e39467
[a3e1ef7]: https://github.com/hiqdev/php-collection/commit/a3e1ef7
[0644c1d]: https://github.com/hiqdev/php-collection/commit/0644c1d
[dd1bfd9]: https://github.com/hiqdev/php-collection/commit/dd1bfd9
[01c3a1d]: https://github.com/hiqdev/php-collection/commit/01c3a1d
[2b1d237]: https://github.com/hiqdev/php-collection/commit/2b1d237
[05be8f5]: https://github.com/hiqdev/php-collection/commit/05be8f5
[bfba8ba]: https://github.com/hiqdev/php-collection/commit/bfba8ba
[2c95c95]: https://github.com/hiqdev/php-collection/commit/2c95c95
[91a363c]: https://github.com/hiqdev/php-collection/commit/91a363c
[52e19b7]: https://github.com/hiqdev/php-collection/commit/52e19b7
[61d39bc]: https://github.com/hiqdev/php-collection/commit/61d39bc
[be45b95]: https://github.com/hiqdev/php-collection/commit/be45b95
[cb1d5aa]: https://github.com/hiqdev/php-collection/commit/cb1d5aa
[b58d930]: https://github.com/hiqdev/php-collection/commit/b58d930
[42e1184]: https://github.com/hiqdev/php-collection/commit/42e1184
[a627c4a]: https://github.com/hiqdev/php-collection/commit/a627c4a
[7ca869e]: https://github.com/hiqdev/php-collection/commit/7ca869e
[c37d34d]: https://github.com/hiqdev/php-collection/commit/c37d34d
[0cd6bad]: https://github.com/hiqdev/php-collection/commit/0cd6bad
[c6dea94]: https://github.com/hiqdev/php-collection/commit/c6dea94
[2096ac2]: https://github.com/hiqdev/php-collection/commit/2096ac2
[5e920f1]: https://github.com/hiqdev/php-collection/commit/5e920f1
[ba603ca]: https://github.com/hiqdev/php-collection/commit/ba603ca
[636e475]: https://github.com/hiqdev/php-collection/commit/636e475
[f497af8]: https://github.com/hiqdev/php-collection/commit/f497af8
[1073da2]: https://github.com/hiqdev/php-collection/commit/1073da2
[d95804f]: https://github.com/hiqdev/php-collection/commit/d95804f
[c6ce463]: https://github.com/hiqdev/php-collection/commit/c6ce463
[e735de5]: https://github.com/hiqdev/php-collection/commit/e735de5
[3d654c7]: https://github.com/hiqdev/php-collection/commit/3d654c7
[4f73089]: https://github.com/hiqdev/php-collection/commit/4f73089
[0708f9b]: https://github.com/hiqdev/php-collection/commit/0708f9b
[07accc9]: https://github.com/hiqdev/php-collection/commit/07accc9
[896667e]: https://github.com/hiqdev/php-collection/commit/896667e
[9ae7daa]: https://github.com/hiqdev/php-collection/commit/9ae7daa
[4159ace]: https://github.com/hiqdev/php-collection/commit/4159ace
[fb6ef6a]: https://github.com/hiqdev/php-collection/commit/fb6ef6a
[80d9c94]: https://github.com/hiqdev/php-collection/commit/80d9c94
[e0bc391]: https://github.com/hiqdev/php-collection/commit/e0bc391
[943f83d]: https://github.com/hiqdev/php-collection/commit/943f83d
[15af62c]: https://github.com/hiqdev/php-collection/commit/15af62c
[33ed9ff]: https://github.com/hiqdev/php-collection/commit/33ed9ff
[d2e14ad]: https://github.com/hiqdev/php-collection/commit/d2e14ad
[46d1147]: https://github.com/hiqdev/php-collection/commit/46d1147
[e37d4f1]: https://github.com/hiqdev/php-collection/commit/e37d4f1
[6afa261]: https://github.com/hiqdev/php-collection/commit/6afa261
[ca96353]: https://github.com/hiqdev/php-collection/commit/ca96353
[6badfaf]: https://github.com/hiqdev/php-collection/commit/6badfaf
[3cf92bc]: https://github.com/hiqdev/php-collection/commit/3cf92bc
[286fbd3]: https://github.com/hiqdev/php-collection/commit/286fbd3
[7b5e01e]: https://github.com/hiqdev/php-collection/commit/7b5e01e
[d4e0478]: https://github.com/hiqdev/php-collection/commit/d4e0478
[ae2848a]: https://github.com/hiqdev/php-collection/commit/ae2848a
[b1feb72]: https://github.com/hiqdev/php-collection/commit/b1feb72
[8c8ee19]: https://github.com/hiqdev/php-collection/commit/8c8ee19
[bf7e588]: https://github.com/hiqdev/php-collection/commit/bf7e588
[0c0df1e]: https://github.com/hiqdev/php-collection/commit/0c0df1e
[5fdba26]: https://github.com/hiqdev/php-collection/commit/5fdba26
[325e54c]: https://github.com/hiqdev/php-collection/commit/325e54c
[d79dc85]: https://github.com/hiqdev/php-collection/commit/d79dc85
[b146cf2]: https://github.com/hiqdev/php-collection/commit/b146cf2
[ae29feb]: https://github.com/hiqdev/php-collection/commit/ae29feb
[023ab9c]: https://github.com/hiqdev/php-collection/commit/023ab9c
[2d93480]: https://github.com/hiqdev/php-collection/commit/2d93480
[d81b741]: https://github.com/hiqdev/php-collection/commit/d81b741
[9e3ca7c]: https://github.com/hiqdev/php-collection/commit/9e3ca7c
[9835033]: https://github.com/hiqdev/php-collection/commit/9835033
[3085249]: https://github.com/hiqdev/php-collection/commit/3085249
[aed16a3]: https://github.com/hiqdev/php-collection/commit/aed16a3
[fbf3b47]: https://github.com/hiqdev/php-collection/commit/fbf3b47
[2a817b6]: https://github.com/hiqdev/php-collection/commit/2a817b6
[a070885]: https://github.com/hiqdev/php-collection/commit/a070885
[e1c1ddc]: https://github.com/hiqdev/php-collection/commit/e1c1ddc
[d9a8bd6]: https://github.com/hiqdev/php-collection/commit/d9a8bd6
[346cad8]: https://github.com/hiqdev/php-collection/commit/346cad8
[627d23e]: https://github.com/hiqdev/php-collection/commit/627d23e
[c7a62e3]: https://github.com/hiqdev/php-collection/commit/c7a62e3
[e725a84]: https://github.com/hiqdev/php-collection/commit/e725a84
[fa16f83]: https://github.com/hiqdev/php-collection/commit/fa16f83
[4ca7b69]: https://github.com/hiqdev/php-collection/commit/4ca7b69
[f5f26dd]: https://github.com/hiqdev/php-collection/commit/f5f26dd
[4243f1e]: https://github.com/hiqdev/php-collection/commit/4243f1e
[b43d824]: https://github.com/hiqdev/php-collection/commit/b43d824
[1e026a2]: https://github.com/hiqdev/php-collection/commit/1e026a2
[189a655]: https://github.com/hiqdev/php-collection/commit/189a655
[Under development]: https://github.com/hiqdev/php-collection/compare/0.0.6...HEAD
[0.0.6]: https://github.com/hiqdev/php-collection/compare/0.0.5...0.0.6
[0.0.5]: https://github.com/hiqdev/php-collection/compare/0.0.4...0.0.5
[0.0.4]: https://github.com/hiqdev/php-collection/compare/0.0.3...0.0.4
[0.0.3]: https://github.com/hiqdev/php-collection/compare/0.0.2...0.0.3
[0.0.2]: https://github.com/hiqdev/php-collection/compare/0.0.1...0.0.2
[0.0.1]: https://github.com/hiqdev/php-collection/releases/tag/0.0.1
[0.1.0]: https://github.com/hiqdev/php-collection/compare/0.0.6...0.1.0
