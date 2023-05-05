
# A few test cases on symfony/ux-live-component

## Purpose

Show some behavior troubles with **updateFromParent**, **data-live-id**, **debounce**.

## Installation

Run

    composer install
    npm install
    npm install --force
    npm run watch
    symfony server:start

## A Few considerations

* All parent php files are the same :
    * Live components
    * One writable LiveProp string property

* One child php file :
    * Live component
    * One writable and updateFromParent LiveProp string property

* The only difference between the test cases is the way we set properties of the child component in the parent twig file.

### To view the comments about the test cases, run the app
