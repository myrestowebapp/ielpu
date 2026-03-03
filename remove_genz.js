const fs = require('fs');
const path = require('path');

function processFile(filePath) {
    let content = fs.readFileSync(filePath, 'utf8');
    let originalConfig = content;

    // 1. Remove specific blob/gradient overlay divs
    // These usually have "mix-blend-multiply filter blur-3xl"
    content = content.replace(/<div class="[^"]*mix-blend-multiply filter blur-[^"]*"><\/div>\s*/g, '');
    
    // 2. Maps for colors
    const colorMap = {
        'genz-dark': 'gray-900',
        'genz-purple': 'indigo-600',
        'genz-pink': 'pink-600',
        'genz-cyan': 'cyan-600',
        'genz-yellow': 'yellow-500',
        'genz-light': 'gray-50'
    };
    for (const [genz, std] of Object.entries(colorMap)) {
        const regex = new RegExp(genz, 'g');
        content = content.replace(regex, std);
    }

    // 3. Replace brutalist shadows
    content = content.replace(/shadow-\[\d+px_\d+px_\d+px_\d+px_rgba\([^)]+\)\]/g, 'shadow-md');
    content = content.replace(/shadow-\[\d+px_\d+px_\d+px_rgba\([^)]+\)\]/g, 'shadow-md');
    content = content.replace(/shadow-brutal/g, 'shadow-lg');
    content = content.replace(/shadow-neon/g, 'shadow-xl');

    // Hover shadows
    content = content.replace(/hover:shadow-\[\d+px_\d+px_\d+px_\d+px_rgba\([^)]+\)\]/g, 'hover:shadow-lg');
    content = content.replace(/hover:shadow-\[\d+px_\d+px_\d+px_rgba\([^)]+\)\]/g, 'hover:shadow-lg');
    
    // Drop shadows
    content = content.replace(/drop-shadow-\[\d+px_\d+px_\d+px_rgba\([^)]+\)\]/g, 'drop-shadow-md');

    // 4. Remove heavy brutalist borders: 'border-4' -> 'border'
    content = content.replace(/border-4 border-gray-900/g, 'border border-gray-200');
    content = content.replace(/border-4 border-indigo-600/g, 'border border-indigo-200');
    content = content.replace(/border-4 border-pink-600/g, 'border border-pink-200');
    content = content.replace(/border-4 border-cyan-600/g, 'border border-cyan-200');
    content = content.replace(/border-4 border-yellow-500/g, 'border border-yellow-200');
    
    content = content.replace(/border-2 border-gray-900/g, 'border border-gray-200');
    content = content.replace(/border-2 border-white/g, 'border border-gray-200');
    content = content.replace(/border-4 border-white/g, 'border border-gray-200');

    // 5. Remove Rotations / Transforms
    content = content.replace(/\btransform\s+-rotate-\d+\b/g, '');
    content = content.replace(/\btransform\s+rotate-\d+\b/g, '');
    content = content.replace(/\b-rotate-\d+\b/g, '');
    content = content.replace(/\brotate-\d+\b/g, '');
    content = content.replace(/\bhover:-translate-y-\d+\b/g, 'hover:-translate-y-1');
    content = content.replace(/\bhover:translate-y-\d+\b/g, '');
    content = content.replace(/\bhover:translate-x-\d+\b/g, '');
    content = content.replace(/hover:translate-x-\[\d+px\]/g, '');
    content = content.replace(/hover:translate-y-\[\d+px\]/g, '');
    
    // typography replacements
    content = content.replace(/\bfont-black\b/g, 'font-bold');
    
    // some extra cleanup for class strings that might have double spaces
    content = content.replace(/class="([^"]*)"/g, (match, classes) => {
        return 'class="' + classes.replace(/\s+/g, ' ').trim() + '"';
    });

    if (content !== originalConfig) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log('Processed:', filePath);
    }
}

function traverseDir(dir) {
    const files = fs.readdirSync(dir);
    for (const file of files) {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) {
            traverseDir(fullPath);
        } else if (fullPath.endsWith('.blade.php')) {
            processFile(fullPath);
        }
    }
}

traverseDir(path.join(__dirname, 'resources', 'views'));
