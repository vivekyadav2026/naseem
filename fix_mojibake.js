const fs = require('fs');
const path = require('path');

const dir = 'c:/xampp/htdocs/naseem';
const files = fs.readdirSync(dir).filter(f => f.endsWith('.php'));

const replacements = {
    'â€”': '—',
    'â€“': '–',
    'â€™': '’',
    'â€˜': '‘',
    'â€œ': '“',
    'â€': '”',
    'Y"?': '📍',
    '?"': '—',
    '?T': '’'
};

files.forEach(file => {
    const filePath = path.join(dir, file);
    let content = fs.readFileSync(filePath, 'utf8');
    let original = content;
    
    for (const [bad, good] of Object.entries(replacements)) {
        content = content.split(bad).join(good);
    }
    
    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log('Fixed:', file);
    }
});
