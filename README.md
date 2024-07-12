
# SavoWall - Web Application Firewall (WAF)

SavoWall is a modular PHP-based Web Application Firewall designed to protect web applications from various security threats such as SQL injection, XSS attacks, CSRF, and directory traversal. It is easily integrable into existing PHP projects to enhance security by monitoring and blocking suspicious requests.

## Features

- **SQL Injection Protection**: Blocks common SQL injection patterns.
- **Cross-Site Scripting (XSS) Prevention**: Filters out requests containing malicious scripts.
- **Cross-Site Request Forgery (CSRF) Protection**: Ensures that incoming requests are from your site/app to prevent CSRF attacks.
- **Directory Traversal Protection**: Prevents attackers from accessing files outside the intended directories.

## Installation

1. Clone the repository or download the zip file into your project directory:
   ```bash
   git clone https://github.com/dylanpatriarchi/SavoWall.git
   ```
2. Include the WAF in your PHP scripts where you want to add protection:
   ```php
   require_once 'path/to/savowall/index.php';
   ```

## Usage

To initialize the firewall, simply create an instance of the `WAF` and call the `initialize` method in your PHP entry file or before processing any requests:
```php
require_once 'savowall/core/WAF.php';

// Create WAF instance
$waf = new WAF();

// Initialize the WAF to start protecting your application
$waf->initialize();
```

## Configuration

Modify the `rules` files inside the `rules` directory to customize the security checks or to add new ones. Each rule file corresponds to a specific type of security threat.

## Logs

SavoWall logs all detected threats and actions taken in response. Logs are saved in a file called `waf_log.txt` in the root directory. Ensure this file is secured and regularly monitored.

## Contributing

Contributions to SavoWall are welcome! Please submit your pull requests or issues to the repository to help improve the firewall.

## License

SavoWall is open-source software licensed under the MIT license.
