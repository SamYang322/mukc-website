# 🥋 Melbourne University Karate Club (MUKC) Website

Welcome to the official repository for the MUKC website. This project contains the custom **Ice Cold Child** theme and templates powering [mukc.org.au](https://mukc.org.au).

## 🚀 Getting Started (For Committee Members)

### 1. Prerequisite
- You should have a local WordPress environment set up (e.g., **Laragon**, **LocalWP**, or **XAMPP**).
- Ensure you have **Git** installed on your machine.

### 2. Clone the Repository
Open your terminal in your local server's `www` or `public_html` folder and run:
```bash
git clone https://github.com/SamYang322/mukc-website.git
```

### 3. Setup
- The repository contains the **entire WordPress directory structure** (excluding large core files and backups).
- **Database**: To get the latest content/settings, request a `.wpress` export or `.sql` dump from the lead developer.
- **Theme**: Our custom work is located in `wp-content/themes/ice-cold-child/`.

---

## 🛠️ Collaboration Workflow

To keep the site stable and avoid overwriting each other's work, please follow this workflow:

1. **Pull First**: Always run `git pull origin master` before you start your daily session.
2. **Commit Often**: Make small, descriptive commits for your changes.
3. **Push When Done**: Run `git push origin master` once your changes are tested locally.

### 📜 Rules of the Dojo
- **No Large Files**: Do not commit backups (`.zip`, `.wpress`) or large media to the repository.
- **Child Theme First**: All CSS and template changes should happen within the `ice-cold-child` folder.
- **Coordinate**: Before making major structural changes, please post in the committee chat to avoid "merge conflicts."

---

## 📂 Project Structure
- `/wp-content/themes/ice-cold-child/`: Custom styles, footer, and page templates.
- `/wp-content/uploads/2026/02/`: Standardized location for high-res assets and badges.

---

## 🆘 Support
If you run into issues with Git or need access to the staging/live server, please contact the Committee Web Lead.

**Kiai!** 🥋🚀
