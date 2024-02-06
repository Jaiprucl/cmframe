# Code Block

## What does this extension do?
This extension creates a content element that adapts an iframe snippet so that the content manager can block it in compliance with data protection regulations. See: https://help.consentmanager.de/books/cmp/page/how-to-block-third-party-codes-cookies-if-no-consent-is-given

## Installation
Add this extension to your TYPO3 setup. Install using composer: `composer req jaiprucl/cmframe`.

Add the TypoScript to your site extensions setup:

`@import 'EXT:cmframe/Configuration/TypoScript/setup.typoscript'`

Add the PageTS (for adding the element to the New Content Element Wizard):

`@import 'EXT:cmframe/Configuration/PageTs/PageTs.tsconfig'`
