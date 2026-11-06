# CMS setup

The editor is available at `/admin/` after deployment.

1. In Hostinger hPanel, create a MySQL database and database user, and grant the user access to the database.
2. Copy `includes/cms-config.example.php` to `includes/cms-config.php` on the server. Fill in the database name, user, and password. This live config is ignored by Git.
3. Visit `/admin/` and set the owner password (at least 12 characters). The password is stored in MySQL as a password hash. The editor creates its two tables automatically.
4. Log in, choose a page, click text in the visual preview to edit it, and save. The original page displays until an override is saved. An empty override restores the original.

The editor covers root PHP pages rendered through the site's shared header and footer. Page content is stored in the database; the existing PHP files and media remain the fallback. The visual editor changes the main content area, not the shared navigation, header, or footer.
