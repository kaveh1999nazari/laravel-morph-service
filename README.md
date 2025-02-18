# Laravel Morph Service 📦

## Overview
The **Laravel Morph Service** package simplifies adding media files to multiple models without the need for separate media tables for each model. Instead, it provides a unified media table that associates files with different models dynamically.

This is achieved using `mediable_id` and `mediable_type`, which store the ID and type of the model that owns the media file. For example, if you want to store a profile picture for a `User`, the table will store the `user_id` as `mediable_id` and `User` as `mediable_type`. This structure makes it easy to retrieve media files related to specific models while maintaining a clean and structured database design.

---

## 🔧 Installation
To install the package, run the following command:
```bash
composer require kaveh/morph-service
```

Then, add the provider in `bootstrap/provider.php`:
```php
Kaveh\LaravelMorphService\MorphServiceProvider::class,
```

To ensure the package integrates properly with your project, add the following to `composer.json`:
```json
"autoload": {
   "psr-4": {
       "Kaveh\\NotificationService\\": "vendor/kaveh/notification-service/src/"
   }
}
```
Then, run:
```bash
composer dump-autoload
```

---

## 📌 Database Migration
Run the migration command to set up the required tables:
```bash
php artisan morph:migrate
```

---

## 📂 Usage

### 1️⃣ Define the Media Relationship
For any model that needs to support media files, add the following method:
```php
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\Media;

public function medias(): MorphMany
{
    return $this->morphMany(Media::class, 'mediable');
}
```

---

### 2️⃣ Upload Media in Your Controller
To upload a file and associate it with a model, use the following:
```php
use Kaveh\LaravelMorphService\Services\MediaService;
use Illuminate\Http\UploadedFile;

// Upload media
MediaService::uploadMedia(instance of UploadedFile, instance of Model);
```

---

## 🎯 Benefits
✔ **Single media table for all models** – No need for separate media tables.  
✔ **Flexible association** – Easily attach media to different models dynamically.  
✔ **Efficient querying** – Retrieve media files related to any model without extra joins.

---

This package streamlines media management in Laravel, making file storage more efficient and scalable! 🚀

