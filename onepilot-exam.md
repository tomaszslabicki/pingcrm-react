# Analysis

## 1. Suggest at least 3 packages (npm or composer) that could be added to the project and justify why they would be useful.

- `vite` : npm package that makes the compilation process much more rapid.
- `laravel/dusk` : composer package for Laravel applications, that is helpful when considering the front-end browser tests, we could prevent some bugs or other misbehavior from the user navigation point of view.
- `magic-test/magic-test-laravel` : If using Laravel Dusk, it would be interesting to use this package, it helps to generate the Dusk tests code by interacting with the browser.
- `predis/predis` : php Redis client, a good choice for queued jobs (for example for sending emails), Redis is very fast when comparing to others databases systems, often used for the cache purposes.
- `beyondcode/laravel-websockets` & `pusher/pusher-php-server ` & `pusher-js` : these three packages can be useful if we consider creating a websockets based notification system, could be used for sending the mails with a new password, notifying user of a new report uploaded etc.

## 2. How would you improve this project from a code perspective?

- Fix unhandled ErrorException when clicking on `500` button in the dashboard.
- Do a logging system, with different channels, to keep the traces of the application execution and of the user activity.
- Use the queues for the emails to be sent, for the better performances, especially when its usage increases.
- Use redis for any queued jobs (for examples sending emails).
- Consider Vite (ViteJs) to compile the assets, as it could be much faster solution than Laravel Mix.
- Create some front-end testing with Cypress (the most common one), or the Laravel Dusk package.
- Clear up the default user email with his password as a plain text value by default in the log-in form (ok for testing purposes but unacceptable in production), by the way any necessary sensitive data should be in an environment variables file.
- We could use something like SonarCloud to perform a static code analyse and detect some bugs, vulnerabilities or code smells.
- Build a CI/CD pipeline to automatize the deployment process.
- Think of passing to the new Laravel 9 (LTS version).

## 3. How would you improve this project from a product (features) perspective?

- Finish the reinitialization of password feature.
- Finish the report's CRUD methods with the front-end pages, including the soft deleting feature (for the `trashed` filter).
- While deleting, for example an organisation, there is a confirmation box that appears, we could replace this native browser element by a pop-in element or other but fully customized.
- Create a notification system to inform the user of some important events.
- Add a possibility (for example using the Laravel's file system feature) to upload the entire reports (not only title, description and date) from a file or to download it via the app.
- Add a sorting functionality on each column of the views' tables.
- Create personalized pages for the common errors that can be encountered (like: 404, 403, 419, 500...) for the user convenience.
- Product's security could be increased if we enable the session expiration when the browser closes.
- In some cases users would like to choose how many records the want to display in a single page (right now it is 10 records par page in the existing pagination system), we could think of personalising this.
