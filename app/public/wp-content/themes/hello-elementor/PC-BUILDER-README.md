# PC Builder Feature - Setup Guide

## Overview
The PC Builder is an interactive, step-by-step PC building configurator that guides users through selecting compatible hardware components for a custom PC build.

## Files Created

### 1. **pc-builder-data.php**
   - Contains all available PC components (CPU, GPU, RAM, etc.)
   - Easily extensible component database
   - Real-time pricing information for each component

### 2. **pc-builder.js**
   - Core JavaScript functionality for the builder
   - Handles component selection
   - Real-time compatibility checking
   - Dynamic build summary updates
   - Export and reset functionality

### 3. **pc-builder.css**
   - Complete styling for the builder interface
   - Responsive design for all devices
   - Component cards, grid layout, and sidebar styling
   - Compatibility warning styles

### 4. **template-pc-builder.php**
   - WordPress page template for the PC Builder
   - Header, main container, and help section
   - Integration with WordPress theme

### 5. **functions.php (updates)**
   - Enqueue scripts and styles
   - Pass component data to JavaScript
   - Register page template

## Setup Instructions

### Step 1: Create the PC Builder Page in WordPress

1. Go to **WordPress Admin Dashboard**
2. Click **Pages → Add New**
3. Enter the following details:
   - **Title**: Build Your PC
   - **Template**: Select "PC Builder" from the Template dropdown
4. Click **Publish**
5. Note the page URL (you'll need this for linking)

### Step 2: Link the "Build Your PC" Button

1. Go to **Elementor Editor** (edit the page with the button)
2. Find the "Build Your PC" button
3. Set the button link to the PC Builder page URL created in Step 1
4. Save

### Step 3: Verify the Installation

1. Click the "Build Your PC" button on your site
2. You should see the interactive PC Builder interface
3. Test component selection and compatibility checking

## Feature Breakdown

### 1. Component Selection Interface
- **8 Categories**: CPU, GPU, Motherboard, RAM, Storage, PSU, Case, Cooling
- **16 Total Components**: 2-4 options per category
- **Component Cards** display:
  - Component image
  - Component name
  - Key specifications
  - Current market price
  - Select button

### 2. Real-Time Compatibility Engine
The system validates:
- **CPU Socket Compatibility**: CPU socket must match motherboard socket
- **RAM Type Compatibility**: RAM type must match motherboard support
- **PSU Wattage**: PSU capacity must be adequate for components (with 20% headroom)
- **Cooler Support**: Cooler must support CPU socket

Compatibility issues are displayed with:
- **Error Level**: Critical mismatches (blocking)
- **Warning Level**: Potential issues (recommendations)

### 3. Live Pricing Integration
- Each component displays current pricing
- Prices update in real-time as components are selected
- Total build cost displayed in summary
- All prices in USD

### 4. Dynamic Build Summary
- **Sticky Sidebar** (desktop) showing:
  - Build completion progress (visual indicator)
  - Selected components with category labels
  - Individual component prices
  - Running total cost
  - Remove buttons for each component
- **Progress Indicator**: Shows X/8 components selected
- **Export Button**: Downloads build as JSON file
- **Reset Button**: Clears all selections with confirmation

## Component Database Structure

Each component object contains:
```javascript
{
  id: "unique_id",
  name: "Component Name",
  price: 299.99,
  // Category-specific properties (socket, vram, wattage, etc.)
  image: "image_url",
  specs: ["Spec 1", "Spec 2", "Spec 3"]
}
```

### Categories Available:
1. **CPU** - processor with socket, TDP, cores/threads
2. **GPU** - graphics card with VRAM, power requirements
3. **Motherboard** - socket, RAM type, form factor
4. **RAM** - capacity, type (DDR5), speed
5. **Storage** - SSD/HDD with capacity and speed
6. **PSU** - wattage and efficiency rating
7. **Case** - form factor and size
8. **Cooling** - cooler type and socket support

## Customization Options

### Adding New Components

Edit **pc-builder-data.php** and add to any category:
```php
[
    'id' => 'gpu_5',
    'name' => 'Your GPU Name',
    'price' => 699.99,
    'vram' => 16,
    'power_req' => 350,
    'image' => 'https://your-image-url.jpg',
    'specs' => ['16GB GDDR6X', '350W', 'PCIe 4.0']
]
```

### Updating Pricing

Simply update the `price` field in any component to reflect current market prices.

### Adding New Compatibility Rules

Edit the `checkCompatibility()` method in **pc-builder.js** to add new validation rules.

## Responsive Design

- **Desktop (1200px+)**: Two-column layout with sticky sidebar
- **Tablet (768px - 1200px)**: Adjusted grid and sidebar positioning
- **Mobile (< 768px)**: Single column with build summary at bottom

## User Flow

1. User clicks "Build Your PC" button
2. Lands on PC Builder page
3. Reads "How It Works" section
4. Selects components from each category
5. Compatibility warnings appear in real-time
6. Build summary updates as selections are made
7. Exports complete build as JSON
8. Can reset and start over

## Compatibility Engine Details

### Socket Compatibility
- Intel: LGA1700
- AMD: AM5

### RAM Types
- DDR5 (latest, for newer platforms)
- DDR4 (older platforms)

### Power Calculation
- CPU TDP + GPU Power Requirement + 150W (other components) × 1.2 (20% headroom)

### Cooler Support
- Air and Liquid options
- Socket compatibility verified

## JavaScript API

```javascript
// Access the builder instance
window.pcBuilder

// Methods available:
window.pcBuilder.selectComponent(categoryKey, component)
window.pcBuilder.checkCompatibility()
window.pcBuilder.updateBuildSummary()
window.pcBuilder.exportBuild()
window.pcBuilder.resetBuild()
window.pcBuilder.getTotalPrice()
```

## Troubleshooting

### Scripts Not Loading
- Check that all files are in `/wp-content/themes/hello-elementor/`
- Verify `functions.php` additions
- Check browser console for errors

### Compatibility Warnings Not Showing
- Ensure both components have required fields
- Check `pc-builder.js` for any JavaScript errors
- Verify component data structure

### Styling Issues
- Clear browser cache (Ctrl+Shift+Delete)
- Check WordPress theme CSS for conflicts
- Verify `pc-builder.css` is enqueued

## Future Enhancements

Potential additions:
- Integration with real price APIs (Newegg, Amazon)
- Component availability checking
- Build sharing via social media
- Pre-made build templates
- Performance benchmarking
- Component reviews and ratings
- YouTube integration for component videos
- Forum community builds

## Support

For issues or questions:
1. Check the browser console for JavaScript errors
2. Verify all files are created in the correct locations
3. Ensure the PC Builder page template is selected
4. Test in different browsers for compatibility

---

**Version**: 1.0
**Last Updated**: 2026-06-18
**Status**: Ready for Production
