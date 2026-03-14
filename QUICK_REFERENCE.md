# Quick Reference Guide - Project Gallery

## 🎯 How to Use

### For Users:
1. Visit `services.php`
2. Scroll to "Our Impact So Far" section
3. Click any stat card:
   - **Projects Completed** → View all 11 projects
   - **Commercial Solutions** → View 2 commercial projects
   - **Industrial Deployments** → View 4 industrial projects
   - **Hybrid / Utility** → View 5 utility projects
4. Click thumbnails to change main image
5. Hover over cards for effects

### For Developers:

#### Add New Project:
```php
// In services.php, add to $solar_projects array:
[
    'title' => 'New Project Name (XX MW)',
    'loc' => 'Location, State',
    'cat' => 'utility', // or 'commercial' or 'industrial'
    'images' => [
        'assets/images/projects/newproject/1.jpg',
        'assets/images/projects/newproject/2.jpg',
        'assets/images/projects/newproject/3.jpg',
        'assets/images/projects/newproject/4.jpg',
        'assets/images/projects/newproject/5.jpg'
    ]
]
```

#### Update Project Images:
1. Create folder: `assets/images/projects/[project-name]/`
2. Add 5 images: `1.jpg`, `2.jpg`, `3.jpg`, `4.jpg`, `5.jpg`
3. Recommended size: 1200x800px
4. Keep file size < 500KB

#### Change Gallery Layout:
```css
/* In services.css, modify: */
.projects-gallery-grid {
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    /* Change 350px to adjust card width */
}
```

#### Customize Colors:
```css
/* Primary green accent */
--primary-green: #90cf4d;

/* Thumbnail active border */
.thumbnail.active {
    border-color: #90cf4d; /* Change this */
}
```

## 📊 Project Categories

| Category | Count | Projects |
|----------|-------|----------|
| Utility | 5 | Hinduja, ITC, Torrent14, Torrent17, ReNew |
| Commercial | 2 | Thiagarajar, BIAL |
| Industrial | 4 | Capacity, MTK, GHCL1, GHCL2 |
| **Total** | **11** | **All Projects** |

## 🔧 Troubleshooting

### Images Not Showing?
- Check file paths in PHP array
- Verify images exist in folders
- Check browser console for 404 errors
- Ensure correct file extensions (.jpg)

### Thumbnails Not Clickable?
- Check `services.js` is loaded
- Verify `initThumbnailGallery()` is called
- Check browser console for JS errors

### Filter Not Working?
- Verify `data-cat` attribute matches category
- Check `data-filter` on stat cards
- Ensure `initProjectFilter()` is called

### Layout Issues?
- Check `services.css` is loaded
- Verify grid container has proper width
- Test responsive breakpoints

## 🎨 Customization Options

### Change Card Size:
```css
.main-image {
    height: 280px; /* Adjust main image height */
}

.thumbnail {
    width: 70px;   /* Adjust thumbnail size */
    height: 70px;
}
```

### Change Animation Speed:
```css
.project-gallery-card {
    transition: all 0.4s ease; /* Change 0.4s */
}
```

### Change Grid Columns:
```css
/* Force 2 columns */
.projects-gallery-grid {
    grid-template-columns: repeat(2, 1fr);
}

/* Force 4 columns */
.projects-gallery-grid {
    grid-template-columns: repeat(4, 1fr);
}
```

## 📱 Responsive Behavior

- **Desktop (>992px)**: 3 columns
- **Tablet (768-992px)**: 2 columns
- **Mobile (<768px)**: 1 column

## ✅ Verification Commands

```bash
# Check all folders exist
ls -d assets/images/projects/*/

# Count images per project
for dir in assets/images/projects/*/; do 
    echo "$(basename $dir): $(ls $dir/*.jpg | wc -l) images"
done

# Total image count (should be 55)
find assets/images/projects -name "*.jpg" | wc -l
```

## 🚀 Performance Tips

1. **Optimize Images**: Use tools like TinyPNG or ImageOptim
2. **Lazy Loading**: Add `loading="lazy"` to img tags
3. **WebP Format**: Convert JPG to WebP for smaller size
4. **CDN**: Host images on CDN for faster loading
5. **Caching**: Enable browser caching for images

## 📞 Support

For issues or questions:
- Check `IMPLEMENTATION_SUMMARY.md`
- Review `PROJECT_IMAGES_SETUP.md`
- Test in browser console
- Verify file paths and permissions
