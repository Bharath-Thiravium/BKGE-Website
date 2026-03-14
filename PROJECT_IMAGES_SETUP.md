# Project Images Setup Guide

## Image Structure Required

Create the following folder structure in your `assets/images/` directory:

```
assets/images/projects/
├── hinduja/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
├── itc/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
├── thiagarajar/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
├── capacity/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
├── mtk/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
├── torrent14/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
├── torrent17/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
├── ghcl1/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
├── ghcl2/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
├── renew/
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   ├── 4.jpg
│   └── 5.jpg
└── bial/
    ├── 1.jpg
    ├── 2.jpg
    ├── 3.jpg
    ├── 4.jpg
    └── 5.jpg
```

## Quick Setup Commands

Run these commands in your terminal from the project root:

```bash
# Create all project folders
mkdir -p assets/images/projects/{hinduja,itc,thiagarajar,capacity,mtk,torrent14,torrent17,ghcl1,ghcl2,renew,bial}

# If you have placeholder images, copy them:
# cp your-placeholder.jpg assets/images/projects/hinduja/1.jpg
# (repeat for all folders)
```

## Image Recommendations

- **Format**: JPG or PNG
- **Size**: 1200x800px (recommended)
- **File Size**: < 500KB per image (optimized)
- **Aspect Ratio**: 3:2 or 16:9
- **Quality**: High quality, clear project photos

## Temporary Placeholder

If you don't have images yet, you can use a placeholder service:
- Copy any existing project image 5 times into each folder
- Or use: https://via.placeholder.com/1200x800/90cf4d/ffffff?text=Project+Image

## Testing

After adding images, test by:
1. Open services.php in browser
2. Click "Projects Completed" stat card
3. Verify all 11 projects show with 5 images each
4. Click thumbnails to change main image
5. Test filtering by Commercial/Industrial/Utility
