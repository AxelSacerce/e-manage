- <a href="#e-manage">Welcome</a>
- <a href="#setup">Setup</a>
- <a href="noric1902.github.io/e-manage/docs">Documentation</a>
- <a href="#mockups">Mockups</a>
- <a href="noric1902.github.io/e-manage/blog">Dev Blog</a>

### e-manage

Status : Under Development

<a href="https://github.com/noric1902/e-manage/issues/new?title=Contributing%20e-manage%20system&body=Hello%20noric1902,">Open an issue</a> to contribute this project

Design inspired from <a href="http://new.ppy.sh">new.ppy.sh</a>

Send me email (<a href="mailto:ahmad.uji1902@gmail.com">`ahmad.uji1902@gmail.com`</a>) for database, haven't time to create migrations 

### Setup

- open terminal, change the current working directory to the location where you want the cloned directory to be made.
- type `git clone https://github.com/noric1902/e-manage.git`
- run `composer install`
- `composer update`
- `php artisan key:generate`
- create database (database name: e-manage)
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan serve` (Server running on http://localhost:8000)
- require internet connection for running

### Mockups

- dashboard
<img src="https://raw.githubusercontent.com/noric1902/e-manage/master/images/mockups/screencapture-localhost-8000-1476802351296.png">
