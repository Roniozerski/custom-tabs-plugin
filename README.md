# Custom Tabs Plugin

A modular, responsive WordPress tabs plugin powered by ACF (Advanced Custom Fields).

This plugin allows managing dynamic tab content via an Options Page and rendering it anywhere using a shortcode.

---

## ✨ Features

- Tabs managed via ACF Options Page
- Repeater-based tab structure
- Quote box support (background, avatar, name, job, logo)
- Percentage box
- Link box (ACF link field)
- Trusted By logos repeater
- Fully responsive (mobile breakpoint at 480px)
- SCSS architecture with build process
- Vanilla JavaScript with fade transition
- Scoped CSS reset (no theme conflicts)
- Clean modular PHP structure

---

## 📦 Requirements

- WordPress 6+
- Advanced Custom Fields PRO

---

## 📁 Plugin Structure

```
custom-tabs-plugin/
│
├── custom-tabs-plugin.php
├── README.md
├── package.json
├── .gitignore
│
├── inc/
│   ├── options-page.php
│   ├── acf-fields.php
│   ├── shortcode.php
│   └── enqueue.php
│
├── assets/
│   ├── scss/
│   │   ├── _variables.scss
│   │   ├── _tabs.scss
│   │   └── style.scss
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── tabs.js
```

---

## 🚀 Installation

### 1. Upload Plugin

Upload the plugin folder to:

```
wp-content/plugins/
```

### 2. Activate Plugin

Go to:

```
WordPress Admin → Plugins
```

Activate **Custom Tabs Plugin**.

### 3. Install ACF Pro

Ensure **Advanced Custom Fields PRO** is installed and activated.

---

## ⚙️ Managing Tabs Content

Go to:

```
Admin → Custom Tabs
```

Add tabs using the repeater field.

Each tab supports:

- Tab Title
- Quote Box
- Percentage Box
- Link Box
- Trusted By Logos

---

## 🧩 Usage

Insert shortcode anywhere:

```
[custom_tabs]
```

Supports multiple instances per page.

---

## 🎨 Styling

The plugin uses SCSS compiled to CSS.

### Variables

Variables are stored in:

```
assets/scss/_variables.scss
```

## 🛠 SCSS Build Process

### Install Dependencies

From plugin root:

```
npm install
```

### Compile SCSS

```
npm run build
```

This compiles:

```
assets/scss/style.scss
```

into:

```
assets/css/style.css
```

### Development Mode (Auto Rebuild + Reload)

```
npm run dev
```

This will:

- Watch SCSS changes
- Compile automatically
- Reload browser (if BrowserSync is configured)

---

## 🔤 Fonts

Adobe Fonts kit is loaded via:

```
https://use.typekit.net/wuz0gtr.css
```

The plugin uses:

```
font-family: "proxima-nova", sans-serif;
```

---

## 🔄 Cache Busting

CSS versioning uses:

```php
filemtime()
```

This ensures browser cache is refreshed automatically when CSS changes.

---

## 🧼 Scoped CSS Reset

All reset rules are scoped inside:

```
.ctp-tabs
```

The plugin does NOT modify global theme styles.

---

## 🧠 Accessibility

- ARIA roles for tabs and panels
- Unique instance IDs per shortcode
- Keyboard navigation can be added if needed

---

## 📄 License

GPL2+

---

## 👩‍💻 Author

Roni Ozerski
