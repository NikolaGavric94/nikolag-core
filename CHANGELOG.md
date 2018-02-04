# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2017-10-05
### Added
- Support for main service
- Support for custom exceptions
- Support for both DI and Facade approach
- Core models and migrations
- Core configuration
- Ability to switch drivers on the fly

## [1.0.1] - 2017-10-06
### Added
- Added more examples for core service usage

### Changed
- Code cleanup
- Updated README.md with [all available core methods](https://github.com/NikolaGavric94/nikolag-core#all-available-core-methods)

### Fixed
- Issue with wrong root class of previous Exception inside of Nikolag\Core\Exception constructor
- Issue with incorrect constants
- Issue with using incorrect namespace for Constants inside of migrations file

## [1.0.2] - 2017-10-16
### Fixed
- Issue with migration file `nikolag_customers`, type string can't be unsigned, typo

## [1.1.0] - 2018-02-04
### Added
- Support for order system
- Support for tax system
- Support for discounts system

[Unreleased]: https://github.com/NikolaGavric94/laravel-square/compare/v1.1.0...HEAD
[1.1.0]: https://github.com/NikolaGavric94/laravel-square/compare/v1.0.2...v1.1.0
[1.0.2]: https://github.com/NikolaGavric94/laravel-square/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/NikolaGavric94/laravel-square/compare/v1.0.0...v1.0.1
