# Chekin WordPress Web Project Setup

## 📌 Project Overview
This repository contains the essential WordPress files needed to run the project, including themes, selected plugins, and configuration files. However, some files have been ignored due to size constraints or security reasons.

## 📂 Included in the Repository
- WordPress core files (except the `wp-content/uploads` folder)
- `wp-config.php`
- Active theme: `wp-content/themes/chekin2020/`
- Selected plugins:
  - `wp-content/plugins/wp-rocket/`
  - `wp-content/plugins/advanced-custom-fields-pro/`
  - `wp-content/plugins/sitepress-multilingual-cms/`
  - `wp-content/plugins/wp-postviews/`
  - `wp-content/plugins/wp-seo-multilingual/`
  - `wp-content/plugins/wpml-media-translation/`
  - `wp-content/plugins/wpml-string-translation/`

## 🚫 Excluded Files & Where to Get Them
### 1️⃣ **Database**
The database is not included in this repository. You can download the latest SQL export from the server or your local development environment. If you need a copy:
- Export it from **phpMyAdmin** or use the command:
  ```sh
  mysqldump -u your_user -p your_database > database_backup.sql
  ```
- Place it in your local database and update `wp-config.php` with the correct credentials.

### 2️⃣ **Media Uploads (`wp-content/uploads/` folder)**
Since media files can be large, the entire `uploads` folder is excluded. You can get it from:
- The production server (`/wp-content/uploads/`)
- Your local backup
- **Alternative:** If you don’t need full images, consider using a placeholder service or regenerate thumbnails after setup.

### 3️⃣ **Ignored Plugins (Not Included in Repo)**
Some plugins are ignored to reduce repository size. You can install them manually via the WordPress admin panel or copy them from another environment. Ignored plugins include:
- `wp-content/plugins/akismet`
- `wp-content/plugins/amp`
- `wp-content/plugins/cookiebot`
- `wp-content/plugins/yoast-seo`
- `wp-content/plugins/wordfence`
- `wp-content/plugins/wp-all-import`
- *(...and others, refer to `.gitignore` for the full list)*

### 4️⃣ **WordPress Core Files (If Needed)**
If WordPress core files are missing or outdated, you can download them directly from:
- [WordPress.org](https://wordpress.org/download/)
- Or run:
  ```sh
  wp core download --locale=en_US
  ```
  *(Requires WP-CLI installed)*

## 🚀 How to Set Up Locally
1. Clone the repository:
   ```sh
   git clone https://github.com/invibeme/onboarding-app.git
   cd onboarding-app
   ```
2. Download the **database** and import it into your local MySQL server.
3. Add the missing **uploads** folder to `wp-content/uploads/`.
4. Run WordPress locally using MAMP, XAMPP, or Local by Flywheel.
5. Update **wp-config.php** with your local database credentials.
6. Open `http://localhost/your-project/` in your browser.

## ✅ Notes
- If you face plugin issues, ensure all required plugins are installed manually.
- Check `.gitignore` for the full list of ignored files.
- Feel free to modify and update this setup guide as needed.

---
**Maintainer:** [Asmaul Hoque]  
📧 Contact: asmaulhq97@gmail.com

