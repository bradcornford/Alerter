Alerter
=======

# Fast Alerting in Laravel With Templates

Think of Alerter as an easy way to manage user alerting, providing a variety of alert options to speed up user alerting. These include:

- `Alert::create`
- `Alert::error`
- `Alert::info`
- `Alert::warning`
- `Alert::success`
- `Alert::none`

It comes with a variety of template pre-built for some of the most popular CSS Frameworks. These include:

- `Bootstrap`
- `Foundation`
- `Pure`

It is also full customisable, allowing new templates to be created, along with new alert types too.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `cornford/alerter`.

	"require-dev": {
		"cornford/alerter": "1.*"
	}

Next, update Composer from the Terminal:

    composer update --dev

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Cornford\Alerter\AlerterServiceProvider'

That's it! You're all set to go.

## Usage

It's really as simple as using the Alerter class in any Controller / Model / File you see fit with:

    use Cornford\Alerter\Alert;

This will give you access to

- [Create](#create)
- [Error](#error)
- [Info](#info)
- [Warning](#warning)
- [Success](#success)
- [None](#none)

### Create

The `create` method allows you to create a new Alert with any of the pre-built types, or specify your own.

    Alert::create(Alert::TYPE_ERROR, 'This is an error message!')->display();
    Alert::create('Custom', 'This is a custom message!')->display();

Both the `type` and `content` options are required.

### Error

The `error` method allows you to create a new Alert Error without specifying type.

    Alert::error('This is an error message!')->display();

The `content` option is required.

### Info

The `info` method allows you to create a new Alert Info without specifying type.

    Alert::info('This is an info message!')->display();

The `content` option is required.

### Warning

The `warning` method allows you to create a new Alert Warning without specifying type.

    Alert::warning('This is a warning message!')->display();

The `content` option is required.

### Success

The `success` method allows you to create a new Alert Success without specifying type.

    Alert::Success('This is a success message!')->display();

The `content` option is required.

### None

The `none` method allows you to create a new Alert None without specifying type.

    Alert::None('This is a none message!')->display();

The `content` option is required.

### License

The Laravel IDE Helper Generator is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)