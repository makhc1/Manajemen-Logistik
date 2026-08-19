import os
import re

with open('resources/views/welcome.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

def extract_tag(content, tag, class_or_id):
    pattern = rf'<{tag}\s+[^>]*?{class_or_id}[^>]*>'
    start_match = re.search(pattern, content)
    if not start_match: return ''
    start_idx = start_match.start()
    
    depth = 0
    
    idx = start_idx
    while idx < len(content):
        # Extremely simplified tag matching that ignores attributes to find closing tags
        if content[idx:idx+len(tag)+2].lower() == f'<{tag.lower()}>' or content[idx:idx+len(tag)+2].lower() == f'<{tag.lower()} ':
            depth += 1
        elif content[idx:idx+len(tag)+3].lower() == f'</{tag.lower()}>':
            depth -= 1
            if depth == 0:
                return content[start_idx:idx+len(tag)+3]
        idx += 1
        
    return ''

os.makedirs('resources/views/layouts', exist_ok=True)
os.makedirs('resources/views/components', exist_ok=True)
os.makedirs('resources/views/pages', exist_ok=True)

# 1. Sidebar
sidebar = extract_tag(content, 'aside', 'class="sidebar"')
with open('resources/views/components/sidebar.blade.php', 'w', encoding='utf-8') as f: f.write(sidebar)

# 2. Header
header = extract_tag(content, 'header', 'class="header"')
with open('resources/views/components/header.blade.php', 'w', encoding='utf-8') as f: f.write(header)

# Pages
pages = ['dashboard', 'master', 'inbound', 'outbound', 'warehouses', 'users']
for page in pages:
    page_content = extract_tag(content, 'div', f'id="{page}-view"')
    with open(f'resources/views/pages/{page}.blade.php', 'w', encoding='utf-8') as f: f.write(page_content)

# Modals & Toast
modal = extract_tag(content, 'div', 'id="barcodePrintModal"')
toast = extract_tag(content, 'div', 'id="toast"')
with open('resources/views/components/modals.blade.php', 'w', encoding='utf-8') as f: f.write(modal + '\n\n' + toast)

print('Extraction done')
