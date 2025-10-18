Local setup notes — hide /public in URL
-------------------------------------

This project expects the application's entry point to be `public/index.php`.
If you don't want to include `/public` in your URLs while using Apache/XAMPP,
place the provided `.htaccess` in the project root. It will internally rewrite
requests to the `public/` folder.

Steps to enable:

1. Enable mod_rewrite in Apache (XAMPP):
   - Open `C:\xampp\apache\conf\httpd.conf`
   - Ensure the line `LoadModule rewrite_module modules/mod_rewrite.so` is not commented out.

2. Allow .htaccess to take effect for the project folder:
   - Open `C:\xampp\apache\conf\extra\httpd-vhosts.conf` (or the vhost you use)
   - For the `<Directory>` block that points to your project, set `AllowOverride All`.
     Example:

     <Directory "C:/xampp/htdocs/Bayani-Mid Exam/public">
         Options Indexes FollowSymLinks
         AllowOverride All
         Require all granted
     </Directory>

3. Restart Apache via XAMPP Control Panel.

4. Visit:
   http://localhost/Bayani-Mid%20Exam/

Recommended (cleaner): Create an Apache virtual host with DocumentRoot pointing to
the `public/` folder and map a local hostname (e.g., `bayani.test`) in your
`C:\Windows\System32\drivers\etc\hosts` file. This avoids rewrites and folder
encoding issues.

Security note: The `.htaccess` rewrite is convenient for local development only.
For production, always point your webserver's DocumentRoot to the `public/` folder.
