# Wedding Photo Gallery: Implementation Plan

## 1. Environment & Dependencies

* **Framework:** Laravel 11.x
* **UI/Logic:** Livewire 3.x
* **Admin/Forms:** Filament V3 (Forms & Panel)
* **Media Handling:** `spatie/laravel-medialibrary`
* **Filament Plugin:** `filament/spatie-laravel-media-library-plugin`

## 2. Database & Model Layer

### Model: `GalleryPhoto`

* **Migration:**
* `string('guest_name')`
* `boolean('is_approved')->default(false)`


* **Media Configuration:**
* Implement `Spatie\MediaLibrary\HasMedia` and use `InteractsWithMedia`.
* **Collection:** Create a collection called `wedding-photos`.
* **Conversions:** Define a `thumb` conversion (400x400, fit) and a `large` conversion (1600px width).



## 3. Admin Dashboard (Filament)

### Resource: `GalleryPhotoResource`

* **Table Columns:**
* `SpatieMediaLibraryImageColumn` showing the `thumb` conversion.
* `TextColumn` for `guest_name`.
* `ToggleColumn` for `is_approved`.


* **Bulk Actions:**
* Create a `BulkAction` titled **"Approve Selected"** to set `is_approved = true` for multiple records at once.


* **Filters:**
* Add a `TernaryFilter` for `is_approved` to easily find pending photos.



## 4. Guest Upload Component (Livewire + Filament Forms)

### Logic: `App\Livewire\PhotoUploader`

* **Form Schema:**
* `TextInput` for guest name.
* `SpatieMediaLibraryFileUpload`:
* `multiple()`
* `image()`
* `imageEditor()`
* `imageResizeTargetWidth('1600')` (Client-side optimization).




* **Submission Logic:**
* Save the `GalleryPhoto` record.
* Attach the uploaded media files to the `wedding-photos` collection.


* **Blade View UX:**
* **Submit Button:** Add `wire:loading.attr="disabled"` and `wire:target="data.photo"`.
* **Progress Feedback:** Add a loading indicator or text change when `wire:loading` is active on the photo field.



## 5. Frontend Gallery (Livewire)

### Logic: `App\Livewire\PhotoGallery`

* **Query:** Fetch `GalleryPhoto::where('is_approved', true)->with('media')->latest()`.
* **Frontend Blade View:**
* **Grid:** Use a Tailwind CSS Masonry/Columns layout (`columns-2 md:columns-3 lg:columns-4`).
* **Image Rendering:** Use `getFirstMediaUrl('wedding-photos', 'thumb')` for the grid images to ensure fast load times.
* **Lightbox:** Wrap images in an anchor tag pointing to the `large` conversion URL and initialize a lightweight library (like Alpine.js Lightbox or PhotoSwipe).



## 6. Server Configuration

* **PHP:** Increase `upload_max_filesize` and `post_max_size` in `php.ini` to accommodate multiple high-res photos.
* **Storage:** Run `php artisan storage:link` to ensure the public can view the media.
